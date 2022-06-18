<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaintingImage extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function painting()
    {
        return $this->belongsTo(Painting::class);
    }
}
