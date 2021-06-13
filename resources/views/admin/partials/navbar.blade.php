<nav class="bg-white main-header navbar navbar-expand navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('website.home') }}" class="nav-link">دیدن وب سایت</a>
        </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="mr-auto navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.home') }}"><i class="ml-2 fa fa-user"></i>پروفایل من</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout"> خروج</a>
        </li>
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="ml-2 fa fa-envelope"></i> 4 پیام جدید
                    <span class="float-left text-sm text-muted">3 دقیقه</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="ml-2 fa fa-users"></i> 8 درخواست دوستی
                    <span class="float-left text-sm text-muted">12 ساعت</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="ml-2 fa fa-file"></i> 3 گزارش جدید
                    <span class="float-left text-sm text-muted">2 روز</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                    class="fa fa-th-large"></i></a>
        </li>
    </ul>
</nav>
