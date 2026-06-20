<?php
namespace App\Http\Controllers;

use App\Http\Requests\StockInRequest;
use App\Models\Inventory;
use App\Services\InventoryService;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    //
    protected Inventory $inventory;
    public function __construct(protected InventoryService $inventory_service, Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    public function index()
    {
        $data = $this->inventory->where('facility_id', Auth::user()->facility_id)
            ->with([
                'product',
                'product.category:id,name',
                'product.dosage_form:id,name',
                'facility:id,name_en,name_kh'])
            ->paginate();
        return response()->json(['data' => $data], 200);
    }
    public function stockIn(StockInRequest $request)
    {
        try {
            # code...
            $batch = $this->inventory_service->processInbound($request->validated(), Auth::id());

            return response()->json([
                'message' => 'Stock successfully logged',
                'data'    => $batch,
            ], 201);
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'message' => 'Failed to process inbound stock',
                'error'   => $e->getMessage(),
            ], 422);
        }
    }
    public function stockOut(StockInRequest $request)
    {
        try {
            # code...
            $batch = $this->inventory_service->processOutbound($request->validated(), Auth::id());

            return response()->json([
                'message' => 'Stock successfully logged',
                'data'    => $batch,
            ], 200);
        } catch (\Throwable $e) {
            # code...
            return response()->json([
                'message' => 'Failed to process outbound stock',
                'error'   => $e->getMessage(),
            ], 422); // 422 Unprocessable Entity is perfect for business logic failures
        }
    }
}
