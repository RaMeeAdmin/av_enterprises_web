@extends('Backend.Layouts.layout')
@section('page_title','Dashboard')
@section('dashboard_menu','active')
@section('css')
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
/*#myTab a.active {*/
/*    background-color: #ccc;*/
/*}*/
</style>
<!-- Container-fluid starts-->
<div class="container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-lg-6">
            <div class="page-header-left">
               <h3>Create User
               </h3>
            </div>
         </div>
         <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
               <li class="breadcrumb-item">
                  <a href="index.html">
                     <i data-feather="home"></i>
                  </a>
               </li>
               <li class="breadcrumb-item">Users </li>
               <li class="breadcrumb-item active">Create User </li>
            </ol>
         </div>
      </div>
   </div>
</div>
<!-- Container-fluid Ends-->
<!-- Container-fluid starts-->
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card tab2-card">
            <div class="card-body">
               <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active show" id="personal-tab"
                    data-bs-toggle="tab" href="#personal" role="tab" aria-controls="personal"
                    aria-selected="true" data-original-title="" title="">Personal Info</a>
                 </li>
                 <li class="nav-item"><a class="nav-link" id="physical-tabs"
                  data-bs-toggle="tab" href="#physical1" role="tab"
                  aria-controls="physical" aria-selected="false" data-original-title=""
                  title="">Physical Details</a>
               </li>
               <li class="nav-item"><a class="nav-link" id="astrological-tabs"
                  data-bs-toggle="tab" href="#astrological" role="tab"
                  aria-controls="astrological" aria-selected="false" data-original-title=""
                  title="">Astrological Details</a></li>
                  <li class="nav-item"><a class="nav-link" id="professional-tabs"
                     data-bs-toggle="tab" href="#professional" role="tab"
                     aria-controls="professional" aria-selected="false" data-original-title=""
                     title="">Professional Details</a></li>
                     <li class="nav-item"><a class="nav-link" id="family-tabs"
                        data-bs-toggle="tab" href="#family" role="tab"
                        aria-controls="family" aria-selected="false" data-original-title=""
                        title="">Family Details</a></li>
                     </ul>

                     <form  method="POST" class="register" action="{{ url('userupdate')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade active show" id="personal" role="tabpanel"
                           aria-labelledby="personal-tab">
                           @if (session('status'))
                           <div class="alert alert-success">
                              {{ session('status') }}
                           </div>
                           @endif
                           @if ($errors->any())
                           <div class="alert alert-danger">
                              <strong>Whoops!</strong> There were some problems with your input.<br><br>
                              <ul>
                                 @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                                 @endforeach
                              </ul>
                           </div>
                           @endif

                           <h4>Personal Info</h4>

                           <div class="row">
                              <div class="col-xl-6 col-md-12">
                               <div class="form-group">
                                  <label style="float:left !important;">Profile for</label>
                                  <select class="form-control" name="profile_for" id="profile_for">
                                     <option value="">Select</option>
                                     <option value="Self"  <?=$user['profile_for'] == "Self" ? ' selected="selected"' : '';?>>Self</option>
                                     <option value="Son" <?=$user['profile_for'] == "Son" ? ' selected="selected"' : '';?>>Son</option>
                                     <option value="Daughter" <?=$user['profile_for'] == "Daughter" ? ' selected="selected"' : '';?>>Daughter</option>
                                     <option value="Brother" <?=$user['profile_for'] == "Brother" ? ' selected="selected"' : '';?>>Brother</option>
                                     <option value="Sister" <?=$user['profile_for'] == "Sister" ? ' selected="selected"' : '';?>>Sister</option>
                                     <option value="Relative" <?=$user['profile_for'] == "Relative" ? ' selected="selected"' : '';?>>Relative</option>
                                     <option value="Friend" <?=$user['profile_for'] == "Friend" ? ' selected="selected"' : '';?>>Friend</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                               <div class="form-group">
                                 <label style="float:left !important;">Full name</label>
                                 <input type="text" required="" class="form-control" name="full_name" id="full_name" placeholder="Enter your name" value="<?=$user['name']?>">
                                   <input type="text" hidden name="user_id"  value="<?=$user['id']?>">
                              </div>
                           </div>
                        </div>
                         <div class="row">
                           <?php if ($user['can_full_name'] != "") {?>
                             <div class="col-xl-6 col-md-12" id='can'>
                               <div class="form-group">
                                 <label style="float:left !important;">Candidate name</label>
                                 <input type="text" class="form-control" name="can_full_name" placeholder="Enter candidate name" value="<?=$user['can_full_name']?>">
                              </div>
                           </div>
                           <?php }?>
                              <div class="col-xl-6 col-md-12">
                        <div class="form-group">
                           <label style="float:left !important;">Contact No.</label>
                           <input type="text" required="" class="form-control" name="contact_no" placeholder="Enter contact no." id="contact_no"  maxlength="10" minlength="10" value="<?=$user['contact_no']?>">
                        </div>
                     </div>
                  </div>
                           <div class="row">
                              <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>E-mail ID</label>
                                    <input class="form-control" id="email" name="email" type="email" value="{{$user['email']}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                    </span>
                                    @enderror
                                 </div>
                              </div>

                         <!--      <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" id="password" name="password" type="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                    </span>
                                    @enderror
                                 </div>
                              </div> -->
                          <!--  </div>

                           <div class="row"> -->
                              <div class="col-xl-4 col-md-12">
                                 <div class="form-group">
                                    <label>Date of Birth</label>

                                       <input type="date" name="bdate" id="bdate" value="<?php echo $user['dateofbirth'] ?>" class="form-control">

                                 </div>
                              </div>

                           </div>
                           <div class="row">
                              <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>Marital Status</label>
                                    <select class="form-control"  name="marital_status" id="marital_status">
                                       <option value="">Select</option>
                                       <option value="Never Married" <?=$user['marital_status'] == 'Never Married' ? ' selected="selected"' : '';?>>Never Married</option>
                                       <option value="Divorced" <?=$user['marital_status'] == 'Divorced' ? ' selected="selected"' : '';?>>Divorced</option>
                                       <option value="Widowed" <?=$user['marital_status'] == 'Widowed' ? ' selected="selected"' : '';?>>Widowed</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-md-12">
                                 <div class="form-group" style="margin-top:30px;">
                                    <label>Gender:</label>
                                    <input type="radio" name="txt_gender" id="gender_female" <?php echo ($user['txt_gender'] == 'Female') ? "checked" : ""; ?>  value="Female"> Female
                                    <input type="radio" name="txt_gender"  <?php echo ($user['txt_gender'] == 'Male') ? "checked" : ""; ?> id="gender_male" value="Male"> Male
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>Religion</label>
                                    <select class="form-control" name="religion" id='religion'>
                                       <option value="">Select</option>
                                      <?php foreach ($religion as $row) {?>
                                       <option value="<?php echo $row->id ?>"  <?=$user['religion'] == $row->id ? ' selected="selected"' : '';?>><?php echo $row->name ?></option>
                                     <?php }?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-3 col-md-6">
                                 <div class="form-group">
                                    <label>Caste</label>
                                    <select class="form-control" id='caste' name="caste">
                                       <option value="">Select</option>

                                        <?php
