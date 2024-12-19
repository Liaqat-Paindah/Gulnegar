<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Models;
use App\Models\Sewings;
use App\Models\Fabrics;

class CustomController extends Controller
{
    public function Approved()
    {
        $Products=DB::table('products')->join('fabrics', 'fabrics.id', '=' , 'products.Fabric_ID')->join('models', 'models.id', '=' , 'products.Model_ID')->join('sewings', 'sewings.id', '=' , 'products.Sewing_ID')
        ->select('products.id', 'products.Images','products.Size', 'products.Color', 'products.Name', 'products.Date', 'products.Price', 'products.Gender', 'products.Weight', 'products.Desc', 'products.Status', 'products.Order_status', 'models.Model_Name', 'fabrics.fabric_Name', 'sewings.Sewing_Name' )->where('Order_status', '=', 'Approved')->orderBy('products.id', 'DESC')->paginate(12);
        return response()->json($Products);
    }
    public function Pendding()
    {
        $Products=DB::table('products')->join('fabrics', 'fabrics.id', '=' , 'products.Fabric_ID')->join('models', 'models.id', '=' , 'products.Model_ID')->join('sewings', 'sewings.id', '=' , 'products.Sewing_ID')
        ->select('products.id', 'products.Images','products.Size', 'products.Color', 'products.Name', 'products.Date', 'products.Price', 'products.Gender', 'products.Weight', 'products.Desc', 'products.Status', 'products.Order_status', 'models.Model_Name', 'fabrics.fabric_Name', 'sewings.Sewing_Name' )->where('Order_status', '=', 'Pendding')->orderBy('products.id', 'DESC')->paginate(12);
        return response()->json($Products);
    }

    public function ShowModels()
    {
        $models=models::orderBy("id","DESC")->get();
        return response()->json($models);
    }

    public function ShowFabrics()
    {
        $models=fabrics::orderBy("id","DESC")->get();
        return response()->json($models);
    }    
    
    
    public function ShowSewings()
    {
        $models=sewings::orderBy("id","DESC")->get();
        return response()->json($models);
    }
    public function DeleteProduct($id)
    {
        $Delete = products::find($id);
        $Delete->delete();
        return response()->json('Delete Successfully done!');
    }
}
