<?php

namespace App\Http\Controllers\Painel;

use App\Models\Lead;
use App\Models\Branch;
use App\Models\Source;
use App\Models\Status;
use App\Http\Requests\LeadRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LeadController extends Controller
{
    private $lead;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Status $status, Branch $branch, Source $source)
    {
        $leads    = $this->lead->all();
        $statuses = $status->where(['type' => 'lead'])->get();
        $branches = $branch->all();
        $sources  = $source->all();

        return view('painel.leads.index', [
            'title'    => 'Leads',
            'leads'    => $leads,
            'statuses' => $statuses,
            'branches' => $branches,
            'sources'  => $sources
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LeadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeadRequest $request)
    {
        DB::beginTransaction();
        try {
            $lead = $this->lead->create($request->all());
            $lead->source()->associate($request['source']);
            $lead->branch()->associate($request['branch']);
            $lead->status()->associate($request['status']);
            $lead->save();

            DB::commit();
            return response()->json($lead);
        } catch (\Exception $e) {
            DB::rollBack();
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
        $lead = $this->lead->findOrFail($id);

        return view('painel.leads.show', [
            'title' => 'Leads',
            'lead'  =>  $lead
        ]);
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
        DB::beginTransaction();
        try {
            $lead = Lead::findOrFail($id);
            $lead->update($request->all());
            $lead->source()->associate($request['source']);
            $lead->branch()->associate($request['branch']);
            $lead->status()->associate($request['status']);
            $lead->save();

            DB::commit();
            return response()->json($lead);
        } catch (\Exception $e) {
            DB::rollBack();
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

    public function transformCustomer($id)
    {
        try {
        } catch (\Exception $e) {
            return response()->json(getException($e));
        }
    }
}
