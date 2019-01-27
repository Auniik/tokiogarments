@extends('frontend._partial.app')
{{--@section('title', $page->title)--}}
@section('body')
    <div class="single-banner">
        <img src="{{ asset('/') }}frontend/images/banner/01.PNG">
        <div class="banner-content">
            <h1>{{$page->name}}</h1>
            <h3>{{$page->title}}</h3>
            <ol class="banner-list">
                <li>Home</li>
                <li><i class="fa fa-angle-right"></i></li>
                <li><a href="#">{{$page->title}}</a></li>
            </ol>
        </div>
    </div>
    <div class="item-discription section-padding ">
        <div class="container">
            <div class="row">
                <div class="{{$slug->description==null ? 'col-lg-12' : 'col-lg-7 col-md-7'}}">
                    <div class="feature-item col-lg-12">
                        @php($images = json_decode($slug->compliance_image))
                        <div class="{{$slug->description==null ? 'div-count' : ''}}">
                            @foreach($images as $image)
                                <div class="{{$slug->description==null ? 'col-lg-12': ''}}">
                                    <img class="img-thumbnail" src="{{url($image)}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if ($page->description)
                    <div class="col-lg-5 col-md-5">
                        <div class="item-content">
                            <hr>
                            {{--<h2>{{$page->homage}}</h2>--}}
                            <hr>
                            <p>{!!$page->description!!}</p>
                        </div>
                    </div>
                @endif

            </div>

            @if ($page->pdf_document)
                <br>
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item" src="{{url($page->pdf_document)}}" ></iframe>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
            @endif

        </div>

    </div>
@endsection
