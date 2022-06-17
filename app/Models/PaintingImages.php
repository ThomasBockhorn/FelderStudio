<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaintingImages extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function painting()
    {
        $this->belongsTo(Painting::class);
    }
}
