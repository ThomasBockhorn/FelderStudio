<?php

namespace App\Services;

use App\Http\Requests\PaintingImagesRequest;
use App\Models\PaintingImage;
use Illuminate\Support\Facades\Storage;

class ImageServices
{

    /**
     * This service adds an image to the database and storage
     * @param PaintingImagesRequest $request
     * @param PaintingImage $paintingImage
     * @return void
     */
    public static function ImageAddService(PaintingImagesRequest $request, PaintingImage $paintingImage): void
    {
        $paintingImage->filename = Storage::putFile('public/images', $request->filename);

        $paintingImage->painting_id = $request->painting_id;

        $paintingImage->save();
    }


    /**
     * This service will update image reference in database and update file in Storage
     * @param PaintingImagesRequest $request
     * @param PaintingImage $paintingImage
     * @return void
     */
    public static function ImageUpdateService(PaintingImagesRequest $request, PaintingImage $paintingImage): void
    {
        $paintingImageUpdate = $paintingImage->findOrFail($paintingImage->id);

        Storage::delete($paintingImageUpdate->filename);

        $paintingImageUpdate->filename = Storage::putFile('public/images/', $request->filename);

        $paintingImageUpdate->painting_id = $request->painting_id;

        $paintingImageUpdate->save();
    }


    /**
     * This service will delete an image in storage and the reference in the database
     * @param $id
     * @return void
     */
    public static function ImageDeleteService($id): void
    {
        $paintingImageEntry = PaintingImage::findOrFail($id);

        Storage::delete($paintingImageEntry->filename);

        $paintingImageEntry->delete();
    }
}
