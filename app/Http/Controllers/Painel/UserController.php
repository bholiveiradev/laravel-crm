<?php

namespace App\Http\Controllers\Painel;

use App\Models\User;
use App\Models\Branch;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Branch $branch)
    {
        $users = $this->user->all();
        $branches = $branch->all(['id', 'alias']);

        return view('painel.users.index', [
            'title'    => 'Usuários',
            'users'    => $users,
            'branches' => $branches
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        DB::beginTransaction();
        try {

            $user = $this->user
                ->create($data);

            $user->branch()
                ->associate($request->branch)
                ->save();

            DB::commit();
            return response()->json($user);
        } catch (\Exception $e) {
            DB::rollBack();
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
        $user = $this->user
            ->with('branch')
            ->find($id);

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

            if ($request->password !== null) {
                $data['password'] = Hash::make($request->password);
            }

            $user = $this->user->find($id)
                ->update($data);

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
            $user = $this->user
                ->find($id)
                ->delete();

            return response()->json($user);
        } catch (\Exception $e) {

            return response()->json(getException($e));
        }
    }
}
