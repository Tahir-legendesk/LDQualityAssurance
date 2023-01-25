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
                                    <td>Type</td>
                                    <td>{{ Illuminate\Support\Str::title($project->type) }}</td>
                                </tr>
                                <tr>
                                    <td>Comment</td>
                                    <td>{{ $project->comments }}</td>
                                    <td>Late reason</td>
                                    <td>{{ $project->late_reason }}</td>
                                </tr>

                                <tr>

                                    <td>Created at</td>
                                    <td>{{ \carbon\carbon::parse($project->created_at)->diffForHumans(['parts' => 5, 'short' => true]) }}
                                    </td>
                                    <td>Last updated</td>
                                    <td>{{ \carbon\carbon::parse($project->updated_at)->diffForHumans(['parts' => 5, 'short' => true]) }}
                                    </td>
                                </tr>

                                <tr>

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
                            <h4 class="page-title mb-3 font-size-18">Member Details </h4>
                            <table class="table table-striped mb-0">
                                @foreach ($project->teams as $team)
                                    @foreach ($team->users as $user)
                                        <tr>
                                            <td>Name</td>
                                            @if ($user->is_leader == 1 && $user->role_id == 2)
                                                <td>
                                                    {{ $user->name ? $user->name : '' }} <i class="mdi mdi-account-network fa-lg" style="color: green"></i></td>
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
                            <a href="{{ route('dashboard') }}" class="col-md-2 btn btn-outline-secondary waves-effect">
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