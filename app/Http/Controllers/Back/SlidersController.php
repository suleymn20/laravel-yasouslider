<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Validator;
use Illuminate\Support\Facades\File;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sliders=Slider::orderBy('order','desc')->get();
      return view('back.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules=[
        'title'=>'min:3|required',
        'author'=>'min:3|required',

      ];
  $validate=Validator::make($request->post(),$rules);

  if($validate->fails()){
    return redirect()->back()->withErrors($validate)->withInput();
  }

      $last=Slider::orderBy('order','desc')->first();
      $slider=new Slider;
      $slider->title=$request->title;
      $slider->author=$request->author;
      $slider->email=$request->email;
      $slider->order=$last->order+1;
      $slider->adminstatu=$request->adminstatu;
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
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $sliders=Slider::findOrFail($id);
      return view('back.sliders.views',compact('sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $slider=Slider::findOrFail($id);
      return view('back.sliders.update',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
      'title'=>'min:3',
      'image'=>'image|mimes:jpeg,png,jpg|max:2000'
    ]);

    $slider=Slider::findOrFail($id);
    $slider->title=$request->title;
    $slider->author=$request->author;
    $slider->adminstatu=$request->adminstatu;
    $slider->titleslug=str_slug($request->title);

    if($request->hasFile('image')){
      $imageName=str_slug($request->title).'.'.$request->image->getClientOriginalExtension();
      $request->image->move(public_path('uploads'),$imageName);
      $slider->image='uploads/'.$imageName;
    }
    $slider->save();
    toastr()->success('Slider başarıyla güncellendi', 'Başarılı');
    return redirect()->back();
    }
    public function delete($id)
     {
       Slider::find($id)->delete();
       toastr()->success('Slider Başarıyla Silindi');
       return redirect()->route('admin.sliders.index');
     }
     public function trashed()
     {
       $sliders=Slider::orderBy('created_at','desc')->get();
       $slidersl= Slider::onlyTrashed()->orderBy('created_at','desc')->get();
       return view('back.sliders.trashed',compact('sliders','slidersl'));
     }
     public function recover($id)
     {
       Slider::onlyTrashed()->find($id)->restore();
       toastr()->success('Slider Başarıyla Geri Yüklendi');
       return redirect()->Back();
     }
     public function HardDelete($id)
     {
       $slider=Slider::onlyTrashed()->find($id);
       if(File::exists($slider->image)){
         File::delete(public_path($slider->image));
       }
       $slider->forceDelete();
       toastr()->success('Slider Başarıyla Silindi');
       return redirect()->back();
     }
    public function destroy($id)
    {
        //
    }

    public function single($id,$slug){
      $data['slider']=$slider=Slider::whereId($id)->first() ?? abort(404, 'Böyle bir sayfa yok');
      $data['slider']=$slider;
      $sliders=Slider::orderBy('created_at','desc')->get();
      return view('back.single',compact('sliders'),$data);
    }
    public function singleget(Request $request, $id){
      $slider=Slider::findOrFail($request->id);
      $slider->not=$request->not;
      $slider->save($request->all());
      toastr()->success('Notunuz başarıyla güncellendi', 'Başarılı');
      return redirect()->back();
    }

    public function switch(Request $request){
      $slider=Slider::findOrFail($request->id);
      $slider->status=$request->statu=="true" ? 1 : 0;
      $slider->save();
    }
}
