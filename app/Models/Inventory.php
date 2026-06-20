<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['product_id','facility_id','batch_no','exp_date','current_stock'])]
class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;

    public function transactions(){
        return $this->hasMany(StockTransaction::class, 'batch_id');
    }
    public function facility(){
        return $this->belongsTo(Facility::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
