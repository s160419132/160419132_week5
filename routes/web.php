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

Route::resource('medicines','MedicineController');
Route::resource('categories','CategoryController');

Route::middleware(['auth'])->group(function(){
    Route::resource('suppliers','SupplierController');
    Route::post('/supplier/getEditForm','SupplierController@getEditForm')->name('supplier.getEditForm');
    Route::post('/supplier/getEditForm2','SupplierController@getEditForm2')->name('supplier.getEditForm2');
    Route::post('/supplier/saveDataField','SupplierController@saveDataField')->name('supplier.saveDataField');
    Route::get('/checkout','TransactionController@form_submit_front');
    Route::get('/submit_checkout','TransactionController@submit_front')->name('submitcheckout');
});
Route::get('/report/listmedicine/{id}','CategoryController@showlist')->name('reportShowMedicine');
Route::get('/report/listCategory','CategoryController@showlistcategory')->name('reportShowListCategory');
Route::get('/report/listMedicineandCategoryName','MedicineController@listmedicineandcategoryname')->name('reportShowListMedicineAndCategoryname');
Route::get('/report/list_category_didnt_have_medicine','CategoryController@showlistcategorynohavemedicine')->name('showlistcategorynohavemedicine');
Route::get('/report/list_categories_have_1_medicine','CategoryController@showlistcategorywithonemedicine')->name('showlistcategorywithonemedicine');
Route::get('/report/expensive_medicine','MedicineController@expensiveMedicine')->name('expensiveMedicine');
Route::post('/products/showInfo','MedicineController@showInfo')->name('products.showInfo');
Route::get('/transaction/index','TransactionController@getTransaction');
Route::get('/transaction/index/{id}','TransactionController@detailtransaksi');
Route::get('/','MedicineController@front_index');
Route::get('cart','MedicineController@cart');
Route::get('add-to-cart/{id}','MedicineController@addToCart');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
