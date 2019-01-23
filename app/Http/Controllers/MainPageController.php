<?php

namespace App\Http\Controllers;

use App\Model\Equiment;
use App\Model\PhotoCategory;
use Illuminate\Http\Request;
use App\Model\Slider;
use App\Model\Client;

class MainPageController extends Controller
{
    public function index(){
        $slider_images =  Slider::orderBy('created_at', 'DESC')->get();
        $photo_categories =  PhotoCategory::orderBy('created_at', 'DESC')->take(3)->get();
        $equipments =  Equiment::orderBy('created_at', 'DESC')->take(6)->get();
        $clients =  Client::orderBy('created_at', 'DESC')->get();
        return view('frontend.home', compact('slider_images', 'clients', 'photo_categories', 'equipments'));
    }
}
