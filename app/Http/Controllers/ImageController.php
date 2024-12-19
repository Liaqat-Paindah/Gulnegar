<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Images=image::orderBy('id', 'DESC')->paginate(12);
        return response()->json($Images);
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
        $Store= new Image();
        $name=$request->file('Image');
        $File_name=time().'_'.$name->getClientOriginalName();
        $file_path=$name->move('Images/Products', $File_name);
        $Store->Image_Path =$file_path;
        $Store->Product_Name = $request->Name;
        $Store->Product_ID = $request->Product_ID;
        $Store->save();
        return response()->json('Image Saved successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($Product_ID)
    {
        $Image=DB::table('images')->join('products', 'images.Product_ID', '=' , 'products.id')->where('images.Product_ID','=',$Product_ID)->limit(3)->get();
        return response()->json($Image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    public function update(Request $request, Image $image)
    {
        //
    }

    public function destroy($id)
    {
        $Delete = image::find($id);
        $Delete->delete();
        return response()->json('Delete Successfully done!');
    }
}
