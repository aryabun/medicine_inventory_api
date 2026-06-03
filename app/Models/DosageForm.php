<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class DosageForm extends Model
{
    /** @use HasFactory<\Database\Factories\DosageFormFactory> */
    use HasFactory, BasicFilter;
}
