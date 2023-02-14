<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\unit;

class unitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = unit::all();

      return view('unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = new unit();
        $unit->name = $request->name;
        $unit->discription = $request->discription;
        $unit->save();
        return redirect()->back()->with('success', 'add successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unit_change_status(unit $unit)
    {
        if($unit->status==1){
            $unit->update(['status'=>0]);
        }else{
            $unit->update(['status'=>1]);
  
        }
        return redirect()->back()->with('success', 'change successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(unit $unit){

        return view('unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unit $unit )
    {
        $update=$unit->update([
            'name'=>$request->name,
        'discription'=>$request->discription
        ]);
        if($update)
            return redirect()->back()->with('success', 'Update successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
