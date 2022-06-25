<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @property mixed $filename
 * @property mixed $project_id
 * @property mixed $painting_id
 */
class PaintingImage extends Model
{
    use HasFactory;

    protected $fillable = ["filename", "painting_id"];

    public function painting()
    {
        return $this->belongsTo(Painting::class);
    }
}
