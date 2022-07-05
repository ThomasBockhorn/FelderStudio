<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaintingImagesRequest;
use App\Models\PaintingImage;
use App\Services\ImageServices;


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
        ImageServices::ImageAddService($request, $paintingImage);

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
        ImageServices::ImageUpdateService($request, $paintingImage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        ImageServices::ImageDeleteService($id);
    }
}
