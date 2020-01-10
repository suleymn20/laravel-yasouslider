<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Slider;

class Dashboard extends Controller
{
    public function index(){
      $admins=Admin::orderBy('created_at','desc')->get();
      $sliders=Slider::orderBy('created_at','desc')->get();
      $noyayin=Slider::where('status','0')->count('status');
      $yayinda=Slider::where('status','1')->count('status');
      $bekliyor=Slider::where('adminstatu',0)->count('adminstatu');
      $onaylanan=Slider::where('adminstatu',3)->count('adminstatu');
      return view('back.dashboard',compact('sliders','admins','noyayin','yayinda','bekliyor','onaylanan'));
    }
}
