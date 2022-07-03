<?php

namespace App\Services;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{

    /**
     * This service will upload a file to a directory the user specified
     * @param String $directory
     * @param String $filename
     * @return void
     */
    public function ImageUploadServiceProvider(string $directory, File $filename): void
    {
        Storage::put($directory, $filename);
    }
}
