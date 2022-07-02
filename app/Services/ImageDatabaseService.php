<?php

declare(strict_types=1);


namespace App\Services;

use App\Http\Requests\PaintingImagesRequest;
use App\Models\PaintingImage;

class ImageDatabaseService
{

    private PaintingImage $paintingImage;


    /**
     * @param PaintingImage $paintingImage
     */
    public function __construct(PaintingImage $paintingImage)
    {
        $this->paintingImage = $paintingImage;
    }

    /**
     * This method will load the painting image request to the database
     * @param PaintingImagesRequest $request
     * @return string
     */
    public function ImageReferenceToDatabase(PaintingImagesRequest $request): string
    {
        $image = time() . '.' . $request->filename->extension();

        $this->paintingImage->filename = $image;

        $this->paintingImage->painting_id = $request->painting_id;

        $this->paintingImage->save();

        return $image;
    }

    /**
     * This function updates PaintingImage reference in database
     * @param PaintingImage $paintingImage
     * @param PaintingImagesRequest $request
     * @return string
     */
    public function ImageReferenceToDatabaseUpdate(
        PaintingImage $paintingImage,
        PaintingImagesRequest $request
    ): string {
        $image = time() . '.' . $request->filename->extension();

        $paintingImage->filename = $image;

        $paintingImage->painting_id = $request->painting_id;

        $paintingImage->save();

        return $image;
    }

}
