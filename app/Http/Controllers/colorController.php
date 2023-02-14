<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;

class colorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
     $colors=color::all();
     
        return view('color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        color::create([
            'color' => json_encode($request->color)
        ]);

        return redirect()->back()->with('success', 'Update successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(color $color)
{
     
       
        return view('color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,color $color)
    {
        $update =$color->update([
            'color' => json_encode($request->color)
        ]);

        return redirect()->back()->with('success', 'Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(color $color)
    {
         $delete=$color->delete();
         if($delete)
            return redirect()->back()->with('success', 'Delete successfully!');

    }
}
