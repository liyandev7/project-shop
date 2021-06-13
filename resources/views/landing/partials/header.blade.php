<header class="header">
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset($setting->logo) }}" width="120" alt="logo"
                    class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>

            <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link page-scroll text-white" href="{{ route('website.home') }}">
                            صفحه اصلی
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#about">درباره ما</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features"> محصول </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#contact">تماس با ما</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('blog.index') }}"> مجله نامه
                            {{ env('APP_NAME') }}</a>
                    </li>
                    @guest

                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}"> ورود به وب سایت</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('register') }}"> ثبت نام در وب سایت</a>
                        </li>
                    @endguest()

                    @can('show-panel-admin')
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.home') }}">پنل مدیریت</a>
                        </li>

                    @endcan


                    @auth()
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('profile.website') }}"> پروفایل من </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/logout"> خروج </a>
                        </li>


                    @endauth





                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->
</header>
