<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';
    protected $guard = [];


    public function histories(): HasMany
    {
        return $this->hasMany(History::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
