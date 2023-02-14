<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\brand;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class brandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $brands=brand::all();
        return  view('brand.index',compact('brands'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand= new brand();
        $brand->name= $request->name;
        $brand->discription=$request->discription;
        $brand->save();
        return redirect()->back()->with('success', 'add successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brand_status(brand $brand)
    {
        if($brand->status==1){
            $brand->update(['status'=>0]);
        }else{
            $brand->update(['status'=>1]);

        }
        return redirect()->back()->with('success', 'status change successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(brand $brand)
    {
        return view('brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, brand $brand)
    {
        $update=$brand->update([
            'name'=>$request->name,
            'discription' => $request->discription,

        ]);
        if($update)
            return redirect()->back()->with('success', 'update successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(brand $brand)
    {
        $delete=$brand->delete();
        if($delete)
        return redirect()->back()->with('success', 'Delete successfully!');

    }
}
