<?php
namespace App\Http\Controllers;

use App\Models\StockTransaction;
use Illuminate\Support\Facades\Auth;

class StockTransactionController extends Controller
{
    protected StockTransaction $stock_transaction;
    public function __construct(StockTransaction $stock_transaction)
    {
        return $this->stock_transaction = $stock_transaction;
    }
    public function index()
    {
        $data = $this->stock_transaction->where('facility_id', Auth::user()->facility_id)
            ->with([
                'batch:id,batch_no,exp_date',
                'user:id,first_name,last_name',
                'facility:id,name_en,name_kh'])
            ->paginate();
        return response()->json(["data" => $data], 200);
    }
}
