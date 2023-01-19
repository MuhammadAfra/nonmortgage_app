<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $dataUser = User::all();
        return view('users.index', compact('dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $val = $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required|confirmed|min:6',
        ],[
            'name' => 'Input Name!',
            'email' => 'Input Email!',
            'level' => 'Input Level',
            'password' => 'Must contain at least 6 or more characters!',
        ]);

        $val['password'] = Hash::make($val['password']);

        User::create($val);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataUser = User::findorfail($id);
        return view('users.detail', compact('dataUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = $user;
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'current_password' => 'required|min:6',
            'password' => 'nullable|confirmed|min:6',
        ],[
            'name' => 'Input Name!',
            'email' => 'Input Email!',
            'level' => 'Input Level',
            'current_password' => 'Must contain at least 6 or more characters!',    
            'password' => 'Must contain at least 6 or more characters!',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->current_password){
            $user->password = Hash::make($request->password);
        }
        $user->level = $request->level;
        $user->save();
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users');
    }
}
