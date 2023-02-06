<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::with('users', 'projects')->withCount('users', 'projects')->get();
        // dd($teams);
        return view('admin.team.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return view('admin.team.create');
        // return view('admin.team.')
        // dd($request->all());
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if (!$request->is_active) {

            $isActive = $request->is_active;
        } else {
            $isActive = $request->is_active;
        }
        // dd($request->all());
        $team = new Team();
        $team->name = $request->name;
        $team->is_active = $isActive ? 1 : 0;
        $team->created_at = now();
        $team->updated_at = null;
        // $team->save();
        if ($team->save()) {
            Alert::success('Congrats', "You've Successfully Create " . $request->name . " Team");
            return redirect('admin/teams');
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
        $team = Team::find($id);
        return view('admin.team.edit', get_defined_vars());
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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if (!$request->is_active) {

            $isActive = $request->is_active;
        } else {
            $isActive = $request->is_active;
        }
        // dd($request->all());
        $team = Team::find($id);
        $team->name = $request->name;
        $team->is_active = $isActive ? 1 : 0;
        $team->updated_at = now();
        // $team->save();
        if ($team->save()) {
            Alert::info('Congrats', "You've Successfully Update " . $request->name . " Team");
            return redirect('admin/teams');
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
        $leaderEdit = Team::find($id);
        $leaderEdit->delete();
        Alert::warning('Congrats', "You've Successfully Delete Team");
        return redirect('admin/teams');
    }
}
