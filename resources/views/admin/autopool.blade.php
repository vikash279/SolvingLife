@extends('layouts.master')

@section('title', 'Autopool')

@section('content')

<!-- main content Start -->
<div class="main_content_iner">
   <div class="container-fluid p-0">
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
            <div class="dashboard_header mb_30">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="dashboard_breadcam">
                        <p><a href="{{url('dashboard')}}">Dashboard</a> <i class="fas fa-caret-right"></i> Autopool</p>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="dashboard_header_title  text-end">
                        <div class="add_button ms-2">
                           <!-- <a href="{{url('add-team-member')}}" class="btn_1">Add Team Member</a> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="row justify-content-center">
         <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
               <div class="white_card_header">
                  <div class="box_header m-0">
                     <div class="main-title">
                        <h3 class="m-0">Autopool List</h3>
                     </div>
                  </div>
               </div>
               <div class="white_card_body">
                  <div class="QA_section">
                     <div class="QA_table mb_30">
                        <table class="table lms_table_active3 ">
                           <thead>
                              <tr>
                                 <th scope="col">User Id</th>
                                 <th scope="col">User Name</th>
                                 <th scope="col">Amount</th>
                                 <th scope="col">Request Date</th>
                                 <th scope="col">Amount Transferred Date</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php foreach($details as $val){ ?> 
                              <tr>
                                 <th scope="row"> <a href="#" class="question_content">{{$val->user_id}}</a></th>
                                 <td>{{$val->username}}</td>
                                 <td>{{$val->amount}}</td>
                                 <td>{{$val->date_sent}}</td>
                                 <td>{{$val->amount_transfer_date}}</td>
                                 <?php if(empty($val->amount_transfer_date)){ ?>
                                 <td><a href="{{url('autopool-payment',$val->id)}}" class="status_btn">Pay Now</a></td>
                                 <?php }else{ ?>
                                 <td><a href="javascript::void(0)" class="status_btn">Paid</a></td>
                                 <?php } ?>
                              </tr>
                              <?php } ?> 
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- main content  End-->

@endsection