<?php

declare(strict_types=1);


namespace App\Services;

use App\Http\Requests\PaintingImagesRequest;

class ImageUploadService
{

    /**
     * This method with upload an image file
     * @param PaintingImagesRequest $request
     * @param String $location
     * @return void
     */
    public function imageUpload(PaintingImagesRequest $request, string $location): void
    {
        $image = time() . '.' . $request->filename->extension();

        $request->filename->move(public_path($location), $image);
    }
}
