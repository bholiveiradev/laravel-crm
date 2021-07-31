<?php

namespace App\Http\Controllers\Painel;

use App\Models\Lead;
use App\Models\Branch;
use App\Models\Source;
use App\Models\Status;
use App\Http\Requests\LeadRequest;
use App\Http\Controllers\Controller;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Leads';
        $leads = Lead::all();
        $statuses = Status::where('type', 'lead')->get();
        $branches = Branch::all();
        $sources  = Source::all();

        return view('painel.leads.index', compact('title', 'leads', 'statuses', 'branches', 'sources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LeadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeadRequest $request)
    {
        try {

            $lead = Lead::create($request->all());
            $lead->source()->associate($request->source);
            $lead->branch()->associate($request->branch);
            $lead->status()->associate($request->status);
            $lead->save();

            return response()->json($lead);
        } catch (\Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Leads';
        $lead = Lead::findOrFail($id);

        return view('painel.leads.show', compact('title', 'lead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leads = Lead::findOrFail($id);
        return response()->json($leads);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LeadRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeadRequest $request, $id)
    {
        try {
            $lead = Lead::findOrFail($id);
            $lead->update($request->all());
            $lead->source()->associate($request->source);
            $lead->branch()->associate($request->branch);
            $lead->status()->associate($request->status);
            $lead->save();

            return response()->json($lead);
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
            $lead = Lead::findOrFail($id);
            $lead->delete();

            return response()->json($lead);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }
}
