<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<!-- Mirrored from keenthemes.com/metronic/preview/?page=snippets/pages/user/login-2&demo=default by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Mar 2019 09:52:02 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

@include('component.head')

<!-- end::Head -->


<!-- begin::Body -->

<body
    class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <div class="m-grid m-grid--hor m-grid--root m-page">
       <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1"
            id="m_login" style="background-image: url(assets/app/media/img/bg/bg-1.jpg);">
            <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
                <div class="m-login__container">
                    <div class="m-login__logo">
                        <a href="#">
                            @foreach ($pref as $item)
                             <img alt="" src="{{ url('data_file/'.$item->image) }}" width="300px"/>
                            @endforeach
                            {{-- <img src="assets/app/media/img/logos/logo-1.png"> --}}
                        </a>
                    </div>
                    <div class="m-login__signin">
                        <div class="m-login__head">
                            <h3 class="m-login__title">Sign In To Admin</h3>
                        </div>
                        <form class="m-login__form m-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text"
                                    value="{{ old('email') }}" name="email" autocomplete="email" autofocus>
                            </div>
                            <div class="form-group m-form__group">
                                <input
                                    class="form-control m-input m-login__form-input--last"
                                    type="password" name="password" required autocomplete="current-password">
                            </div>
                            <div class="row m-login__form-sub">
                                <div class="col m--align-left m-login__form-left">
                                    <label class="m-checkbox  m-checkbox--light">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('Remember Me') }}
                                        <span></span>
                                    </label>
                                </div>
                                {{-- <div class="col m--align-right m-login__form-right">
                                    @if (Route::has('password.request'))
                                    <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password
                                        ?</a>
                                    @endif
                                </div> --}}
                            </div>
                            <div class="m-login__form-action">
                                <button type="submit"
                                    class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">Sign
                                    In</button>
                            </div>
                        </form>
                    </div>
                    {{-- <a href="http://" blank></a> --}}
                    <div class="m-login__head">
                        {{-- <h3 class="m-login__title">Sign Up</h3> --}}
                        <div class="m-login__desc">Copyright © 2020  - Logistic Officer</div>
                        <div class="m-login__desc">Petunjuk Pengoperasian  <a href="https://drive.google.com/file/d/1son0G0h8bEni_hcjbg_IowX67Z-7S22Y/view?usp=sharing" target="_blank"><strong> Manual Book</strong></a></div>
                    </div>
                    {{-- <div class="m-login__signup">
                        <div class="m-login__head">
                            <h3 class="m-login__title">Sign Up</h3>
                            <div class="m-login__desc">Enter your details to create your account:</div>
                        </div>
                        <form class="m-login__form m-form" action="#">
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" placeholder="Fullname" name="fullname">
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" placeholder="Email" name="email"
                                    autocomplete="off">
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="password" placeholder="Password"
                                    name="password">
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input m-login__form-input--last" type="password"
                                    placeholder="Confirm Password" name="rpassword">
                            </div>
                            <div class="row form-group m-form__group m-login__form-sub">
                                <div class="col m--align-left">
                                    <label class="m-checkbox m-checkbox--light">
                                        <input type="checkbox" name="agree">I Agree the <a href="#"
                                            class="m-link m-link--focus">terms and conditions</a>.
                                        <span></span>
                                    </label>
                                    <span class="m-form__help"></span>
                                </div>
                            </div>
                            <div class="m-login__form-action">
                                <button id="m_login_signup_submit"
                                    class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign
                                    Up</button>&nbsp;&nbsp;
                                <button id="m_login_signup_cancel"
                                    class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
                            </div>
                        </form>
                    </div> --}}
                    <div class="m-login__forget-password">
                        <div class="m-login__head">
                            <h3 class="m-login__title">Forgotten Password ?</h3>
                            <div class="m-login__desc">Enter your email to reset your password:</div>
                        </div>
                        <form class="m-login__form m-form" action="{{ route('password.email') }}" method="POST">
                            @csrf

                            
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" placeholder="Email" name="email"
                                    id="m_email"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="m-login__form-action">
                                <button id="m_login_forget_password_submit"
                                    class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Request</button>&nbsp;&nbsp;
                                <button id="m_login_forget_password_cancel"
                                    class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="m-login__account">
				<span class="m-login__account-msg">
				Don't have an account yet ?
				</span>&nbsp;&nbsp;
				<a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">Sign Up</a>
			</div> --}}
                </div>
            </div>
        </div>


    </div>
    <!-- end:: Page -->

    @include('component.script')
   

</body>
<!-- end::Body -->

<!-- Mirrored from keenthemes.com/metronic/preview/?page=snippets/pages/user/login-2&demo=default by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Mar 2019 09:53:05 GMT -->

</html>
