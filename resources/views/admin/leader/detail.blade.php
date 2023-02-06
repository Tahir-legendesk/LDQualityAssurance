@extends('layouts.master-layout')
@section('content')
    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">leader details</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mb-0">
                                <tr>
                                    <td>Name</td>
                                    <td>{{Illuminate\Support\Str::title($leaderDetail->name)}}</td>
                                    <td>Email</td>
                                    <td>{{$leaderDetail->email}}</td>
                                </tr>
                                <tr>
                                    <td>Member type</td>
                                    <td>{{Illuminate\Support\Str::title($leaderDetail->role->name)}}</td>
                                    <td>Team name</td>
                                    <td>{{Illuminate\Support\Str::title($leaderDetail->team->name)}}</td>
                                </tr>

                                <tr>
                                    <td>Phone</td>
                                    <td>{{$leaderDetail->phone}}</td>
                                    <td>Gender</td>
                                    <td>{{Illuminate\Support\Str::title($leaderDetail->gender)}}</td>
                                </tr>

                                <tr>
                                    <td>Age</td>
                                    <td>{{\Carbon\Carbon::parse($leaderDetail->dob)->diff(\Carbon\Carbon::now())->format('%y years, %m months, %d days')}}</td>
                                    <td>Address</td>
                                    <td>{{$leaderDetail->address}}</td>
                                </tr>

                                <tr>
                                    <td>Active</td>
                                    <td>@if ($leaderDetail->is_active != 1)
                                        <i class="fas fa-times-circle fa-lg" style="color: red"></i>
                                       @else
                                       <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                                       @endif</td>
                                    
                                    
                                </tr>
                                
                                
                            </table>
                        </div>
                        <div class="col-md-12 button-items text-end mb-1">
                            <a href="{{ route('admin.leader') }}" class="col-md-2 btn btn-outline-secondary waves-effect">
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
