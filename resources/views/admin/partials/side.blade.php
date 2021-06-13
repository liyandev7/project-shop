<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="image">
                    <img src="{{ auth()->user()->image }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('profile.home') }}" class="d-block">
                        {{ auth()->user()->name }}
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview {{ request()->is('admin/panel') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}"
                                    class="nav-link {{ request()->is('admin/panel') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه اصلی</p>
                                </a>
                            </li>


                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->is('admin/panel/location*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/location*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-location-arrow"></i>
                            <p>
                                مدیریت استان ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('provinces.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/location/provinces*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت استان ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cities.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/location/cities*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت شهر ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('areas.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/location/areas*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت منظقه ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="nav-item has-treeview {{ request()->is('admin/panel/categories*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/categories*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-clone"></i>
                            <p>
                                دسته بندی ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/categories*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت دسته بندی ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->is('admin/panel/users*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/users*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                مدیریت کاربرها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/users*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت کاربر ها</p>
                                </a>
                            </li>

                        </ul>


                    </li>

                    <li class="nav-item has-treeview {{ request()->is('admin/panel/blogs*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/blogs*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-podcast"></i>
                            <p>
                                مدیریت پست ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('blogs.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/blogs*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت پست ها</p>
                                </a>
                            </li>

                        </ul>


                    </li>
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/panel/products*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/products*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>
                                مدیریت محصولات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('products.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/products*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت محصول ها</p>
                                </a>
                            </li>

                        </ul>


                    </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/panel/orders*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/orders*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-first-order"></i>
                            <p>
                                مدیریت سفارش ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('orders.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/orders*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت سفارش ها</p>
                                </a>
                            </li>

                        </ul>


                    </li>
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/panel/peyments*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/peyments*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-money"></i>
                            <p>
                                مدیریت پرداخت ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('peyments.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/peyments*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت پرداخت ها</p>
                                </a>
                            </li>

                        </ul>


                    </li>

                    <li
                        class="nav-item has-treeview {{ request()->is('admin/panel/options*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/options*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-money"></i>
                            <p>
                                مدیریت تنظیمات قیمت ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('options.index') }}"
                                   class="nav-link {{ request()->is('admin/panel/options*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>   مدیریت تنظیمات قیمت ها</p>
                                </a>
                            </li>

                        </ul>


                    </li>
                    <li
                    class="nav-item has-treeview {{ request()->is('admin/panel/fonts*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/panel/fonts*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-font-awesome"></i>
                        <p>
                            مدیریت فونت ها
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fonts.index') }}"
                                class="nav-link {{ request()->is('admin/panel/fonts*') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>مدیریت فونت ها</p>
                            </a>
                        </li>

                    </ul>


                </li>
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/panel/services*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/services*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-server"></i>
                            <p>
                                مدیریت سرویس ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('services.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/services*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت سرویس </p>
                                </a>
                            </li>

                        </ul>


                    </li>



                    <li
                        class="nav-item has-treeview {{ request()->is('admin/panel/comments*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/comments*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-comment"></i>
                            <p>
                                مدیریت نظرات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('comments.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/comments*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت نظر ها</p>
                                </a>
                            </li>

                        </ul>


                    </li>


                    <li
                        class="nav-item has-treeview {{ request()->is('admin/panel/settings*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/settings*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-share"></i>
                            <p>
                                مدیریت وب سایت
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('settings.edit', ['setting' => 1]) }}"
                                    class="nav-link {{ request()->is('admin/panel/settings*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت تنظیمات </p>
                                </a>
                            </li>

                        </ul>




                    </li>


                    <li class="nav-item has-treeview {{ request()->is('admin/panel/brands*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/brands*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-circle-o"></i>
                            <p>
                                مدیریت برند های سایت
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('brands.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/brands*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت برند </p>
                                </a>
                            </li>

                        </ul>


                    </li>

                    <li
                        class="nav-item has-treeview {{ request()->is('admin/panel/contacts*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/panel/contacts*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-circle-o"></i>
                            <p>
                                مدیریت تیکت
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('contacts.index') }}"
                                    class="nav-link {{ request()->is('admin/panel/contacts*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت تیکت </p>
                                </a>
                            </li>

                        </ul>


                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
