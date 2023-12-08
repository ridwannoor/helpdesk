@extends('layouts.app2')

@section('m-subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">{{ $judul }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                        <span class="m-nav__link-text">{{ $judul }}</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
    @include('component.alertnotification')

    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    @include('user.profile.navprofile') 
                   
                

                    {{-- <div class="m-portlet__body-separator"></div> --}}
    
                  
                </div>			
            </div>	
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    Update Profile
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                    Ganti Password
                                </a>
                            </li>
                            {{-- <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                    History
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="m-portlet__head-tools">
                        
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_user_profile_tab_1">
                        <form class="m-form m-form--fit m-form--label-align-right" action="/user/profile/update" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="PUT" />
                                <input type="hidden" name="id" value="{{Auth::user()->id}}" />
                            </div>  
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10 m--hide">
                                    <div class="alert m-alert m-alert--default" role="alert">
                                        The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                    </div>
                                </div>
    
                             
    
                                <div class="m-card-profile">
                                    <div class="m-card-profile__title m--hide">
                                        Your Profile
                                    </div>
                                    <div class="m-card-profile__pic">
                                        <div class="m-card-profile__pic-wrapper">	
                                            <img src="{{ url('data_file/'.Auth::user()->image) }}" alt=""/>
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details">
                                    <span class="m-card-profile__name">{{Auth::user()->name}}</span>
                                        <a href="#" class="m-card-profile__email m-link">{{Auth::user()->email}}</a>
                                    </div>
                                </div>	
                                {{-- <div class="form-group m-form__group row">
                                    <div class="col-10 ml-auto">
                                        <h3 class="m-form__section">Personal Details</h3>
                                    </div>
                                </div> --}}
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" name="name" type="text" value={{ Auth::user()->name }}>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Lokasi</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value={{ Auth::user()->lokasis->implode('kode' ,',') }} readonly>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Image</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" name="image" type="file" >
                                    </div>
                                </div>
                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
    
                               
    
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                            {{-- <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button> --}}
                                            <a href="/user/profile" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="m_user_profile_tab_2">
                        <form class="m-form m-form--fit m-form--label-align-right" action="/user/profile/update" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="PUT" />
                                <input type="hidden" name="id" value="{{Auth::user()->id}}" />
                                <input type="hidden" name="email" value="{{Auth::user()->email}}" />
                            </div>  
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10 m--hide">
                                    <div class="alert m-alert m-alert--default" role="alert">
                                        The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                    </div>
                                </div>
    
                                <div class="form-group m-form__group row">
                                    <div class="col-10 ml-auto">
                                        <h3 class="m-form__section">Ganti Password</h3>
                                    </div>
                                </div>
    
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Password</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Password Confirmation</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" id="password-confirm" name="password-confirmation" type="password" required>
                                    </div>
                                </div>
                                
                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
    
                               
    
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                            {{-- <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button> --}}
                                            <a href="/user/profile" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="m_user_profile_tab_3">
                        <div class="m-portlet">
                            <div class="m-portlet__body">
                                <div class="row">
                                <div class="col-lg-3">
                                    <div class="card text-left">
                                      <img class="card-img-top" src="holder.js/100px180/" alt="">
                                      <div class="card-body text-center">
                                        <h4 class="card-title ">{{ Auth::user()->banego->count() }}</h4>
                                        <p class="card-text">Berita Acara Negosiasi</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card text-left">
                                      <img class="card-img-top" src="holder.js/100px180/" alt="">
                                      <div class="card-body text-center">
                                        <h4 class="card-title ">{{ Auth::user()->rekappos->count() }}</h4>
                                        <p class="card-text">Purchase Order</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card text-left">
                                      <img class="card-img-top" src="holder.js/100px180/" alt="">
                                      <div class="card-body text-center">
                                        <h4 class="card-title ">{{ Auth::user()->doheaders->count() }}</h4>
                                        <p class="card-text">Delivery Order</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card text-left">
                                      <img class="card-img-top" src="holder.js/100px180/" alt="">
                                      <div class="card-body text-center">
                                        <h4 class="card-title ">{{ Auth::user()->pumheaders->count() }}</h4>
                                        <p class="card-text">PUM</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-4">
                                    <div class="card text-left">
                                      <img class="card-img-top" src="holder.js/100px180/" alt="">
                                      <div class="card-body text-center">
                                        <h4 class="card-title ">{{ Auth::user()->pjpumheaders->count() }}</h4>
                                        <p class="card-text">PJ PUM</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-4">
                                    <div class="card text-left">
                                      <img class="card-img-top" src="holder.js/100px180/" alt="">
                                      <div class="card-body text-center">
                                        <h4 class="card-title ">{{ Auth::user()->baadendumheaders->count() }}</h4>
                                        <p class="card-text">BA Addendum</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-4">
                                    <div class="card text-left">
                                      <img class="card-img-top" src="holder.js/100px180/" alt="">
                                      <div class="card-body text-center">
                                        <h4 class="card-title ">{{ Auth::user()->banegopengadaans->count() }}</h4>
                                        <p class="card-text">BA Nego Pengadaan</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-4">
                                    <div class="card text-left">
                                      <img class="card-img-top" src="holder.js/100px180/" alt="">
                                      <div class="card-body text-center">
                                        <h4 class="card-title ">{{ Auth::user()->spkheaders->count() }}</h4>
                                        <p class="card-text">SPK</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-4">
                                    <div class="card text-left">
                                      <img class="card-img-top" src="holder.js/100px180/" alt="">
                                      <div class="card-body text-center">
                                        <h4 class="card-title ">{{ Auth::user()->sppheaders->count() }}</h4>
                                        <p class="card-text">SPK</p>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            </div>                         
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
@endsection