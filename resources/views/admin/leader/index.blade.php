@extends('layouts.master-layout')
@section('content')
    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">leader's management</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-head">

                            <div class="button-items text-end mb-1">
                                <a href="{{ route('admin.leader.create') }}" class="col-md-2 btn btn-outline-primary waves-effect">
                                    <i class="mdi mdi-account-plus font-size-16 align-middle"></i> Create Leader
                                </a>
                            </div>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
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
                                    {{-- {{dd($leaders)}} --}}
                                    @foreach ($leaders as $leader)
                                        <tr>
                                            <td>{{ $leader->name }}</td>
                                            <td>{{ $leader->team->name }}</td>
                                            <td>{{ $leader->email }}</td>
                                            <td>{{ $leader->phone }}</td>
                                            <td>{{ Illuminate\Support\Str::title($leader->gender) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($leader->dob)->diffForHumans() }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($leader->address, 50, $end = '....') }}
                                            </td>
                                            <td>
                                                <div class="button-items">
                                                    <a href="{{ route('admin.leader.show', $leader->id) }}"
                                                        class="btn btn-outline-warning waves-effect">
                                                        <i class="bx bxs-show font-size-16 "></i>
                                                    </a>
                                                    
                                                        
                                                        <a href="{{ route('admin.leader.edit', $leader->id) }}"
                                                            class="btn btn-outline-success waves-effect">
                                                            <i class="bx bxs-pencil font-size-16 "></i>
                                                        </a>
                                                    
                                                    
                                                        <a href="{{ route('admin.leader.delete', $leader->id) }}"
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
            {{-- {{ $leaders->links() }} --}}
        </div>
        <!-- End Page-content -->

        @include('../includes/footer')
    </div>
@endsection
