<?php

namespace App\Http\Controllers;
use App\Models\customers;
use App\Models\deliveries;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=customers::get();
        return response()->json($customers);
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

        $id = random_int(100000, 999999);
        $Store= new customers();
        $Store->id= $id;
        $Store->Customer_Name = $request->Name;
        $Store->LastName = $request->LastName;
        $Store->Phone = $request->Phone;
        $Store->Email = $request->Email;
        $Store->Password = Hash::make($request->password);
        $Store->Product_ID = $request->Product_ID;
        $Store->save();
        $Save= new deliveries();
        $Save->Country = $request->Country;
        $Save->Province = $request->City;
        $Save->City = $request->Code;
        $Save->District = $request->Region;
        $Save->Home = $request->Home;
        $Save->Address = $request->Address;
        $Save->Status = $request->Send;
        $Save->Customer_ID= $id;
        $Save->Product_ID= $request->Product_ID;
        $Save->save();
        return response()->json('Customer Registered!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers=DB::table('customers')->join('products', 'customers.Product_ID', '=' , 'products.id')->where('customers.Product_ID','=',$id)->get();
        return response()->json($customers);
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
        //
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
     
        $user = customers::where('Email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->Password) ) {
            //
            throw ValidationException::withMessages([
                'email' => 'Dear User! Please check your email and password.'
            ]);
        }
     
        return $user->createToken($request->device_name)->plainTextToken;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete = customers::find($id);
        $Delete->delete();
        return response()->json('Delete Successfully done!');
    }
}
