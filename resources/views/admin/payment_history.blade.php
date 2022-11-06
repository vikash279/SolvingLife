@extends('layouts.master')

@section('title', 'Payment History')

@section('content')

<!-- main content Start -->
<div class="main_content_iner">
   <div class="container-fluid p-0">
      <div class="row">
         <div class="col-12">
            <div class="dashboard_header mb_30">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="dashboard_breadcam">
                        <p><a href="{{url('dashboard')}}">Dashboard</a> <i class="fas fa-caret-right"></i> Payment History</p>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="dashboard_header_title  text-end">
                        <div class="add_button ms-2">
                           <!-- <a href="javascript::void(0)" class="btn_1">Create Invoice</a> -->
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
                        <h3 class="m-0">Payment List</h3>
                     </div>
                  </div>
               </div>
               <div class="white_card_body">
                  <div class="QA_section">
                     <div class="QA_table mb_30">
                        <table class="table lms_table_active3 ">
                           <thead>
                              <tr>
                                 <th scope="col">User ID</th>
                                 <th scope="col">Username</th>
                                 <th scope="col">Amount</th>
                                 <th scope="col">Transaction Type</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php foreach($details as $val){ ?> 
                              <tr>
                                 <th scope="row"> <a href="#" class="question_content">{{$val->userid}}</a></th>
                                 <td>{{$val->fname}} {{$val->lname}}</td>
                                 <td>{{$val->amount}}</td>
                                 <td>{{$val->transafer_type}}</td>
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