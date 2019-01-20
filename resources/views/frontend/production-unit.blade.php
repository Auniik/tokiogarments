@extends('frontend._partial.app')
@section('title')
    {{$slug->name}}
@endsection
@section('body')
    <div class="single-banner">
        <img src="{{ asset('/') }}frontend/images/banner/01.PNG">
        <div class="banner-content">
            <h1>{{$slug->name}}</h1>
            <ol class="banner-list">
                <li>Home</li>
                <li><i class="fa fa-angle-right"></i></li>
                <li><a href="#">{{ strtolower($slug->name)}}</a></li>
            </ol>
        </div>
    </div>
    <div class="item-discription section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="item-content">
                        <h2>Our {{$slug->name}} Section</h2>
                        <p><strong>Floor Space :</strong> {{$slug->space}}</p>
                        <p><strong>Capacity :</strong> Approx. Capacity : {{$slug->capacity}}</p>
                        @if ($categories->count() != null)
                            <p class="printing-equi text-center">
                                <span> <strong>:: Producing Categories ::</strong></span>
                            </p>
                        @foreach($categories as $category)
                            <ul class="product-item">
                                @foreach($category as $data)
                                    <li>{{$data->name}}</li>
                                @endforeach
                            </ul>
                            @endforeach
                        @endif

                        @if ($equipments->count() != null)
                        <p class="printing-equi text-center print">
                            <strong>:: {{$slug->name}} Equipments ::</strong>
                        </p>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quality</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($equipments as $equipment)
                                <tr>
                                    <td>{{$equipment->item}}</td>
                                    <td>{{$equipment->quantity}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>

                <div class="col-md-5">

                    <div class="feature-item">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            @foreach($images as $image)
                                <div class="item"><img src="{{url($image->image)}}" alt=""></div>
                            @endforeach
                        </div>
                        <h2><strong>Image: </strong> {{$slug->image_details}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
