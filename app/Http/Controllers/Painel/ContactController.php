<?php

namespace App\Http\Controllers\Painel;

use App\Models\Lead;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    private $contact;
    private $lead;
    private $user;

    public function __construct(Contact $contact, Lead $lead)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->contact = $contact;
        $this->lead    = $lead;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contact->all();
        $leads    = $this->lead->all();

        return view('painel.contacts.index', [
            'title'    => 'Contatos',
            'contacts' => $contacts,
            'leads'    => $leads
        ]);
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
                'date' => $request['date'],
                'time' => $request['time'],
                'comments'  => $request['comments'],
                'user_id'   => $this->user['id']
            ];

            $lead = $this->lead->find($request['lead']);
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
        $contact = $this->contact->findOrFail($id);
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
                'date' => $request['date'],
                'time' => $request['time'],
                'comments'  => $request['comments'],
                'user_id'   => $this->user['id']
            ];

            $contact = $this->contact
                ->findOrFail($id)
                ->update($data);

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
            $contact = $this->contact
                ->findOrFail($id)
                ->delete();

            return response()->json($contact);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }
}