foreach ($caste as $row) {?>
                                    <option value="<?php echo $row->cast_id ?>" <?=$user['caste'] == $row->cast_id ? ' selected="selected"' : '';?>><?php echo $row->cast ?></option>
                                    <?php }?>
                                    </select>
                                 </div>
                              </div>
                            <div class="col-xl-3 col-md-6">
                               <div class="form-group">
                              <label class="font">Mother Tongue</label>
                              <div class="custom_select">
                                 <select class="form-control"  name="mother_tongue" id="mother_tongue" required="">
                                    <option value="">Select</option>
                                    <option value="Marathi" <?=$user['mother_tongue'] == 'Marathi' ? ' selected="selected"' : '';?>>Marathi</option>
                                    <option value="Hindi" <?=$user['mother_tongue'] == 'Hindu' ? ' selected="selected"' : '';?>>Hindi</option>
                                    <option value="Gujarati" <?=$user['mother_tongue'] == 'Gujarati' ? ' selected="selected"' : '';?>>Gujarati</option>
                                    <option value="Sindhi" <?=$user['mother_tongue'] == 'Sindhi' ? ' selected="selected"' : '';?>>Sindhi</option>
                                    <option value="Urdu" <?=$user['mother_tongue'] == 'Urdu' ? ' selected="selected"' : '';?>>Urdu</option>
                                    <option value="Tamil" <?=$user['mother_tongue'] == 'Tamil' ? ' selected="selected"' : '';?>>Tamil</option>
                                    <option value="Kanada" <?=$user['mother_tongue'] == 'Kanada' ? ' selected="selected"' : '';?>>Kanada</option>
                                    <option value="Other" <?=$user['mother_tongue'] == 'Other' ? ' selected="selected"' : '';?>>Other</option>
                                 </select>
                              </div>
                              </div>
                           </div>
                           </div>
                          <div class="row">
                           <div class="col-xl-6 col-md-12">
                              <div class="form-group">
                                 <label>Country</label>
                                 <select class="form-control"  name="country" id="country">
                                    <option value="">Select</option>
                                    <?php
