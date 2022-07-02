<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaintingImagesRequest;
use App\Models\PaintingImage;
use App\Services\ImageDatabaseService;
use App\Services\ImageUploadService;


class PaintingImagesController extends Controller
{
    private ImageUploadService $fileService;
    private ImageDatabaseService $databaseService;


    /**
     * @param ImageUploadService $file
     * @param ImageDatabaseService $databaseService
     */
    public function __construct(ImageUploadService $file, ImageDatabaseService $databaseService)
    {
        $this->fileService = $file;
        $this->databaseService = $databaseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PaintingImagesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaintingImagesRequest $request)
    {
        $importedImage = $this->databaseService->ImageReferenceToDatabase($request);

        $this->fileService->imageUpload($importedImage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaintingImage  $paintingImages
     * @return \Illuminate\Http\Response
     */
    public function show(PaintingImage $paintingImages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaintingImage  $paintingImages
     * @return \Illuminate\Http\Response
     */
    public function edit(PaintingImage $paintingImages)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PaintingImagesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(PaintingImagesRequest $request)
    {
        if ($paintingImage = PaintingImage::findOrFail($request->painting_id)) {
            $this->fileService->imageDelete($paintingImage->filename);

            $importedImage = $this->databaseService->ImageReferenceToDatabaseUpdate($paintingImage, $request);

            $this->fileService->imageUpload($importedImage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        $paintingImage = PaintingImage::findOrFail($id);

        $this->fileService->imageDelete($paintingImage->filename);

        $paintingImage->delete();
    }
}
