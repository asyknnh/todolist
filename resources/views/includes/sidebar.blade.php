<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('todo:myday','1') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">To-Do List</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('todos/*/myday') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('todo:myday', '1') }}">
            <i class="fas fa-fw fa-sun"></i>
            <span>{{ __('My Day') }}</span></a>
    </li>

    <li class="nav-item {{ (request()->is('todos/*/important')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('todo:important', '2') }}">
            <i class="fas fa-fw fa-star"></i>
            <span>{{ __('Important') }}</span></a>
    </li>

    <li class="nav-item {{ (request()->is('todos/*/planned')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('todo:planned', '3') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>{{ __('Planned') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        My List
    </div>

    @foreach ($todos as $todo)
        <li class="nav-item {{ request()->is('todos/'.$todo->id) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('todo:show', $todo->id) }}">
                <i class="fas fa-fw fa-th-list"></i>
                <span>{{ $todo->list_name }}</span></a>
        </li>
    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item d-none d-md-inline {{ request()->is('todos/create') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('todo:create') }}">
            <i class="fas fa-plus"></i>
            <span>{{ __('New List') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>