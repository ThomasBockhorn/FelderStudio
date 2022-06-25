<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaintingImagesRequest;
use App\Http\Requests\UpdatePaintingImagesRequest;
use App\Models\PaintingImage;

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
     * @param  \App\Http\Requests\StorePaintingImagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaintingImagesRequest $request)
    {
        $paintingImage = new PaintingImage();

        $paintingImage->filename = $request->filename;

        $paintingImage->painting_id = $request->painting_id;

        $image = time() . '.' . $request->filename->extension();

        $request->filename->move(public_path('images'), $image);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaintingImagesRequest  $request
     * @param  \App\Models\PaintingImage  $paintingImages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaintingImagesRequest $request, PaintingImage $paintingImages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaintingImage  $paintingImages
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaintingImage $paintingImages)
    {
        //
    }
}
