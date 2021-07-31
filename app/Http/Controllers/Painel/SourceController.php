<?php

namespace App\Http\Controllers\Painel;

use App\Models\Source;
use App\Http\Controllers\Controller;
use App\Http\Requests\SourceRequest;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Orgiens';
        $sources = Source::all();

        return view('painel.sources.index', compact('title', 'sources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SourceRequest $request)
    {
        try {
            $source = Source::create($request->all());
            return response()->json($source);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $source = Source::find($id);
        return response()->json($source);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SourceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SourceRequest $request, $id)
    {
        try {
            $source = Source::find($id);
            $source->update($request->all());

            return response()->json($source);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $source = Source::find($id);
            $source->delete();

            return response()->json($source);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }
}
