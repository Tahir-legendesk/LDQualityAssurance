@extends('layouts.master-layout')
@section('content')
    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">project's management</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-head">
                            <div class="button-items text-end mb-1">
                                {{-- <a href="{{ route('leader.member.create') }}"
                                    class="col-md-2 btn btn-outline-primary waves-effect">
                                    <i class="mdi mdi-account-plus font-size-16 align-middle"></i> Create Member
                                </a> --}}
                            </div>

                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Team Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- @foreach ($members as $member)
                                        <tr>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->team->name }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->phone }}</td>
                                            <td>{{ Illuminate\Support\Str::title($member->gender) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($member->dob)->diffForHumans(['parts' => 3, 'short' => true]) }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($member->address, 50, $end = '....') }}
                                            </td>
                                            <td>
                                                <div class="button-items">
                                                    <a href="{{ route('leader.member.show', $member->id) }}"
                                                        class="btn btn-outline-warning waves-effect">
                                                        <i class="bx bxs-show font-size-16 "></i>
                                                    </a>

                                                    <a href="{{ route('leader.member.edit', $member->id) }}"
                                                        class="btn btn-outline-success waves-effect">
                                                        <i class="bx bxs-pencil font-size-16 "></i>
                                                    </a>

                                                    <a href="{{ route('leader.member.delete', $member->id) }}"
                                                        class="btn btn-outline-danger waves-effect">
                                                        <i class="bx bxs-trash font-size-16 "></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach --}}
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
