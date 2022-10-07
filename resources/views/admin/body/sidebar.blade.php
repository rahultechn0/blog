<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="mt-3 text-center user-profile">
            <div class="">
                <a href="{{ route('adminProfile') }}">
                    <img src="{{ !empty($userData->image) ? asset('upload/adminProfile/'.$userData->image): asset('upload/no_image.png') }}" alt="" class="avatar-md rounded-circle">
                </a>
            </div>
            <div class="mt-3">
                <a href="{{ route('adminProfile') }}">
                    <h4 class="mb-1 font-size-16">{{ !empty($userData->name) ? $userData->name : 'Admin'  }}</h4>
                    <span class="text-muted"><i class="align-middle ri-record-circle-line font-size-14 text-success"></i> Online</span>
                </a>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Home Slider Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('slider') }}">Slider</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('about') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i></span>
                        <span>About Us</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('index.multi.image') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i></span>
                        <span>Multi Image</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('blog.category.index') }}">Blog Category</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('blog.contact.info') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i></span>
                        <span>Contact</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
