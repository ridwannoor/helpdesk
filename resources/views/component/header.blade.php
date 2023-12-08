<header id="m_header" class="m-grid__item m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">
            <!-- BEGIN: Brand -->
            <div class="m-stack__item m-brand  m-brand--skin-light ">
                <div class="m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        {{-- @foreach ($pref as $item) --}}

                        <a href="/home" class="m-brand__logo-wrapper">
                            <img alt="" src="{{ url('data_file/'.$pref->image) }}" width="150px" />
                        </a>

                        {{-- @endforeach --}}
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools">

                        <!-- BEGIN: Left Aside Minimize Toggle -->
                        <a href="javascript:;" id="m_aside_left_minimize_toggle"
                            class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                            <span></span>
                        </a>
                        <!-- END -->

                        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                            class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->



                        <!-- BEGIN: Responsive Header Menu Toggler -->
                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                            class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->


                        <!-- BEGIN: Topbar Toggler -->
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                            class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                            <i class="flaticon-more"></i>
                        </a>
                        <!-- BEGIN: Topbar Toggler -->
                    </div>
                </div>
            </div>
            <!-- END: Brand -->
            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                <!-- BEGIN: Horizontal Menu -->
                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
                    id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>

                <div id="m_header_menu"
                    class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
                    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                        {{-- <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click"
                            m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:;"
                                class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i
                                    class="m-menu__link-icon flaticon-add"></i><span
                                    class="m-menu__link-text">Actions</span><i
                                    class="m-menu__hor-arrow la la-angle-down"></i><i
                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span
                                    class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                            href="index07a2.html?page=header/actions&amp;demo=default"
                                            class="m-menu__link "><i class="m-menu__link-icon flaticon-file"></i><span
                                                class="m-menu__link-text">Create New Post</span></a></li>
                                    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a
                                            href="index07a2.html?page=header/actions&amp;demo=default"
                                            class="m-menu__link "><i
                                                class="m-menu__link-icon flaticon-diagram"></i><span
                                                class="m-menu__link-title"> <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">Generate Reports</span>
                                                    <span class="m-menu__link-badge"><span
                                                            class="m-badge m-badge--success">2</span></span>
                                                </span></span></a></li>
                                    <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover"
                                        m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:;"
                                            class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i
                                                class="m-menu__link-icon flaticon-business"></i><span
                                                class="m-menu__link-text">Manage Orders</span><i
                                                class="m-menu__hor-arrow la la-angle-right"></i><i
                                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                            <span class="m-menu__arrow "></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span class="m-menu__link-text">Latest
                                                            Orders</span></a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span class="m-menu__link-text">Pending
                                                            Orders</span></a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span class="m-menu__link-text">Processed
                                                            Orders</span></a></li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span class="m-menu__link-text">Delivery
                                                            Reports</span></a></li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span
                                                            class="m-menu__link-text">Payments</span></a></li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span
                                                            class="m-menu__link-text">Customers</span></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover"
                                        m-menu-link-redirect="1" aria-haspopup="true"><a href="#"
                                            class="m-menu__link m-menu__toggle"><i
                                                class="m-menu__link-icon flaticon-chat-1"></i><span
                                                class="m-menu__link-text">Customer Feedbacks</span><i
                                                class="m-menu__hor-arrow la la-angle-right"></i><i
                                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                            <span class="m-menu__arrow "></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span class="m-menu__link-text">Customer
                                                            Feedbacks</span></a></li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span class="m-menu__link-text">Supplier
                                                            Feedbacks</span></a></li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span class="m-menu__link-text">Reviewed
                                                            Feedbacks</span></a></li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span class="m-menu__link-text">Resolved
                                                            Feedbacks</span></a></li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="index07a2.html?page=header/actions&amp;demo=default"
                                                        class="m-menu__link "><span class="m-menu__link-text">Feedback
                                                            Reports</span></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a
                                            href="index07a2.html?page=header/actions&amp;demo=default"
                                            class="m-menu__link "><i class="m-menu__link-icon flaticon-users"></i><span
                                                class="m-menu__link-text">Register Member</span></a></li>
                                </ul>
                            </div>
                        </li> --}}

                        {{-- <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click"
                            m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:;"
                                class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i
                                    class="m-menu__link-icon flaticon-paper-plane"></i><span class="m-menu__link-title">
                                    <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Reports</span> <span
                                            class="m-menu__link-badge"><span
                                                class="m-badge m-badge--brand m-badge--wide">new</span></span>
                                    </span></span><i class="m-menu__hor-arrow la la-angle-down"></i><i
                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span
                                    class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                  <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a
                                            href="/rekapdo"
                                            class="m-menu__link "><i
                                                class="m-menu__link-icon flaticon-business"></i><span
                                                class="m-menu__link-text">Rekap Delivery Order</span></a></li>
                                    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a
                                            href="/rekappo"
                                            class="m-menu__link "><i class="m-menu__link-icon flaticon-map"></i><span
                                                class="m-menu__link-text">Rekap Purchase Order</span></a></li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <!-- END: Horizontal Menu -->
                <!-- BEGIN: Topbar -->
                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">


                    <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">
                            
                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                m-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-topbar__userpic">
                                        <img src="{{ url('data_file/'.Auth::user()->image) }}"
                                            class="m--img-rounded m--marginless" alt="" />
                                    </span>
                                    <span class="m-topbar__username m--hide">Nick</span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span
                                        class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center"
                                            style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                            <div class="m-card-user m-card-user--skin-dark">
                                                <div class="m-card-user__pic">
                                                    <img src="{{ url('data_file/'.Auth::user()->image) }}"
                                                        class="m--img-rounded m--marginless" alt="image" />
                                                    <!--
                <span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>
                -->
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span
                                                        class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
                                                    <a href="#"
                                                        class="m-card-user__email m--font-weight-300 m-link">{{ Auth::user()->email }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav m-nav--skin-light">
                                                    <li class="m-nav__section m--hide">
                                                        <span class="m-nav__section-text">Section</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="/user/profile" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                            <span class="m-nav__link-title">
                                                                <span class="m-nav__link-wrap">
                                                                    <span class="m-nav__link-text">
                                                                        Profile</span>
                                                                    {{-- <span class="m-nav__link-badge"><span
                                                                            class="m-badge m-badge--success">2</span></span> --}}
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    {{-- <li class="m-nav__item">
                                                        <a href="/cartlist" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-bag"></i>
                                                            <span class="m-nav__link-title">
                                                                <span class="m-nav__link-wrap">
                                                                    <span class="m-nav__link-text">Keranjang List</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li> --}}
                                                    {{-- <li class="m-nav__item">
                                                        <a href="indexa80c.html?page=header/profile&amp;demo=default"
                                                            class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">Activity</span>
                                                        </a>
                                                    </li> --}}
                                                    {{-- <li class="m-nav__item">
                                                        <a href="indexa80c.html?page=header/profile&amp;demo=default"
                                                            class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">Messages</span>
                                                        </a>
                                                    </li> --}}
                                                    <li class="m-nav__separator m-nav__separator--fit">
                                                    </li>
                                                    {{-- <li class="m-nav__item">
                                                        <a href="indexa80c.html?page=header/profile&amp;demo=default"
                                                            class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">FAQ</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="indexa80c.html?page=header/profile&amp;demo=default"
                                                            class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">Support</span>
                                                        </a>
                                                    </li> --}}
                                                    <li class="m-nav__separator m-nav__separator--fit">
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                                                            class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>

                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            {{-- <li id="m_quick_sidebar_toggle" class="m-nav__item">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-icon"><i class="flaticon-grid-menu"></i></span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <!-- END: Topbar -->
            </div>
        </div>
    </div>
</header>