<?php

namespace App\Http\Controllers;

use App\Club;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $teams = Team::where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('teams.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::all();
        return view('teams.create')->with('clubs', $clubs);
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
            'name'   =>'required',
            'club_id'=>'required'
        ]);

        $team = new Team([
            'name' => $request->get('name'),
            'club_id' => $request->get('club_id'),
        ]);
        $team->save();
        return redirect('/teams')->with('success', 'Team added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clubs = Club::all();
        $team = Team::find($id);
        return view('teams.edit', compact('team', 'clubs'));
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

        $team = Team::find($id);
        $team->name = $request->get('name');
        $team->save();

        return redirect('/teams')->with('success', 'Team updated!');
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
        if (Gate::allows('team-delete')) {
            $team = Team::find($id);
            $team->delete();
            return redirect('/teams')->with('success', 'Team deleted!');
        }else{
            return redirect('/teams')->withErrors('Not allowed!');
        }

    }
}
