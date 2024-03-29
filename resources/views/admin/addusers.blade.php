@extends('layouts.master')

@section('title', 'Add Users')

@section('content')
<!-- main content Start -->
<div class="main_content_iner overly_inner ">
   <div class="container-fluid p-0 ">
      <div class="row">
         <div class="col-12">
            <div class="dashboard_header mb_30">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="dashboard_breadcam">
                        <p><a href="{{url('dashboard')}}">Dashboard</a> <i class="fas fa-caret-right"></i> Add Team Member</p>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="dashboard_header_title  text-end">
                     <div class="add_button ms-2">
                           <a href="{{url('team-members-list')}}" class="btn_1">View Team List</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
         @if ($message = Session::get('success'))
         <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
         </div>
         @endif   
         @if ($message = Session::get('error'))
         <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
         </div>
         @endif
         <form action="{{ url('addteammember') }}" method="post">
          @csrf
            <div class="white_card card_height_100 mb_30">
               <div class="white_card_header">
                  <div class="box_header m-0">
                     <div class="main-title">
                        <h3 class="m-0">Add New User </h3>
                     </div>
                  </div>
               </div>
               <div class="white_card_body">
                  <div class="row"> 
                  <div class="col-lg-6">
                        <div class="common_input mb_15">
                           <input type="text" name="referral" placeholder="Referral" onchange="getDetails(this.value)" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="common_input mb_15">
                           <input type="text" name="referraldetails" id="referraldetails" placeholder="User Details" readonly required>
                           <div id="err" class="text-danger"></div>
                        </div>
                     </div>  
                    <div class="col-lg-6">
                        <div class="common_input mb_15">
                           <input type="text" name="username" placeholder="Username" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="common_input mb_15">
                           <input type="password" name="password" placeholder="Password" required>
                        </div>
                     </div>                    
                     <div class="col-lg-6">
                        <div class="common_input mb_15">
                           <input type="text" name="fname" placeholder="First Name" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="common_input mb_15">
                           <input type="text" name="lname" placeholder="Last Name" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="common_input mb_15">
                           <input type="email" name="email" placeholder="Email Address" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="common_input mb_15">
                           <input type="text" name="phone" placeholder="Mobile No" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="common_input mb_15">
                           <input type="text" name="plan" placeholder="Plan" required>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="common_input mb_15">
                           <input type="text" name="address" placeholder="Address" required>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="create_report_btn mt_30">
                           <!-- <a href="#" class="btn_1 radius_btn d-block text-center">Add Team Member</a> -->
                           <button class="btn_1 radius_btn d-block text-center">Add Team Member</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>  
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   function getDetails(value){
     // alert(value);
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      $.ajax({
        url: "http://localhost/SolvingLife/getreferraldeatils",
        type: "post",
        data: {value:value} ,
        success: function (response) {
         if(response){
            document.getElementById('referraldetails').value = response;
         }else{
           // alert("No user found with the given referral id");
            document.getElementById('err').innerHTML = "No user Found";
         } 
        }
    });
   }
</script>
<!-- main content  End-->
@endsection