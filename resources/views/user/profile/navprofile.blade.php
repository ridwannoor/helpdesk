<ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
    <li class="m-nav__separator m-nav__separator--fit"></li>
    <li class="m-nav__section m--hide">
        <span class="m-nav__section-text">Section</span>
    </li>
    <li class="m-nav__item">
        <a href="/user/profile" class="m-nav__link">
            <i class="m-nav__link-icon flaticon-profile-1"></i>
            <span class="m-nav__link-title">  
                <span class="m-nav__link-wrap">      
                    <span class="m-nav__link-text">My Profile</span>      
                    {{-- <span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>   --}}
                </span>
            </span>
        </a>
    </li>
    <li class="m-nav__item">
        <a href="/user/cartlist" class="m-nav__link">
        <i class="m-nav__link-icon flaticon-bag"></i>
            <span class="m-nav__link-text">Keranjang</span>
        </a>
    </li>
    <li class="m-nav__item">
        <a href="/user/history/{{ Auth::user()->id }}" class="m-nav__link">
        <i class="m-nav__link-icon flaticon-clock-1"></i>
            <span class="m-nav__link-text">History</span>
        </a>
    </li>
</ul>