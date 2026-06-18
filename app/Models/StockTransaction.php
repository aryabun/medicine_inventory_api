<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['batch_id', 'user_id', 'qty', 'type', 'note'])]
class StockTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;

    public function inventory(){
        return $this->belongsTo(Inventory::class, 'batch_id');
    }
}
