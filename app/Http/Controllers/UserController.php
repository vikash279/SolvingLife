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


class UserController extends Controller
{
    public function login(Request $request){
      return view('user.login');
    }

    public function dashboard(Request $request){
        if (session()->get('userid')){
          return view('user.index');
        }else{
          return redirect()->route('userlogin');
        }
    }

    public function allUsers(Request $request){
        if (session()->get('admin_id')){
          $allusers = User::orderBy('id','desc')->get();
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

    public function userdoLogin(Request $request){
        // dd($request);die;
         $validator = Validator::make($request->all(), [
             'userid' => 'required',
             'password' => 'required',
         ]);
    
         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors());       
         }
         
        // $userdata = DB::table('admins')->select('*')->where('email', $request->email)->where('status', 1)->first();
          $where = [
             'userid' => $request->userid,
             'status' => '1'
          ];
          $userdata = User::where($where)->first();
        // print_r($userdata->email);die;
         if(!empty($userdata->userid)){
        if($userdata->password == $request->password){
           // print_r("login done");die;
            
             $request->session()->put('username',$userdata->username);
             $request->session()->put('userid',$userdata->userid);
             //$request->session()->put('user_type',$userdata->user_type);
         
         //  return redirect('dashBoard');
             return redirect()->route('user-dashboard');
        }else{
           // print_r("wrong");die;
            return back()->with('error','wrong credentials!');
        }
         }else{
            return back()->with('error','user does not exist!'); 
         }
     }

     public function packages(Request $request){
        if (session()->get('userid')){
            return view('user.packages');
        }else{
            return redirect()->route('login');
        }
     }

     public function autopool(Request $request){
        if (session()->get('userid')){
            return view('user.autopool');
        }else{
            return redirect()->route('user.login');
        }
     }

     public function paymentHistory(Request $request){
        if (session()->get('userid')){
            return view('user.payment_history');
        }else{
            return redirect()->route('user.login');
        } 
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
}
