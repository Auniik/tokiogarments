@extends('frontend._partial.app')
@section('title', 'Home')
@section('body')
    <div class="carousel slide" id="main-slide" data-ride="carousel">

        <div class="carousel-inner">
            @foreach($slider_images as $key => $image)
                {{--{{dd($image)}}--}}
                <div class="carousel-item {{$key==0 ? 'active' : ''}}" style="background-image:url({{url($image->slider_image)}})">


                    <div class="container">
                        <div class="slider-content text-left">
                            {{--<div class="col-md-12">--}}
                                {{--<h2 class="slide-title title-light">You have needs</h2>--}}
                                {{--<h3 class="slide-sub-title">We Have the Solutions</h3>--}}
                                {{--<p class="slider-description lead">We will deal with your failure that determines <br/> how you achieve success.</p>--}}
                                {{--<p><a class="slider btn btn-primary" href="#">Know More</a><a class="slider btn btn-border" href="#">View Services</a></p>--}}
                            {{--</div>--}}
                            <!-- Col end-->
                        </div>
                        <!-- Slider content end-->
                    </div>
                    <!-- Container end-->
                </div>
        @endforeach

        </div>
        <!-- Carousel inner end-->
        <!-- Controllers-->
        <a class="left carousel-control carousel-control-prev" href="#main-slide" data-slide="prev"><span><i class="fa fa-angle-left"></i></span></a>
        <a class="right carousel-control carousel-control-next" href="#main-slide" data-slide="next"><span><i class="fa fa-angle-right"></i></span></a>
    </div>

    <section class="ts-services solid-bg" id="ts-services">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="section-title"><span>What We Do</span>Our Products</h2>
                </div>
            </div>
            <!-- Title row end-->
            <div class="row ts-service-row-box">
                @foreach($photo_categories as $category)
                <div class="col-lg-4 col-md-12">
                    <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                                <img class="img-fluid" src="{{asset('/')}}frontend/images/services/service1.jpg" alt="">
                        </div>
                        <div class="ts-service-content">
                            <h3 class="service-title">{{$category->category_name}}</h3>
                            <p>We have express solutions, you can choose premium economy, We also provide economy, Client will get simple inventory control.</p>
                            <p><a class="link-more" href="#">Read More<i class="icon icon-right-arrow2"></i></a></p>
                        </div>
                    </div>
                    <!-- Service1 end-->
                </div>
                <!-- Col end-->
                @endforeach
            </div>
            <!-- Content row end-->
        </div>
        <!-- Container end-->
    </section>

    <section class="ts-services solid-bg" id="ts-services">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="section-title">Equipments <span> <br>We Use</span></h2>
                </div>
            </div>

            <div class="row">
                @foreach($equipments as $equipment)
                    <div class="col-md-4">
                        <div class="equipment-item">
                            <div class="equipment-thumb">
                                <img src="{{ url($equipment->image)}}">
                            </div>
                            <div class="equipment-content">
                                <h4>{{$equipment->title}}</h4>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal-{{$equipment->id}}">
                                    Details
                                </button>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>


            <!-- Content row end-->
        </div>

        <!-- Container end-->
    </section>
    @foreach($equipments as $equipment)
        <div class="modal fade" id="myModal-{{$equipment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <img src="{{ url($equipment->image)}}">
                        {{--<h3><strong>Category :</strong> Machinery</h3>--}}
                        <h3><strong>Name :</strong> {{ $equipment->title}}</h3>
                        <h3><strong>Brand Name / Model :</strong> {{ $equipment->brand}}</h3>
                        <h3><strong>Quantity : </strong> {{ $equipment->quantity }}</h3>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <section class="clients-area " id="clients-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 owl-carousel owl-theme text-center partners" id="partners-carousel">
                    @foreach($clients as $client)
                    <figure class="item partner-logo">
                        <a href="#">
                            <img class="img-fluid" src="{{url($client->client_image)}}" alt="">
                        </a>
                    </figure>
                    @endforeach

                </div>
                <!-- Owl carousel end-->
            </div>
            <!-- Content row end-->
        </div>
        <!-- Container end-->
    </section>



@endsection
