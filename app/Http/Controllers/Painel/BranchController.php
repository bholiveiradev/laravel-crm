<?php

namespace App\Http\Controllers\Painel;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;

class BranchController extends Controller
{
    private $branch;

    public function __construct(Branch $branch)
    {
        $this->branch = $branch;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = $this->branch->all();

        return view('painel.branches.index', [
            'title'    => 'Filiais',
            'branches' => $branches
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        try {
            $branch = $this->branch
                ->create($request->all());

            return response()->json($branch);
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
        $branches = $this->branch->find($id);
        return response()->json($branches);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BranchRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, $id)
    {
        try {
            $branch = $this->branch
                ->find($id)
                ->update($request->all());

            return response()->json($branch);
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
            $branch = $this->branch
                ->find($id)
                ->delete();

            return response()->json($branch);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }
}
