<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaintingRequest;
use App\Models\Painting;

class PaintingController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\PaintingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaintingRequest $request)
    {
        Painting::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painting  $painting
     * @return \Illuminate\Http\Response
     */
    public function show(Painting $painting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Painting  $painting
     * @return \Illuminate\Http\Response
     */
    public function edit(Painting $painting)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param PaintingRequest $request
     * @param \App\Models\Painting $painting
     * @return \Illuminate\Http\Response
     */
    public function update(PaintingRequest $request, Painting $painting)
    {
        $painting->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painting  $painting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Painting $painting)
    {
        $painting->delete();
    }
}
