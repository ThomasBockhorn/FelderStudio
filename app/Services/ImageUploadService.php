<?php

namespace App\Services;

use App\Http\Requests\PaintingImagesRequest;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{

    /**
     * This service will upload a file to a directory the user specified
     * @param String $directory
     * @param String $filename
     * @return void
     */
    public function ImageUploadServiceProvider(string $directory, PaintingImagesRequest $request): void
    {
        Storage::put($directory, $request->hashName());
    }
}
