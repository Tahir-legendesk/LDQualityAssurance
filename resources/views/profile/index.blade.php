@extends('layouts.master-layout')
@section('content')
    <div class="main-content">
        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">{{ auth()->user()->name }} profile</h4>
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
                                    <td>{{ $profile->name }}</td>
                                    <td>Email</td>
                                    <td>{{ $profile->email }}</td>
                                </tr>


                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $profile->phone ? $profile->phone : 'Null' }}</td>
                                    <td>Gender</td>
                                    <td>{{ $profile->gender ? $profile->gender : 'Null' }}</td>
                                </tr>

                                <tr>
                                    <td>Age</td>
                                    <td>{{ $profile->dob ? $profile->dob : 'Null' }}</td>
                                    <td>Address</td>
                                    <td>{{ $profile->address ? $profile->address : 'Null' }}</td>
                                </tr>

                                <tr>
                                    <td>Active</td>
                                    <td>
                                        @if ($profile->is_active != 1)
                                            <i class="fas fa-times-circle fa-lg" style="color: red"></i>
                                        @else
                                            <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                                        @endif
                                    </td>

                                    <td>Profile Image</td>
                                    <td><img src="{{ asset('assets/images/admin/' . $profile->avatar) }}"
                                            class="avatar-lg mx-auto rounded"></td>
                                </tr>


                            </table>
                        </div>
                        <div class="col-md-12 button-items text-end mb-1">

                            <div class="col-md-12 d-flex justify-content-end d-grid gap-3">
                                @if (auth()->user()->role_id == 1)
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="col-md-2 btn btn-outline-secondary waves-effect">Cancel</a>
                                @elseif(auth()->user()->role_id == 2)
                                    <a href="{{ route('leader.dashboard') }}"
                                        class="col-md-2 btn btn-outline-secondary waves-effect">Cancel</a>
                                @else
                                    <a href="{{ route('member.dashboard') }}"
                                        class="col-md-2 btn btn-outline-secondary waves-effect">Cancel</a>
                                @endif

                                <a href="{{ route('profile.edit') }}"
                                    class="col-md-2 btn btn-outline-primary waves-effect">
                                    Edit Profile
                                </a>
                            </div>
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
