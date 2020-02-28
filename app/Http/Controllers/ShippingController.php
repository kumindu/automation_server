<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
class Shipping extends Controller
{
    public function index()
    {
        $Profile = Profile::all();
        return $Profile->toJson(JSON_PRETTY_PRINT);
    }

    public function show(Request $request)
    {
        try {
            $Profile = Profile::where('email',$request->email);
            return $Profile;
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'status' => 'unsuccessfull',
                'message' => $exception->getMessage()
            ]);
        }

    }

    public function edit(Request $request)
    {
        try {
            $Profile = Profile::where('email',$request->email)->get();
            if(!is_null($Profile)){
                  if($request->isShipping_address){
                    $Profile->Shipping_country=$request->Shipping_country;
                    $Profile->Shipping_Address_type=$request->Shipping_Address_type;
                    $Profile->Shipping_Address_line_01=$request->Shipping_Address_line_01;
                    $Profile->Shipping_Address_line_02=$request->Shipping_Address_line_02;
                    $Profile->save();       
                  }
                }else{
                    $Profile->Shipping_country=$request->Shipping_country;
                    $Profile->Shipping_Address_type=$request->Shipping_Address_type;
                    $Profile->Shipping_Address_line_01=$request->Shipping_Address_line_01;
                    $Profile->Shipping_Address_line_02=$request->Shipping_Address_line_02;
                    $Profile->save();        
                }
                
                return response()->json([
                  'status' => 'success',
                  'message' => 'edit profile details'
                ]);
            }else{
               return response()->json([
                  'status' => 'unsuccessfull',
                  'message' => 'email not found'
               ]);
            }   
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'status' => 'unsuccessfull',
                'message' => $exception->getMessage()
            ]);
        }

    }

}
