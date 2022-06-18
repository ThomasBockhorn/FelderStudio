<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Painting extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function paintingImage()
    {
        return $this->hasMany(PaintingImage::class);
    }
}
