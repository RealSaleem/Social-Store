<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->
    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Main -->
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link  {{(request()->is('home*')) ? 'active' : ''}}">
                        <i class="icon-home4"></i>
                        <span>
                            {{trans('site.dashboard')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link {{(request()->is('user*')) ? 'active' : ''}}">
                        <i class="icon-users4"></i>
                        <span>
                            {{trans('site.app_users')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link {{(request()->is('category*')) ? 'active' : ''}}">
                        <i class="icon-grid4"></i>
                        <span>
                            {{trans('site.categories')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('country.index')}}" class="nav-link {{(request()->is('country*')) ? 'active' : ''}}">
                        <i class="icon-earth"></i>
                        <span>
                            {{trans('site.countries')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ads.index')}}" class="nav-link {{(request()->is('ads*')) ? 'active' : ''}}">
                        <i class="icon-list2"></i>
                        <span>
                            {{trans('site.ads')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('notification.index')}}" class="nav-link {{(request()->is('notification*')) ? 'active' : ''}}">
                        <i class="icon-bubbles3"></i>
                        <span>
                            {{trans('site.notifications')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('reportedusers.index')}}" class="nav-link {{(request()->is('reportedusers*')) ? 'active' : ''}}">
                        <i class="icon-user-cancel"></i>
                        <span>
                            {{trans('site.reported_users')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('reportedposts.index')}}" class="nav-link {{(request()->is('reportedposts*')) ? 'active' : ''}}">
                        <i class="icon-stack4"></i>
                        <span>
                            {{trans('site.reported_posts')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('contact.index')}}" class="nav-link {{(request()->is('contact*')) ? 'active' : ''}}">
                        <i class="icon-address-book"></i>
                        <span>
                            {{trans('site.contact_us')}}
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('about.index')}}" class="nav-link {{(request()->is('about*')) ? 'active' : ''}}">
                        <i class="icon-bubble-notification"></i>
                        <span>
                            {{trans('site.about_us')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('privacy.index')}}" class="nav-link {{(request()->is('privacy*')) ? 'active' : ''}}">
                        <i class="icon-pencil7"></i>
                        <span>
                            {{trans('site.privacy_policy')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('terms.index')}}" class="nav-link {{(request()->is('terms*')) ? 'active' : ''}}">
                        <i class="icon-book2"></i>
                        <span>
                            {{trans('site.terms_conditions')}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('setting.index')}}" class="nav-link {{(request()->is('setting*')) ? 'active' : ''}}">
                        <i class="icon-cogs"></i>
                        <span>
                            {{trans('site.settings')}}
                        </span>
                    </a>
                </li>
                {{-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-select2"></i> <span>Pickers</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Pickers">
                        <li class="nav-item"><a href="picker_date.html" class="nav-link">Date &amp; time pickers</a></li>
                        <li class="nav-item"><a href="picker_color.html" class="nav-link">Color pickers</a></li>
                        <li class="nav-item"><a href="picker_location.html" class="nav-link">Location pickers</a></li>
                    </ul>
                </li> --}}
                <!-- /forms -->
            </ul>
        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>