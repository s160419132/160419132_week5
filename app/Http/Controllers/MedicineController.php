<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function front_index()
    {
        $medicines=Medicine::all();
        return view('frontend.product',compact('medicines'));
    }
    public function index()
    {
       //untuk Query dengan RAW
       $queryRaw= DB::select(DB::raw('select * from medicines'));
       // dd($queryBuilder);
       //untuk Query Builder
       $queryBuilder=DB::table('medicines')->get();
       // dd($queryBuilder);
       //untuk Query dengan model
       $queryModel=Medicine::all();
       // dd($queryModel);

       return view('medicine.index',compact('queryBuilder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("medicine.create");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show($medicine)
    {
        // dd($medicine);
        $res= Medicine::find($medicine);
        if($res)
        {
            $message=$res;
            // dd($message);
        }
        else{
            $message= NULL;
        }
        return view('medicine.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
    
    public function listmedicineandcategoryname(){
        $data=DB::table('medicines')
        ->join('categories','medicines.category_id','=','categories.id')
        ->select('medicines.id','medicines.generic_name','medicines.form','categories.name')
        ->get();
        return view('report.list_medicine_and_category_name',compact('data'));
    }

    public function expensiveMedicine(){
        
        $data= DB::select(DB::raw("SELECT generic_name,category_id FROM medicines WHERE price = (SELECT max(price) FROM medicines);"));
        return view('report.expensive_medicine',compact('data'));
    }
    public function showInfo()
    {
        $result=Medicine::orderBy('price','DESC')->first();
        return response()->json(array(
          'status'=>'oke',
          'msg'=>"<div class='alert alert-info'>
          Did you know? <br>The most expensive product is ". $result->generic_name ."</div>"
        ),200);
      
    }

    public function addToCart($id){
        $p=Medicine::find($id);
        $cart=session()->get('cart');
        if(!isset($cart[$id])){
            $cart[$id]=[
                "name"=>$p->generic_name,
                "quantity"=>1,
                "price"=>$p->price,
                "photo"=>$p->image
            ];
        }else{
            $cart[$id]['quantity']++;
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product added to cart successfully');
    }

    public function cart(){
        return view('frontend.cart');
    }

}
