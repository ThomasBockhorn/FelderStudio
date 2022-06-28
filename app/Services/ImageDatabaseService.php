<?php

declare(strict_types=1);


namespace App\Services;

use App\Http\Requests\PaintingImagesRequest;
use App\Models\PaintingImage;
use Ramsey\Uuid\Type\Integer;

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
     * This function updates StorePainting
     * @param PaintingImagesRequest $request
     * @param Integer $index
     * @return void
     */
    public function ImageReferenceToDatabaseUpdate(
        PaintingImagesRequest $request,
        Integer $index
    ): void {
        $this->paintingImage->findOrFail($index);

        $this->paintingImage->filename = $request->filename;

        $this->paintingImage->painting_id = $request->painting_id;

        $this->paintingImage->save();
    }
}
