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
        <div>
            <div class="align-right">
                <a href="/user" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                    <i class="la la-plus m--hide"></i>
                    <i class="la la-undo"> Back</i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
    @include('component.alertnotification')
    <div class="row">
        <div class="col-lg-4">		
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                User Detail
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
            <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="m_form_2" action="/user/jobstore" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="id" value="{{ $user->id }}" />
                    <input type="hidden" name="_method" value="POST" />
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m-form__group--sm row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Username:</label>
                            <div class="col-xl-9 col-lg-9">
                            <span class="m-form__control-static pull-right">{{$user->name}}</span>
                            </div>
                        </div>
                        <div class="form-group m-form__group m-form__group--sm row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email:</label>
                            <div class="col-xl-9 col-lg-9">
                                <span class="m-form__control-static pull-right">{{$user->email}}</span>
                            </div>
                        </div>
                        
                        <br>
                        <div class="form-group m-form__group m-form__group--sm row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Menu:</label>
                            <div class="col-xl-9 col-lg-9">
                                <select class="form-control m-bootstrap-select m_selectpicker" name="menu_id" id="exampleSelect1">
                                    @foreach ($menus as $item)
                                        <option value="{{ $item->id }}">{{ $item->deskripsi }}</option>    
                                    @endforeach
                                </select>
                            </div>                           
                        </div>
                        <br>
                        <div class="form-group m-form__group m-form__group--sm row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Jobs:</label>
                            <div class="col-xl-9 col-lg-9">
                                <div class="m-checkbox-list">
                                    <label class="m-checkbox">
                                    <input type="checkbox" name="create" value="1"> Create
                                    <span></span>
                                    </label>
                                    <label class="m-checkbox">
                                    <input type="checkbox" name="edit" value="1"> Edit 
                                    <span></span>
                                    </label>
                                    <label class="m-checkbox">
                                    <input type="checkbox" name="destroy" value="1">Destroy
                                    <span></span>
                                    </label>
                                    <label class="m-checkbox">
                                    <input type="checkbox" name="show" value="1"> Show
                                    <span></span>
                                    </label>
                                    <label class="m-checkbox">
                                    <input type="checkbox" name="cetak" value="1"> Cetak
                                    <span></span>
                                    </label>
                                    <label class="m-checkbox">
                                    <input type="checkbox" name="publish" value="1"> Publish
                                    <span></span>
                                    </label>
                                    <label class="m-checkbox">
                                        <input type="checkbox" name="approval" value="1"> Approval
                                        <span></span>
                                    </label>
                                </div>
                                {{-- <span class="m-form__control-static pull-right">{{$users->email}}</span> --}}
                            </div>
                        </div>
                        
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-accent">Simpan</button>
                                        <a href="/user" class="btn btn-secondary">Cancel</a>
                                        {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                                    </div>                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    
        <div class="col-lg-8">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Job User Details
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="m_form_3">
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                           
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <table class="table m-table m-table--head-bg-success" id="m_table_1_wrapper">
                                        <thead>
                                          <tr>
                                                {{-- <th>#</th> --}}
                                                <th>Menu</th>
                                                <th>Create</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Show</th>
                                                <th>Cetak</th>
                                                <th>Publish</th>
                                                <th>Approval</th>
                                                <th>Action</th>
                                          </tr>
                                        </thead>
                                        {{-- @php
                                            $no = 1 ;
                                        @endphp --}}
                                        <tbody>
                                            @foreach ($user->userdetails as $item)
                                            <tr>
                                                {{-- <td>{{$no++}}</td> --}}
                                                <td>{{$item->menu->deskripsi}}</td>
                                                <td>
                                                    @if ($item->create)
                                                        <span class="m-badge m-badge--info m-badge--wide">Yes</span>
                                                    @else
                                                        <span class="m-badge m-badge--secondary m-badge--wide">No</span>
                                                    @endif 
                                                </td>
                                                <td>   
                                                    @if ($item->edit)
                                                    <span class="m-badge m-badge--info m-badge--wide">Yes</span>
                                                @else
                                                    <span class="m-badge m-badge--secondary m-badge--wide">No</span>
                                                @endif 
                                                </td>
                                                <td>
                                                    @if ($item->destroy)
                                                    <span class="m-badge m-badge--info m-badge--wide">Yes</span>
                                                @else
                                                    <span class="m-badge m-badge--secondary m-badge--wide">No</span>
                                                @endif     
                                                </td>
                                                <td>
                                                @if ($item->show)
                                                    <span class="m-badge m-badge--info m-badge--wide">Yes</span>
                                                @else
                                                    <span class="m-badge m-badge--secondary m-badge--wide">No</span>
                                                @endif     
                                                </td>
                                                <td>
                                                    @if ($item->cetak)
                                                    <span class="m-badge m-badge--info m-badge--wide">Yes</span>
                                                @else
                                                    <span class="m-badge m-badge--secondary m-badge--wide">No</span>
                                                @endif     
                                                </td>
                                                <td>
                                                    @if ($item->publish)
                                                    <span class="m-badge m-badge--info m-badge--wide">Yes</span>
                                                @else
                                                    <span class="m-badge m-badge--secondary m-badge--wide">No</span>
                                                @endif     
                                                </td>
                                                <td>
                                                    @if ($item->approval)
                                                    <span class="m-badge m-badge--info m-badge--wide">Yes</span>
                                                @else
                                                    <span class="m-badge m-badge--secondary m-badge--wide">No</span>
                                                @endif     
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                            {{-- <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-visible"></i></a> --}}
                                                            {{-- <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-edit"></i></a> --}}
                                                    <a href="/user/jobdestroy/{{$item->id}}" onclick="return confirm('Are you sure? Delete ')" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-delete"></i></a>
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                         
                                        </tbody>
                                  </table>
                              
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>
                   
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>		        </div>
    
</div>
    
@endsection


@section('footer-script')
    
    <script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
@endsection