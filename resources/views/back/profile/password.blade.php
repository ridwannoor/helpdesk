@extends('back.layouts.app')

@section('header-script')

@endsection


@section('m-content')
<div class="m-content">
    <div class="row">
        @include('component.alertnotification')
        <div class="col-md-12">
            <div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--rounded">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                               <i class="fa fa-key" aria-hidden="true"></i> &nbsp   Ganti Password
                            </h3>
                        </div>
                    </div>                   
                </div>
                <form class="m-form m-form--fit m-form--label-align-right" action="/vendor/profile/gantipassword/update" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{Auth::user('vendor')->id}}" />
                    </div>
                    <div class="m-portlet__body">
                        <div class="col-md-6">
                        <div class="form-group m-form__group">
                            <div class="form-group m-form__group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control m-input" id="password"  name="password" required>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <div class="form-group m-form__group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control m-input" id="password-confirm"  name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection