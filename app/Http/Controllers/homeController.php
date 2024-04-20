<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function ProductDetails(){
        return view('home.productDetails');
    }
// checout founction start
    public function checkout(){
      
        return view('home.checkout');

    }
    //shop page view
    public function shop(){
        return view('home.shop');
    }
    //return process
    public function returnProcess(){
        return view('home.return_process');
    } 
}
