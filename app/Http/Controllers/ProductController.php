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
        $sortBy     = $request->input('sort_by', 'id');      // Defaults to 'id'
        $sortMethod = $request->input('sort_method', 'asc'); // Defaults to 'desc'

        if ($request->filled('id')) {
            $products = $this->product->findOrFail('id', $request->id)->first();
            return new ProductResource($products);
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
            return response()->json(ProductResource::collection($products)->response()->getData(true));
        }

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
            $product = $this->product->findOrFail($id);

            // Gather all incoming validated input data array
            $data = $request->validated();

            // Determine what the image input is (file binary OR text string)
            $imageInput = $request->hasFile('image') ? $request->file('image') : $request->input('image');

            // ALWAYS pass the image input to your service to evaluate rules (keep vs remove vs replace)
            $data['image'] = $this->imageService->editPhoto(
                $imageInput,
                $product->image,
                FilePath::PRODUCT->value
            );

            // 4. Update using the cleaned data array, NOT the raw request objects
            $product->update($data);
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
