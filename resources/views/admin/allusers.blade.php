@extends('layouts.master')

@section('title', 'All Users')

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
                        <p><a href="index.php">Dashboard</a> <i class="fas fa-caret-right"></i> Team Member List</p>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="dashboard_header_title  text-end">
                        <div class="add_button ms-2">
                           <a href="{{url('add-team-member')}}" class="btn_1">Add Team Member</a>
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
<script type="text/javascript">
  function changeStatus(id){
  // alert(id);
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      $.ajax({
        url: "http://localhost/SolvingLife/changeuserstatus",
        type: "post",
        data: {id:id} ,
        success: function (response) {
         if(response == 1){
            swal({
            text: "User Deactivated Successfully",
            icon: "success",
            buttons: ['YES'],
            dangerMode: true
         })
         window.location.reload();
         }else{
            swal({
               text: "Please try later",
               icon: "error",
               buttons: ['YES'],
               dangerMode: true
            })
         }
        }
    });
  }

  function changeStatusActive(id){
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      $.ajax({
        url: "http://localhost/SolvingLife/changeuserstatusactive",
        type: "post",
        data: {id:id} ,
        success: function (response) {
         if(response == 1){
            swal({
            text: "User Activated Successfully",
            icon: "success",
            buttons: ['YES'],
            dangerMode: true
         })
         window.location.reload();
         }else{
            swal({
               text: "Please try later",
               icon: "error",
               buttons: ['YES'],
               dangerMode: true
            })
         }
        }
    });
  }
</script>   
<!-- main content  End-->
@endsection