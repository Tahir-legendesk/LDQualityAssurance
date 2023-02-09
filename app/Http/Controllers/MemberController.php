<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{

    public function dashboard()
    {
        $memberProjects = Project::whereHas('teams.users', function ($q) {
            $q->where('id', Auth::id());
        })->get();

        $user = Auth::user();

        $tasks = Task::with('project')->where('user_id', $user->id)->get();

        $memberInnerPagesTasks = Task::where('user_id', $user->id)->where('type', 'INNER_PAGES')->count();

        $memberNewTasks = Task::where('user_id', $user->id)->where('type', 'NEW')->count();

        $memberRevisionTasks = Task::where('user_id', $user->id)->where('type', 'REVISION')->count();

        $memberRedesignTasks = Task::where('user_id', $user->id)->where('type', 'REDESIGN')->count();

        $memberRevampTasks = Task::where('user_id', $user->id)->where('type', 'REVAMP')->count();

        return view('member.dashboard', get_defined_vars());
    }

    public function task()
    {
        return view('member.project-detail', get_defined_vars());
    }

    public function dateFilter(Request $request)
    {
        // dd($request->all());
        // $this->validate($request, [
        //     'start_date' => 'required',
        //     'end_date' => 'required|before_or_equal:start_date',
        // ]);

        $memberProjects = Project::whereHas('teams.users', function ($q) {
            $q->where('id', Auth::id());
        })->get();

        $user = Auth::user();

        $tasks = Task::with('project')->where('user_id', $user->id)->get();

        $memberInnerPagesTasks = Task::where('user_id', $user->id)->where('type', 'INNER_PAGES')->count();

        $memberNewTasks = Task::where('user_id', $user->id)->where('type', 'NEW')->count();

        $memberRevisionTasks = Task::where('user_id', $user->id)->where('type', 'REVISION')->count();

        $memberRedesignTasks = Task::where('user_id', $user->id)->where('type', 'REDESIGN')->count();

        $memberRevampTasks = Task::where('user_id', $user->id)->where('type', 'REVAMP')->count();

        // $task = Task::where('id',1)->first();
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        //     dd($request->start_date,
        //     $request->end_date,
        //     $task->created_at->format('Y-m-d')
        // );
        // dd(Auth::id());

        $tasks = Task::with('project')->where('user_id', Auth::id())
            ->whereBetween('created_at', [$request->start_date, $request->end_date])->get();
        // dd($tasks);
        return view('member.dashboard', get_defined_vars());
    }

    public function taskCreate(Request $request)
    {
        // dd($request->all());
        // dd($p);

        $validated = $request->validate([
            'name' => 'required',
            'comments' => 'required',
            // 'project_name'=>'required',
            'order_id' => 'required',
            'type' => 'required',
        ]);
        $p = Project::where('order_id', $request->order_id)->first();

        if ($p == null) {
            $project = new Project();
            $project->order_id = $request->order_id;
            $project->is_active = 1;
            $project->created_at = now();
            $project->updated_at = null;
            $project->save();
            $project->teams()->attach(['team_id' => Auth::user()->team->id]);

            if (!$request->is_active) {

                $isActive = $request->is_active;
            } else {
                $isActive = $request->is_active;
            }
            // dd($request->all());

            $task = new Task();
            $task->name = $request->name;
            $task->project_id = $project->id;
            $task->user_id = Auth::id();
            $task->type = $request->type;
            $task->comments = $request->comments;
            $task->late_reason = $request->late_reason;
            $task->is_active = $isActive ? 1 : 0;
            $task->created_at = now();
            $task->updated_at = null;
            // dd($task);
            if ($task->save()) {
                // $project->teams()->attach(['team_id' => Auth::user()->team->id]);

                Alert::success('Congrats', "You've Successfully Create Task");
                return redirect('member/dashboard');
            }
        }
        if (!$request->is_active) {

            $isActive = $request->is_active;
        } else {
            $isActive = $request->is_active;
        }
        // dd($request->all());

        $task = new Task();
        $task->name = $request->name;
        $task->project_id = $p->id;
        $task->user_id = Auth::id();
        $task->type = $request->type;
        $task->comments = $request->comments;
        $task->late_reason = $request->late_reason;
        $task->is_active = $isActive ? 1 : 0;
        $task->created_at = now();
        $task->updated_at = null;
        // dd($task);
        if ($task->save()) {
            // $project->teams()->attach(['team_id' => Auth::user()->team->id]);

            Alert::success('Congrats', "You've Successfully Create Task");
            return redirect('member/dashboard');
        }

    }

    public function taskDelete($id)
    {
        $taskDelete = Task::find($id);
        $taskDelete->delete();
        Alert::warning('Congrats', "You've Successfully Delete Task");
        return redirect('member/dashboard');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberProjects = Project::whereHas('teams.users', function ($q) {
            $q->where('id', Auth::id());
        })->get();
        // dd($memberProjects);

        return view('member.project.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'comments' => 'required',
        ]);

        if (!$request->is_active) {

            $isActive = $request->is_active;
        } else {
            $isActive = $request->is_active;
        }
        // dd($request->all());

        $project = new Project();
        $project->name = $request->name;
        $project->comments = $request->comments;
        $project->is_active = $isActive ? 1 : 0;
        $project->created_at = now();
        $project->updated_at = null;
        // $project->save();
        if ($project->save()) {
            $project->teams()->attach(['team_id' => Auth::user()->team->id]);

            Alert::success('Congrats', "You've Successfully Create Project");
            return redirect('member/project');
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
        $project = Project::with(['tasks' => function ($q) {
            $q->with('user');
        }, 'teams' => function ($q) {
            $q->with('users');
        }])->find($id);
        // dd($project);
        return view('member.project.detail', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('member.project.edit', get_defined_vars());
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
            'name' => 'required',
            'comments' => 'required',
        ]);

        if (!$request->is_active) {

            $isActive = $request->is_active;
        } else {
            $isActive = $request->is_active;
        }
        // dd($request->all());

        $projectUpdate = Project::find($id);
        $projectUpdate->name = $request->name;
        $projectUpdate->comments = $request->comments;
        $projectUpdate->late_reason = $request->late_reason;
        $projectUpdate->is_active = $isActive ? 1 : 0;
        $projectUpdate->updated_at = now();
        // $projectUpdate->save();
        if ($projectUpdate->save()) {
            Alert::info('Congrats', "You've Successfully Update Project");
            return redirect('member/project');
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
        $projectDelete = Project::find($id);
        $projectDelete->delete();
        $projectDelete->teams()->detach(['team_id' => Auth::user()->team->id]);
        Alert::warning('Congrats', "You've Successfully Delete Project");
        return redirect('member/project');
    }
}
