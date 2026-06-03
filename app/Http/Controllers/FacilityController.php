<?php
namespace App\Http\Controllers;

use App\Http\Requests\FacilityRequest;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    //
    protected Facility $facility;
    public function __construct(Facility $facility)
    {
        $this->facility = $facility;
    }

    public function index(Request $request)
    {
        try {
            # code...
            if ($request->has('id') && $request->filled('id')) {
                $facility = $this->facility->where('id', $request->id)->first();
                return response()->json(["data" => $facility], 200);
            } else {
                return response()->json(["data" => $this->facility->all()], 200);
            }
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'status'  => 'error',
                'message' => $e->errorInfo ?: 'Something went wrong!',
            ]);
        }
    }
    public function store(FacilityRequest $request)
    {
        try {
            $data        = $request->validated();
            $facility = $this->facility->create($data);

            return response()->json([
                'status'  => "Success",
                'data'    => $facility,
                'message' => 'Facility Successfully Created!',
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->errorInfo ?: 'Something went wrong!',
            ]);
        }
    }
    public function update(FacilityRequest $request, $id)
    {
        try {
            $facility = $this->facility->findOrFail($id);
            $facility->update($request->all());
            return response()->json([
                'status'  => 'Success',
                'data'    => $facility,
                'message' => "Facility successfully updated!",
            ], 200);
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage() ?: 'Something went wrong!',
            ], 500);
        }

    }
    public function destroy($id)
    {
        try {
            # code...
            $facility = $this->facility->findOrFail($id);
            $facility->delete();
            return response()->json([
                'status'  => 'Success',
                'message' => "Facility successfully deleted!",
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
