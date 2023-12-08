
@extends('front.layouts.app')

@section('content')


<!-- START FAQ -->
<div class="ptb-80-60">
    <div class="container">
        <div class="row">

            <!-- Faq -->
            <div class="col-lg-12">
                <div id="accordion" class="mb-4">
                    @foreach ($faqs as $item)                        
                    <div class="collapse-head">
                        <div class="collapse-btn">
                            <button class="collapsed" data-toggle="collapse" data-target="#content-{{$item->id}}" aria-expanded="false"><i class="mdi mdi-plus mdi-24px"></i>{{$item->judul}}</button>
                        </div>
                        <div id="content-{{$item->id}}" class="collapse" data-parent="#accordion">
                            <div>
                                <p>
                                    <strong>Q :</strong>{{$item->name}}<br>
                                    <strong>A :</strong>{{$item->detail}}
 
                                 </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

           

        </div>
    </div>
</div>
<!-- END FAQ -->

@endsection