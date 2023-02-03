@extends('layouts.master-layout')
@section('content')
    <div class="main-content">
        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">team's management</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-head">
                            <div class="button-items text-end mb-1">
                                <a href="{{ route('admin.team.create') }}"
                                    class="col-md-2 btn btn-outline-primary waves-effect">
                                    <i class="fas fa-users font-size-16 align-middle"></i> Create Team
                                </a>
                            </div>

                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Total Members</th>
                                        <th>Total Projects</th>
                                        <th>Active</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td>{{ Illuminate\Support\Str::title($team->name) }}</td>
                                            <td>{{ $team->users_count }}</td>
                                            <td>{{ $team->projects_count }}</td>
                                            <td>
                                                @if ($team->is_active != 1)
                                                    <i class="fas fa-times-circle fa-lg" style="color: red"></i>
                                                @else
                                                    <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($team->created_at)->diffForHumans(['parts' => 3, 'short' => true]) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($team->updated_at)->diffForHumans(['parts' => 3, 'short' => true]) }}</td>
                                            {{-- {{dd($team->updated_at)}} --}}
                                            <td>
                                                <div class="button-items">

                                                    <a href="{{ route('admin.team.edit', $team->id) }}"
                                                        class="btn btn-outline-success waves-effect">
                                                        <i class="bx bxs-pencil font-size-16 "></i>
                                                    </a>

                                                    <a href="{{ route('admin.team.delete', $team->id) }}"
                                                        class="btn btn-outline-danger waves-effect">
                                                        <i class="bx bxs-trash font-size-16 "></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
