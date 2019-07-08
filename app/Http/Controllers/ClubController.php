<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\User;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $clubs = Club::where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('clubs.index')->with('clubs', $clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('clubs.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('accessSuperAdmin')) {
            $request->validate([
            'name'=>'required'
        ]);

        $club = new Club([
            'name' => $request->get('name'),
        ]);
        $club->save();
        if($admins = $request->get('admins')) {
            foreach ($admins as $item) {
                DB::table('club_admins')->insert(
                    ['club_id' => $club->id, 'user_id' => $item]
                );
            }
        }
            return redirect('/clubs')->with('success', 'Club added!');
        }else{
            return redirect('/clubs')->withErrors('Not allowed!');
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
        $club = Club::find($id);
        return view('clubs.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('accessSuperAdmin')) {
            $club = Club::find($id);
            return view('clubs.edit', compact('club'));
        }else{
            return redirect('/clubs')->withErrors('Not allowed!');
        }

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
        if (Gate::allows('accessSuperAdmin')) {

            $request->validate([
                'name' => 'required'
            ]);

            $club = Club::find($id);
            $club->name = $request->get('name');
            $club->save();

            return redirect('/clubs')->with('success', 'Club updated!');
        }else{
            return redirect('/clubs')->withErrors('Not allowed!');
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
//        $user = User::find(2);
//        \Auth::user()->impersonate($user);
        if (Gate::allows('accessSuperAdmin')) {
            $club = Club::find($id);
            $club->delete();
            return redirect('/clubs')->with('success', 'Club deleted!');
        }else{
            return redirect('/clubs')->withErrors('Not allowed!');
        }

    }
}
