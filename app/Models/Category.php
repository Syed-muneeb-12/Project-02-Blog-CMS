<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\RouteKey;
#[RouteKey('slug')]
class Category extends Model
{
    protected $guarded = [];
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
