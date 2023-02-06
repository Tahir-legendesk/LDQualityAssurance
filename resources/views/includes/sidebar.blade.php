<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{ asset('assets/images/admin/' . auth()->user()->avatar) }}" alt=""
                    class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                {{-- @php
                    $user = App\Models\User::with('role')->find(auth()->user()->id);
                @endphp --}}
                <a href="#" class="text-dark fw-medium font-size-16">{{ auth()->user()->name }}</a>

                <p class="text-body mt-1 mb-0 font-size-13">{{ auth()->user()->role->name }}</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- <li class="menu-title">Menu</li> --}}
                @if (auth()->user()->role_id == 1)
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @elseif(auth()->user()->role_id == 2)
                    <li>
                        <a href="{{ route('leader.dashboard') }}" class="waves-effect">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('member.dashboard') }}" class="waves-effect">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role_id == 1)
                    <li>
                        <a href="{{ route('admin.leader') }}" class=" waves-effect">
                            <i class="fas fa-user-tie"></i>
                            <span>Manage Leader's</span>
                        </a>
                    </li>
                @elseif(auth()->user()->role_id == 2)
                    <li>
                        <a href="{{ route('leader.member') }}" class=" waves-effect">
                            <i class="fas fa-users"></i>
                            <span>Manage Member's</span>
                        </a>
                    </li>
                @else
                <li>
                    <a href="{{ route('member.project') }}" class=" waves-effect">
                        <i class="far fa-file-alt"></i>
                        <span>Manage Project's</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->role_id == 1)
                    <li>
                        <a href="{{ route('admin.team') }}" class=" waves-effect">
                            <i class="fas fa-users-cog"></i>
                            <span>Manage Team's</span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
@include('sweetalert::alert')
