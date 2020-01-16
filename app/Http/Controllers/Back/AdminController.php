<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sliders=Slider::orderBy('created_at','desc')->get();

      $admins=Admin::orderBy('created_at','desc')->get();
      return view('back.admin.adminlist',compact('admins','sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $sliders=Slider::orderBy('created_at','desc')->get();
      $admins=Admin::orderBy('created_at','desc')->get();
      return view('back.admin.create',compact('admins','sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed'
      ]);

      $admin=new Admin;
      $admin->name=$request->name;
      $admin->email=$request->email;
      $admin->password=bcrypt($request->password);
      $admin->save();
      toastr()->success('Yönetici başarıyla eklendi.', 'Başarılı');
      return redirect()->route('admin.yoneticiler.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin=Slider::findOrFail($id);
        return view('back.admin.views',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $sliders=Slider::orderBy('created_at','desc')->get();
      $admin=Admin::findOrFail($id);
      return view('back.admin.update',compact('admin','sliders'));
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
        'name' => 'required',
        'email' => 'required|email',
    ]);

    $admin=Admin::findOrFail($id);
    $admin->name=$request->name;
    $admin->email=$request->email;
    if(!$request->password==null){
      $admin->password=bcrypt($request->password);
    }
    if($request->hasFile('image')){
      $imageName=str_slug($request->name).'.'.$request->image->getClientOriginalExtension();
      $request->image->move(public_path('uploads/admins'),$imageName);
      $admin->image='uploads/admins/'.$imageName;
    }
    $admin->save();
    toastr()->success('Yönetici başarıyla güncellendi', 'Başarılı');
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id)
     {
       Admin::find($id)->delete();
       toastr()->success('Mesaj Başarıyla Silindi');
       return redirect()->route('admin.yoneticiler.index');
     }
     public function trashed()
     {
       $sliders=Slider::orderBy('created_at','desc')->get();
       $admins= Admin::onlyTrashed()->orderBy('created_at','desc')->get();
       return view('back.admin.trashed',compact('admins','sliders'));
     }
     public function recover($id)
     {
       Admin::onlyTrashed()->find($id)->restore();
       toastr()->success('Yönetici Başarıyla Geri Yüklendi');
       return redirect()->Back();
     }
     public function HardDelete($id)
     {
       $admin=Admin::onlyTrashed()->find($id);

       $admin->forceDelete();
       toastr()->success('Yönetici Başarıyla Silindi');
       return redirect()->route('admin.yoneticiler.index');
     }
    public function destroy($id)
    {
        //
    }

    public function single($id,$slug){
      $data['slider']=$slider=Slider::whereId($id)->whereSlug($slug)->first() ?? abort(404, 'Böyle bir sayfa yok');
      $data['slider']=$slider;
      $sliders=Slider::orderBy('created_at','desc')->get();
      return view('back.single',compact('sliders'),$data);
    }

    public function switch(Request $request){
      $slider=Slider::findOrFail($request->id);
      $slider->status=$request->statu=="true" ? 1 : 0;
      $slider->save();
    }
}
