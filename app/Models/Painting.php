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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paintingImage()
    {
        return $this->hasMany(PaintingImage::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function PaintingTag()
    {
        return $this->hasOne(PaintingTag::class);
    }
}
