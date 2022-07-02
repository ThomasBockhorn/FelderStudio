<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaintingTag extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'painting_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function painting()
    {
        return $this->belongsTo(Painting::class);
    }

}
