<?php
namespace App\Models;

use App\Traits\BasicFilter;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['code','name','category_id','dosage_form_id','dosage','description','image','status'])]
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, HasUuids, BasicFilter;

    public static function boot(){
        parent::boot();
        self::creating(function (Product $model){
            $model->code = IdGenerator::generate(['table' => 'products', 'field'=>'code', 'length'=>6, 'prefix'=>'P']);
        });
    }
}
