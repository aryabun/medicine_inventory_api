<?php
namespace App\Models;

use App\Traits\BasicFilter;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'description'])]
class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory, BasicFilter;
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class,'role_permissions','role_id','permission_id')->withTimestamps();
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class,'role_id', 'id');
    }
}
