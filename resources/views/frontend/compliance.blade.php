@extends('frontend._partial.app')
@section('title', 'Cutting')
@section('body')
    <div class="single-banner">
        <img src="{{ asset('/') }}frontend/images/banner/01.PNG">
        <div class="banner-content">
            <h1>Cutting</h1>
            <ol class="banner-list">
                <li>Home</li>
                <li><i class="fa fa-angle-right"></i></li>
                <li><a href="#">cutting</a></li>
            </ol>
        </div>
    </div>
    <div class="item-discription section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="item-content">
                        <h2>Our Cutting Facility</h2>
                        <p><strong>Flooar Space :</strong>10,000 Square Feet</p>
                        <p><strong>Capacity :</strong>15,000 Pcs / Day</p>
                        <p>We produce almost all kinds of knitwear items like t-shirt, polo-shirt, tank-top, jacket, cardigan, sweat-shirt, trouser, shorts etc. of ladies, men’s, boys, girls & kids including fancy items with print, embroidery, stone, beads, sequins etc. We’re exporting our garments to European countries specially in Germany. Our most honorable prime buyers are H. Obermeyer GmbH & Co., Metro Group & AEON. We’re also working for Ernsting’s Family, Tornado, Babyshop, Intersports & C-Toys through agents.</p>
                        <p>We’ve all the facilities & supports in well organized form to manufacturer 10-12 lines garments which sum up production capacity 250,000 pcs approx. per month. To ensure good quality & customer’s satisfaction we’ve achieved Oekotex Standard 100 Product Class 1. Also we’re working for Social Compliance to optimize synchronization of the products. We will take pleasure if you are interested & let us know your requirements so that we could offer you a better service with competitive price.</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="feature-item">
                        <img src="{{ asset('/') }}frontend/images/category/01.jpg">
                        <h2><strong>Image:</strong>Our Cuting Room</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
