<?php

namespace App\Http\Controllers;

use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    //
    public function __construct(protected InventoryService $inventory_service)
    {}

    public function stockIn(Request $request){
        try {
            # code...
            $batch = $this->inventory_service->processInbound($request->validated(), Auth::id());

            return response()->json([
                'message' => 'Stock successfully logged',
                'data'    => $batch
            ], 201);
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'message' => 'Failed to process inbound stock',
                'error'   => $e->getMessage()
            ], 422);
        }
    }
    public function stockOut(Request $request){
        try {
            # code...
            $batch = $this->inventory_service->processOutbound($request->validated(), Auth::id());

            return response()->json([
                'message' => 'Stock successfully logged',
                'data'    => $batch
            ], 200);
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'message' => 'Failed to process outbound stock',
                'error'   => $e->getMessage()
            ], 422); // 422 Unprocessable Entity is perfect for business logic failures
        }
    }
}
