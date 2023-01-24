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
                                    <td>{{$leaderDetail->name}}</td>
                                    <td>Email</td>
                                    <td>{{$leaderDetail->email}}</td>
                                </tr>
                                <tr>
                                    <td>Member type</td>
                                    <td>{{$leaderDetail->role->name}}</td>
                                    <td>Team name</td>
                                    <td>{{$leaderDetail->team->name}}</td>
                                </tr>

                                <tr>
                                    <td>Phone</td>
                                    <td>{{$leaderDetail->phone}}</td>
                                    <td>Gender</td>
                                    <td>{{$leaderDetail->gender}}</td>
                                </tr>

                                <tr>
                                    <td>Age</td>
                                    <td>{{$leaderDetail->dob}}</td>
                                    <td>Address</td>
                                    <td>{{$leaderDetail->address}}</td>
                                </tr>

                                <tr>
                                    <td>Active</td>
                                    <td>@if ($leaderDetail->is_active != 1)
                                        <i class="fas fa-circle " style="color: red"></i>
                                       @else
                                       <i class="fas fa-circle " style="color: green"></i>
                                       @endif</td>
                                    
                                    
                                </tr>
                                
                                
                            </table>
                            
                                {{-- <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-4">
                                        <span class="form-control">{{$leaderDetail->name}}</span>
                                            
                                    </div>
                                    

                                    <label for="example-search-input" class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="email" name="email" 
                                            placeholder="jhon@example.com" id="example-search-input">
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
                                        <input class="form-control" type="password" name="password"  placeholder="********"
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
                                            <option value ="" selected>Select Team</option>
                                            @foreach ($teams as $team)
                                                <option value="{{ $team->id }}">
                                                    {{ $team->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Phone</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="tel" name="phone"  placeholder="+99999999999"
                                            id="example-text-input">
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
                                        <input class="form-control" type="date"  name="dob"
                                            id="example-date-input">
                                    </div>

                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Gender</label>
                                    <div class="col-md-4">
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                            <option >Select gender</option>
                                            <option value="MALE">Male</option>
                                            <option value="FEMALE">Female</option>
                                        </select>
                                    </div>

                                    <label for="example-text-input" class="col-md-2 col-form-label">Address</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="address" 
                                            placeholder="14 Hartford Drive Peachtree City, GA 30269"
                                            id="example-text-input">
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
                                        
                                            <input class="form-check-input" checked="checked" name="is_active" type="checkbox" >
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit"
                                        class="col-md-2 btn btn-outline-primary waves-effect ">Create</button>
                                </div> --}}

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
