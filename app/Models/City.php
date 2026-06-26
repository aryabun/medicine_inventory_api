<?php
namespace App\Models;

use App\Traits\BasicFilter;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Table(key: 'province_code', incrementing: false)]
#[Fillable(['province_code', 'province_kh', 'province_en'])]
class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory, BasicFilter;
}
