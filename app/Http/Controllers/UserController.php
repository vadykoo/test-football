<?php

namespace App\Http\Controllers;

use App\Group;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
use App\Events\UserRegistered;

class UserController extends Controller
{
    public function __construct()
    {
        if (Gate::denies('users')) {
            return redirect()->back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $groups = Group::all();
        return view('users.create', compact('roles', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'role_id',
        ]);
        $password = $request->get('password');
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = \Hash::make($password);
        $role = Role::find($request->get('role_id'));
        $user->roles()->attach($role);
        if($group_id = $request->get('group_id')) {
            $group = Group::find($group_id);
            $group->update('admin_id', $user->id);
        }
        $user->save();
        event(new UserRegistered($user, $password));

        return redirect('/users')->with('success', 'User added!');
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
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->save();

        return redirect('/users')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $user = User::find(2);
//        \Auth::user()->impersonate($user);
        if (Gate::allows('users')) {
            $contact = User::find($id);
            $contact->delete();
            return redirect('/users')->with('success', 'User deleted!');
        }else{
            return redirect('/users')->withErrors('Not allowed!');
        }

    }
}
