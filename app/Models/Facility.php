<?php

namespace App\Models;

use App\Traits\BasicFilter;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['postal_code', 'name_kh', 'name_en', 'prefix', 'prefix_code'
        ,'od','address' , 'p_code' ,'d_code', 'c_code' ,'v_code'])]
class Facility extends Model
{
    /** @use HasFactory<\Database\Factories\FacilityFactory> */
    use HasFactory, BasicFilter, HasUuids;
}
