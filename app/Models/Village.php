<?php

namespace App\Models;

use App\Traits\BasicFilter;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['province_code','village_code','district_code','commune_code', 'village_kh', 'village_en'])]
class Village extends Model
{
    /** @use HasFactory<\Database\Factories\VillageFactory> */
    use HasFactory, BasicFilter;
}
