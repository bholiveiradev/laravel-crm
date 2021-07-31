<?php

namespace App\Http\Controllers\Painel;

use App\Models\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
    private $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = $this->status->all();

        return view('painel.status.index', [
            'title' => 'Status',
            'statuses' => $statuses
        ]);
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
            $status = $this->status->create($request->all());
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
        $status = $this->status->find($id);
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
            $status = $this->status->find($id)
                ->update($request->all());

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
            $status = $this->status->find($id)
                ->delete();

            return response()->json($status);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }
}
