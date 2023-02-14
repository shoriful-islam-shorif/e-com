<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Http\Requests;
use App\Models\category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $categories=category::all();
         return view('category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        return view('category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $category= new category;
        $category->id=$request->category;
        $category->name=$request->name;
        $category->discription=$request->discription;
        
        if($request->hasfile('image')){
            $file=$request->file('image');
            $Extension= $file->getClientOriginalExtension();
            $filename=time().'.'.$Extension;
            $file->move('category',$filename);
            $category->image=$filename;
        }

        $category->save();
        return redirect()->back()->with('success', 'successfully inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category_status(Category $category)
    {
        if($category->status==1){
        $category->update(['status'=>0]);
    }else{
            $category->update(['status'=>1]);

    }
        return redirect()->back()->with('success', 'status change successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $update=$category->update([
        'name'=>$request->name,
        'discription'=>$request->discription,
        'image'=>$request->file('image')->store('category')     ]);    
         if($update)
     

        return redirect()->back()->with('success', 'status update successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
      $delete=$category->delete();
      if($delete)

        return redirect()->back()->with('success', 'Delete successfully!');

    }
}
