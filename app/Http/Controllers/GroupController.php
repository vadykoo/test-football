<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Illuminate\Support\Facades\Gate;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $groups = Group::where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('groups.index')->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
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
            'team_id'=>'required'
        ]);

        $group = new Group([
            'name' => $request->get('name'),
            'team_id' => $request->get('team_id'),
        ]);
        $group->save();
        return redirect('/groups')->with('success', 'Group added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return view('groups.edit', compact('group'));
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

        $group = Group::find($id);
        $group->name = $request->get('name');
        $group->save();

        return redirect('/groups')->with('success', 'Group updated!');
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
            $group = Group::find($id);
            $group->delete();
            return redirect('/groups')->with('success', 'Group deleted!');
        }else{
            return redirect('/groups')->withErrors('Not allowed!');
        }

    }
}
