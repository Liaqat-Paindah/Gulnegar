<?php

namespace App\Http\Controllers;
use App\Models\models;
use DB;
use App\Models\products;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        $models=models::orderBy("id","DESC")->get();
        return response()->json($models);
    }

    public function create()
    {
        
    }
    public function store(Request $request)
    {
    
    }
    public function show($Model_ID)
    {
        $Products=DB::table('models')->join('products', 'models.id', '=' , 'products.Model_ID')->where('products.Model_ID','=',$Model_ID)->orderBy('models.id', 'DESC')->limit(12)->get();
        return response()->json($Products);

     }
    public function edit($id)
    {
    
    }
    public function update(Request $request, $id)
    {
        
    }
    public function destroy($id)
    {
        
    }
}
