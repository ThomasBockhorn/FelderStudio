<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaintingImagesRequest;
use App\Models\PaintingImage;
use Illuminate\Support\Facades\Storage;


class PaintingImagesController extends Controller
{


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
    public function store(PaintingImagesRequest $request, PaintingImage $paintingImage)
    {
        $paintingImage->filename = $request->filename->name;

        $paintingImage->painting_id = $request->painting_id;

        $paintingImage->save();

        Storage::put('public/images', $request->filename);
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
    public function update(PaintingImagesRequest $request, PaintingImage $paintingImage)
    {

        $paintingImageUpdate = $paintingImage->findOrFail($paintingImage->id);

        Storage::delete('public/images/' . $paintingImageUpdate->filename);

        $paintingImageUpdate->filename = $request->filename->name;

        $paintingImageUpdate->painting_id = $request->painting_id;

        $paintingImageUpdate->save();

        Storage::put('public/images', $request->filename);
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

        Storage::disk('public')->delete('public/images' . $paintingImage->filename);

        $paintingImage->delete();
    }
}
