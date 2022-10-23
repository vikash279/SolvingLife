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
                           <a href="javascript::void(0)" class="btn_1">Create Invoice</a>
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
                                 <th scope="col">title</th>
                                 <th scope="col">Category</th>
                                 <th scope="col">Teacher</th>
                                 <th scope="col">Lesson</th>
                                 <th scope="col">Enrolled</th>
                                 <th scope="col">Price</th>
                                 <th scope="col">Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                 <td>Category name 1</td>
                                 <td>Teacher James</td>
                                 <td>Lessons name</td>
                                 <td>16</td>
                                 <td>$25.00</td>
                                 <td><a href="#" class="status_btn">Active</a></td>
                              </tr>
                              <tr>
                                 <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                 <td>Category name 2</td>
                                 <td>Teacher James</td>
                                 <td>Lessons name</td>
                                 <td>16</td>
                                 <td>$25.00</td>
                                 <td><a href="#" class="status_btn">Active</a></td>
                              </tr>
                              <tr>
                                 <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                 <td>Category name 3</td>
                                 <td>Teacher James</td>
                                 <td>Lessons name</td>
                                 <td>16</td>
                                 <td>$25.00</td>
                                 <td><a href="#" class="status_btn">Active</a></td>
                              </tr>
                              <tr>
                                 <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                 <td>Category name 4</td>
                                 <td>Teacher James</td>
                                 <td>Lessons name</td>
                                 <td>16</td>
                                 <td>$25.00</td>
                                 <td><a href="#" class="status_btn">Active</a></td>
                              </tr>
                              <tr>
                                 <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                 <td>Category name 5</td>
                                 <td>Teacher James</td>
                                 <td>Lessons name</td>
                                 <td>16</td>
                                 <td>$25.00</td>
                                 <td><a href="#" class="status_btn">Active</a></td>
                              </tr>
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