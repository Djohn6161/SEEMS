<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SEEMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @if (auth()->user()->role == 1)
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{$active == 'dashboard' ? 'active' : ' '}}">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{$active == 'exam' ? 'active' : ' '}}">
        <a class="nav-link " href="{{route('admin.exams.index')}}"  >
            <i class="fas fa-fw fa-scroll"></i>
            <span>Examination</span>
        </a>
        {{-- <a class="nav-link " href="{{route('admin.exam.index')}}" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Examination</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List:</h6>
                @foreach ($exams as $exam)
                    <a class="collapse-item" href="{{route('admin.exam.show',['examination' => $exam->id])}}">{{$exam->name}}</a>
                @endforeach
            </div>
        </div> --}}
    </li>
    <li class="nav-item {{$active == 'scores' ? 'active' : ' '}}">
        <a class="nav-link" href="{{route('admin.scores.index')}}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Scores</span></a>
    </li>
    <li class="nav-item {{$active == 'accounts' ? 'active' : ' '}}">
        <a class="nav-link" href="{{route('admin.accounts.index')}}">
            <i class="fas fa-user"></i>
            <span>Users</span></a>
    </li>
    <li class="nav-item {{$active == 'registration' ? 'active' : ' '}}">
        <a class="nav-link" href="{{route('admin.registration.index')}}">
            <i class="fas fa-copy"></i>
            <span>Registration</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

            <!-- Heading -->
        <div class="sidebar-heading">
            Control
        </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('index')}}">
            <i class="fas fa-reply"></i>
            <span>Visit Site</span></a>
    </li>
    @endif
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>