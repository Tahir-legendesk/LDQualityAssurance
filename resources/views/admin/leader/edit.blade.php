@extends('layouts.master-layout')
@section('content')
    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">update leader</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action={{ url('/admin/leader/' . $leaderEdit->id . '/update') }} method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="name" placeholder="Jhon deo"
                                            value="{{ $leaderEdit->name }}" id="example-text-input">
                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('name')
                                                    {{ $errors->first('name') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>


                                    <label for="example-search-input" class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="email" name="email"
                                            placeholder="jhon@example.com" value="{{ $leaderEdit->email }}"
                                            id="example-search-input">
                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('email')
                                                    {{ $errors->first('email') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="password" name="password" placeholder="********"
                                            id="example-password-input">
                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('password')
                                                    {{ $errors->first('password') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>

                                    @php
                                        $teams = App\Models\Team::all();
                                        // dd($teams);
                                    @endphp
                                    <label class="col-md-2 col-form-label">Team</label>
                                    <div class="col-md-4">
                                        <select class="form-select" aria-label="Default select example" name="team_id">
                                            <option value="" disabled>select team</option>
                                            @foreach ($teams as $team)
                                                <option value="{{ $team->id }}"
                                                    @if ($leaderEdit->team->name == $team->name) selected @endif>
                                                    {{ $team->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Phone</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="tel" name="phone" placeholder="+99999999999"
                                            value="{{ $leaderEdit->phone }}" id="example-text-input">
                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('phone')
                                                    {{ $errors->first('phone') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>


                                    <label for="example-date-input" class="col-md-2 col-form-label">Date of birth</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="date" name="dob"
                                            value="{{ $leaderEdit->dob }}" id="example-date-input">
                                    </div>

                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Gender</label>
                                    <div class="col-md-4">
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                            <option disabled>Select gender</option>
                                            <option value="MALE" @if ($leaderEdit->gender == 'MALE') selected @endif>Male
                                            </option>
                                            <option value="FEMALE" @if ($leaderEdit->gender == 'FEMALE') selected @endif>Female
                                            </option>
                                        </select>
                                    </div>

                                    <label for="example-text-input" class="col-md-2 col-form-label">Address</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="address"
                                            placeholder="14 Hartford Drive Peachtree City, GA 30269"
                                            value="{{ $leaderEdit->address }}" id="example-text-input">
                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('address')
                                                    {{ $errors->first('address') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label" for="flexCheckDefault">Active</label>
                                    <div class="col-md-4">

                                        <input class="form-check-input" checked="checked" name="is_active"
                                            value="{{ old($leaderEdit->is_active) }}" type="checkbox">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-end d-grid gap-3">
                                        <a href="{{ route('admin.leader') }}"
                                            class="col-md-2 btn btn-outline-secondary waves-effect">Back</a>
                                        <button type="submit"
                                            class="col-md-2 btn btn-outline-success waves-effect ">update</button>
                                    </div>
                                </div>
                            </form>

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
