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
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
        <div class="m-portlet">
            
            <div class="m-portlet__body">
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--success" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_1" role="tab">Preference</a>
                    </li>
                   
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_2" role="tab">Slider</a>
                    </li>
                </ul>                        
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
                        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                            <div class="m-portlet__body">	
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Nama Perusahaan:</label>
                                    <div class="col-lg-5">
                                        {{-- @foreach ($pref as $item) --}}
                                            <input type="email" class="form-control m-input " readonly value="{{ $pref->nama_perusahaan }}">
                                            <span class="m-form__help">Please enter your full name</span>
                                        {{-- @endforeach --}}
                                    </div>
                                    <label class="col-lg-2 col-form-label">Contact Number:</label>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                                {{-- @foreach ($pref as $item) --}}
                                             <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                            <input type="text" name="phone" class="form-control m-input" readonly value="{{ $pref->phone }}" >
                                                {{-- @endforeach                                    --}}
                                        </div>
                                        <span class="m-form__help">Please enter your contact number</span>
                                    </div>
                                    
                                </div>	 
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Email:</label>
                                    <div class="col-lg-5">
                                        {{-- @foreach ($pref as $item) --}}
                                            <input type="email" class="form-control m-input" readonly value="{{ $pref->email }}">
                                            <span class="m-form__help">Please enter your email</span>
                                        {{-- @endforeach --}}
                                    </div>
                                    {{-- <div class="form-group m-form__group row"> --}}
                                        <label class="col-lg-2 col-form-label">Image:</label>
                                        <div class="col-lg-3">
                                            <div class="m-input-icon m-input-icon--right">
                                                <div class="custom-file">
                                                    {{-- @foreach ($pref as $item) --}}
                                                        <img src="{{ url('data_file/'.$pref->image) }}" style="width: 150px; ">
                                                    {{-- @endforeach --}}
                                                    {{-- <input type="file" class="custom-file-input" id="customFile" readonly> --}}
                                                    {{-- <label class="custom-file-label" for="customFile" >Choose file </label> --}}
                                              </div>
                                            </div>
                                            {{-- @foreach ($pref as $item) --}}
                                                  <span class="m-form__help">{{ $pref->image }}</span>
                                            {{-- @endforeach --}}
                                          
                                        </div>
                                        <div class="col-lg-2">
                                            
                                            <div class="input-group">
            
                                                    {{-- @foreach ($pref as $item) --}}
                                                    <img class="rounded img-fluid" src="{{ asset('/storage/preference/'.$pref->image)}}" alt="" width="150px" />
                                                 {{-- <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                <input type="text" name="phone" class="form-control m-input" readonly value="{{ $item->phone }}" > --}}
                                                    {{-- @endforeach --}}
                                               
                                            </div>
                                            {{-- <span class="m-form__help">Please enter your contact number</span> --}}
                                        </div>
                                    {{-- </div>	 --}}
                                </div>	      
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Address:</label>
                                    <div class="col-lg-5">
                                        <div class="m-input-icon m-input-icon--right">
                                                {{-- @foreach ($pref as $item) --}}
                                            <textarea class="form-control m-input" readonly rows="3">{{ $pref->address }}</textarea>
                                                {{-- @endforeach --}}

                                            <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                                        </div>
                                        <span class="m-form__help">Please enter your address</span>
                                    </div>
                                       {{-- <div class="form-group m-form__group row"> --}}
                                        <label class="col-lg-2 col-form-label">Logo:</label>
                                        <div class="col-lg-3">
                                            <div class="m-input-icon m-input-icon--right">
                                                <div class="custom-file">
                                                    {{-- @foreach ($pref as $item) --}}
                                                        <img src="{{ url('data_file/'.$pref->logo) }}" style="width: 50px; ">
                                                    {{-- @endforeach --}}
                                                    {{-- <input type="file" class="custom-file-input" id="customFile" readonly> --}}
                                                    {{-- <label class="custom-file-label" for="customFile" >Choose file </label> --}}
                                              </div>
                                            </div>
                                            {{-- @foreach ($pref as $item) --}}
                                                  <span class="m-form__help">{{ $pref->logo }}</span>
                                            {{-- @endforeach --}}
                                          
                                        </div>
                                        <div class="col-lg-2">                                            
                                            <div class="input-group">            
                                                    {{-- @foreach ($pref as $item) --}}
                                                    <img class="rounded img-fluid" src="{{ asset('/storage/preference/'.$pref->image)}}" alt="" width="150px" />
                                                 {{-- <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                <input type="text" name="phone" class="form-control m-input" readonly value="{{ $item->phone }}" > --}}
                                                    {{-- @endforeach --}}
                                               
                                            </div>
                                            {{-- <span class="m-form__help">Please enter your contact number</span> --}}
                                        </div>
                                    {{-- </div>	 --}}
                                    {{-- <label class="col-lg-2 col-form-label">Postcode:</label>
                                    <div class="col-lg-3">
                                        <div class="m-input-icon m-input-icon--right">
                                            <input type="text" class="form-control m-input" placeholder="Enter your postcode">
                                            <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-bookmark-o"></i></span></span>
                                        </div>
                                        <span class="m-form__help">Please enter your postcode</span>
                                    </div> --}}
                                </div>	     
                                           
                            </div>
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-10" >
                                            {{-- @foreach ($pref as $item)   --}}
                                            <a href="/preference/edit/{{$pref->id}}" type="submit" class="btn btn-primary">Edit</a>
                                            {{-- @endforeach --}}
                                          
                                            {{-- <a href="/preference" type="cancel" class="btn btn-default">Back</a> --}}
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
                       <div class="m-portlet__body">
                            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modelId">
                               <i class="fa fa-plus" aria-hidden="true"></i> Tambah &nbsp;
                            </button> 
                            <!-- Button trigger modal -->                        
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="/slider/store" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="_method" value="POST" />
                                            {{-- <input type="hidden" name="id" value="{{$item->id}}" /> --}}
                                            {{-- <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" /> --}}
                                        </div>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Slider</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="">Title</label>
                                                  <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId" required>
                                                  {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Deskripsi</label>
                                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="" aria-describedby="helpId" required>
                                                    {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="">File Upload</label>
                                                    <input type="file" name="image" id="image" class="form-control" placeholder="" aria-describedby="helpId" required>
                                                    <small id="helpId" class="text-muted">size image : 1360px x 400px</small>
                                                  </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Modal -->
                            @foreach ($sliders as $item)
                            <div class="modal fade" id="editModel{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="/slider/update" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{$item->id}}" />
                                            {{-- <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" /> --}}
                                        </div>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Slider</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="">Title</label>
                                                  <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $item->title }}" required>
                                                  {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Deskripsi</label>
                                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $item->deskripsi }}" required>
                                                    {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="">File Upload</label>
                                                    <input type="file" name="image" id="image" class="form-control" placeholder="" aria-describedby="helpId" required>
                                                    <small id="helpId" class="text-muted"><strong>{{ $item->image  }}</strong>  <br> size image : 1360px x 400px</small>
                                                  </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                           
                            <!--begin: Datatable -->
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($sliders as $item)                                        
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <img src="/data_file/{{ $item->image }}" alt="" width="100%">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        {{ $item->title }} <br>
                                                        {{ $item->deskripsi }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#editModel{{ $item->id }}"><i class="m-nav__link-icon flaticon-edit"></i></a>
                                                <a href="/slider/destroy/{{ $item->id }}" class="btn btn-danger"><i class="m-nav__link-icon flaticon-delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                       </div>
                    </div>
                </div>      

            </div>
        </div>
        <!--end::Portlet-->

    
           
        </div>
    </div>	
 </div>
@endsection


@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection