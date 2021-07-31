<?php

namespace App\Http\Controllers\Painel;

use App\Models\User;
use App\Models\Branch;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Usuários';
        $users = User::all();
        $branches = Branch::all(['id', 'alias']);

        return view('painel.users.index', compact('title', 'users', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();

            $data['password'] = Hash::make($request->password);

            $user = User::create($data);
            $user->branch()
                ->associate($request->branch)
                ->save();

            return response()->json($user);
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
        $user = User::with('branch')->find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try {
            $data = $request->all();

            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }


            $user = User::find($id);
            $user->update($data);
            $user->branch()
                ->associate($request->branch)
                ->save();

            return response()->json($user);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }

    /**s
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            return response()->json($user);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }
}
