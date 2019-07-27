<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data=Blog::all();
     return view('show',compact('data'));
 }


 public function create()
 {
    return view('addData');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $object=new Blog();
      $object->name=$request->name;
      $object->type=$request->type;
      if($request->hasFile('image')){
         $extension=$request->image->extension();
         $filename=time()."_.".$extension;
         $request->image->move(public_path('images'),$filename);
         $object->image=$filename;
     }


     $object->description=$request->description;
     $object->save();

     return redirect(route('info.index'));

 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $data=Blog::find($id);  
     return view('editData',compact('data'));
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
        $object=Blog::find($id);
        $object->name=$request->name;
        $object->type=$request->type;
        if($request->hasFile('image')){
         $extension=$request->image->extension();
         $filename=time()."_.".$extension;
         $request->image->move(public_path('images'),$filename);
        }
         $object->image=$filename;
         $object->description=$request->description;
         $object->save();
         return redirect(route('info.index'));
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Blog::find($id)->delete();
        return redirect(route('info.index'));
    }
}
