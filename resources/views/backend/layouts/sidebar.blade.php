@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if(Auth::user()->user_type=='Admin')

            <li class="nav-item has-treeview {{ ($prefix=='/users')?'menu-open':'' }}">
                <a href="" class="nav-link">
                    <i class="nav-icon fa fa-user"></i>
                    <p>
                        Manage User
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.view') }}" class="nav-link {{ ($route=='users.view')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View User</p>
                        </a>
                    </li>
                    
                </ul>
            </li>

        @endif

        <li class="nav-item has-treeview {{ ($prefix=='/profiles')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-user-md"></i>
                <p>
                    Manage Profile
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('profiles.view') }}" class="nav-link {{ ($route=='profiles.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Your Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profiles.password.view') }}" class="nav-link {{ ($route=='profiles.password.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/logos')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-image"></i>
                <p>
                    Manage Logo
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('logos.view') }}" class="nav-link {{ ($route=='logos.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Logo</p>
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/contacts')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-phone-square"></i>
                <p>
                    Manage Contact
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('contacts.view') }}" class="nav-link {{ ($route=='contacts.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Contact</p>
                    </a>
                </li>     

                <li class="nav-item">
                    <a href="{{ route('contacts.communicate') }}" class="nav-link {{ ($route=='contacts.communicate')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Communicate</p>
                    </a>
                </li>     
            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/abouts')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-info-circle"></i>
                <p>
                    Manage About
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('abouts.view') }}" class="nav-link {{ ($route=='abouts.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View About</p>
                    </a>
                </li>
                
            </ul>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->