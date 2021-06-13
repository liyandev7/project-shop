<div class="col-12 col-lg-4 mb-4 mb-lg-0">
    <div class="sidebar-account ">
        <div class="avatar-user d-flex flex-column justify-content-center align-items-center mb-4">
            <img class="img-avatar-user" src="{{ auth()->user()->image }}">
            <div class="name-avatar-user">
                <h4 class="mt-2">
                    {{ auth()->user()->name }}
                </h4>
            </div>
        </div>
        <div class="account-menu d-none d-lg-block">
            <ul class="nav nav-pills nav-pills-account-menu flex-column" role="tablist">
                <li class="nav-item">
                    <h3>داشبورد</h3>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.comments') }}"><i
                            class="fal fa-comment-alt ml-2"></i>دیدگاهها
                        <span class="dropdown-user-account-meta">
                            {{ auth()->user()->comments()->count() }}
                        </span>
                    </a>
                </li>

                <li class="nav-item"> <a class="nav-link" href="{{ route('profile.website.orders') }}"> لیست سفارش ها
                    </a>
                </li>

                <li class="nav-item">
                    <h3>تنظیمات حساب کاربری</h3>
                </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('profile.website') }}">اطلاعات
                        پروفایل</a></li>



                <li class="nav-item"> <a class="nav-link" href="{{ route('profile.bank') }}">تنظیمات شماره حساب</a>
                </li>


                <li class="nav-item"> <a href="/logout"><i class="fal fa-sign-out-alt  ml-2"></i>خروج
                    </a>
                </li>
            </ul>
        </div>
        <div class="area-account-menu-collapse d-block d-lg-none">
            <div class="area-btn-collapse-accountMenu  mb-4">
                <a class="btn btn-5 " href="#area-account-menu" data-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="area-account-menu"> منو اکانت<i
                        class="fas fa-bars mr-2"></i></a>
            </div>
            <div class="collapse account-menu" id="area-account-menu">
                <ul class="nav nav-pills nav-pills-account-menu flex-column" role="tablist">
                    <li class="nav-item">
                        <h3>داشبورد</h3>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="favorits-tab" data-toggle="tab" href="#content1" role="tab"
                            aria-controls="home" aria-selected="true">
                            <i class="fal fa-heart ml-2"></i>علاقه مندی ها <span
                                class="dropdown-user-account-meta">6</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="comment-tab" data-toggle="tab" href="#content2" role="tab"
                            aria-controls="comment" aria-selected="false"><i
                                class="fal fa-comment-alt ml-2"></i>دیدگاهها
                            <span class="dropdown-user-account-meta">5</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#content3" role="tab"
                            aria-controls="contact" aria-selected="false"><i
                                class="fal fa-map-marker-alt ml-2"></i>نشانی ها
                            <span class="dropdown-user-account-meta">15000000</span>
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" id="orders-tab" data-toggle="tab" href="#content4"
                            role="tab" aria-controls="contact4" aria-selected="false"><i
                                class="fal fa-cart-arrow-down ml-2"></i>سفارش
                            ها
                            <span class="dropdown-user-account-meta">1</span> </a></li>

                    <li class="nav-item">
                        <h3>تنظیمات حساب کاربری</h3>
                    </li>

                    <li class="nav-item"> <a class="nav-link" id="infoprofile-tab" data-toggle="tab" href="#content5"
                            role="tab" aria-controls="contact" aria-selected="false">اطلاعات پروفایل</a></li>

                    <li class="nav-item"> <a class="nav-link" id="changePassword-tab" data-toggle="tab" href="#content6"
                            role="tab" aria-controls="contact" aria-selected="false">تغییر
                            رمز عبور </a></li>

                    <li class="nav-item"> <a class="nav-link" id="changTel-tab" data-toggle="tab" href="#content7"
                            role="tab" aria-controls="contact" aria-selected="false">تغییر
                            شماره تلفن </a></li>
                    <li class="nav-item"> <a class="nav-link" id="setting-numberaccount-tab" data-toggle="tab"
                            href="#content8" role="tab" aria-controls="contact" aria-selected="false">تنظیمات شماره
                            حساب</a></li>

                    <li class="nav-item position-relative"> <a class="nav-link" id="notification-tab" data-toggle="tab"
                            href="#content9" role="tab" aria-controls="contact" aria-selected="false">اعلان ها

                        </a>
                        <form action="">
                            <div class="area-switch-checkbox">
                                <input type="checkbox" class="switch-checkbox" name="" id="">
                            </div>
                        </form>
                    </li>

                    <li class="nav-item"> <a href="#"><i class="fal fa-sign-out-alt  ml-2"></i>خروج
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</div>
