<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Session;
use Crypt;
use Validator;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function login(Request $request){
      return view('admin.login');
    }

    public function dashboard(Request $request){
        if (session()->get('admin_id')){
          return view('admin.index');
        }else{
          return redirect()->route('login');
        }
    }

    public function allUsers(Request $request){
        if (session()->get('admin_id')){
          $allusers = User::where('user_type', '!=', 'admin')->orderBy('id','desc')->get();
         // print_r($allusers);die;  
          return view('admin.allusers',compact('allusers'));
        }else{
          return redirect()->route('login');
        }
    }

    public function addUsers(Request $request){
        if (session()->get('admin_id')){
           return view('admin.addusers');
        }else{
           return redirect()->route('login ');
        }
    }

    public function doLogin(Request $request){
        // dd($request);die;
         $validator = Validator::make($request->all(), [
             'email' => 'required',
             'password' => 'required',
         ]);
    
         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors());       
         }
         
        // $userdata = DB::table('admins')->select('*')->where('email', $request->email)->where('status', 1)->first();
          $where = [
             'email' => $request->email,
             'status' => '1',
             'user_type' => 'admin'
          ];
          $userdata = User::where($where)->first();
        // print_r($userdata->email);die;
         if(!empty($userdata->email)){
        if($userdata->password == $request->password){
           // print_r("login done");die;
            
             $request->session()->put('email',$userdata->email);
             $request->session()->put('admin_id',$userdata->id);
             //$request->session()->put('user_type',$userdata->user_type);
         
         //  return redirect('dashBoard');
             return redirect()->route('dashboard');
        }else{
           // print_r("wrong");die;
            return back()->with('error','wrong credentials!');
        }
         }else{
            return back()->with('error','email does not exist!'); 
         }
     }

     public function packages(Request $request){
        if (session()->get('admin_id')){
            return view('admin.packages');
        }else{
            return redirect()->route('login');
        }
     }

     public function autopool(Request $request){
        if (session()->get('admin_id')){
            return view('admin.autopool');
        }else{
            return redirect()->route('login');
        }
     }

     public function paymentHistory(Request $request){
        if (session()->get('admin_id')){
            return view('admin.payment_history');
        }else{
            return redirect()->route('login');
        } 
     }


     public function addTeamMember(Request $request){
        $validation_array = [
            'fname'    => 'required',
            'lname'     => 'required',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6',
            'username'       => 'required|unique:users',
            'phone'    => 'required',
            'address'         => 'required',
            'plan'         => 'required',
        ];

        $validation_attributes = [
            'fname'    => 'First Name',
            'lname'     => 'Last Name',
            'email'         => 'Email',
            'password'      => 'Password',
            'username'       => 'Username',
            'phone'    => 'Phone',
            'address'         => 'Address',
            'plan'     => 'Plan'
        ];

        $validator = Validator::make($request->all(), $validation_array,[],$validation_attributes);
        $validation_message   = $this->get_message_from_validator_object($validator->errors());
        
        if($validator->fails()){
            return back()->with('error', $validation_message);
        }

        $input = $request->all();
        $randomnum = $this->getRandomString(3);
        $input['userid'] = "SL".$randomnum;
        $input['referral_id'] = $request->fname.$randomnum;
        $input['referred_by'] = $request->referral;
        $input['user_type'] = 'user';
        $res = User::create($input);
        
        $data = [
            'userid' => "SL".$randomnum,
            'amount' => $request->plan
        ];

        $result = UserWallet::create($data);
        return back()->with('success','Team Member added successfully!');
     }

     public  function getRandomString($length) {
        $characters = '0123456789';
        $string = '';
 
        for ($i = 0; $i < $length; $i++) {
          $string .= $characters[mt_rand(0, strlen($characters) - 1)];
      }
 
       return $string;
    }

     public  function get_message_from_validator_object($validator_object)
     {
         $array = json_decode(json_encode($validator_object),1);
         $message = '';
         $message_array = [];
         $i = 0;
         foreach ($array as $key => $value) {
             foreach ($value as $k => $val) {
                 if(!in_array($val,$message_array)){
                     $message_array[] = $val;
                     $tilde    = $i == 0 ? '':" ";
                     $message .= $tilde.$val;
                     $i++;
                 }
             }
         }
         return $message;
     }

     public function getReferralDeatils(Request $request){
        $referral = $request->value;
        $details = User::where('referral_id', $referral)->first();
        if($details){
        $userdetails = $details->fname.' '.$details->lname;
        }else{
            $userdetails = "";
        }
        print_r($userdetails);
     }

     public function changeUserStatus(Request $request){
        //print_r($request->id);
        $data = ['status' => '0'];
        $res = User::where('id', $request->id)->update($data);
        if($res){
            print_r("1");
        }else{
            print_r("0");
        }
     }

     public function changeUserStatusActive(Request $request){
        $data = ['status' => '1'];
        $res = User::where('id', $request->id)->update($data);
        if($res){
            print_r("1");
        }else{
            print_r("0");
        }
     }

     public function editUsers(Request $request,$id){
        $details = User::where('id', $id)->first();
       // print_r($details);die;
       if($details){
        $referredby = User::where('referral_id', $details->referred_by)->first();
       // print_r($referredby);die;
       }
        return view('admin.edituser', compact('details','referredby'));
     }

     public function updateTeamMember(Request $request){
        $where = ['id' => $request->id];
        $data = [
            'username' => $request->username,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'plan' => $request->plan,
            'address' => $request->address
        ];

        $res = User::where($where)->update($data);
        return back()->with('success','Team Member updated successfully!');
     }
}
