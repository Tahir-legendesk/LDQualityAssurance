@extends('layouts.master-layout')
@section('content')
    <div class="main-content">
        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Project details</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="page-title mb-3 font-size-18">Project ID [{{ $project->id }}] </h4>
                            <table class="table table-striped mb-0">
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $project->name }}</td>
                                    <td>Comment</td>
                                    <td>{{ $project->comments }}</td>
                                </tr>
                                <tr>
                                    
                                    <td>Late reason</td>
                                    <td>{{ $project->late_reason }}</td>
                                    <td>Created at</td>
                                    <td>{{$project->created_at ? $project->created_at->format('d M Y') : '' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>Last updated</td>
                                    <td>{{ $project->updated_at ? $project->updated_at->format('d M Y') : '' }}
                                    </td>
                                    <td>Active</td>
                                    <td>
                                        @if ($project->is_active != 1)
                                            <i class="fas fa-times-circle fa-lg" style="color: red; "></i>
                                        @else
                                            <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                                        @endif
                                    </td>                                    
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="page-title mb-3 font-size-18">Tasks List </h4>
                            @foreach ($project->tasks as $task)
                                <table class="table table-striped mb-0">
                                    <tr>
                                        <td>Id</td>
                                        <td>{{ $task->id }}</td>
                                        <td>Name</td>
                                        <td>{{ $task->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Member Name</td>
                                        <td>{{ $task->user->name }}</td>
                                        <td>Type</td>
                                        <td>{{ Illuminate\Support\Str::title(str_replace('_', ' ', $task->type)) }}</td>
                                        
                                    </tr>

                                    <tr>
                                        <td>Comment</td>
                                        <td>{{ $task->comments }}</td>
                                        <td>Late reason</td>
                                        <td>{{ $task->late_reason }}</td>
                                        
                                    </tr>

                                    <tr>
                                        <td>Created at</td>
                                        <td>{{ $task->created_at ? $task->created_at->format('d M Y') : '' }}
                                        </td>
                                        <td>Last updated</td>
                                        <td>{{ $task->updated_at ? $task->updated_at->format('d M Y') : ''}}
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Active</td>
                                        <td>
                                            @if ($task->is_active != 1)
                                                <i class="fas fa-times-circle fa-lg" style="color: red; "></i>
                                            @else
                                                <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="page-title mb-3 font-size-18">Team Details</h4>
                            <table class="table table-striped mb-0">

                                @foreach ($project->teams as $team)
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ Illuminate\Support\Str::title($team->name) }}</td>
                                        <td>Active</td>
                                        <td>
                                            @if ($team->is_active != 1)
                                                <i class="fas fa-times-circle fa-lg" style="color: red; "></i>
                                            @else
                                                <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="page-title mb-3 font-size-18">Member List </h4>
                            <table class="table table-striped mb-0">
                                @foreach ($project->teams as $team)
                                    @foreach ($team->users as $user)
                                        <tr>
                                            <td>Name</td>
                                            @if ($user->is_leader == 1 && $user->role_id == 2)
                                                <td>
                                                    {{ $user->name ? $user->name : '' }} <i
                                                        class="fas fa-user-tie fa-lg" style="color: #3b5de7;"></i></td>
                                            @else
                                                <td>{{ $user->name ? $user->name : '' }}</td>
                                            @endif

                                            <td>phone</td>
                                            <td>{{ $user->phone ? $user->phone : '' }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach

                            </table>
                        </div>
                        <div class="col-md-12 button-items text-end mb-1">
                            <a href="{{ route('admin.dashboard') }}" class="col-md-2 btn btn-outline-secondary waves-effect">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->


        </div>
        <!-- End Page-content -->

        @include('../includes/footer')

    </div>
@endsection
