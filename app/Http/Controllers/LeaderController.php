<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Alert;

class LeaderController extends Controller
{

    public function dashboard()
    {
        $leaderProjects = User::with(['team' => function ($q) {
            $q->with('projects')
                ->withCount('projects');
        }])->where('id', Auth::id())
            ->isLeader()
            ->first();

        $leaderNewTasks = Task::whereHas('project.teams.users', function ($q) {
            $q->where('id', Auth::id())
                ->isLeader();
        })->where('type', 'NEW')->count();

        $leaderRevampTasks = Task::whereHas('project.teams.users', function ($q) {
            $q->where('id', Auth::id())
                ->isLeader();
        })->where('type', 'REVAMP')->count();

        $leaderRedesignTasks = Task::whereHas('project.teams.users', function ($q) {
            $q->where('id', Auth::id())
                ->isLeader();
        })->where('type', 'REDESIGN')->count();

        $leaderRevisionTasks = Task::whereHas('project.teams.users', function ($q) {
            $q->where('id', Auth::id())
                ->isLeader();
        })->where('type', 'REVISION')->count();

        $leaderInnerPagesTasks = Task::whereHas('project.teams.users', function ($q) {
            $q->where('id', Auth::id())
                ->isLeader();
        })->where('type', 'INNER_PAGES')->count();
        // dd($task);

        // dd($leaderNewTasks);

        return view('leader.dashboard', get_defined_vars());
    }

    public function projectDetail($id)
    {
        $project = Project::with(['teams' => function ($q) {
            $q->with('users');
        }])->find($id);

        return view('leader.project-detail', get_defined_vars());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::with('team')
            ->where('team_id', Auth::user()->team_id)
            ->where('is_leader','<>', true)
            ->whereNotIn('role_id', [1,2])
            ->get();
            // ->orWhereNot('role_id', 2)
        // dd($members);

        return view('leader.member.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leader.member.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Auth::user()->team_id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        if (!$request->is_active) {

            $isActive = $request->is_active;
        } else {
            $isActive = $request->is_active;
        }
        // dd($request->all());
        $member = new User();
        $member->name = $request->name;
        $member->role_id = 3;
        $member->team_id = Auth::user()->team_id;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->phone = $request->phone;
        $member->gender = $request->gender;
        $member->dob = $request->dob;
        $member->address = $request->address;
        $member->is_active = $isActive ? 1 : 0;
        $member->created_at = now();
        $member->updated_at = null;
        // $member->save();
        if ($member->save()) {
            Alert::success('Congrats', "You've Successfully Create Member");
            return redirect('leader/member');
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
        $member = User::find($id);
        // dd($member);
        return view('leader.member.detail', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = User::find($id);
        return view('leader.member.edit', get_defined_vars());
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
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required|string|min:8',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        if (!$request->is_active) {

            $isActive = $request->is_active;
        } else {
            $isActive = $request->is_active;
        }
        // dd($request->all());
        $memberUpdate = User::find($id);
        $memberUpdate->name = $request->name;
        $memberUpdate->team_id = Auth::user()->team_id;
        $memberUpdate->email = $request->email;
        $memberUpdate->password = Hash::make($request->password);
        $memberUpdate->phone = $request->phone;
        $memberUpdate->gender = $request->gender;
        $memberUpdate->dob = $request->dob;
        $memberUpdate->address = $request->address;
        $memberUpdate->is_active = $isActive ? 1 : 0;
        $memberUpdate->updated_at = now();
        // $memberUpdate->save();
        if ($memberUpdate->save()) {
            Alert::success('Congrats', "You've Successfully Update Member");
            return redirect('leader/member');
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
        $memberDelete = User::find($id);
        $memberDelete->delete();
        Alert::warning('Congrats', "You've Successfully Delete Member");
        return redirect('leader/member');
    }
}
