<?php

namespace App\Http\Controllers;

use App\Http\Requests\DosageFormRequest;
use App\Models\DosageForm;
use Illuminate\Http\Request;

class DosageFormController extends Controller
{
    protected DosageForm $dosage_form;
    public function __construct(DosageForm $dosage_form)
    {
        $this->dosage_form = $dosage_form;
        $this->authorizeResource(DosageForm::class, 'dosage_form');
    }

    public function index(Request $request) {
        try {
            # code...
            if ($request->has('id') && $request->filled('id')) {
                $dosage_form = $this->dosage_form->where('id', $request->id)->first();
                return response()->json(["data" =>$dosage_form], 200);
            } else {
                return response()->json(["data" => $this->dosage_form->all()], 200);
            }
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'status'  => 'error',
                'message' => $e->errorInfo ?: 'Something went wrong!',
            ]);
        }
    }
    public function store(DosageFormRequest $request){
        try {
            $data     = $request->validated();
            $dosage_form = $this->dosage_form->create($data);

            return response()->json([
                'status'  => "Success",
                'data'    => $dosage_form,
                'message' => 'Dosage Form Successfully Created!',
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->errorInfo ?: 'Something went wrong!',
            ]);
        }
    }
    public function update(DosageFormRequest $request, $id){
         try {
            $dosage_form = $this->dosage_form->findOrFail($id);
            $dosage_form->update($request->all());
            return response()->json([
                'status' => 'Success',
                'data' => $dosage_form,
                'message' => "Dosage Form successfully updated!"
            ], 200);
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()?: 'Something went wrong!'
            ], 500);
        }

    }
    public function destroy($id){
         try {
            # code...
            $dosage_form = $this->dosage_form->findOrFail($id);
            $dosage_form->delete();
            return response()->json([
                'status'  => 'Success',
                'message' => "Dosage Form successfully deleted!",
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
