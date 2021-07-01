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
        
        <li class="nav-item has-treeview {{ ($prefix=='/suppliers')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-shopping-cart"></i>
                <p>
                    Manage Suppliers
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('suppliers.view') }}" class="nav-link {{ ($route=='suppliers.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Suppliers</p>
                    </a>
                </li>
                
            </ul>
        </li>
        
        <li class="nav-item has-treeview {{ ($prefix=='/customers')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-male"></i>
                <p>
                    Manage Customers
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('customers.view') }}" class="nav-link {{ ($route=='customers.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Customers</p>
                    </a>
                </li>
                
            </ul>
        </li>
        
        <li class="nav-item has-treeview {{ ($prefix=='/units')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-universal-access"></i>
                <p>
                    Manage Units
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('units.view') }}" class="nav-link {{ ($route=='units.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Units</p>
                    </a>
                </li>
                
            </ul>
        </li>
        
        <li class="nav-item has-treeview {{ ($prefix=='/categories')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-tasks"></i>
                <p>
                    Manage Category
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('categories.view') }}" class="nav-link {{ ($route=='categories.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Category</p>
                    </a>
                </li>
                
            </ul>
       
        </li>
        
        <li class="nav-item has-treeview {{ ($prefix=='/products')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-tasks"></i>
                <p>
                    Manage Products
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('products.view') }}" class="nav-link {{ ($route=='products.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Products</p>
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/purchases')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-tasks"></i>
                <p>
                    Manage Purchase
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('purchases.view') }}" class="nav-link {{ ($route=='purchases.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Products</p>
                    </a>
                </li>
                
            </ul>
        </li>
        
        <li class="nav-item has-treeview {{ ($prefix=='/invoices')?'menu-open':'' }}">
            <a href="" class="nav-link">
                <i class="nav-icon fa fa-tasks"></i>
                <p>
                    Manage Invoice
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('invoices.view') }}" class="nav-link {{ ($route=='invoices.view')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Invoice</p>
                    </a>
                </li>
                
            </ul>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->