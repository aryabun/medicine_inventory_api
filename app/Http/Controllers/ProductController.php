<?php
namespace App\Http\Controllers;

use App\Enums\FilePath;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\FileUploadService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    protected Product $product;
    protected FileUploadService $imageService;

    public function __construct(Product $product, FileUploadService $imageService)
    {
        $this->product      = $product;
        $this->imageService = $imageService;
    }

    public function index(Request $request)
    {
        $sortBy     = $request->input('sort_by', 'id');       // Defaults to 'id'
        $sortMethod = $request->input('sort_method', 'asc'); // Defaults to 'desc'

        if ($request->has('id') && $request->filled('id')) {
            $products = $this->product->where('id', $request->id)->get();
        } else {
            $products = $this->product
            // 2. Only search if 'q' is actually filled out
                ->when($request->filled('q'), function ($query) use ($request) {
                    $query->q($request->input('q'));
                })
            // Safe sorting because we have default method
                ->orderBy($sortBy, $sortMethod)
            // 3. Only filter by dates if they are provided in the URL
                ->when($request->filled('date_from'), function ($query) use ($request) {
                    $query->dateFrom($request->input('date_from'));
                })
                ->when($request->filled('date_to'), function ($query) use ($request) {
                    $query->dateTo($request->input('date_to'));
                })
                ->paginate();
        }
        return response()->json(ProductResource::collection($products)->response()->getData(true));

    }
    public function store(ProductRequest $request)
    {
        // validate upcoming product data

        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                # code...
                $data['image'] = $this->imageService->getImagePost(
                    $request->file('image'),
                    $this->imageService->directory(FilePath::PRODUCT->value)
                );
            }

            $product = $this->product->create($data);
            return response()->json([
                'status'  => 'Success',
                'data'    => new ProductResource($product),
                'message' => "Product successfully created!",
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->errorInfo ?: 'Something went wrong!',
            ], 500);
        }
    }
    public function update(ProductRequest $request, string $id)
    {
        try {
            $product          = $this->product->findOrFail($id);
            $product['image'] = $product->image;
            if ($request->hasFile('image')) {
                $product['image'] = $this->imageService->editPhoto(
                    $request->file('image'),
                    $product->image,
                    FilePath::PRODUCT->value
                );
            }
            $product->update($request->all());
            return response()->json([
                'status'  => 'Success',
                'data'    => new ProductResource($product),
                'message' => "Product successfully updated!",
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage() ?: 'Something went wrong!',
            ], 500);
        }
    }
    // WORKED!!!!
    public function destroy(string $id)
    {
        try {
            $product = $this->product->findOrFail($id);

            // Delete the image file from the server first
            if ($product->image) {
                $directory        = $this->imageService->directory(FilePath::PRODUCT->value);
                $absoluteFilePath = public_path($directory . $product->image);

                if (File::exists($absoluteFilePath)) {
                    File::delete($absoluteFilePath);
                }
            }

            $product->delete();
            return response()->json([
                'status'  => 'Success',
                'message' => "Product successfully deleted!",
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status'  => 'Error!',
                'message' => $e->getMessage() ?: 'Something went wrong!',
            ], 500);
        }
    }
}
