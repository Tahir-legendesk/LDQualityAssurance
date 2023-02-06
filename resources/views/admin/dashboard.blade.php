@extends('layouts.master-layout')
@section('content')
    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        @php
                            $user = App\Models\User::with('role')
                                ->where('id', auth()->user()->id)
                                ->first();
                        @endphp

                        <h4 class="page-title mb-0 font-size-18">{{ $user->role->name }} panel</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Welcome to {{ config('app.name', 'Laravel') }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Projects</div>
                                </div>
                                <h4 class="mt-4">{{ $projects->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total New Tasks</div>

                                </div>
                                <h4 class="mt-4">{{ $new }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Inner Pages Tasks</div>
                                </div>
                                <h4 class="mt-4">{{ $innerPages }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="fab fa-rev"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Revisions Tasks</div>
                                </div>
                                <h4 class="mt-4">{{ $revision }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="fas fa-file-signature"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Redesign Tasks</div>
                                </div>
                                <h4 class="mt-4">{{ $redesign }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Revamp Tasks</div>
                                </div>
                                <h4 class="mt-4">{{ $revamp }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-head">
                            <div class="custom-title d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Projects Detail</h4>
                            </div>
                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>RA</th>
                                        <th>Comments</th>
                                        <th>Late Reason</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->id ? $project->id : '' }}</td>
                                            <td>{{ $project->name ? $project->name : '' }}</td>
                                            </td>
                                            @foreach ($project->teams as $team)
                                                @foreach ($team->users as $user)
                                                    <td>{{ $user->name ? $user->name : 'null' }}</td>
                                                @endforeach
                                            @endforeach
                                            <td>{{ $project->comments ? \Illuminate\Support\Str::limit($project->comments, 20, $end = '....') : 'Null' }}
                                            </td>
                                            <td>{{ $project->late_reason ? \Illuminate\Support\Str::limit($project->late_reason, 20, $end = '....') : '' }}
                                            </td>
                                            <td>{{ $project->created_at ? $project->created_at->format('d M Y') : '' }}
                                            </td>
                                            <td>{{ $project->updated_at ? $project->updated_at->format('d M Y') : '' }}
                                            </td>
                                            <td><a href="{{ route('admin.project.detail', $project->id) }}"
                                                    class="btn btn-outline-primary waves-effect"><i
                                                        class="bx bxs-show font-size-16 "></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
        <!-- end row -->
        @include('../includes/footer')
    </div>
    <!-- End Page-content -->
@endsection
