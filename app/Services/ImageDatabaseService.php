<?php

declare(strict_types=1);


namespace App\Services;

use App\Http\Requests\StorePaintingImagesRequest;
use App\Models\PaintingImage;

class ImageDatabaseService
{
    public function ImageReferenceToDatabase(StorePaintingImagesRequest $request): void
    {
        $paintingImage = new PaintingImage();

        $paintingImage->filename = $request->filename;

        $paintingImage->painting_id = $request->painting_id;

        $paintingImage->save();
    }
}
