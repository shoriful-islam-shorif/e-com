<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\ControllerHome;
use App\Http\Controllers\admin\ControllerAdmin;
use App\Http\Controllers\admin\SupperAdminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\sub_category\subCategoryController;
Use App\Http\Controllers\brandController;
use App\Http\Controllers\unitController;
use App\Http\Controllers\sizeController;
use App\Http\Controllers\colorController;
use App\Http\Controllers\productController;

Use App\Models\admin;
use App\Models\category;
use App\Models\subCategory;
use App\Models\brand;
use App\Models\unit;
use App\Models\size;
use App\Models\color;
use App\Models\product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('frontend.welcome');
});
*/
Route::get('/',[ControllerHome::class, 'index'])->name('frontend.welcome');

//login route

Route::get('/login',[ControllerAdmin::class,'login']);

Route::get('/registation', [ControllerAdmin::class, 'register']);

//deshboard
Route::get('/deshboard', [ControllerAdmin::class, 'deshboard'])->name('deshboard');
//logout
Route::get('/logout', [SupperAdminController::class, 'logout'])->name('logout');

Route::post('/admin_deshboard', [ControllerAdmin::class, 'show_deshboard'])->name('admin_deshboard');

Route::post('/admin_register', [ControllerAdmin::class, 'show_deshboard'])->name('admin_deshboard');


//resource 
Route::resource('categories', categoryController::class);
//sub_category
Route::resource('sub_categories', subCategoryController::class);
//brand
Route::resource('brands', brandController::class);
//unit
Route::resource('units',unitController::class);

//size
Route::resource('sizes', sizeController::class);
//color
Route::resource('colors', colorController::class);
//product
Route::resource('products', productController::class);







Route::get('/cat_status{category}', [categoryController::class, 'category_status'])->name('cat_status');

Route::get('/subcat_status{subcategory}', [subCategoryController::class, 'subcategory_status'])->name('subcat_status');

Route::get('/b_status{unit}', [unitController::class, 'brand_status'])->name('b_status');


Route::get('/unit_status{unit}', [unitController::class, 'unit_change_status'])->name('unit_status');

Route::get('/size_status{unit}', [sizeController::class, 'size_change_status'])->name('size_status');

Route::get('/color_status{color}', [colorController::class, 'colorChange_status'])->name('color_status');

Route::get('/product_status{product}', [productController::class, 'productChange_status'])->name('product_status');

Route::get('/view-product{id}', [ControllerHome::class, 'viewProducts'])->name('view-product');

Route::get('product_by_cat/{id}', [ControllerHome::class, 'productByCat'])->name('product_by_cat');
Route::get('/product_By_SubCat/{id}', [ControllerHome::class, 'productBySubCat'])->name('product_By_SubCat');

