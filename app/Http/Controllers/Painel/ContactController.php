<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Contatos';
        $contacts = Contact::all();
        $leads = Lead::doesntHave('customer')->get();

        return view('painel.contacts.index', compact('title', 'contacts', 'leads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        try {

            $data = [
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'comments'  => $request->input('comments'),
                'user_id'   => auth()->id()
            ];

            $lead = Lead::find($request->input('lead'));
            $lead->contacts()->create($data);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ContactRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        try {

            $data = [
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'comments'  => $request->input('comments'),
                'user_id'   => auth()->id()
            ];

            $contact = Contact::findOrFail($id);
            $contact->update($data);

            return response()->json($contact);
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
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return response()->json($contact);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }
}
