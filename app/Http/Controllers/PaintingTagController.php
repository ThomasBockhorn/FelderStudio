<?php

namespace App\Http\Controllers;

use App\Models\PaintingTag;
use Illuminate\Http\Request;

class PaintingTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PaintingTag::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaintingTag  $paintingTag
     * @return \Illuminate\Http\Response
     */
    public function show(PaintingTag $paintingTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaintingTag  $paintingTag
     * @return \Illuminate\Http\Response
     */
    public function edit(PaintingTag $paintingTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaintingTag  $paintingTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaintingTag $paintingTag)
    {
        $paintingTag->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaintingTag  $paintingTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaintingTag $paintingTag)
    {
        //
    }
}
