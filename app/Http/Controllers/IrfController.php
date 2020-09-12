<?php

namespace App\Http\Controllers;

use App\Irf;
use App\childdetails;
use App\userprograms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use JWTAuth;
// use Tymon\JWTAuth\Facades\JWTAuth;
// use Tymon\JWTAuth\Facades\JWTFactory;
// use Tymon\JWTAuth\Exceptions\JWTException;
// use Tymon\JWTAuth\Contracts\JWTSubject;
// use Tymon\JWTAuth\PayloadFactory;
// use Tymon\JWTAuth\JWTManager as JWT;

class IrfController extends Controller
{
    public function irf_register(Request $request)
    {
        $validator = Validator::make($request->json()->all() , [
            //Basic Details
            'name' => 'required|string|max:255',            
            'gender' => 'required|string|max:25',
            'age' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'required|string|max:15',
            'country' => 'required|string|max:100',
            //Contact Details
            'home_no' => 'required|string|max:50',
            'cell_no' => 'required|string|max:50',
            'work_no' => 'required|string|max:50',
            'emergency_cntName' => 'required|string|max:255',
            'emergency_contNo' => 'required|string|max:50',
            'email_id' => 'required|string|email|max:255|unique:irves',
            'first_language' => 'required|string|max:50',
            'refer_through' => 'required|string|max:100',            
            'child_program' => 'required|string|max:10',
            //Community Matters Program
            'after_school_program' => 'required|string|max:10',
            'health' => 'required|string|max:500',
            'employment' => 'required|string|max:500',
            'staff' => 'required|string|max:500',
            'neighbourhood_net' => 'required|string|max:255', 
            'others' => 'required|string|max:500',           
            'agent_notes' => 'required|string|max:255',
            //Member Details - Questions
            'ques_1' => 'required|string|max:100',
            'ques_2' => 'required|string|max:100',
            'ques_3' => 'required|string|max:100',
            'ques_4' => 'required|string|max:100',
            'ques_5' => 'required|string|max:100',
            'ques_6' => 'required|string|max:100',
            'ques_7' => 'required|string|max:100',
            'family_doctor' => 'required|string|max:10',
            'walkin_clinic' => 'required|string|max:10',
            'emergency_room' => 'required|string|max:10',
            'hospital' => 'required|string|max:10',
            'ques_8' => 'required|string|max:100',
            'ques_9' => 'required|string|max:100',
            'ques_10' => 'required|string|max:100',

        ]);
        $useremail = $request->email;
        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $irf = Irf::create([
            //Basic Details            
            'name' => $request->json()->get('name'),            
            'gender' => $request->json()->get('gender'),
            'age' => $request->json()->get('age'),
            'address' => $request->json()->get('address'),
            'city' => $request->json()->get('city'),
            'province' =>$request->json()->get('province'),
            'postal_code' => $request->json()->get('postal_code'),
            'country' => $request->json()->get('country'),
            //Contact Details
            'home_no' => $request->json()->get('home_no'),
            'cell_no' => $request->json()->get('cell_no'),
            'work_no' => $request->json()->get('work_no'),
            'emergency_cntName' => $request->json()->get('emergency_cntName'),
            'emergency_contNo' => $request->json()->get('emergency_contNo'),
            'email_id' => $request->json()->get('email_id'),
            'first_language' => $request->json()->get('first_language'),
            'refer_through' => $request->json()->get('refer_through'),
            'child_program' => $request->json()->get('child_program'),
            //Community Matters Program
            'after_school_program' => $request->json()->get('after_school_program'),
            'health' => $request->json()->get('health'),
            'employment' => $request->json()->get('employment'),
            'staff' => $request->json()->get('staff'),
            'neighbourhood_net' => $request->json()->get('neighbourhood_net'), 
            'others' => $request->json()->get('others'),           
            'agent_notes' => $request->json()->get('agent_notes'),
            //Member Details - Questions
            'ques_1' => $request->json()->get('ques_1'),
            'ques_2' => $request->json()->get('ques_2'),
            'ques_3' => $request->json()->get('ques_3'),
            'ques_4' => $request->json()->get('ques_4'),
            'ques_5' => $request->json()->get('ques_5'),
            'ques_6' => $request->json()->get('ques_6'),
            'ques_7' => $request->json()->get('ques_7'),
            'family_doctor' => $request->json()->get('family_doctor'),
            'walkin_clinic' => $request->json()->get('walkin_clinic'),
            'emergency_room' => $request->json()->get('emergency_room'),
            'hospital' => $request->json()->get('hospital'),
            'ques_8' => $request->json()->get('ques_8'),
            'ques_9' => $request->json()->get('ques_9'),
            'ques_10' => $request->json()->get('ques_10'),

        ]);

        //$token = JWTAuth::fromUser($irf);

        return response()->json($irf,200 );
    }
    
    public function addchild(Request $request)
    {
        $uid=Irf::select('id')->where('email',$useremail)->input();

        //Declaring field array for adding multiple childs at a time
        $childfn = $request->Child_FirstName;
        $childln = $request->Child_LastName;
        $childdob = $request->Child_DOB;
        $childgdr= $request->Child_Gender;

        //Declaring array to pass in the query
        $child_records = [];
        
        for ($i = 0; $i<count($childfn); ++$i) 
        {
        //Building a query
            $child_records[] = [
            'Child_FirstName' => $childfn[$i],
            'Child_LastName' => $childln[$i],
            'Child_DOB' => $childdob[$i],
            'Child_Gender' => $childgdr[$i],
            'user_id' => $uid
        ];

        }
        // Insert child records
        childdetails::insert($child_records);
    }
    public function showallusers()
    {
        return response()->json(Irf::all());
    }
    // public function showuserbyid($id)
    // {       
    //     return response()->json(Irf::find($id));
    // }    
    public function irf_search(Request $request) {

        $data = $request->get('data');

        $search_users = Irf::where('id', 'like', "%{$data}%")
                         ->orWhere('name', 'like', "%{$data}%")
                         ->orWhere('email_id', 'like', "%{$data}%")
                         ->get();

        //return response::json(['data' => $search_users ]);     
        return response()->json(['data' => $search_users], 400);
    }      
   
    
}
