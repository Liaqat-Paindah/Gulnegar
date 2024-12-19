<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products=DB::table('products')->join('fabrics', 'fabrics.id', '=' , 'products.Fabric_ID')->join('models', 'models.id', '=' , 'products.Model_ID')->join('sewings', 'sewings.id', '=' , 'products.Sewing_ID')
        ->select('products.id', 'products.Images','products.Size', 'products.Color', 'products.Name', 'products.Date', 'products.Price', 'products.Gender', 'products.Weight', 'products.Desc', 'products.Status', 'products.Order_status', 'models.Model_Name', 'fabrics.fabric_Name', 'sewings.Sewing_Name' )->orderBy('products.id', 'DESC')->paginate(12);
        return response()->json($Products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $Store= new products();
        $Store->id = $request->id;
        $Store->Name = $request->Name;
        $Store->Color = $request->Color;
        $Store->Size = $request->Size;
        $Store->Price = $request->Price;
        $Store->Gender = $request->Gender;
        $Store->Date = $request->Date;
        $Store->Weight = $request->Weight;
        $name=$request->file('Image');
        $File_name=time().'_'.$name->getClientOriginalName();
        $file_path=$name->move('Images', $File_name);
        $Store->Images =$file_path;
        $Store->Desc = $request->Desc;
        $Store->Status = $request->Status;
        $Store->Order_status = $request->Status;
        $Store->Fabric_ID = $request->Fabric;
        $Store->Model_ID = $request->Model;
        $Store->Sewing_ID = $request->Sewing;
        $Store->Catagories_ID = $request->Catagory;
        $Store->save();
        return response()->json('Product created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products= products::find($id);
        return response()->json($products);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products=products::find($id);
        $products->update($request->all());
        return response()->json('Update Successfully complete'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete = products::find($id);
        $Delete->delete();
        return response()->json('Delete Successfully done!');
    }
}
