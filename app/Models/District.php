<?php

namespace App\Models;

use App\Traits\BasicFilter;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Table(key: 'district_code', incrementing: false)]
#[Fillable(['province_code','district_code', 'district_kh', 'district_en'])]
class District extends Model
{
    /** @use HasFactory<\Database\Factories\DistrictFactory> */
    use HasFactory, BasicFilter;
}
