<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'cat_id', 'subcat_id', 'brand_id', 'unit_id', 'size_id', 'color_id', 'code', 'name', 'discription', 'price', 'image','status','oldPrice'];

    public function category()
    {
        return $this->belongsTo(category::class, 'cat_id');
        

    }
    public function subCategory()
    {
        return $this->belongsTo(subcategory::class, 'subcat_id');
    }
    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id');    
    }

    public function unit()
    {
        return $this->belongsTo(unit::class, 'unit_id');
    }

    public function size()
    {
        return $this->belongsTo(size::class, 'size_id');
    }

    public function color()
    {
        return $this->belongsTo(color::class, 'color_id');
    }

    public static function catProductCount($cat_id)
    {
        $catCount=product::where('cat_id',$cat_id)->where('status',1)->count();
        return $catCount;
    }

    public static function subCatProductCount($subcat_id)
    {
        $subCatCount =product::where('subcat_id', $subcat_id)->where('status', 1)->count();
        return $subCatCount;
    }

    public static function brandProductCount($brand_id)
    {
        $brandCount = product::where('brand_id', $brand_id)->where('status', 1)->count();
        return $brandCount;
    }

    
   
}




