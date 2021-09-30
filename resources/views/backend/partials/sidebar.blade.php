@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">E-Bazaar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ (!empty(Auth::user()->image)) ? asset('images/users/'.Auth::user()->image) : asset('images/default/no.jog') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('home') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>


                <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Manage User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{($route=='users.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View User</p>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Manage Profile
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.profiles.index') }}" class="nav-link {{($route=='user.profiles.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.change.password') }}" class="nav-link {{($route=='user.change.password')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>


                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{($prefix=='/customers')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Manage Customer
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customers.show') }}" class="nav-link {{($route=='customers.show')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Customer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customers.draft.show') }}" class="nav-link {{($route=='customers.draft.show')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Graft Customer</p>
                            </a>
                        </li>


                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{($prefix=='/categories')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link {{($route=='categories.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Category</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview {{($prefix=='/brands')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Manage Brand
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('brands.index') }}" class="nav-link {{($route=='brands.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Brand</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item has-treeview {{($prefix=='/products')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Manage Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link {{($route=='products.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{($prefix=='/divisions')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Manage Division
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('divisions.index') }}" class="nav-link {{($route=='divisions.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Division</p>
                            </a>
                        </li>


                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{($prefix=='/districts')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Manage District
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('districts.index') }}" class="nav-link {{($route=='districts.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View District</p>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{($prefix=='/sliders')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-minus-square"></i>
                        <p>
                            Manage Slider
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sliders.index') }}" class="nav-link {{($route=='sliders.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Slider</p>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{($prefix=='/orders')?'menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Manage Order
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('orders.index') }}" class="nav-link {{($route=='orders.index')?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Order</p>
                            </a>
                        </li>

                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>