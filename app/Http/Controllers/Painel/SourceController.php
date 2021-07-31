<?php

namespace App\Http\Controllers\Painel;

use App\Models\Source;
use App\Http\Controllers\Controller;
use App\Http\Requests\SourceRequest;

class SourceController extends Controller
{
    private $source;

    public function __construct(Source $source)
    {
        $this->source = $source;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = $this->source->all();

        return view('painel.sources.index', [
            'title' => 'Origens',
            'sources' => $sources
        ]);
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
            $source = $this->source->create($request->all());
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
        $source = $this->source->find($id);
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
            $source = $this->source->find($id)
                ->update($request->all());

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
            $source = $this->source->find($id)
                ->delete();

            return response()->json($source);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }
}
