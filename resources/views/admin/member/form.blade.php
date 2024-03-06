@extends('admin.layouts.master')
@section('content')
<style>
    .become-volunteer-page__right {
    position: relative;
    display: block;
    background-color: rgb(255, 255, 255);
    box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.05);
    border: 1px solid var(--oxpins-bdr-color);
    border-top-right-radius: var(--oxpins-bdr-radius);
    border-bottom-right-radius: var(--oxpins-bdr-radius);
    padding: 60px 60px 60px;
}
.become-volunteer-page__form {
    position: relative;
    display: block;
}
.become-volunteer-page__input {
    position: relative;
    display: block;
    margin-bottom: 20px;
}
.become-volunteer-page__input input[type="text"], .become-volunteer-page__input input[type="email"] {
    height: 58px;
    width: 100%;
    border: none;
    outline: none;
    background-color: var(--oxpins-extra);
    color: #707876;
    font-size: 14px;
    padding: 0 30px;
    border-radius: 5px;
    font-weight: 400;
}
.donate-now__personal-info-input {
    position: relative;
    display: block;
    margin-bottom: 30px;
}
.donate-now__personal-info-input .bootstrap-select>.dropdown-toggle {
    position: relative;
    left: 11px;
    height: 58px;
    outline: none !important;
    border: 0;
    background-color: #F4F6F9!important;
    margin: 0;
    padding: 0;
    padding-left: 30px;
    padding-right: 30px;
    color: var(--oxpins-gray) !important;
    font-size: 14px;
    line-height: 60px;
    font-weight: 500;
    box-shadow: none !important;
    background-repeat: no-repeat;
    background-size: 14px 12px;
    background-position: right 25.75px center;
}
.become-volunteer-page__input input[type="text"], .become-volunteer-page__input input[type="number"], .become-volunteer-page__input input[type="password"], .become-volunteer-page__input input[type="email"] {
    height: 58px;
    width: 100%;
    border: none;
    outline: none;
    background-color: #F4F6F9;
    color: #707876;
    font-size: 14px;
    padding: 0 30px;
    border-radius: 5px;
    font-weight: 400;
}
.bootstrap-select>select {
    position: absolute !important;
    bottom: 0;
    left: 50%;
    display: block !important;
    width: 0.5px !important;
    height: 100% !important;
    padding: 0 !important;
    opacity: 0 !important;
    border: none;
    z-index: 0 !important;
}.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
    width: 220px;
}
.select-hc{
    height: 53px!important;
    background-color: #F4F6F9!important;
}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add New member</h1>
      </div>

    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <!-- /.card-header -->
          <!-- form start -->
                            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

          <form action="@isset($member){{ route('admin.member.update', $member->id) }}@else{{ route('admin.member.store') }}@endisset"
            method="post" enctype="multipart/form-data" id="serialForm">
            @csrf
            <div class="card-body">
                <div class="row">
                   <div class="col-xl-12">
                    <div class="become-volunteer-page__input">
                        <label for="name"><span style="color: red">*</span>Serial Number</label>
                        <input type="text" id="serialNumber" name="serial" @isset($member) value="{{ $member->serial }}" @endisset>
                        <strong id="error-message" style="color: red;"></strong>
                    </div>
                </div>

                    <div class="col-xl-12">
                        <div class="become-volunteer-page__input">
                            <label for="name"><span style="color: red">*</span>Name / নামঃ</label>
                            <input type="text" placeholder="Name" name="name" required @isset($member) value="{{ $member->name }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="become-volunteer-page__input">
                            <label for="name">Father's Name / বাবার নামঃ</label>
                            <input type="text" placeholder="Your Father Name" name="father_name" @isset($member) value="{{ $member->father_name }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="become-volunteer-page__input">
                            <label for="name">Mother's Name / মায়ের নামঃ</label>
                            <input type="text" placeholder="Your Mother Name" name="mother_name"@isset($member) value="{{ $member->mother_name }}" @endisset >
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="name">Nominee Name / নমিনীর নামঃ</label>
                            <input type="text" placeholder="Nominee's Name" name="nominee_name"@isset($member) value="{{ $member->nominee_name }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="relation">Relation / সম্পর্কঃ</label>
                            <input type="text" placeholder="Relation" name="relation"@isset($member) value="{{ $member->relation }}" @endisset>
                        </div>
                    </div>
                    {{-- <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="blood">Blood Group / রক্তের গ্রুপঃ</label>
                            <input type="text" placeholder="Blood Group" name="blood_group">
                        </div>
                    </div> --}}
                    <div class="col-12 col-xl-6 mb-3 mb-md-0">
                        <div class="form_group" >
                            <label for="relation">Blood Group / রক্তের গ্রুপঃ</label>
                            <select name="blood_group" class="form-control select-hc" >
                                <option value="" selected>Blood Group</option>
                                @isset($member)
                                <option value="A+" @if($member->blood_group == 'A+') selected @endif >A+</option>
                                <option value="A-" @if($member->blood_group == 'A-') selected @endif >A-</option>
                                <option value="B+"@if($member->blood_group == 'B+') selected @endif >B+</option>
                                <option value="B-"@if($member->blood_group == 'B-') selected @endif >B-</option>
                                <option value="O+"@if($member->blood_group == 'O+') selected @endif >O+</option>
                                <option value="O-"@if($member->blood_group == 'O-') selected @endif >O-</option>
                                <option value="AB+"@if($member->blood_group == 'AB+') selected @endif >AB+</option>
                                <option value="AB-"@if($member->blood_group == 'AB-') selected @endif >AB-</option>
                                @else
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O+</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                @endisset
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="nationality">Nationality / জাতীয়তাঃ</label>
                            <input type="text" placeholder="Nationality" name="nationality" @isset($member) value="{{ $member->nationality }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="date">Date of Birth / জন্ম তারিখঃ</label>
                            <input type="text" placeholder="Date of Birth" name="date_of_birth" id="datepicker"@isset($member) value="{{ $member->date_of_birth }}" @endisset >
                        </div>
                    </div>
                    {{-- <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="relogion"><span style="color: red">*</span>Religion / ধর্মঃ</label>
                            <input type="text" placeholder="Religion" name="religion" required>
                        </div>
                    </div> --}}
                    <div class="col-12 col-xl-6 mb-3 mb-md-0">
                        <div class="form-group" >
                            <label for="relation">Religion / ধর্ম</label>
                            <select name="religion" class="form-control select-hc" >
                                <option value="" selected>Religion</option>
                                <option value="Islam">Islam</option>
                                <option value="Hinduism">Hinduism</option>
                                <option value="Christianity">Christianity</option>
                                <option value="Buddhism">Buddhism</option>
                                <option value="Other religions">Other religions</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 mb-3 mb-md-0">
                        <div class="form-group" >
                            <label for="relation">Gender / লিঙ্গ</label>
                            <select name="gender" class="form-control select-hc" >
                                <option value="" selected>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="number">Passport No. / পাসপোর্ট নংঃ</label>
                            <input type="text" placeholder="Passport Number" name="passport_no"@isset($member) value="{{ $member->passport_no }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="number">NID No. / এন আইডি নংঃ</label>
                            <input type="text" placeholder="NID Number" name="nid" @isset($member) value="{{ $member->nid }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="number">E-ID No. / ই-আইডি নংঃ</label>
                            <input type="text" placeholder="E-ID Number" name="e_nid" @isset($member) value="{{ $member->e_nid }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="number"><span style="color: red">*</span>Personal Phone No. / ব্যক্তিগত ফোন নম্বরঃ</label>
                            <input type="number" placeholder="Personal Phone Number" name="phone" required @isset($member) value="{{ $member->phone }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="number">Familly Phone No. / পারিবারিক ফোন নম্বরঃ</label>
                            <input type="number" placeholder="Family Phone Number" name="family_phone" @isset($member) value="{{ $member->family_phone }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="become-volunteer-page__input">
                            <label for="number">Whatsapp No. / হোয়াটসঅ্যাপ নম্বরঃ</label>
                            <input type="number" placeholder="Whatsapp Number" name="whatsapp_number" @isset($member) value="{{ $member->whatsapp_number }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="become-volunteer-page__input">
                            <label for="email"><span style="color: red">*</span>Email / ইমেইলঃ</label>
                            <input type="email" placeholder="Email Address" name="email" required @isset($member) value="{{ $member->email }}" @endisset>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="become-volunteer-page__input">
                            <label for="email"><span style="color: red">*</span>Password / পাসওয়ার্ডঃ</label>
                            <input type="password" placeholder="Enter Password" name="password"  @isset($member) value="{{ $member->email }}" @endisset required >
                        </div>
                    </div>


                    {{-- <div class="col-xl-12">
                        <div class="become-volunteer-page__input">
                            <label for="address">Permanent Address / স্থায়ী ঠিকানাঃ</label>
                            <input type="text" placeholder="Village & Word No" name="Address">
                        </div>
                        <div class="become-volunteer-page__input">
                            <input type="text" placeholder="Others" name="Address">
                        </div>
                    </div> --}}

                    <div class="col-xl-12">
                        <div class="become-volunteer-page__input">
                            <label for="address">Permanent Address / স্থায়ী ঠিকানাঃ</label>
                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                <div class="col-12 col-xl-6 mb-3 mb-md-0">

                                    <input type="text" placeholder="Village"
                                        name="permanent_a_village" @isset($member) value="{{ $member->permanent_a_village }}" @endisset>
                                    </div>

                                {{-- <div class="col-12 col-xl-5">

                                    <input type="text" placeholder="Word no."
                                        name="permanent_word_no" required>
                                    </div> --}}
                                    <style>

                                    </style>
                                    <div class="col-12 col-xl-6 mb-3 mb-md-0">
                                        <div class="form-group" >
                                            <select class="form-control select-hc" name="permanent_word_no" class="selectpicker" >
                                                <option value="" selected>Word No.</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>

                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
                                <div class="col-12 col-xl-12 mb-3 mb-md-0">
                                    <div class="form-group" >
                                        <select name="permanent_upazila" class="form-control select-hc" id="selectId" onchange="toggleUnionOption()" >
                                            <option value="" selected>Upazila </option>
                                            <option value="কক্সবাজার সদর">কক্সবাজার সদর</option>
                                            <option value="রামু">রামু</option>
                                            <option value="ঈদগাঁ">ঈদগাঁ </option>
                                            <option value="চকরিয়া">চকরিয়া </option>
                                            <option value="পেকুয়া">পেকুয়া</option>
                                            <option value="মহেশখালী">মহেশখালী</option>
                                            <option value="কুতুবদিয়া">কুতুবদিয়া</option>
                                            <option value="টেকনাফ">টেকনাফ</option>
                                            <option value="উখিয়া">উখিয়া</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 mb-3 mb-md-0">
                                    <div class="form-group" id="unionOption" style="display: none;" >
                                        <select name="permanent_union" class="form-control select-hc" >
                                            <option value="" selected>Union</option>
                                            <option value="হারবাং">হারবাং</option>
                                            <option value="বরইতলী">বরইতলী</option>
                                            <option value="কৈয়ারবিল">কৈয়ারবিল</option>
                                            <option value="কাকারা">কাকারা</option>
                                            <option value="লক্ষ্যারচর">লক্ষ্যারচর</option>
                                            <option value="ভেওলা মানিকচর">ভেওলা মানিকচর</option>
                                            <option value="সুরাজপুর-মানিকপুর">সুরাজপুর-মানিকপুর</option>
                                            <option value="বমু বিলছড়ি">বমু বিলছড়ি</option>
                                            <option value="ফাঁসিয়াখালী">ফাঁসিয়াখালী</option>
                                            <option value="ডুলাহাজারা">ডুলাহাজারা</option>
                                            <option value="সাহারবিল">সাহারবিল</option>
                                            <option value="খুটাখালী">খুটাখালী</option>
                                            <option value="পশ্চিম বড় ভেওলা">পশ্চিম বড় ভেওলা</option>
                                            <option value="পুর্ব বড় ভেওলা">পুর্ব বড় ভেওলা</option>
                                            <option value="কোনাখালী">কোনাখালী</option>
                                            <option value="ঢেমুশিয়া">ঢেমুশিয়া</option>
                                            <option value="বদরখালী">বদরখালী</option>
                                            <option value="চিরিঙ্গা">চিরিঙ্গা</option>
                                            <option value="চকরিয়া পৌরসভা">চকরিয়া পৌরসভা</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="become-volunteer-page__input">
                                    {{-- <label for="address"><span style="color: red">*</span>Present Address / বর্তমান ঠিকানাঃ</label> --}}
                                    <input type="text" placeholder="Chakaria, Cox-Bazar." name="address" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="become-volunteer-page__input">
                            <label for="address">Present Address / বর্তমান ঠিকানাঃ</label>
                            <input type="text" placeholder="Address" name="address" @isset($member) value="{{ $member->address }}" @endisset>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="become-volunteer-page__input">
                            <label for="formFile" class="form-label">Upload Photo / ছবিঃ</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" @isset($member) @if($member->status == 1) checked @endif @else checked @endisset>
                        <label class="form-check-label" for="exampleCheck1">Active</label>
                      </div>
                      </div>
                      @isset($member)
                      <div class="col-xl-12">
                        <div class="card-footer" style="margin-top: 15px;">
                            <button type="submit" class="btn btn-primary float-left">Submit</button>
                        </div>
                    </div>
                      @else
                      <div class="col-xl-12">
                        <div class="card-footer" style="margin-top: 15px;">
                            <button type="submit" id="submitBtn" class="btn btn-primary float-left" disabled>Submit</button>
                        </div>
                    </div>
                      @endisset
                </div>
              {{-- <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter title" @isset($member) value="{{ $member->name }}" @endisset required>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="location_id">Country</label>
                    <select class="form-control" name="country_name"  >
                      <option value="">--Select Country--</option>
                      @foreach ($countries as $country)
                        @isset($member)
                          <option value="{{ $country->country_name }}" @if($member->country_name == $country->country_name) selected @endif>{{ $country->country_name }}</option>
                        @else
                          <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                        @endisset
                      @endforeach
                    </select>
                  </div>
                </div>
                {{-- <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Desigantion</label>
                    <input type="text" name="designation" class="form-control" id="exampleInputEmail1" placeholder="Enter designation" @isset($member) value="{{ $member->designation }}" @endisset required>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Join Date</label>
                    <input type="date" name="join_date" class="form-control" id="exampleInputEmail1" placeholder="Enter join date" @isset($member) value="{{ $member->join_date }}" @endisset >
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter phone no" @isset($member) value="{{ $member->phone }}" @endisset >
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                    <div class="form-group">
                        @isset($member) <img src="{{ asset('assets') }}/images/uploads/members/{{ $member->image }}" alt="member image" width="100px" height="100px"><br/> @endisset
                        <label for="exampleInputFile">@isset($member) Change member Image @else Choose member Image @endisset</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="image" class="form-control" @isset($member) @else  @endisset>
                          </div>
                        </div>
                      </div>
                </div>

              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email address" @isset($member) value="{{ $member->email }}" @endisset required>
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password address" @isset($member) value="{{ $member->password }}" @endisset required>
                  </div>
                </div>

              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Full Address</label>
                <textarea name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter address">@isset($member) {{ $member->address }} @endisset</textarea>
              </div>
              <div class="form-check">
                <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" @isset($member) @if($member->status == 1) checked @endif @else checked @endisset>
                <label class="form-check-label" for="exampleCheck1">Active</label>
              </div>
            </div>
            <!-- /.card-body

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div> --}}
          </form>
        </div>
        <!-- /.card -->
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('js')
@isset($member)
@else
<script>
    function delay(callback, ms){
        var timer = 0;
        return function(){
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function(){
                callback.apply(context, args);
            }, ms || 0);
        };
    }

    function checkSerial() {
        var serialNumber = $("#serialNumber").val();

        $.ajax({
            url: '{{ route("admin.member.serial") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                serialNumber: serialNumber
            },
            success: function(response) {
                if (response.exists) {
                    $("#error-message").text("Serial number already exists!");
                    $("#submitBtn").prop("disabled", true);
                } else {
                    $("#error-message").text("");
                    $("#submitBtn").prop("disabled", false);
                }
            },
            error: function() {
                console.log("Error checking serial number");
            }
        });
    }

    $("#serialNumber").on("input", delay(function() {
        var serialNumber = $("#serialNumber").val();
        if (serialNumber.trim() === "") {
            $("#error-message").text(""); // Clear the error message when input is empty
            $("#submitBtn").prop("disabled", true); // Disable submit button when input is empty
        } else {
            checkSerial();
        }
    }, 50));

    // Disable the submit button initially
    $("#submitBtn").prop("disabled", true);
    </script>
@endisset
@endpush
