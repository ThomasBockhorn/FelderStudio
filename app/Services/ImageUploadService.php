<?php

declare(strict_types=1);


namespace App\Services;

use App\Http\Requests\PaintingImagesRequest;
use App\Models\PaintingImage;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{

    /**
     * This method with upload an image file
     * @param PaintingImagesRequest $request
     * @param String $location
     * @return void
     */
    public function imageUpload($image): void
    {
        Storage::put('public/images/' . $image, $image);
    }

    public function imageDelete(PaintingImage $paintingImages): void
    {
        Storage::delete('public/images/' . $paintingImages->filename,);
    }
}
