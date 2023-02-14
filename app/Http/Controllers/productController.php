<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\brand;
use App\Models\category;
use App\Models\color;
use App\Models\product;
use App\Models\size;
use App\Models\subCategory;
use App\Models\unit;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=product::all();
      
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::all();
        $subcategories=subCategory::all();
        $brands=brand::all();
        $units=unit::all();
        $sizes=size::all();
        $colors=color::all();
        return view('product.create',compact('categories', 'subcategories', 'brands', 'units', 'sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new product();
        $product->cat_id=$request->category;
        $product->subcat_id=$request->subcategory;
        $product->brand_id=$request->brand;
        $product->unit_id=$request->unit;
        $product->size_id=$request->size;
        $product->color_id=$request->color;
        $product->code=$request->code;
        $product->name=$request->name;
        $product->discription=$request->discription;
        $product->price=$request->price;

        $images=array();
        if($files=$request->file('file')){
            $i=0;
            foreach($files as $file){
                
                $name = $file->getClientOriginalName();
                $fileNameExtract = explode('.', $name);
                $fileName = $fileNameExtract[0];
                $fileName .= time();
                $fileName .= $i;
                $fileName .= '.';
                $fileName .= $fileNameExtract[1];

                $file->move('image', $fileName);
                $images[] = $fileName;
                $i++;

            }

            $product['image'] = implode("|", $images);

            $product->save();
            return redirect()->back()->with('success', 'insert successfully!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productChange_status(product $product)
    {
        if($product->status==1){
        $product->update((['status'=>0]));
        }else{
            $product->update((['status'=>1]));
        }
        return redirect()->back()->with('success', 'Update successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $categories = category::all();
        $subcategories = subCategory::all();
        $brands = brand::all();
        $units = unit::all();
        $sizes = size::all();
        $colors = color::all();
        
        return view('product.edit', compact('product','categories', 'subcategories', 'brands', 'units', 'sizes', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $size=explode(',',$request->size);
        $color=explode(',',$request->color);
        $update = $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'cat_id' => $request->category,
            'subcat_id' => $request->subcategory,
            'brand_id' => $request->brand,
            'unit_id' => $request->unit,
            'size_id' =>(int)Json_encode($size),
            'color_id' =>(int)Json_encode($color),
            'discription' => $request->discription,
            'price' => $request->price,
        ]);

        if ($update)
            return redirect()->back()->with('success', 'Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $delete = $product->delete();
        if ($delete)
        return redirect()->back()->with('success', 'Delete successfully!');
    }
}
