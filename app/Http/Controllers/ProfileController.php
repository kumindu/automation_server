<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    { 
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try { 
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name  = time().'.'.$image->getClientOriginalExtension();
                $image ->save(public_path('Profile').'/'.$name);
                $Profile = Profile::create([
                    'image'=>$name,
                    'City'=>$request->City,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'country'=>$request->country,
                    'last_name'=>$request->last_name,
                    'first_name'=>$request->first_name,
                    'postal_code'=>$request->postal_code,
                    'Address_type'=>$request->Address_type,
                    'country_code'=>$request->country_code,
                    'Address_line_01'=>$request->Address_line_01,
                    'Address_line_02'=>$request->Address_line_02,
               ]);
            }else{
                $Profile = Profile::create([
                    'image'=>'defult.png',
                    'City'=>$request->City,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'country'=>$request->country,
                    'last_name'=>$request->last_name,
                    'first_name'=>$request->first_name,
                    'postal_code'=>$request->postal_code,
                    'Address_type'=>$request->Address_type,
                    'country_code'=>$request->country_code,
                    'Address_line_01'=>$request->Address_line_01,
                    'Address_line_02'=>$request->Address_line_02,
               ]);
            }
            return response()->json([
                'status' => 'successfull',
                'message' => 'profile created successfully'
            ]);
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
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name  = time().'.'.$image->getClientOriginalExtension();
                    $image ->save(public_path('Profile').'/'.$name);
                    $Profile->City=$request->City;
                    $Profile->image=$request->image;
                    $Profile->email=$request->email;
                    $Profile->phone=$request->phone;
                    $Profile->country=$request->country;
                    $Profile->last_name=$request->last_name;
                    $Profile->first_name=$request->first_name;
                    $Profile->postal_code=$request->postal_code;
                    $Profile->Address_type=$request->Address_type;
                    $Profile->country_code=$request->country_code;
                    $Profile->Address_line_01=$request->Address_line_01;
                    $Profile->Address_line_02=$request->Address_line_02;
                    $Profile->save();       
                }else{
                    $Profile->City=$request->City;
                    $Profile->image=$request->image;
                    $Profile->email=$request->email;
                    $Profile->phone=$request->phone;
                    $Profile->country=$request->country;
                    $Profile->last_name=$request->last_name;
                    $Profile->first_name=$request->first_name;
                    $Profile->postal_code=$request->postal_code;
                    $Profile->Address_type=$request->Address_type;
                    $Profile->country_code=$request->country_code;
                    $Profile->Address_line_01=$request->Address_line_01;
                    $Profile->Address_line_02=$request->Address_line_02;
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
