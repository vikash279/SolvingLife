@extends('layouts.master')

@section('title', 'Index')

@section('content')

         <!-- main content Start -->
         <div class="main_content_iner overly_inner ">
   <div class="container-fluid p-0 ">
      <div class="row">
         <div class="col-12">
            <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
               <div class="page_title_left d-flex align-items-center">
                  <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
               </div>
               <div class="page_title_right">
                  <div class="page_date_button d-flex align-items-center">
                     <ol class="breadcrumb page_bradcam mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Analytic</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row  mb_30">
         <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
               <div class="card-body">
                  <img src="{!!asset('public/assets/img/circle.svg')!!}" class="card-img-absolute" alt="circle-image">
                  <h4 class="font-weight-normal mb-3">Weekly Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">$ 15,0000</h2>
                  <h6 class="card-text">Increased by 60%</h6>
               </div>
            </div>
         </div>
         <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
               <div class="card-body">
                  <img src="{!!asset('public/assets/img/circle.svg')!!}" class="card-img-absolute" alt="circle-image">
                  <h4 class="font-weight-normal mb-3">Weekly Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">45,6334</h2>
                  <h6 class="card-text">Decreased by 10%</h6>
               </div>
            </div>
         </div>
         <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
               <div class="card-body">
                  <img src="{!!asset('public/assets/img/circle.svg')!!}" class="card-img-absolute" alt="circle-image">
                  <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">95,5741</h2>
                  <h6 class="card-text">Increased by 5%</h6>
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
                        <h3 class="m-0">Team Member List</h3>
                     </div>
                  </div>
               </div>
               <div class="white_card_body">
                  <div class="QA_section">
                     <div class="QA_table mb_30">
                        <table class="table lms_table_active3 ">
                           <thead>
                              <tr>
                                 <th scope="col">ID</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">UserName</th>
                                 <th scope="col">Email</th>
                                 <th scope="col">Phone</th>
                                 <th scope="col">Plan</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Deactivate</th>
                                 <th scope="col">Activate</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php foreach($allusers as $val){ ?> 
                             <?php 
                               if($val->status == '1'){
                                 $status = "Active";
                               }else{
                                 $status = "Inactive";
                               }  
                              ?> 
                              <tr>
                                 <th scope="row"> <a href="#" class="question_content">{{$val->userid}}</a></th>
                                 <td>{{$val->fname}} {{$val->lname}}</td>
                                 <td>{{$val->username}}</td>
                                 <td>{{$val->email}}</td>
                                 <td>{{$val->phone}}</td>
                                 <td>${{$val->plan}}</td>
                                 <td><a href="#" class="status_btn">{{$status}}</a></td>
                                 <td>
                                    <div class="checkbox_wrap d-flex align-items-center">
                                       <label class="form-label lms_checkbox_1" for="course_1">
                                          <input type="checkbox" id="course_1" onchange="changeStatus(<?php echo $val->id ?>)">
                                          <div class="slider-check round"></div>
                                       </label>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="checkbox_wrap d-flex align-items-center">
                                       <label class="form-label lms_checkbox_1" for="course_2">
                                          <input type="checkbox" id="course_2" onchange="changeStatusActive(<?php echo $val->id ?>)">
                                          <div class="slider-check round"></div>
                                       </label>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="action_btns d-flex">
                                       <a href="{{url('edituser',$val->id)}}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                       <!-- <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a> -->
                                    </div>
                                 </td>
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