foreach ($country as $row) {?>
                                    <option value="<?php echo $row->country_id ?>" <?=$user['country'] == $row->country_id ? ' selected="selected"' : '';?>><?php echo $row->name ?></option>
                                    <?php }?>

                                 </select>
                              </div>
                           </div>
                           <div class="col-xl-6 col-md-12">
                              <div class="form-group">
                                 <label>State</label>
                                 <select class="form-control"  name="state" id="state">
                                    <option value="">Select</option>
                                    <?php
foreach ($state as $row) {?>
                                    <option value="<?php echo $row->state_id ?>"  <?=$user['state'] == $row->state_id ? ' selected="selected"' : '';?>><?php echo $row->name ?></option>
                                    <?php }?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xl-6 col-md-12">
                              <div class="form-group">
                                 <label>City</label>
                                 <select class="form-control"  name="city" id="city">
                                    <option value="">Select </option>
                                    <?php
foreach ($city as $row) {?>
                                    <option value="<?php echo $row->city_id ?>"  <?=$user['city'] == $row->city_id ? ' selected="selected"' : '';?>><?php echo $row->name ?></option>
                                    <?php }?>
                                 </select>
                              </div>
                           </div>
                               <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{$user['address']}}">
                                 </div>
                              </div>
                           </div>
                             <div class="row">
                         <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>Pin Code</label>
                                    <input type="number" name="pincode" id="pincode" class="form-control" value="{{$user['pincode']}}">
                                 </div>
                              </div>
                           </div>
                                   <div class="row">
                           <div class="col-xl-6 col-md-12">
                              <div class="form-group">
                                 <label>Upload Photo</label>
                                 <input type="file" name="image" id="image" class="form-control" required="">
                              </div>
                           </div>
                            <div class="col-xl-6 col-md-12">
                              <div class="form-group">
                                 <label>Upload Profile</label>
                                 <input type="file" name="profile" id="profile" class="form-control" required="">
                              </div>
                           </div>
                        </div>

                            <div class="pull-right">
                           <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                              <li class="nav-item">
                                 <a class="btn btn-dark btnPrevious">Back</a>
                                 <a class="btn btn-primary btnNext next">Next</a>
                              </li>
                           </ul>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="physical1" role="tabpanel" aria-labelledby="physical-tabs">
                           <h4>Physical Details</h4>
                           <div class="row">
                              <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>Weight(In Kg):</label>
                                    <input type="text"  placeholder="Enter Weight" class="form-control" name="weight" id="weight" value="{{$user['weight']}}">
                                 </div>
                              </div>
                              <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label style="margin-top:30px;">Body Type:</label> &nbsp;
                                    <input type="radio" required="required"  name="body_type" id="body_type" <?php echo ($user['body_type'] == 'Average') ? "checked" : ""; ?> value="Average"> Average
                                    <input type="radio" required="required"  name="body_type"  <?php echo ($user['body_type'] == 'Athletic') ? "checked" : ""; ?> value="Athletic"> Athletic
                                    <input type="radio" required="required"  name="body_type" <?php echo ($user['body_type'] == 'Slim') ? "checked" : ""; ?> value="Slim"> Slim
                                    <input type="radio" required="required"  <?php echo ($user['body_type'] == 'Heavy') ? "checked" : ""; ?> name="body_type" value="Heavy"> Heavy
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>Complexion:</label>
                                    <select class="form-control" name="complexion" id="complexion"  required="required">
                                       <option value="">Select</option>
                                       <option value="Very Fair"  <?=$user['complexion'] == "Very Fair" ? ' selected="selected"' : '';?>>Very Fair</option>
                                       <option value="Fair"  <?=$user['complexion'] == "Fair" ? ' selected="selected"' : '';?>>Fair</option>
                                       <option value="Wheatish"  <?=$user['complexion'] == "Wheatish" ? ' selected="selected"' : '';?>>Wheatish</option>
                                       <option value="Wheatish Medium"  <?=$user['complexion'] == "Wheatish Medium" ? ' selected="selected"' : '';?>>Wheatish Medium</option>
                                       <option value="Wheatish Brown"  <?=$user['complexion'] == "Wheatish Brown" ? ' selected="selected"' : '';?>>Wheatish Brown</option>
                                       <option value="Dark"  <?=$user['complexion'] == "Dark" ? ' selected="selected"' : '';?>>Dark</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>Blood Group</label>
                                    <select class="form-control" name="blood_group" id="blood_group"  required="required">
                                       <option value="">Select</option>
                                       <option value="A+"  <?=$user['blood_group'] == "A+" ? ' selected="selected"' : '';?>>A+</option>
                                       <option value="O+"  <?=$user['blood_group'] == "O+" ? ' selected="selected"' : '';?>>o+</option>
                                       <option value="B+"  <?=$user['blood_group'] == "B+" ? ' selected="selected"' : '';?>>B+</option>
                                       <option value="AB+"  <?=$user['blood_group'] == "AB+" ? ' selected="selected"' : '';?>>AB+</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xl-12 col-md-12">
                                 <div class="form-group">
                                    <label>Eating Habits:</label> &nbsp;
                                    <input type="radio"  required="required" id="eating_habits" <?php echo ($user['eating_habits'] == 'Vegetarian') ? "checked" : ""; ?> name="eating_habits" value="Vegetarian"> Vegetarian
                                    <input type="radio"  required="required" name="eating_habits"  <?php echo ($user['eating_habits'] == 'Non-Vegetarian') ? "checked" : ""; ?> id="txt_non_vegetarian" value="Non-Vegetarian"> Non-Vegetarian
                                    <input type="radio"  required="required" name="eating_habits"  <?php echo ($user['eating_habits'] == 'Eggetarian') ? "checked" : ""; ?> id="txt_eggetarian" value="Eggetarian"> Eggetarian
                                 </div>
                              </div>
                           </div>

                        <div class="pull-right">
                           <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="btn btn-dark btnPrevious">Back</a>
                              <a class="btn btn-primary btnNext next1">Next</a>
                           </li>
                        </ul>
                     </div>

                        </div>
                        <div class="tab-pane fade" id="astrological" role="tabpanel"
                        aria-labelledby="astrological-tabs">

                        <h4>Astrological Details</h4>
                        <div class="row">
                           <div class="col-xl-12 col-md-12">
                              <div class="form-group">
                                 <label>Birth Place</label>
                               <input class="form-control"  required="required" type="text" name="birth_place" id="birth_place"  value="{{$user['birth_place']}}"
                                 >
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xl-4 col-md-12">
                              <div class="form-group">
                                 <label>Birth Time</label>
                                    <input class="form-control"  required="required" type="text"  name="birth_time" id="birth_time"
                                      value="{{$user['birth_time']}}">

                              </div>
                           </div>

                              <div class="col-xl-4 col-md-12">
                                 <div class="form-group">
                                    <label></br></label>
                                    <select class="form-control" name="time_type" id="time_type"  required="required">
                                       <option value="AM"  <?=$user['time_type'] == "AM" ? ' selected="selected"' : '';?>>AM</option>
                                          <option value="PM"  <?=$user['time_type'] == "PM" ? ' selected="selected"' : '';?>>PM</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>Gotra</label>
                                    <input type="text" class="form-control"  required="required" placeholder="Enter Gotra" name="gotra" id="gotra" value="<?php echo $user['gotra'] ?>">
                                 </div>
                              </div>
                              <div class="col-xl-6 col-md-12">
                                 <div class="form-group">
                                    <label>Star</label>
                                    <select class="form-control" name="star" id="star"  required="required">
                                       <option value="">Select</option>
                                       <option value="Anuradha" <?=$user['star'] == "Anuradha" ? ' selected="selected"' : '';?>>Anuradha</option>
                                       <option value="Moolam/Moola"  <?=$user['star'] == "Moolam/Moola" ? ' selected="selected"' : '';?>>Moolam/Moola</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                          <div class="pull-right">
                        <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                          <li class="nav-item">

                           <a class="btn btn-dark btnPrevious">Back</a>
                           <a class="btn btn-primary btnNext next2">Next</a>
                        </li>
                     </ul>
                  </div>
                     </div>
                     <div class="tab-pane fade" id="professional" role="tabpanel"
                     aria-labelledby="professional-tabs">

                     <h4>Professional Details</h4>
                     <div class="row">
                        <div class="col-xl-12 col-md-12">
                           <div class="form-group">
                              <label>Education</label>
                              <select class="form-control"  name="education" id="education">
                                 <option value="">Select</option>
                                 <option value="B.A."  required="required" <?=$user['education'] == "B.A." ? ' selected="selected"' : '';?>>B.A.</option>
                                 <option value="B.Arch"  required="required" <?=$user['education'] == "B.Arch" ? ' selected="selected"' : '';?>>B.Arch</option>
                                 <option value="B.Com"  required="required" <?=$user['education'] == "B.Com" ? ' selected="selected"' : '';?>>B.Com</option>
                                 <option value="B.Pharm"  required="required" <?=$user['education'] == "B.Pharm" ? ' selected="selected"' : '';?>>B.Pharm</option>
                                 <option value="B.Sc"   required="required" <?=$user['education'] == "B.Sc" ? ' selected="selected"' : '';?>>B.Sc</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-12 col-md-12">
                           <div class="form-group">
                              <label>Education Details</label>
                              <textarea class="form-control" name="education_details" id="education_details" rows="3"> <?=$user['education_details']?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-12 col-md-12">
                           <div class="form-group">
                              <label>Occupation</label>
                              <select class="form-control" name="occupation" id="occupation"  required="required">
                                 <option value="">Select</option>
                                 <option value="Army" <?=$user['occupation'] == "Army" ? ' selected="selected"' : '';?>>Army</option>
                                 <option value="Graphic Designer" <?=$user['occupation'] == "Graphic Designer" ? ' selected="selected"' : '';?>>Graphic Designer</option>
                                 <option value="Navy" <?=$user['occupation'] == "Navy" ? ' selected="selected"' : '';?>>Navy</option>
                                 <option value="Doctor" <?=$user['occupation'] == "Doctor" ? ' selected="selected"' : '';?>>Doctor</option>
                                 <option value="Not Employed" <?=$user['occupation'] == "Not Employed" ? ' selected="selected"' : '';?>>Not Employed</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-12 col-md-12">
                           <div class="form-group">
                              <label>Occupation Details</label>
                              <textarea class="form-control"  required="required" name="occupation_det" id="occupation_det" rows="3"><?=$user['occupation_det']?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-12 col-md-12">
                           <div class="form-group">
                              <label>Salary / Income Per Year</label>
                              <select class="form-control" name="salary_income" id="salary_income"  required="required">
                                 <option value="">Select</option>
                                 <option value="Under Rs. 50,000"  <?=$user['salary_income'] == "Under Rs. 50,000" ? ' selected="selected"' : '';?>>Under Rs. 50,000</option>
                                 <option value="Under $ 50,000" <?=$user['salary_income'] == "Under $ 50,000" ? ' selected="selected"' : '';?>>Under $ 50,000</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-12 col-md-12">
                           <div class="form-group">
                              <label>Employed In:</label> &nbsp;
                              <input type="radio" required="required" id="employed" <?php echo ($user['employed'] == 'Private') ? "checked" : ""; ?> name="employed" value="Private" > Private &nbsp;&nbsp;
                              <input type="radio" required="required" id="employed" <?php echo ($user['employed'] == 'Government') ? "checked" : ""; ?> value="Government" name="employed"> Government &nbsp;&nbsp;
                              <input type="radio" required="required" id="employed" <?php echo ($user['employed'] == 'Defence') ? "checked" : ""; ?> value="Defence" name="employed"> Defence &nbsp;&nbsp;
                              <input type="radio" required="required" id="employed" <?php echo ($user['employed'] == 'Business') ? "checked" : ""; ?> value="Business" name="employed"> Business &nbsp;&nbsp;
                              <input type="radio" required="required"id="employed" <?php echo ($user['employed'] == 'Not Working') ? "checked" : ""; ?> value="Not Working" name="employed"> Not Working
                           </div>
                        </div>
                     </div>
                     <div class="pull-right">
                     <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="btn btn-dark btnPrevious">Back</a>
                        <a class="btn btn-primary btnNext next3">Next</a>
                     </li>
                  </ul>
               </div>
                     </div>
                     <div class="tab-pane fade" id="family" role="tabpanel"
                     aria-labelledby="family-tabs">

                     <h4>Family Details</h4>
                     <div class="row">
                        <div class="col-xl-12 col-md-12">
                           <div class="form-group">
                              <label>Family Values:</label> &nbsp;
                              <input type="radio" id="family_value"  <?php echo ($user['family_value'] == 'Orthodox') ? "checked" : ""; ?> value="Orthodox"  name="family_value"> Orthodox &nbsp;&nbsp;
                              <input type="radio" id="family_value" <?php echo ($user['family_value'] == 'Traditional') ? "checked" : ""; ?> value="Traditional" name="family_value"> Traditional &nbsp;&nbsp;
                              <input type="radio" id="family_value" <?php echo ($user['family_value'] == 'Moderate') ? "checked" : ""; ?> value="Moderate"> Moderate &nbsp;&nbsp;
                              <input type="radio" id="family_value" <?php echo ($user['family_value'] == 'Liberal') ? "checked" : ""; ?> value="Liberal" name="family_value"> Liberal
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-12 col-md-12">
                           <div class="form-group">
                              <label>Family Type:</label> &nbsp;
                              <input type="radio" id="family_type" <?php echo ($user['family_type'] == 'Joint') ? "checked" : ""; ?> name="family_type" value="Joint" > Joint &nbsp;&nbsp;
                              <input type="radio" id="family_type" <?php echo ($user['family_type'] == 'Nuclear') ? "checked" : ""; ?> value="Nuclear"  name="family_type"> Nuclear &nbsp;&nbsp;
                              <input type="radio" id="family_type" <?php echo ($user['family_type'] == 'Other') ? "checked" : ""; ?> value="Other"  name="family_type"> Other
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-12 col-md-12">
                           <div class="form-group">
                              <label>Family Status:</label> &nbsp;
                              <input type="radio" id="family_status" name="family_status"  <?php echo ($user['family_status'] == 'Middle Class') ? "checked" : ""; ?> value="Middle Class" > Middle Class &nbsp;&nbsp;
                              <input type="radio" id="family_status"  <?php echo ($user['family_status'] == 'Upper Middle Class') ? "checked" : ""; ?> value="Upper Middle Class" name="family_status"> Upper Middle Class &nbsp;&nbsp;
                              <input type="radio" id="family_status"  <?php echo ($user['family_status'] == 'Rich / Affulent') ? "checked" : ""; ?> value="Rich / Affulent" name="family_status"> Rich / Affulent
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-3 col-md-12">
                           <div class="form-group">
                              <label>Siblings Details</label>
                              <select class="form-control" name="sibling_details" id="sibling_details">
                                 <option value="">No. of Brothers</option>
                                 <option value="1" <?=$user['sibling_details'] == "1" ? ' selected="selected"' : '';?>>1</option>
                                 <option value="2" <?=$user['sibling_details'] == "2" ? ' selected="selected"' : '';?>>2</option>
                                 <option value="3" <?=$user['sibling_details'] == "3" ? ' selected="selected"' : '';?>>3</option>
                                 <option value="4" <?=$user['sibling_details'] == "4" ? ' selected="selected"' : '';?>>4</option>
                                 <option value="5" <?=$user['sibling_details'] == "5" ? ' selected="selected"' : '';?>>5</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-3 col-md-12">
                           <div class="form-group">
                              <label></br></label>
                              <select class="form-control" name="married_brother" id="married_brother">
                                 <option value="">No. of Married Brothers</option>
                                 <option value="1" <?=$user['married_brother'] == "1" ? ' selected="selected"' : '';?>>1</option>
                                 <option value="2" <?=$user['married_brother'] == "2" ? ' selected="selected"' : '';?>>2</option>
                                 <option value="3" <?=$user['married_brother'] == "3" ? ' selected="selected"' : '';?>>3</option>
                                 <option value="4" <?=$user['married_brother'] == "4" ? ' selected="selected"' : '';?>>4</option>
                                 <option value="5" <?=$user['married_brother'] == "5" ? ' selected="selected"' : '';?>>5</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-3 col-md-12">
                           <div class="form-group">
                              <label></br></label>
                              <select class="form-control" name="sisters" id="sisters">
                                 <option value="">No. of Sisters</option>
                                 <option value="1" <?=$user['sisters'] == "1" ? ' selected="selected"' : '';?>>1</option>
                                 <option value="2" <?=$user['sisters'] == "2" ? ' selected="selected"' : '';?>>2</option>
                                 <option value="3" <?=$user['sisters'] == "3" ? ' selected="selected"' : '';?>>3</option>
                                 <option value="4" <?=$user['sisters'] == "4" ? ' selected="selected"' : '';?>>4</option>
                                 <option value="5" <?=$user['sisters'] == "5" ? ' selected="selected"' : '';?>>5</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-3 col-md-12">
                           <div class="form-group">
                              <label></br></label>
                              <select class="form-control" name="married_sister" id="married_sister">
                                 <option value="">No. of Married Sisters</option>
                                 <option value="1"  <?=$user['married_sister'] == "1" ? ' selected="selected"' : '';?>>1</option>
                                 <option value="2"  <?=$user['married_sister'] == "2" ? ' selected="selected"' : '';?>>2</option>
                                 <option value="3"  <?=$user['married_sister'] == "3" ? ' selected="selected"' : '';?>>3</option>
                                 <option value="4"  <?=$user['married_sister'] == "4" ? ' selected="selected"' : '';?>>4</option>
                                 <option value="5"  <?=$user['married_sister'] == "5" ? ' selected="selected"' : '';?>>5/option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xl-6 col-md-12">
                              <div class="form-group">
                                 <label>Father Occupation</label>
                                 <input type="text" class="form-control" id="father_occupation" name="father_occupation" value="<?=$user['father_occupation']?>">
                              </div>
                           </div>
                           <div class="col-xl-6 col-md-12">
                              <div class="form-group">
                                 <label>Mother Occupation</label>
                                 <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" value="<?=$user['mother_occupation']?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xl-12 col-md-12">
                              <div class="form-group">
                                 <label>Ancestral/Family origin</label>
                                 <input type="text" class="form-control" name="ancestral" id="ancestral" value="<?=$user['ancestral']?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xl-12 col-md-12">
                              <div class="form-group">
                                 <label>About My Family</label>
                                 <textarea class="form-control" name="about" id="about"> <?=$user['about']?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="pull-right">
                           <button type="submit" id="save-form" class="btn btn-primary next4">Save</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Container-fluid Ends-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

 // $('.btnNext').click(function() {
 //    const nextTabLinkEl = $('.nav-tabs .active').closest('li').next('li').find('a')[0];
 //    const nextTab = new bootstrap.Tab(nextTabLinkEl);
 //    nextTab.show();
 // });

 $('.btnPrevious').click(function() {
    const prevTabLinkEl = $('.nav-tabs .active').closest('li').prev('li').find('a')[0];
    const prevTab = new bootstrap.Tab(prevTabLinkEl);
    prevTab.show();
 });

  $("#religion").change(function()
  {
        var religion=$("#religion").val();

    $.ajax({
      type: 'get',
      dataType: "json",
      url: "<?php echo url('getcaste/') ?>"+'/'+religion,


      success: function(data)
      {
            jQuery('#caste').empty();
           $.each(data, function (index, value) {

                    $('#caste').append('<option value="' + value.cast_id + '">' + value.cast + '</option>');
                });

    }
});
  });

