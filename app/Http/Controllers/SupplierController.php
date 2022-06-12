<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Supplier::all();     
        return view('supplier.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Supplier();

        $file=$request->file('logo');
        $imgFolder='img';
        $imgFile=time()."_".$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $data->logo=$imgFile;

        $data->name=$request->get('name');
        $data->save();
        return redirect()->route('suppliers.index')->with('status','Supplier is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($supplier)
    {
        $data=Supplier::find($supplier);       
        return view('supplier.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->name=$request->get('name');
        $supplier->save();
        return redirect()->route('suppliers.index')->with('status','Supplier data is changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($supplier)
    {
        $this->authorize('delete-permission',$supplier);
        try{
            $data=Supplier::find($supplier);
            $data->delete();
            return redirect()->route('suppliers.index')->with('status','Data Supplier berhasil dihapus');
        }   catch(\PDOException $e){
            $msg="Data gagal dihapus. Pastikan data child sudah hilang dan tidak berhubungan";

            return redirect()->route('suppliers.index')->with('error',$msg); 
        }    
    }

    public function getEditForm(Request $request){
        $id=$request->get('id');
        $data=Supplier::find($id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('supplier.getEditForm',compact('data'))->render()
        ),200);
    }
    public function getEditForm2(Request $request){
        $id=$request->get('id');
        $data=Supplier::find($id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('supplier.getEditForm2',compact('data'))->render()
        ),200);
    }
    public function saveDataField(Request $request){
        $id=$request->get('id');
        $fname= $request->get('fname');
        $value=$request->get('value');

        $Supplier=Supplier::find($id);
        $supplier->$fname=$value;
        $supplier->save();
        return response()->json(array(
            'status'=>'ok',
            'msg'=>'supplier data updated'
        ),200);
    }
}
