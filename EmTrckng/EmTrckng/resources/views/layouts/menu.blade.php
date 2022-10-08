@php
$urlAdmin=config('fast.admin_prefix');
@endphp

@can('dashboard')
@php
$isDashboardActive = Request::is($urlAdmin);
@endphp
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ $isDashboardActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>@lang('menu.dashboard')</p>
    </a>
</li>
@endcan

@canany(['users.index','roles.index','permissions.index'])
@php
$isUserActive = Request::is($urlAdmin.'*users*');
$isRoleActive = Request::is($urlAdmin.'*roles*');
$isPermissionActive = Request::is($urlAdmin.'*permissions*');
@endphp
<li class="nav-item {{($isUserActive||$isRoleActive||$isPermissionActive)?'menu-open':''}} ">
    <a href="#" class="nav-link">
        {{-- <i class="nav-icon fas fa-shield-virus"></i> --}}
       <i class="nav-icon fas fa fa-user" aria-hidden="true"></i>
        <p>
            @lang('menu.user.title')
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @can('users.index')
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    @lang('menu.user.users')
                </p>
            </a>
        </li>
        @endcan
        @can('roles.index')
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ $isRoleActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    @lang('menu.user.roles')
                </p>
            </a>
        </li>
        @endcan
        @can('permissions.index')
        <li class="nav-item ">
            <a href="{{ route('permissions.index') }}" class="nav-link {{ $isPermissionActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-shield-alt"></i>
                <p>
                    @lang('menu.user.permissions')
                </p>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcan
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-shield-virus"></i>
        <p>
            @lang('menu.master.title')
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    @lang('menu.categories.title')
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('industry_types.index') }}" class="nav-link">
                <i class="nav-icon fas fa-industry"></i>
                <p>
                    @lang('menu.industry_type.title')
                </p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item ml-2">
    <a href="{{ route('company_visits.index') }}" class="nav-link">
        {{-- <i class="nav-icon fas fa-users"></i> --}}
        <i class="nav-cion fas fa fa-industry" aria-hidden="true"></i>
        <p>
            @lang('menu.company_visits.title')
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('leads.index') }}" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            @lang('menu.leads.title')
        </p>
    </a>
</li>

