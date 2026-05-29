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
    }

    public function index() {
        return response()->json($this->dosage_form->all(), 200);
    }
    public function store(DosageFormRequest $request){

    }
    public function update(DosageFormRequest $request, $id){

    }
    public function destroy($id){

    }
}
