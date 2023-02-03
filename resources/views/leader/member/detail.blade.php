@extends('layouts.master-layout')
@section('content')
    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">member details</h4>
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
                                    <td>{{Illuminate\Support\Str::title($member->name)}}</td>
                                    <td>Email</td>
                                    <td>{{$member->email}}</td>
                                </tr>
                                <tr>
                                    <td>Member type</td>
                                    <td>{{Illuminate\Support\Str::title($member->role->name)}}</td>
                                    <td>Team name</td>
                                    <td>{{Illuminate\Support\Str::title($member->team->name)}}</td>
                                </tr>

                                <tr>
                                    <td>Phone</td>
                                    <td>{{$member->phone}}</td>
                                    <td>Gender</td>
                                    <td>{{Illuminate\Support\Str::title($member->gender)}}</td>
                                </tr>

                                <tr>
                                    <td>Age</td>
                                    <td>{{$member->dob}}</td>
                                    <td>Address</td>
                                    <td>{{$member->address}}</td>
                                </tr>

                                <tr>
                                    <td>Active</td>
                                    <td>@if ($member->is_active != 1)
                                        <i class="fas fa-times-circle fa-lg" style="color: red"></i>
                                       @else
                                       <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                                       @endif</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12 button-items text-end mb-1">
                            <a href="{{ route('leader.member') }}" class="col-md-2 btn btn-outline-secondary waves-effect">
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
