<?php
namespace App\Models;

use App\Traits\BasicFilter;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Table(key: 'commune_code', incrementing: false)]
#[Fillable(['commune_code', 'province_code', 'district_code', 'commune_kh', 'commune_en'])]
class Commune extends Model
{
    /** @use HasFactory<\Database\Factories\CommuneFactory> */
    use HasFactory, BasicFilter;
}
