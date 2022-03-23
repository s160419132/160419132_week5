<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('obat','MedicineController');
Route::resource('kategori_obat','CategoryController');

Route::get('/report/listmedicine/{id}','CategoryController@showlist')->name('reportShowMedicine');
Route::get('/report/listCategory','CategoryController@showlistcategory')->name('reportShowListCategory');
Route::get('/report/listMedicineandCategoryName','MedicineController@listmedicineandcategoryname')->name('reportShowListMedicineAndCategoryname');
Route::get('/report/list_category_didnt_have_medicine','CategoryController@showlistcategorynohavemedicine')->name('showlistcategorynohavemedicine');
