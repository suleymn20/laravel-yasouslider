<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Slider;

class Homepage extends Controller
{
    public function index(){
      return view('front.homepage');
    }
}
