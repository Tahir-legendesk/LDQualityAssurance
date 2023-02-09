@extends('layouts.master-layout')
@section('content')
    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        {{-- @php
                            $user = App\Models\User::with('role')
                                ->where('id', auth()->user()->id)
                                ->first();
                        @endphp --}}

                        <h4 class="page-title mb-0 font-size-18">{{ auth()->user()->role->name }} panel</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Welcome to {{ config('app.name', 'Laravel') }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Projects</div>
                                </div>
                                <h4 class="mt-4">{{ $memberProjects->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total New Tasks</div>

                                </div>
                                <h4 class="mt-4">{{ $memberNewTasks }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="far fa-dot-circle"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Inner Pages Tasks</div>
                                </div>
                                <h4 class="mt-4">{{ $memberInnerPagesTasks }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="fab fa-rev"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Revisions Tasks</div>
                                </div>
                                <h4 class="mt-4">{{ $memberRevisionTasks }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="fas fa-file-signature"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Redesign Tasks</div>
                                </div>
                                <h4 class="mt-4">{{ $memberRedesignTasks }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Revamp Tasks</div>
                                </div>
                                <h4 class="mt-4">{{ $memberRevampTasks }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-head">
                            <div class="custom-title d-flex align-items-start justify-content-between">
                                <h4 class="card-title">All Tasks</h4>
                                {{-- <div class="button-items text-end mb-1"> --}}
                                
                                <form action="{{ url('/member/dashboard/filter') }}" method="get">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Start Date</label>
                                        <div class="col-md-3">
                                            <input class="form-control" type="date" name="start_date"
                                                placeholder="Jhon deo" id="example-text-input">
                                            {{-- <ul class="parsley-errors-list filled" id="parsley-id-39">
                                                <li class="parsley-required">
                                                    @error('name')
                                                        {{ $errors->first('name') }}
                                                    @enderror
                                                </li>
                                            </ul> --}}
                                        </div>


                                        <label for="example-search-input" class="col-md-2 col-form-label">End Date</label>
                                        <div class="col-md-3">
                                            <input class="form-control" type="date" name="end_date"
                                                placeholder="simply dummy text of the printing and typesetting industry"
                                                id="example-search-input">
                                            {{-- <ul class="parsley-errors-list filled" id="parsley-id-39">
                                                <li class="parsley-required">
                                                    @error('comments')
                                                        {{ $errors->first('comments') }}
                                                    @enderror
                                                </li>
                                            </ul> --}}
                                        </div>
                                        <div class="col-md-2">

                                            <button type="submit"
                                                class=" btn btn-outline-success waves-effect">Submit</button>
                                        </div>

                                    </div>
                                </form>
                                <a href="#" class="col-md-2 btn btn-outline-primary waves-effect mb-2"
                                data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="bx bx-task font-size-16 align-middle"></i> Create Task
                            </a>
                                {{-- </div> --}}
                            </div>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Comments</th>
                                        <th>Late Reason</th>
                                        <th>Created At</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->project->order_id ? $task->project->order_id : 'null' }}</td>
                                            <td>{{ $task->name ? $task->name : '' }}</td>
                                            <td>{{ $task->type ? Illuminate\Support\Str::title(str_replace('_', ' ', $task->type)) : '' }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($task->comments, 20, $end = '....') ? \Illuminate\Support\Str::limit($task->comments, 20, $end = '....') : '' }}
                                            </td>
                                            <td>{{ \Illuminate\Support\Str::limit($task->late_reason, 20, $end = '....') ? \Illuminate\Support\Str::limit($task->late_reason, 20, $end = '....') : '' }}
                                            </td>
                                            <td>{{ $task->created_at ? $task->created_at->format('d M Y') : $task->created_at }}
                                            </td>
                                            <td> <a href="{{ route('member.task.delete', $task->id) }}"
                                                    class="btn btn-outline-danger btn-sm"><i
                                                        class="bx bxs-trash font-size-16 "></i></a>
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

            <!-- sample modal content -->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Create Task
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('member.task.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="mb-3 row">
                                    <label for="example-search-input" class="col-md-2 col-form-label">Order Id</label>
                                    <div class="col-md-10">
                                        {{-- {{dd($memberProjects)}} --}}

                                        <input class="form-control" type="text" name="order_id" placeholder="1234"
                                            required id="example-search-input">

                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('order_id')
                                                    {{ $errors->first('order_id') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="name" placeholder="Jhon deo"
                                            required id="example-text-input">
                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('name')
                                                    {{ $errors->first('name') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    <label for="example-search-input" class="col-md-2 col-form-label">Type</label>
                                    <div class="col-md-10">
                                        <select class="form-select" aria-label="Default select example" name="type"
                                            required>
                                            <option selected disabled>Select type</option>
                                            <option value="NEW">New</option>
                                            <option value="INNER_PAGES">Inner Pages</option>
                                            <option value="REVISION">Revision</option>
                                            <option value="REDESIGN">Redesign</option>
                                            <option value="REVAMP">Revamp</option>
                                        </select>
                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('type')
                                                    {{ $errors->first('type') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-search-input" class="col-md-2 col-form-label">Comment</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="comments" required
                                            placeholder="simply dummy text of the printing and typesetting industry"
                                            id="example-search-input">
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
                                    <label for="example-search-input" class="col-md-2 col-form-label">Late Reason (if
                                        any)</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="late_reason"
                                            placeholder="simply dummy text of the printing and typesetting industry"
                                            id="example-search-input">
                                        <ul class="parsley-errors-list filled" id="parsley-id-39">
                                            <li class="parsley-required">
                                                @error('late_reason')
                                                    {{ $errors->first('late_reason') }}
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label" for="flexCheckDefault">Active</label>
                                    <div class="col-md-4">

                                        <input class="form-check-input" checked="checked" name="is_active"
                                            type="checkbox">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary waves-effect"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit"
                                    class="btn btn-outline-primary waves-effect waves-light">Create</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- end row -->
        @include('../includes/footer')
    </div>
    <!-- End Page-content -->
@endsection

{{-- @push('custom_script')
<script>
    function datefilter(){
        if (condition) {
            
        }
    console.log('hello');
}
</script>
@endpush --}}
