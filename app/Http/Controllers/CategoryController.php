<?php
namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected Category $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->authorizeResource(Category::class, 'category');
    }

    public function index(Request $request)
    {
        try {
            # code...
            if ($request->has('id') && $request->filled('id')) {
                $category = $this->category->where('id', $request->id)->first();
                return response()->json(["data" => $category], 200);
            } else {
                return response()->json(["data" => $this->category->all()], 200);
            }
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'status'  => 'error',
                'message' => $e->errorInfo ?: 'Something went wrong!',
            ]);
        }
    }
    public function store(CategoryRequest $request)
    {
        try {
            $data     = $request->validated();
            $category = $this->category->create($data);

            return response()->json([
                'status'  => "Success",
                'data'    => $category,
                'message' => 'Category Successfully Created!',
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->errorInfo ?: 'Something went wrong!',
            ]);
        }
    }
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $data = $request->validated();
            $category->update($data);
            return response()->json([
                'status' => 'Success',
                'data' => $category,
                'message' => "Category successfully updated!"
            ], 200);
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()?: 'Something went wrong!'
            ], 500);
        }
    }
    public function destroy(Category $category)
    {
        try {
            # code...
            $category->delete();
            return response()->json([
                'status'  => 'Success',
                'message' => "Category successfully deleted!",
            ], 200);
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'status'  => 'Error!',
                'message' => $e->getMessage() ?: 'Something went wrong!',
            ], 500);
        }
    }
}
