<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['facility_id','batch_id', 'user_id', 'qty', 'type', 'note'])]
class StockTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;

    public function batch(){
        return $this->belongsTo(Inventory::class, 'batch_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function facility(){
        return $this->belongsTo(Facility::class);
    }
}
