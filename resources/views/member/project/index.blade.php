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
                            {{-- <div class="button-items text-end mb-1">
                                <a href="{{ route('member.project.create') }}"
                                    class="col-md-2 btn btn-outline-primary waves-effect">
                                    <i class="fas fa-file-medical font-size-16 align-middle"></i> Create Project
                                </a>
                            </div> --}}

                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Name</th>
                                        <th>Comment</th>
                                        <th>Late Reason</th>
                                        <th>Active</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($memberProjects as $memberProject)
                                        <tr>
                                            <td>{{ $memberProject->order_id }}</td>
                                            <td>{{ $memberProject->name }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($memberProject->comments, 30, $end = '....') }}
                                            </td>
                                            <td>{{ \Illuminate\Support\Str::limit($memberProject->late_reason, 30, $end = '....') }}
                                            </td>
                                            <td>
                                                @if ($memberProject->is_active != 1)
                                                    <i class="fas fa-times-circle fa-lg" style="color: red"></i>
                                                @else
                                                    <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                                                @endif
                                            </td>
                                            <td>{{ $memberProject->created_at ? $memberProject->created_at->format('d M Y') : ''}}
                                            </td>
                                            <td>{{ $memberProject->updated_at ? $memberProject->updated_at->format('d M Y') : ''}}
                                            {{-- // ? $memberProject->updated_at->format('d M Y') : '' --}}
                                            {{-- }} --}}
                                            </td>
                                            <td>
                                                <div class="button-items">
                                                    <a href="{{ route('member.project.show', $memberProject->id) }}"
                                                        class="btn btn-outline-info waves-effect">
                                                        <i class="bx bxs-show font-size-16 "></i>
                                                    </a>

                                                    <a href="{{ route('member.project.edit', $memberProject->id) }}"
                                                        class="btn btn-outline-success waves-effect">
                                                        <i class="bx bxs-pencil font-size-16 "></i>
                                                    </a>

                                                    <a href="{{ route('member.project.delete', $memberProject->id) }}"
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
