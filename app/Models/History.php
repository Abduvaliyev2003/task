<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';
    protected $guarded = [];


    
    public function users():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function catergories():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
