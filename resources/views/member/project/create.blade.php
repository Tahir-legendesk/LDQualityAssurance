@extends('layouts.master-layout')
@section('content')
    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">create project</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action={{ url('/member/project/store') }} method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="name" placeholder="Jhon deo"
                                            id="example-text-input">
                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('name')
                                                    {{ $errors->first('name') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>


                                    <label for="example-search-input" class="col-md-2 col-form-label">Comment</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="comments"
                                            placeholder="simply dummy text of the printing and typesetting industry" id="example-search-input">
                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('comments')
                                                    {{ $errors->first('comments') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label" for="flexCheckDefault">Active</label>
                                    <div class="col-md-4">

                                        <input class="form-check-input" checked="checked" name="is_active" type="checkbox">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-end d-grid gap-3">
                                        <a href="{{ route('member.project') }}"
                                            class="col-md-2 btn btn-outline-secondary waves-effect">Cancel</a>
                                        <button type="submit"
                                            class="col-md-2 btn btn-outline-primary waves-effect ">Create</button>
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
