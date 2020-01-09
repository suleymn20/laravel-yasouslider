<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Mail;
use Validator;
//Models
use App\Models\Slider;

class Homepage extends Controller
{

    public function index(){
      $sliders=Slider::orderBy('order','desc')->where('status',1)->where('adminstatu','Onaylandı')->get();
      $sliderorder=Slider::latest()->where('status',1)->first();
      return view('front.homepage',compact('sliders','sliderorder'));
    }
    public function slideradd(){
      return view('front.slideradd');
    }
    public function sliderpost(Request $request){
          $rules=[
            'title'=>'min:3|required',
            'author'=>'min:3|required',

          ];
      $validate=Validator::make($request->post(),$rules);

      if($validate->fails()){
        return redirect()->route('slider.add')->withErrors($validate)->withInput();
      }

          $last=Slider::orderBy('order','desc')->first();
          $slider=new Slider;
          $slider->title=$request->title;
          $slider->author=$request->author;
          $slider->email=$request->email;
          $slider->order=$last->order+1;
          $slider->ipadres=$request->getClientIp();
          $slider->authorslug=str_slug($request->author);
          $slider->titleslug=str_slug($request->title);

          if($request->hasFile('image')){
            $imageName=str_slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $slider->image='uploads/'.$imageName;
          }
          $slider->save();
          toastr()->success('Sliderınız başarıyla ekiplere gönderildi', 'Başarılı');
          return redirect()->route('slider.add');

    }
}
