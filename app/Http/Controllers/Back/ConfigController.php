<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Slider;
use App\Models\Admin;
use File;

class ConfigController extends Controller
{
    public function index(){
      $admins=Admin::orderBy('created_at','desc')->get();
      $sliders=Slider::orderBy('created_at','desc')->get();
      $config=Config::find(1);
      return view('back.config.index',compact('config','admins','sliders'));
    }
    public function update(Request $request){
      $config=Config::find(1);
      $config->sitename=$request->sitename;
      $config->copyright=$request->copyright;
      $config->author=$request->author;
      $config->title=$request->title;
      $config->sliderkontol=$request->sliderkontrol;
      $config->ordercount=$request->ordercount;
      $config->active=$request->active;

      if($request->hasFile('logo')){
        $logo=str_slug($request->title).'-logo.'.$request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('uploads'),$logo);
        $config->logo='uploads/'.$logo;
      }
      $config->save();
      if($request->hasFile('favicon')){
        $favicon=str_slug($request->title).'-favicon.'.$request->favicon->getClientOriginalExtension();
        $request->favicon->move(public_path('uploads'),$favicon);
        $config->favicon='uploads/'.$favicon;
      }
      $config->save();
      toastr()->success('Ayarlar Başarıyla Güncellendi','Başarılı');
      return redirect()->back();
    }
}