$(".next").click(function()
{
	var form = $("#myform");

	if($('#profile_for').val() == "" ){
		alert( "Please Select profile for!" );
		document.getElementById("profile_for").focus();
		return false;
	}else if($('#full_name').val() == "")
	{
		alert("Full Name is Required!" );
		document.getElementById("full_name").focus();
		return false;
	}else if($('#contact_no').val() == "")
	{
		alert("Contact No is Required!" );
		document.getElementById("contact_no").focus();
		return false;
	}
	else if($('#email').val() == "")
	{
		alert("Email is Required!" );
		document.getElementById("email").focus();
		return false;
	}
	else if($('#password').val() == "")
	{
		alert("Password is Required!" );
		document.getElementById("password").focus();
		return false;
	}
	else if($('#bdate').val() == "")
	{
		alert("Date of Birth is Required!" );
		document.getElementById("bdate").focus();
		return false;
	}
	else if($('#marital_status').val() == "")
	{
		alert("Marital Status is Required!" );
		document.getElementById("marital_status").focus();
		return false;
	} else if($('#txt_gender').val() == "")
	{
		alert("Gender is Required!" );
		document.getElementById("txt_gender").focus();
		return false;
	} else if($('#religion').val() == "")
	{
		alert("Religion is Required!" );
		document.getElementById("marital_status").focus();
		return false;
	} else if($('#caste').val() == "")
	{
		alert("Caste is Required!" );
		document.getElementById("caste").focus();
		return false;
	}else if($('#mother_tongue').val() == "")
	{
		alert("Mother Tongue is Required!" );
		document.getElementById("mother_tongue").focus();
		return false;
	}else if($('#country').val() == "")
	{
		alert("Country is Required!" );
		document.getElementById("country").focus();
		return false;
	}else if($('#city').val() == "")
	{
		alert("City is Required!" );
		document.getElementById("city").focus();
		return false;
	}else if($('#pincode').val() == "")
	{
		alert("Pincode is Required!" );
		document.getElementById("pincode").focus();
		return false;
	}else if($('#image').val() == "")
	{
		alert("Image is Required!" );
		document.getElementById("image").focus();
		return false;
	}else if($('#profile').val() == "")
	{
		alert("Profile is Required!" );
		document.getElementById("profile").focus();
		return false;
	}else
	{
		const nextTabLinkEl = $('.nav-tabs .active').closest('li').next('li').find('a')[0];
		const nextTab = new bootstrap.Tab(nextTabLinkEl);
		nextTab.show();

	}



});


