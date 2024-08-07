<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(permission::class);
    }

    public function hasPermission($permission): bool
    {
        return $this->permissions()
            ->where('title' , $permission)->exists();
    }
}
