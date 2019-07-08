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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name', 'like', '%' . $search . '%')->paginate(5);
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
        $user->save();
        $role = Role::find($request->get('role_id'));
        $user->roles()->attach($role);
        if($request->has('image')) {
            $user->addMediaFromRequest('image')->toMediaCollection();
        }

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
        $user = User::find($id);
        return view('users.show', compact('user'));
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
            'name'=>'required',
            'email'=>'required',
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if($request->get('password')) {
            $user->password = \Hash::make($request->get('password'));
        }
        $user->save();
        $role = Role::find($request->get('role_id'));
        $user->roles()->attach($role);
        if($request->hasfile('image')) {
            $user->clearMediaCollection();
            $user->addMediaFromRequest('image')->toMediaCollection();
        }

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
        if (Gate::allows('accessSuperAdmin')) {
            $contact = User::find($id);
            $contact->delete();
            return redirect('/users')->with('success', 'User deleted!');
        }else{
            return redirect('/users')->withErrors('Not allowed!');
        }

    }
}
