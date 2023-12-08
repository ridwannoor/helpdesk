@extends('layouts.app2')

@section('header-script')

@endsection

{{-- @section('m-subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">{{$judul}}</h3>
        </div>

    </div>
</div>
@endsection --}}

@section('m-content')
<div class="m-content">
  		            <!--begin::Portlet-->
<div class="m-portlet m-portlet--space">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">                        
                <h3 class="m-portlet__head-text">
                    {{$judul}}
                </h3>
            </div>          
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="#" class="m-portlet__nav-link m-btn--pill">                                
                        <div class="m-input-icon m-input-icon--right">
                            <input type="text" class="form-control form-control-lg m-input m-input--solid m-input--pill" placeholder="Search FAQ...">
                            <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-search m--font-brand"></i></span></span>
                        </div> 
                    </a>
                </li>                          
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <div class="row">                                 
            <div class="col-xl-3">          
                <div class="m-tabs" data-tabs="true" data-tabs-contents="#m_sections">
                    <ul class="m-nav m-nav--active-bg m-nav--active-bg-padding-lg m-nav--font-lg m-nav--font-bold m--margin-bottom-20 m--margin-top-10 m--margin-right-40" id="m_nav" role="tablist">
                        <li class="m-nav__item" >
                            <a class="m-nav__link m-tabs__item m-tabs__item--active" data-tab-target="#m_section_1" href="#">                 
                                <span class="m-nav__link-text">Barang Investasi</span>                                                           
                            </a>                                              
                        </li>          
                        <li class="m-nav__item">
                            <a class="m-nav__link m-tabs__item" data-tab-target="#m_section_2" href="#">                            
                                <span class="m-nav__link-text">Supplier, Distributor & Mandor</span>
                            </a>
                        </li>            
                        <li class="m-nav__item">
                            <a class="m-nav__link collapsed" role="tab" id="m_nav_link_1" data-toggle="collapse" href="#m_nav_sub_1" aria-expanded=" false">
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text">Logistic</span>
                                    </span>
                                </span>
                                <span class="m-nav__link-arrow"></span>
                            </a>
                            <ul class="m-nav__sub collapse" id="m_nav_sub_1" role="tabpanel" aria-labelledby="m_nav_link_1" data-parent="#m_nav">
                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item" data-tab-target="#m_section_3" href="#">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--dot"><span></span></span>
                                        <span class="m-nav__link-text">Barang / Material</span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item" data-tab-target="#m_section_3" href="#">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--dot"><span></span></span>
                                        <span class="m-nav__link-text">Delivery Order</span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item" data-tab-target="#m_section_4" href="#">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--dot"><span></span></span>
                                        <span class="m-nav__link-title">
                                            <span class="m-nav__link-wrap">
                                                <span class="m-nav__link-text">Good Receive</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item" data-tab-target="#m_section_5" href="#">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--dot"><span></span></span>
                                        <span class="m-nav__link-text">Rekap DO</span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item" data-tab-target="#m_section_5" href="#">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--dot"><span></span></span>
                                        <span class="m-nav__link-text">Purchase Order</span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item" data-tab-target="#m_section_5" href="#">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--dot"><span></span></span>
                                        <span class="m-nav__link-text">BA Klarif & Nego</span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item" data-tab-target="#m_section_5" href="#">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--dot"><span></span></span>
                                        <span class="m-nav__link-text">PUM</span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link m-tabs__item" data-tab-target="#m_section_5" href="#">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--dot"><span></span></span>
                                        <span class="m-nav__link-text">Service Order</span>
                                    </a>
                                </li>
                            </ul>
                        </li>                    
                                     
                        <li class="m-nav__item">
                            <a class="m-nav__link collapsed" role="tab" id="m_nav_link_2"  data-toggle="collapse" href="#m_nav_sub_2" aria-expanded="  false">
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text">Procurement</span>                                    
                                    </span>
                                </span>
                                <span class="m-nav__link-arrow"></span>
                            </a>
                            <ul class="m-nav__sub collapse" id="m_nav_sub_2" role="tabpanel" aria-labelledby="m_nav_link_2" data-parent="#m_nav">
                                <li class="m-nav__item">
                                    <a class="m-nav__link" data-toggle="tab" href="#m_section_7" role="tab">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--line"><span></span></span>
                                        <span class="m-nav__link-text">Form Pengadaan</span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link" data-toggle="tab" href="#m_section_8" role="tab">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--line"><span></span></span>
                                        <span class="m-nav__link-title">
                                            <span class="m-nav__link-wrap">
                                                <span class="m-nav__link-text">BA Aanwizing</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link" data-toggle="tab" href="#m_section_9" role="tab">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--line"><span></span></span>
                                        <span class="m-nav__link-text">BA Nego</span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a class="m-nav__link" data-toggle="tab" href="#m_section_9" role="tab">
                                        <span class="m-nav__link-bullet m-nav__link-bullet--line"><span></span></span>
                                        <span class="m-nav__link-text">BA Kesepakatan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="m-nav__item">
                            <a class="m-nav__link  m-tabs__item" data-tab-target="#m_section_6" href="#">     
                                <span class="m-nav__link-text">My Drive</span>
                            </a>
                        </li>     
                    </ul>    
                </div>  
            </div>
            <div class="col-xl-9">   
                <div class="m-tabs-content" id="m_sections">   
                    <!--begin::Section 1-->     
                    <div class="m-tabs-content__item m-tabs-content__item--active" id="m_section_1">  
                        <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">General Instruction</h4>  
                        <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_1_content">  
                            
                            <!--begin::Item-->                  
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_1_content_1_head" data-toggle="collapse" href="#m_section_1_content_1_body" >
                                    <span class="m-accordion__item-title">Lorem Ipsum has been the industry</span>
                                    <span class="m-accordion__item-mode"></span>     
                                </div>
                                <div class="m-accordion__item-body collapse show" id="m_section_1_content_1_body" role="tabpanel" aria-labelledby="m_section_1_content_1_head" data-parent="#m_section_1_content"> 
                                    <div class="m-accordion__item-content">
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of 
                                        </p>
                                        <p> Type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                         <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's <a href="#" class="m-link m--font-boldest">Example boldest link</a> 
                                        </p>    
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->    

                            <!--begin::Item-->              
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head collapsed" role="tab" id="m_section_1_content_2_head" data-toggle="collapse" href="#m_section_1_content_2_body" >
                                    <span class="m-accordion__item-title">It has survived not only five centuries</span>
                                    <span class="m-accordion__item-mode"></span>     
                                </div>

                                <div class="m-accordion__item-body collapse" id="m_section_1_content_2_body" role="tabpanel" aria-labelledby="m_section_1_content_2_head" data-parent="#m_section_1_content"> 
                                    <div class="m-accordion__item-content">
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever
                                        </p>
                                        <p> Since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  nto  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha.
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's <a href="#" class="m-link m--font-boldest">Example boldest link</a> 
                                        </p>    
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->   

                            <!--begin::Item-->              
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head collapsed" role="tab" id="m_section_1_content_3_head" data-toggle="collapse" href="#m_section_1_content_3_body" >
                                    <span class="m-accordion__item-title">Type and scrambled it to make a type specimen book</span>
                                    <span class="m-accordion__item-mode"></span>     
                                </div>

                                <div class="m-accordion__item-body collapse" id="m_section_1_content_3_body" role="tabpanel" aria-labelledby="m_section_1_content_3_head" data-parent="#m_section_1_content"> 
                                    <div class="m-accordion__item-content">
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's <a href="#" class="m-link m--font-boldest">Example boldest link</a> 
                                        </p>    
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->                        
                        </div>
                    </div>
                    <!--begin::Section 1-->  

                    <!--begin::Section 2-->     
                    <div class="m-tabs-content__item" id="m_section_2">      
                        <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">Terms & Conditions</h4>                         
                        <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_2_content">                             
                            <!--begin::Item-->                  
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_2_content_1_head" data-toggle="collapse" href="#m_section_2_content_1_body" >
                                    <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                    <span class="m-accordion__item-title">Lorem Ipsum has been the industry</span>
                                     
                                    <span class="m-accordion__item-mode"></span>     
                                </div>
                                <div class="m-accordion__item-body collapse show" id="m_section_2_content_1_body" role="tabpanel" aria-labelledby="m_section_2_content_1_head" data-parent="#m_section_2_content"> 
                                    <div class="m-accordion__item-content">
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of 
                                        </p>
                                        <p> Type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                         <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's <a href="#" class="m-link m--font-boldest">Example boldest link</a> 
                                        </p>    
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->    

                            <!--begin::Item-->              
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head collapsed" role="tab" id="m_section_2_content_2_head" data-toggle="collapse" href="#m_section_2_content_2_body" >
                                    <span class="m-accordion__item-icon"><i class="flaticon-calendar-3"></i></span>
                                    <span class="m-accordion__item-title">It has survived not only five centuries</span>
                                     
                                    <span class="m-accordion__item-mode"></span>     
                                </div>

                                <div class="m-accordion__item-body collapse" id="m_section_2_content_2_body" role="tabpanel" aria-labelledby="m_section_2_content_2_head" data-parent="#m_section_2_content"> 
                                    <div class="m-accordion__item-content">
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever
                                        </p>
                                        <p> Since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  nto  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha.
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's <a href="#" class="m-link m--font-boldest">Example boldest link</a> 
                                        </p>    
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->   

                            <!--begin::Item-->              
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head collapsed" role="tab" id="m_section_2_content_3_head" data-toggle="collapse" href="#m_section_2_content_3_body" >
                                    <span class="m-accordion__item-icon"><i class="flaticon-security"></i></span>
                                    <span class="m-accordion__item-title">Type and scrambled it to make a type specimen book</span>
                                     
                                    <span class="m-accordion__item-mode"></span>     
                                </div>

                                <div class="m-accordion__item-body collapse" id="m_section_2_content_3_body" role="tabpanel" aria-labelledby="m_section_2_content_3_head" data-parent="#m_section_2_content"> 
                                    <div class="m-accordion__item-content">
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's <a href="#" class="m-link m--font-boldest">Example boldest link</a> 
                                        </p>    
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->                        
                        </div>
                    </div>
                    <!--begin::Section 2-->

                    <!--begin::Section 3-->     
                    <div class="m-tabs-content__item" id="m_section_3">         
                        <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">User Policy</h4>                      
                        <div class="m-accordion m-accordion--bordered" id="m_section_3_content">   
                            <!--begin::Item-->                  
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head" role="tab" id="m_section_3_content_1_head" data-toggle="collapse" href="#m_section_3_content_1_body" >
                                    <span class="m-accordion__item-icon"><i class="flaticon-gift"></i></span>
                                    <span class="m-accordion__item-title">Lorem Ipsum has been the industry</span>
                                     
                                    <span class="m-accordion__item-mode"></span>     
                                </div>
                                <div class="m-accordion__item-body collapse show" id="m_section_3_content_1_body" role="tabpanel" aria-labelledby="m_section_3_content_1_head" data-parent="#m_section_3_content"> 
                                    <div class="m-accordion__item-content">
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of 
                                        </p>
                                        <p> Type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                         <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's <a href="#" class="m-link m--font-boldest">Example boldest link</a> 
                                        </p>    
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->    

                            <!--begin::Item-->              
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head collapsed" role="tab" id="m_section_3_content_2_head" data-toggle="collapse" href="#m_section_3_content_2_body" >
                                    <span class="m-accordion__item-icon"><i class="flaticon-calendar-3"></i></span>
                                    <span class="m-accordion__item-title">It has survived not only five centuries</span>
                                     
                                    <span class="m-accordion__item-mode"></span>     
                                </div>

                                <div class="m-accordion__item-body collapse" id="m_section_3_content_2_body" role="tabpanel" aria-labelledby="m_section_3_content_2_head" data-parent="#m_section_3_content"> 
                                    <div class="m-accordion__item-content">
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever
                                        </p>
                                        <p> Since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  nto  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha.
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's <a href="#" class="m-link m--font-boldest">Example boldest link</a> 
                                        </p>    
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->   

                            <!--begin::Item-->              
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head collapsed" role="tab" id="m_section_3_content_3_head" data-toggle="collapse" href="#m_section_3_content_3_body" >
                                    <span class="m-accordion__item-icon"><i class="flaticon-security"></i></span>
                                    <span class="m-accordion__item-title">Type and scrambled it to make a type specimen book</span>
                                     
                                    <span class="m-accordion__item-mode"></span>     
                                </div>

                                <div class="m-accordion__item-body collapse" id="m_section_3_content_3_body" role="tabpanel" aria-labelledby="m_section_3_content_3_head" data-parent="#m_section_3_content"> 
                                    <div class="m-accordion__item-content">
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into   
                                        </p>
                                        <p>
                                            Lorem Ipsum has been the industry's <a href="#" class="m-link m--font-boldest">Example boldest link</a> 
                                        </p>    
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->                        
                        </div>
                    </div>
                    <!--begin::Section 3--> 
                </div>     
            </div>                 
        </div>
    </div>
</div>       

</div>
<!--End::Section-->



</div>
@endsection

@section('footer-script')

@endsection
