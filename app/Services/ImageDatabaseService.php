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
     * @return void
     */
    public function ImageReferenceToDatabase(PaintingImagesRequest $request): void
    {
        $this->paintingImage->filename = $request->filename;

        $this->paintingImage->painting_id = $request->painting_id;

        $this->paintingImage->save();
    }

    /**
     * This function updates PaintingImage reference in database
     * @param PaintingImagesRequest $request
     * @return void
     */
    public function ImageReferenceToDatabaseUpdate(
        PaintingImagesRequest $request,
    ): void
    {
        $paintingImage = $this->paintingImage->where('painting_id', $request->painting_id)->first();
        $paintingImage->update([
            "filename" => $request->filename
        ]);
    }
}
