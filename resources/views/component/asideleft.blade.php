{{-- <div id="m_aside_left" class="m-grid__item m-aside-left  m-aside-left--skin-light ">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " m-menu-vertical="1"
        m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            @foreach ($users as $item)       
                <li class="m-menu__item " aria-haspopup="true">
                    <a href="{{ $item->menu->link }}" class="m-menu__link ">
<i class="m-menu__link-icon {{ $item->menu->icon }}"></i><span class="m-menu__link-title">
    <span class="m-menu__link-wrap"> <span class="m-menu__link-text">{{ $item->menu->deskripsi }}</span>
        <span class="m-menu__link-badge"></span> </span></span> </a>
</li>
@endforeach
</ul>
</div>
</div> --}}


<div id="m_aside_left" class="m-grid__item m-aside-left  m-aside-left--skin-light ">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light "
        m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            @foreach ($users as $item)
                @php
                $mainmenu = $item->menu->where('parent_id', 0)->orderBy('deskripsi', 'ASC')->get();
                @endphp
                @foreach ($mainmenu as $mn)
                @php
                $submenu = $item->menu->where('parent_id', $mn->id)->orderBy('deskripsi', 'ASC')->get();
                @endphp
                {{-- @if ($submenu->num_rows() > 0) --}}
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle"><i
                                class="m-menu__link-icon flaticon-layers"></i><span
                                class="m-menu__link-text">{{ $mn->deskripsi }}</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>

                        <div class="m-menu__submenu"><span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span
                                        class="m-menu__link"><span class="m-menu__link-text">{{ $mn->deskripsi }}</span></span>
                                </li>
                                @foreach ($submenu as $sm)
                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="{{ $sm->link }}" class="m-menu__link">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text">{{ $sm->deskripsi }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                {{-- @else
                <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ $item->menu->link }}" class="m-menu__link ">
            <i class="m-menu__link-icon {{ $item->menu->icon }}"></i><span class="m-menu__link-title">
                <span class="m-menu__link-wrap"> <span class="m-menu__link-text">{{ $item->menu->deskripsi }}</span>
                    <span class="m-menu__link-badge"></span> </span></span> </a>
            </li>
                @endif --}}
               
                @endforeach
                @break($mainmenu)
            @endforeach
           
        </ul>
    </div>
</div>
