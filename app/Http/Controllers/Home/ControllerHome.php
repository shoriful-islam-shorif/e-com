<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\category;
use App\Models\color;
use App\Models\product;
use App\Models\size;
use App\Models\subCategory;
use App\Models\unit;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class ControllerHome extends Controller
{
   

    public function index()
    {  
        $categories = category::all();
        $subcategories = subCategory::all();
        $brands = brand::all();
        $units = unit::all();
        $sizes = size::all();
        $colors = color::all();
        $products=product::where('status',1)->latest()->limit(12)->get();


        return view('frontend.welcome', compact('products','categories', 'subcategories', 'brands', 'units', 'sizes', 'colors'));
    }

    public function viewProducts($id)
    {
        $categories = category::all();
        $subcategories = subCategory::all();
        $brands = brand::all();
        $units = unit::all();
        $product = product::findOrFail($id);
        $sizes = size::find($product->size_id);
        $colors = color::find($product->color_id);
        $cat_id=$product->cat_id;
        $related_products=product::where('cat_id',$cat_id)->limit(4)->get();
     
        return view('frontend.pages.view_details', compact('product', 'categories', 'subcategories', 'brands', 'units', 'sizes', 'colors', 'related_products'));
    }

    public function productByCat($id)
    {
        $categories = category::all();
        $subcategories = subCategory::all();
        $brands = brand::all();
        $products=product::where('cat_id',$id)->limit(12)->get();
        return view('frontend.pages.productBycat', compact('products', 'categories', 'subcategories', 'brands'));

    }

    public function productBySubCat($id)
    {
        $categories = category::all();
        $subcategories = subCategory::all();
        $brands = brand::all();
        $products = product::where('subcat_id',$id)->limit(12)->get();
        return view('frontend.pages.productBySubCat', compact('products', 'categories', 'subcategories', 'brands'));
    }
}
