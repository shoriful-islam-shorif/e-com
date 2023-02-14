<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;


use Illuminate\Http\Request;
use App\Models\size;

class sizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sizes=size::all();
       // dd($sizes);
        return view('size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
     return view('size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //  $size=explode(',',$request->size);
        size::create([
            'size' => json_encode($request->size)
        ]);

        return redirect()->back()->with('success', 'Update successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function size_change_status(size $size)
    {
        if ($size->status == 1) {
            $size->update(['status' => 0]);
        } else {
            $size->update(['status' => 1]);
        }
        return redirect()->back()->with('success', 'status change successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(size $size)
    {    


        $sizes = json_decode(size::all());

        return view('size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, size $size)

    {
        $update=$size->update([
            'size' => json_encode($request->size)
        ]);

        return redirect()->back()->with('success', 'Update successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(size $size)
    { 
        $delete=$size->delete();
        if($delete)
        return redirect()->back()->with('success', 'Delete successfully!');

    }
}
