<?php

namespace App\Http\Controllers\Painel;

use App\Models\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Status';
        $statuses = Status::all();

        return view('painel.status.index', compact('title', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        try {
            $status = Status::create($request->all());
            return response()->json($status);
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
        $status = Status::find($id);
        return response()->json($status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, $id)
    {
        try {
            $status = Status::find($id);
            $status->update($request->all());

            return response()->json($status);
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
            $status = Status::find($id);
            $status->delete();

            return response()->json($status);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }
}
