<?php

namespace App\Http\Controllers;


use  Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 

use App\Http\Controllers\Controller;

use App\Member;
use Illuminate\Support\Facades\Validator;



class MembersController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Request $request){
    	if($request->ajax())
          {
            $member = Member::where('member_id','=',$request->id)->get();       
            return response($member);
          }

    }
    public function update(Request $request){
    	$rules = [
    		'member_name' => 'required|min:4',
            'member_email' => 'required|email',
            'member_contact' => 'required|min:11',
            'member_nid_no' => 'required|min:11'
            ];
        $messages = [
            'member_name.required' => 'Member name is required!',
            'member_name.min' => 'Member name is Invalid!',
            'member_email.required' => 'Member Email is required!',            
            'member_email.email' => 'Member Email must be a valid email!',            
            'member_contact.required' => 'Mobile Number is required!',
            'member_contact.min' => 'Invalid Mobile Number',
            'member_nid_no.required' => 'Student ID No. is required',
            'member_nid_no.min' => 'Student ID number cannot be less than 11 characters'
         
        ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
            return response($validator->errors(), 401);
            }

            // Update Member Database and give a json response to show ajax notification

            if ($request->ajax()) {
            $member = Member::where('member_id', '=' ,$request->member_id)->update(
            	[
            	'member_name' => $request->member_name, 
            	'member_email' => $request->member_email, 
            	'member_contact' => $request->member_contact, 
            	'member_nid_no' => $request->member_nid_no, 
            	'member_blood_group' => $request->member_blood_group, 
            	'member_dept' => $request->member_dept, 
            	'member_reg_no' => $request->member_reg_no
            ]
            );
            return response()->json($member);
            }

    }



       public function search(Request $request){ 
        if ($request->search_input=='') {
           $members = Member::latest()->paginate(20);
        return view('member.show', compact('members'));
        }
        else {
          $members = Member::where('member_id','=',$request->search_input)->orWhere('member_blood_group','=',$request->search_input)->orWhere('member_contact','=',$request->search_input)->orWhere('member_email','LIKE','%'.$request->search_input.'%')->orWhere('member_name','LIKE','%'.$request->search_input.'%')->paginate(1000);  
          return view('member.show', compact('members'));
      }
}

    public function store(Request $request)
    {   
    	$rules = [
    		'member_name' => 'required|min:4',
            'member_email' => 'required|email|unique:members',
            'member_contact' => 'required|min:11',
            'member_nid_no' => 'required|unique:members|min:11'
            ];
        $messages = [
            'member_name.required' => 'Member name is required!',
            'member_name.min' => 'Member name is Invalid!',
            'member_email.required' => 'Member Email is required!',
            'member_email.unique' => 'This Email Already in Used!',
            'member_contact.required' => 'Mobile Number is required!',
            'member_contact.min' => 'Invalid Mobile Number',
            'member_nid_no.required' => 'Student ID No. is required',
            'member_nid_no.unique' => 'Student ID already used in another account!',
            'member_nid_no.min' => 'Student ID number cannot be less than 11 characters'
         
        ];   
     $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
            return response($validator->errors(), 401);
            }
            else {
          
                $user_id = DB::table('users')
                ->select('id')
                ->where('email','=',$request->member_email)->get();
                $patterns = array();
                $patterns[0] = '/[[{"id":]/';
                $patterns[1] = '/}]/';
                $replacements = array();
                $replacements[0] = '';
                $replacements[1] = '';
                
                $member = new Member;                
                $member->member_name = $request->member_name;
                $member->member_email = $request->member_email;
                $member->member_contact = $request->member_contact;            
                $member->member_nid_no = $request->member_nid_no;
                $member->member_blood_group = $request->member_blood_group;
                $member->member_dept = $request->member_dept;
                $member->member_reg_no = $request->member_reg_no;
                $member->member_reg_no = $request->member_reg_no;
                $member->user_id = preg_replace($patterns, $replacements, $user_id);
                
                $member->save();
                return response()->json($member);
          }

    }

        public function destroy(Request $request)
        {  
            $memberinfodel = Member::where('member_id','=',$request->member_id)->delete(); 
             return redirect('/members');
                 // return response($memberinfodel); 
        }
}
 