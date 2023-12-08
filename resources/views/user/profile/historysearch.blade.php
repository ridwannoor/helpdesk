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
    
                  
                </div>			
            </div>	
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">                         
                            <li class="m-portlet__nav-item">
                                 <a href="#"  data-toggle="modal" data-target="#historylog" target="__blank" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" rel="noopener noreferrer"> <i class="fa fa-search"></i>&nbsp; Search</a>
                                 </span></a>
                               
                                
                                <!-- Modal -->
                                <div class="modal fade" id="historylog" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <form action="/user/history/search/{{ Auth::user()->id }}" method="get">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                      <label for="">Mulai Tanggal</label>
                                                      <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                                                      {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Sampai Tanggal</label>
                                                        <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                                                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                                      </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
        
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-portlet__body">
                      
                    
                        <div class="row">
                              {{-- @foreach ($search as $item) --}}
                        <div class="col-lg-3">
                            <div class="card text-left">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body text-center">
                                <h4 class="card-title ">{{ $banegos }}</h4>
                                <p class="card-text">Berita Acara Negosiasi</p>
                              </div>
                            </div>
                        </div>
                                
                        {{-- @endforeach --}}
                         <div class="col-lg-3">
                            <div class="card text-left">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body text-center">
                                <h4 class="card-title ">{{ $rekapos }}</h4>
                                <p class="card-text">Purchase Order</p>
                              </div>
                            </div>
                        </div>
                       <div class="col-lg-3">
                            <div class="card text-left">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body text-center">
                                <h4 class="card-title ">{{ $doheaders }}</h4>
                                <p class="card-text">Delivery Order</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card text-left">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body text-center">
                                <h4 class="card-title ">{{ $pumheaders }}</h4>
                                <p class="card-text">PUM</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-4">
                            <div class="card text-left">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body text-center">
                                <h4 class="card-title ">{{ $pjpumheaders }}</h4>
                                <p class="card-text">PJ PUM</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-4">
                            <div class="card text-left">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body text-center">
                                <h4 class="card-title ">{{ $baadendumheaders }}</h4>
                                <p class="card-text">BA Addendum</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-4">
                            <div class="card text-left">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body text-center">
                                <h4 class="card-title ">{{ $banegopengadaans }}</h4>
                                <p class="card-text">BA Nego Pengadaan</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-4">
                            <div class="card text-left">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body text-center">
                                <h4 class="card-title ">{{ $spkheaders }}</h4>
                                <p class="card-text">SPK</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-4">
                            <div class="card text-left">
                              <img class="card-img-top" src="holder.js/100px180/" alt="">
                              <div class="card-body text-center">
                                <h4 class="card-title ">{{ $sppheaders }}</h4>
                                <p class="card-text">SPP</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                           
                            <div class="m-scrollable" data-scrollable="true" style="height: 600px">
                            <table class="table table-striped table-inverse " >
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>NO</th>
                                        <th>TANGGAL</th>
                                        <th>KETERANGAN</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    {{-- <div class="m-scrollable" data-scrollable="true" style="height: 600px">  --}}
                                    <tbody>
                                        @foreach ($logs as $item)
                                            @if ($item->user_id == Auth::user()->id)
                                                <tr>
                                                    <td style="width: 10px">{{ $no++ }}</td>
                                                    <td style="width: 150px">
                                                            {{-- <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center p-4"> --}}
                                                                <span>{{ date('d M Y', strtotime($item->created_at))  }}</span>
                                                            {{-- </div> --}}
                                                    </td>
                                                    <td>{{ $item->subject }}</td>
                                                    <td style="width: 100px">

                                                        @if ($item->method == 'POST')
                                                        <span class="m-badge m-badge--focus m-badge--wide">Simpan</span>
                                                        @elseif ($item->method == 'PUT')
                                                        <span class="m-badge m-badge--brand m-badge--wide">Ubah</span>
                                                        @elseif ($item->method == 'GET')
                                                        <span class="m-badge m-badge--success m-badge--wide">Buat</span>
                                                        @endif
                                                    </td>
                                                   
                                                    {{-- <td>{{ $item->user->name }}</td> --}}
                                                </tr>
                                            @endif
                                          
                                        @endforeach                                    
                                    </tbody>
                                    {{-- </div> --}}
                            </table>
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


@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/wizard/wizard.js" type="text/javascript')}}"></script>
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-touchspin.js') }}"
    type="text/javascript"></script>
    
@endsection