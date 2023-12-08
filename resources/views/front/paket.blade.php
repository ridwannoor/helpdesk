
@extends('front.layouts.app')

@section('content')


<!-- START FAQ -->
<div class="ptb-80-60">
    <div class="container">
        <div class="row">

            <!-- Faq -->
            <div class="col-lg-12">
                <div id="accordion" class="mb-4">

                    <div class="collapse-head">
                        <div class="collapse-btn">
                            <button class="collapsed" data-toggle="collapse" data-target="#content-one" aria-expanded="true"><i class="mdi mdi-plus mdi-24px"></i> Contrary to popular belief?</button>
                        </div>
                        <div id="content-one" class="collapse show" data-parent="#accordion">
                            <div>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</p>
                            </div>
                        </div>
                    </div>

                    <div class="collapse-head">
                        <div class="collapse-btn">
                            <button class="collapsed" data-toggle="collapse" data-target="#content-two" aria-expanded="false"><i class="mdi mdi-plus mdi-24px"></i> Contrary to popular belief?</button>
                        </div>
                        <div id="content-two" class="collapse" data-parent="#accordion">
                            <div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>

                    <div class="collapse-head">
                        <div class="collapse-btn">
                            <button class="collapsed" data-toggle="collapse" data-target="#content-three" aria-expanded="false"><i class="mdi mdi-plus mdi-24px"></i> Contrary to popular belief?</button>
                        </div>
                        <div id="content-three" class="collapse" data-parent="#accordion">
                            <div>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</p>
                            </div>
                        </div>
                    </div>

                    <div class="collapse-head">
                        <div class="collapse-btn">
                            <button class="collapsed" data-toggle="collapse" data-target="#content-four" aria-expanded="false"><i class="mdi mdi-plus mdi-24px"></i> Contrary to popular belief?</button>
                        </div>
                        <div id="content-four" class="collapse" data-parent="#accordion">
                            <div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>

                    <div class="collapse-head">
                        <div class="collapse-btn">
                            <button class="collapsed" data-toggle="collapse" data-target="#content-five" aria-expanded="false"><i class="mdi mdi-plus mdi-24px"></i> Contrary to popular belief?</button>
                        </div>
                        <div id="content-five" class="collapse" data-parent="#accordion">
                            <div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>

                    <div class="collapse-head">
                        <div class="collapse-btn">
                            <button class="collapsed" data-toggle="collapse" data-target="#content-six" aria-expanded="false"><i class="mdi mdi-plus mdi-24px"></i> Contrary to popular belief?</button>
                        </div>
                        <div id="content-six" class="collapse" data-parent="#accordion">
                            <div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

           

        </div>
    </div>
</div>
<!-- END FAQ -->

@endsection