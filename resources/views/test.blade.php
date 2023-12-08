<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
    m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        @foreach ($users as $item)
        @php
            $cek_parent=$this->db->get_where('menu', array('menu_order'=>0))->result();
            if (($cek_parent->num_rows())>0) {
                '<li class="m-menu__item " aria-haspopup="true"><a href="{{ $item->id }}"
                class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span
                    class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span
                            class="m-menu__link-text">Dashboard</span> <span class="m-menu__link-badge"><span
                                class="m-badge m-badge--danger">2</span></span> </span></span></a></li>'
        
            }
        @endphp
            
        <li class="m-menu__item " aria-haspopup="true"><a href="index9bfb.html?page=index&amp;demo=default"
                class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span
                    class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span
                            class="m-menu__link-text">Dashboard</span> <span class="m-menu__link-badge"><span
                                class="m-badge m-badge--danger">2</span></span> </span></span></a></li>
        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                href="javascript:;" class="m-menu__link m-menu__toggle"><i
                    class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-text">Base</span><i
                    class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span
                                class="m-menu__link-text">Base</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true"><a
                            href="indexd68c.html?page=components/base/state&amp;demo=default" class="m-menu__link "><i
                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                class="m-menu__link-text">State Colors</span></a></li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle"><i
                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                class="m-menu__link-text">Tabs</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item " aria-haspopup="true"><a
                                        href="index1f9d.html?page=components/base/tabs/bootstrap&amp;demo=default"
                                        class="m-menu__link "><i
                                            class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                            class="m-menu__link-text">Bootstrap Tabs</span></a></li>
                                <li class="m-menu__item " aria-haspopup="true"><a
                                        href="index64cb.html?page=components/base/tabs/line&amp;demo=default"
                                        class="m-menu__link "><i
                                            class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                            class="m-menu__link-text">Line Tabs</span></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>               
        @endforeach
    </ul>
</div>


<div id="m_aside_left" class="m-grid__item m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
        m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item " aria-haspopup="true"><a href="/home" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title">
                        <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span>
                        </span></span></a></li>
            @foreach ($users as $item)
            <li class="m-menu__item " aria-haspopup="true"><a href="{{$item->menu->link}}" class="m-menu__link "><i
                        class="m-menu__link-icon {{$item->menu->icon}}"></i><span
                        class="m-menu__link-text">{{$item->menu->deskripsi}}</span></a></li>
            @endforeach
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
