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
    
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{ $judul }}
                        </h3>
                    </div>
                </div>
                
            </div>
            <div class="m-portlet__body">
               <table class="table table-striped- table-bordered table-hover table-checkable">
                    <thead>
                        {{-- <th></th> --}}
                    </thead>
                    <tbody>
                        <td>No Purchase Order</td>
                        <td>{{$rekappos->no_po}}</td>
                    </tbody>
                    <tbody>
                        <td>No Kontrak</td>
                        <td>{{$rekappos->no_kontrak}}</td>
                    </tbody>
                    <tbody>
                        <td>Nilai RAP</td>
                        <td>{{ $rekappos->currency->name . " " . format_uang($rekappos->nilai_rap) }}</td>
                    </tbody>
                    <tbody>
                        <td>Tanggal</td>
                        <td>{{$rekappos->tanggal}}</td>
                    </tbody>
                    <tbody>
                        <td>Waktu Pelaksanaan</td>
                        <td>{{$rekappos->start_date}} s/d {{$rekappos->end_date}}</td>
                    </tbody>
                    <tbody>
                        <td>Cara Bayar</td>
                        <td> 
                        @if ($rekappos->cara_bayar == "cbd")
                            Cash Before Delivery
                        @elseif($rekappos->cara_bayar == "cad")
                            Cash After Delivery
                        @elseif($rekappos->cara_bayar == "dp")
                            DP 20% & Sisa 80%
                        @else
                            {{ $rekappos->cara_bayar1 }}
                        @endif
                            
                        </td>
                    </tbody>
                    <tbody>
                        <td>Pajak</td>
                        <td>    
                        @if ($rekappos->pajak == "ppn")
                            Include PPN 10%
                        @elseif($rekappos->pajak == "ppn11")
                           Include PPN 11%
                        @elseif($rekappos->pajak == "pph")
                           Include PPN 1%
                        @elseif($rekappos->pajak == "exclude")
                            Exclude PPN
                        @else
                           Include PPN {{ $rekappos->pajak1 . "%" }}
                        @endif</td>
                    </tbody>
                    <tbody>
                        <td>Asuransi</td>
                        <td>{{$rekappos->asuransi}}</td>
                    </tbody>
                    <tbody>
                        <td>Nama Pengadaan</td>
                        <td>{{$rekappos->nama_pekerjaan}}</td>
                    </tbody>                    
                    <tbody>
                        <td>Vendor</td>
                        <td>{{$rekappos->vendor->namaperusahaan}}, {{$rekappos->vendor->badanusaha->kode }}</td>
                    </tbody>
                    <tbody>
                        <td>Pekerjaan</td>
                        <td>{{ $rekappos->nama_pekerjaan }} - {{$rekappos->lokasi->kode}}</td>
                    </tbody>
                    <tbody>
                        <td>Preference</td>
                        <td>{{$rekappos->preference->nama_perusahaan}}</td>
                    </tbody>
                    <tbody>
                        <td>BOD</td>
                        <td>{{$rekappos->bod->name}}, {{$rekappos->bod->code}}</td>
                    </tbody>
                    <tbody>
                        <td>Catatan</td>
                        <td>{!! $rekappos->catatan !!}</td>
                    </tbody>

                   
               </table>
               <table  class="table table-striped- table-bordered table-hover table-checkable">
                   <thead>
                       <th style="background: rgb(192, 226, 43)">
                            File Upload
                       </th>                      
                   </thead>
                   <tbody>
                      
                            {{-- <tr>   --}}
                                
                                <td>
                                    <div class="m-widget4">
                                        @foreach ($rekappos->pofiles as $item)
                                            <div class="m-widget4__item">
                                                {{-- <div class="m-widget4__img m-widget4__img--icon">							 
                                                    <img src="assets/app/media/img/files/doc.svg" alt="">  
                                                </div> --}}
                                                <div class="m-widget4__info">
                                                    {{-- <span class="m-widget4__text"> --}}
                                                        <a href="{{ url('data_file/pdf/'.$item->filepdf) }}" target="_blank"><span class="m-widget4__text">  {{ $item->filepdf   }}</span></a>
                                                    {{-- </span> 							 		  --}}
                                                </div>
                                                <div class="m-widget4__ext" >
                                                    <a href="/rekappo/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
                                                        <i class="la la-close"></i>
                                                        
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                    </div>


                                    {{-- @foreach ($rekappos->pofiles as $item)
                                        <a href="{{ url('data_file/pdf/'.$item->filepdf) }}" target="_blank"><span class="m-invoice__text">  {{ $item->filepdf }} <br></span></a>
                                    @endforeach --}}
                                </td>
                                
                            {{-- </tr> --}}
                   </tbody>

               </table>
               <table class="table table-striped- table-bordered table-hover table-checkable">
                   <thead>
                       <tr>
                           <th>Material</th>
                           <th>Satuan</th>
                           <th>Qty</th>
                           <th>Harga</th>
                       </tr>
                   </thead>
                   @php
                        $jumlah = 0;
                        $subtotal = 0;
                        $subatotal = 0;
                        $diskon = 0;
                        $ppn = 0;
                        $total = 0;
                        $totalrp = 0;
                   @endphp
                   <tbody>
                       @foreach ($rekappos->podetails as $item)
                       @php
                           $jumlah = $item->qty * $item->harga ;
                           $subtotal += $jumlah;    
                       @endphp
                        <tr>
                            <td>{!! $item->hargabarang->nama_brg !!}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->qty }}</td>
                            <td style="text-align: right">{{$rekappos->currency->name . " " . format_uang($item->harga) }}</td>
                            <td style="text-align: right">{{$rekappos->currency->name . " " . format_uang($jumlah) }}</td>
                        </tr>    
                       @endforeach                       
                   </tbody>
                   @php
                    if ($rekappos->pajak == "ppn") {                                                    
                        $subatotal = $subtotal - $rekappos->diskon;
                        $ppn = $subatotal * 10/100; 
                        $total = $subatotal + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3; 
                        $totalrp = $total;     
                    } 
                    elseif ($rekappos->pajak == "ppn11") {                                                    
                        $subatotal = $subtotal - $rekappos->diskon;
                        $ppn = $subatotal * 11/100; 
                        $total = $subatotal + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3; 
                        $totalrp = $total;     
                    } 
                    elseif ($rekappos->pajak == "pph") {                                                    
                        $subatotal = $subtotal - $rekappos->diskon;
                        $ppn = $subatotal * 1/100; 
                        $total = $subatotal + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;    
                        $totalrp = $total;  
                    } 
                    elseif ($rekappos->pajak == "other") {
                        $subatotal = $subtotal - $rekappos->diskon;
                        $ppn = $subatotal * $rekappos->pajak1/100;
                        $total = $subatotal  + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;
                        $totalrp = $total;  
                    }
                    else {
                        $subatotal = $subtotal - $rekappos->diskon;
                        // $ppn = $subatotal * $rekappos->pajak1/100;
                        $total = $subatotal   + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;
                        $totalrp = $total;  
                    }
                @endphp
                   <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right">Sub Total</td>
                        <td class="m--font-success" style="text-align: right"> <strong id="dpp">{{ $rekappos->currency->name . " " . format_uang($subtotal) }}</strong> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right">Diskon</td>
                        <td class="m--font-success" style="text-align: right"> <strong id="diskon">{{$rekappos->currency->name . " " . format_uang($rekappos->diskon) }}</strong> </td>
                    </tr>
		            <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right">Sub A Total</td>
                        <td class="m--font-success" style="text-align: right"> <strong id="dppa">{{$rekappos->currency->name . " " . format_uang($subatotal) }}</strong> </td>
                    </tr>
                    {{-- @if ($rekappos->ppn) --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right">
                            @if ($rekappos->pajak == "ppn")
                            PPN 10%
                            @elseif ($rekappos->pajak == "ppn11")
                            PPN 11%
                            @elseif ($rekappos->pajak == "pph")
                            PPN 1%
                            @elseif ($rekappos->pajak == "other")
                            PPN {{ $rekappos->pajak1 . "%" }}
                            @endif 
                        </td>
                        <td class="m--font-success" style="text-align: right"> <strong id="ppn">{{$rekappos->currency->name . " " . format_uang($ppn) }}</strong> </td>
                    </tr>
                    {{-- @endif  --}}
                    @if ($rekappos->biaya_kirim)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right">Biaya Kirim</td>
                        <td class="m--font-success" style="text-align: right"> <strong id="biaya_kirim">{{$rekappos->currency->name . " " . format_uang($rekappos->biaya_kirim) }}</strong> </td>
                    </tr>
                    @endif
                   @if ($rekappos->custom1)
                   <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right">{{ $rekappos->custom }}</td>
                        <td class="m--font-success" style="text-align: right"> <strong id="custom1">{{$rekappos->currency->name . " " . format_uang($rekappos->custom1) }}</strong> </td>
                    </tr>      
                   @endif
                   @if ($rekappos->custom2)
                   <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right">{{ $rekappos->custom2 }}</td>
                        <td class="m--font-success" style="text-align: right"> <strong id="custom3">{{$rekappos->currency->name . " " . format_uang($rekappos->custom3) }}</strong> </td>
                    </tr>      
                   @endif
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right">Total</td>
                        <td class="m--font-success" style="text-align: right"> <strong id="total">{{$rekappos->currency->name . " " . format_uang($total) }}</strong> </td>
                    </tr>
                   </tfoot>
               </table>
               <span style="text-transform: capitalize"><i>
              Terbilang :  {{ $rekappos->total }}</span>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
@endsection


@section('footer-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Anda Sudah Yakin?',
            text: 'Data Ini Akan Dihapus Secara Permanen !',
            icon: 'warning',
            buttons: ["Tidak", "Iya !"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
    </script>
@endsection