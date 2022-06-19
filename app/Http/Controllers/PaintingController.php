<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaintingRequest;
use App\Http\Requests\UpdatePaintingRequest;
use App\Models\Painting;
use Couchbase\View;
use Illuminate\Http\Response;

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
     * @param  \App\Http\Requests\StorePaintingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaintingRequest $request)
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
     * @param  \App\Http\Requests\UpdatePaintingRequest  $request
     * @param  \App\Models\Painting  $painting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaintingRequest $request, Painting $painting)
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
        //
    }
}
