<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datas=Category::all();     
      return view('category.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("category.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Category();
        $data->name=$request->get('name');
        $data->description=$request->get('description');
        $data->save();
        return redirect()->route('categories.index')->with('status','Categories is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $data=Category::find($category);       
        return view('category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name=$request->get('name');
        $category->description=$request->get('description');
        $category->save();
        return redirect()->route('categories.index')->with('status','Category data is changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function showlist($id_category){
        //Method#2: Eloquent
        $data= Category::find($id_category);
        $namecategory= $data->name;
        //
        $result = $data->medicines;
        // dd($result);   

        if($result)
            $getTotaldata=$result->count();
        else $getTotaldata=0;

        return view('report.list_medicines_by_category',compact('id_category','namecategory','result','getTotaldata'));
    }

    public function showlistcategory(){
        $data=Category::all();
        if($data)
            $totalCategory=$data->count();
        else
            $totalCategory=0;
        return view('report.list_category',compact('data','totalCategory'));
    }

    public function showlistcategorynohavemedicine(){
        $data=DB::table("categories")->leftJoin("medicines", function($join){
	    $join->on("categories.id", "=", "medicines.category_id");
        })->select("name")->whereNull("medicines.category_id")->get();
        if($data)
            $totalCategory=$data->count();
        else
            $totalCategory=0;       
        return view('report.list_category_didnt_have_medicine',compact('data','totalCategory'));
    }

    public function showlistcategorywithonemedicine(){
        $data= DB::select(DB::raw("SELECT * FROM categories as a INNER JOIN (SELECT c.id as 'id',count(m.id) as 'jumlah' FROM medicines as m INNER JOIN categories as c ON m.category_id=c.id GROUP BY c.id) as b ON a.id=b.id WHERE b.jumlah=1;"));
       
        return view('report.list_categories_have_1_medicine',compact('data'));
    } 
}