$(".next1").click(function()
{
	var form = $("#myform");

	if($('#weight').val() == "" ){
		alert( "Weight is Required!" );
		document.getElementById("profile_for").focus();
		return false;
	}else if($('#height').val() == "")
	{
		alert("Height is Required!" );
		document.getElementById("height").focus();
		return false;
	}else if($('#body_type').val() == "")
	{
		alert("body type is Required!" );
		document.getElementById("body_type").focus();
		return false;
	}
	else if($('#complexion').val() == "")
	{
		alert("complexion is Required!" );
		document.getElementById("complexion").focus();
		return false;
	}
	else if($('#blood_group').val() == "")
	{
		alert("blood group is Required!" );
		document.getElementById("blood_group").focus();
		return false;
	}
	else if($('#eating_habits').val() == "")
	{
		alert("eating habits is Required!" );
		document.getElementById("eating_habits").focus();
		return false;
	}
	else
	{
		const nextTabLinkEl = $('.nav-tabs .active').closest('li').next('li').find('a')[0];
		const nextTab = new bootstrap.Tab(nextTabLinkEl);
		nextTab.show();

	}



});

$(".next2").click(function()
{
	var form = $("#myform");

	if($('#birth_place').val() == "" ){
		alert( "birth place is Required!" );
		document.getElementById("profile_for").focus();
		return false;
	}else if($('#birth_time').val() == "")
	{
		alert("Birth Time is Required!" );
		document.getElementById("birth_time").focus();
		return false;
	}else if($('#time_type').val() == "")
	{
		alert("Time Type is Required!" );
		document.getElementById("time_type").focus();
		return false;
	}
	else if($('#gotra').val() == "")
	{
		alert("gotra is Required!" );
		document.getElementById("gotra").focus();
		return false;
	}
	else if($('#star').val() == "")
	{
		alert("star is Required!" );
		document.getElementById("star").focus();
		return false;
	}
	else
	{
		const nextTabLinkEl = $('.nav-tabs .active').closest('li').next('li').find('a')[0];
		const nextTab = new bootstrap.Tab(nextTabLinkEl);
		nextTab.show();

	}
});
$(".next3").click(function()
{
	var form = $("#myform");

	if($('#education').val() == "" ){
		alert( "education is Required!" );
		document.getElementById("profile_for").focus();
		return false;
	}else if($('#education_details').val() == "")
	{
		alert("education details is Required!" );
		document.getElementById("education_details").focus();
		return false;
	}else if($('#occupation').val() == "")
	{
		alert("occupation is Required!" );
		document.getElementById("occupation").focus();
		return false;
	}
	else if($('#occupation_det').val() == "")
	{
		alert("occupation details is Required!" );
		document.getElementById("occupation_det").focus();
		return false;
	}
	else if($('#salary_income').val() == "")
	{
		alert("salary income is Required!" );
		document.getElementById("salary_income").focus();
		return false;
	}
	else if($('#employed').val() == "")
	{
		alert("employed is Required!" );
		document.getElementById("employed").focus();
		return false;
	}
	else
	{
		const nextTabLinkEl = $('.nav-tabs .active').closest('li').next('li').find('a')[0];
		const nextTab = new bootstrap.Tab(nextTabLinkEl);
		nextTab.show();

	}
});
$(".next4").click(function()
{
	var form = $("#myform");

	if($('#family_value').val() == "" ){
		alert("family value is Required!" );
		document.getElementById("family_value").focus();
		return false;
	}else if($('#family_type').val() == "")
	{
		alert("family type is Required!" );
		document.getElementById("family_type").focus();
		return false;
	}else if($('#family_status').val() == "")
	{
		alert("family status is Required!" );
		document.getElementById("family_status").focus();
		return false;
	}
	else if($('#sibling_details').val() == "")
	{
		alert("sibling details is Required!" );
		document.getElementById("sibling_details").focus();
		return false;
	}
	else if($('#married_brother').val() == "")
	{
		alert("married brother is Required!" );
		document.getElementById("married_brother").focus();
		return false;
	}
	else if($('#sisters').val() == "")
	{
		alert("sisters is Required!" );
		document.getElementById("sisters").focus();
		return false;
	}
	else if($('#married_sister').val() == "")
	{
		alert("married sister is Required!" );
		document.getElementById("married_sister").focus();
		return false;
	}
	else if($('#father_occupation').val() == "")
	{
		alert("father occupation is Required!" );
		document.getElementById("father_occupation").focus();
		return false;
	}
	else if($('#mother_occupation').val() == "")
	{
		alert("mother occupation is Required!" );
		document.getElementById("mother_occupation").focus();
		return false;
	}
	else if($('#ancestral').val() == "")
	{
		alert("ancestral is Required!" );
		document.getElementById("ancestral").focus();
		return false;
	}
	else if($('#about').val() == "")
	{
		alert("about is Required!" );
		document.getElementById("about").focus();
		return false;
	}
	else
	{
		const nextTabLinkEl = $('.nav-tabs .active').closest('li').next('li').find('a')[0];
		const nextTab = new bootstrap.Tab(nextTabLinkEl);
		nextTab.show();

	}
});
</script>
@endsection
@section('js')
@endsection