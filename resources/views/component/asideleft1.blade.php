<div id="m_aside_left" class="m-grid__item m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
        m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item " aria-haspopup="true"><a
                    href="/home" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title">
                        <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span>
                           </span></span></a></li>
            @php
                // $menus = $users::where('parentmenu', 0)->get();
                // foreach ($menus as $key) {
                //     get_menu_child($key->id);   
                // }

                // function get_menu_child($parent=0){
                //     $menu = App\Models\Menu::where('parentmenu', $parent)->get();
                //     $parent = App\Models\Menu::where('id', $parent)->first();
                // }
            @endphp
            
            {{-- @foreach ($users as $item)
                @if ($menus) --}}
                    <li class="m-menu__section ">
                    <h4 class="m-menu__section-text">Master Data</h4>
                    <i class="m-menu__section-icon flaticon-more-v2"></i>
                    </li>
                {{-- @endif
                
            @endforeach --}}
           
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/vendor" class="m-menu__link "><i
                    class="m-menu__link-icon fa fa-hotel"></i><span
                    class="m-menu__link-text">Vendor</span></a></li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/category" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-interface-9"></i><span
                    class="m-menu__link-text">Category</span></a></li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/jenis" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-interface-9"></i><span
                    class="m-menu__link-text">Jenis</span></a></li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/lokasi" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-map-location"></i><span
                    class="m-menu__link-text">Lokasi</span></a></li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/barang" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-box"></i><span
                    class="m-menu__link-text">Barang</span></a></li>
            

            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Detail Perusahaan</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="#" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-list"></i><span
                    class="m-menu__link-text">List Perusahaan</span></a>
            </li> 
            
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Transaction</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="#" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-list"></i><span
                    class="m-menu__link-text">Barang Keluar</span></a>
            </li> 
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/brgmasuk" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-list"></i><span
                    class="m-menu__link-text">Barang Masuk</span></a>
            </li> 
            

            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Surat</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="#" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-list"></i><span
                    class="m-menu__link-text">Surat Keluar</span></a>
            </li> 
            
            <li class="m-menu__item " aria-haspopup="true"><a
                href="#" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-list"></i><span
                    class="m-menu__link-text">Surat Masuk</span></a>
            </li> 
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Purchase Order</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/rekappo" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-list"></i><span class="m-menu__link-title">
                        <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Rekap PO</span>
                            </span></span></a>
            </li> 
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Delivery Order</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/do" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-list"></i><span
                    class="m-menu__link-text">Delivery Order</span></a>
            </li>  
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/receivedo" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-interface-5"></i><span
                    class="m-menu__link-text">Good Receive</span></a>
            </li>    
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/rekapdo" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-interface-5"></i><span class="m-menu__link-title">
                        <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Rekap DO</span>
                             </span></span></a>
            </li>           
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Tools</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item " aria-haspopup="true"><a
                    href="/preference" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-settings"></i><span
                        class="m-menu__link-text">Preferences</span></a></li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/user" class="m-menu__link "><i
                    class="m-menu__link-icon flaticon-user-settings"></i><span
                    class="m-menu__link-text">User</span></a></li>
            <li class="m-menu__item " aria-haspopup="true"><a
                href="/menu" class="m-menu__link "><i
                    class="m-menu__link-icon fa fa-list"></i><span
                    class="m-menu__link-text">Menu</span></a></li>
        </ul> 
    </div>
    <!-- END: Aside Menu -->
</div>