<?php

namespace App\Http\Controllers\sub_category;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class subCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = subcategory::all();
        return view('sub_category.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=category::all();
        return view('sub_category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory = new subCategory;
        $subcategory->cat_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->discription = $request->discription;

        

        $subcategory->save();
        return redirect()->back()->with('success', 'successfully inserted!');
    
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
    public function edit(subCategory $subCategory)
    {
        $categories = category::all();
        return view('sub_category.edit',compact('categories','subCategory'));

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subCategory $subcategory)
    {

            $update= $subcategory->update([
            'name'=>$request->name,
            'cat_id' => $request->category,
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
    public function destroy(subCategory $subCategory)
    {
       $delete=$subCategory->delete();
       if($delete)
        return redirect()->back()->with('success', 'Delete successfully!');
    }

    public function subcategory_status(subcategory $subcategory)
    {
        if ($subcategory->status == 1) {
            $subcategory->update(['status' => 0]);
        } else {
            $subcategory->update(['status' => 1]);
        }
        return redirect()->back()->with('success', 'status change successfully!');
    }
}
