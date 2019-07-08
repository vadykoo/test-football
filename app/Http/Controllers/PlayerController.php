<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Role;
use App\Group;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $players = Player::where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('players.index')->with('players', $players);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('players.create', compact('groups'));
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
            'group_id',
        ]);

        $player = new Player();
        $player->name = $request->get('name');
        $player->group_id = $request->get('group_id');
        $player->save();
        if($request->has('image')) {
            $player->addMediaFromRequest('image')->toMediaCollection();
        }

        return redirect('/players')->with('success', 'Player added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::find($id);
        $groups = Group::all();

        return view('players.show', compact('player', 'groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::find($id);
        $groups = Group::all();

        return view('players.edit', compact('player', 'groups'));
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
        ]);

        $player = Player::find($id);
        $player->name = $request->get('name');
        $player->email = $request->get('email');
        if($request->get('password')) {
            $player->password = $request->get('password');
        }
        $player->save();
        $role = Role::find($request->get('role_id'));
        $player->roles()->attach($role);
        if($request->hasfile('image')) {
            $player->clearMediaCollection();
            $player->addMediaFromRequest('image')->toMediaCollection();
        }

        return redirect('/players')->with('success', 'Player updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $player = Player::find(2);
//        \Auth::player()->impersonate($player);
        if (Gate::allows('accessSuperAdmin')) {
            $contact = Player::find($id);
            $contact->delete();
            return redirect('/players')->with('success', 'Player deleted!');
        }else{
            return redirect('/players')->withErrors('Not allowed!');
        }

    }
}
