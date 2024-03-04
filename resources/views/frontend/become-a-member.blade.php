@extends('frontend.master')
@section('content')
        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url({{asset('assets-frontend')}}/assets/images/cps/cps-4.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Pages</li>
                    </ul>
                    <h2>Become a Member</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Become Volunteer Page Start-->
        <section class="become-volunteer-page">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Register yourself with us</span>
                    <h2 class="section-title__title">Let’s join our community to <br> become a Member</h2>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="become-volunteer-page__left">
                            <div class="become-volunteer-page__img">
                                {{-- <img src="{{asset('assets-frontend')}}/assets/images/team/become-volunteer-img-1.jpg" alt=""> --}}
                            </div>
                            <div class="become-volunteer-page__content">
                                <h3 class="become-volunteer-page__title">Requirements</h3>
                                <p class="become-volunteer-page__text">Aliquam hendrerit a augue insu image pellentes
                                    que id erat quis sollicitud null mattis Ipsum is simply dummy typesetting industry.
                                    Alienum phaedrum torquatos nec eu.</p>
                                <ul class="list-unstyled become-volunteer__points">
                                    <li>
                                        <div class="icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="text">
                                            <p>Making this first true generator simply text</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="text">
                                            <p>Lorem Ipsum is not simply free text</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-5">
                                <h3 class="become-volunteer-page__title "> <a href="{{asset('assets-frontend')}}/assets/FORM.pdf">Download Form</a></h3>
                            </div>
                            <div class="become-volunteer__call">
                                <div class="become-volunteer__call-icon">
                                    <span class="icon-chat"></span>
                                </div>
                                <div class="become-volunteer__call-content">
                                    <span>Call Anytime</span>
                                    <p><a href="tel:01700-000000">+971554681115</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">

                           @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <div class="become-volunteer-page__right">
                            <form class="become-volunteer-page__form" action="{{ route('member-data-submit') }}" method="Post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="become-volunteer-page__input">
                                            <label for="name"><span style="color: red">*</span>Name / নামঃ</label>
                                            <input type="text" placeholder="Name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="become-volunteer-page__input">
                                            <label for="name"><span style="color: red">*</span>Father's Name / বাবার নামঃ</label>
                                            <input type="text" placeholder="Your Father Name" name="father_name" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="become-volunteer-page__input">
                                            <label for="name"><span style="color: red">*</span>Mother's Name / মায়ের নামঃ</label>
                                            <input type="text" placeholder="Your Mother Name" name="mother_name" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="name">Nominee Name / নমিনীর নামঃ</label>
                                            <input type="text" placeholder="Nominee's Name" name="nominee_name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="relation">Relation / সম্পর্কঃ</label>
                                            <input type="text" placeholder="Relation" name="relation">
                                        </div>
                                    </div>
                                    {{-- <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="blood">Blood Group / রক্তের গ্রুপঃ</label>
                                            <input type="text" placeholder="Blood Group" name="blood_group">
                                        </div>
                                    </div> --}}
                                    <div class="col-12 col-xl-6 mb-3 mb-md-0">
                                        <div class="donate-now__personal-info-input" >
                                            <label for="relation">Blood Group / রক্তের গ্রুপঃ</label>
                                            <select name="blood_group" class="selectpicker" >
                                                <option selected>Blood Group</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="nationality"><span style="color: red">*</span>Nationality / জাতীয়তাঃ</label>
                                            <input type="text" placeholder="Nationality" name="nationality" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="date"><span style="color: red">*</span>Date of Birth / জন্ম তারিখঃ</label>
                                            <input type="text" placeholder="Date of Birth" name="date_of_birth" id="datepicker" required>
                                        </div>
                                    </div>
                                    {{-- <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="relogion"><span style="color: red">*</span>Religion / ধর্মঃ</label>
                                            <input type="text" placeholder="Religion" name="religion" required>
                                        </div>
                                    </div> --}}
                                    <div class="col-12 col-xl-6 mb-3 mb-md-0">
                                        <div class="donate-now__personal-info-input" >
                                            <label for="relation">Religion / ধর্ম</label>
                                            <select name="religion" class="selectpicker" >
                                                <option selected>Religion</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hinduism">Hinduism</option>
                                                <option value="Christianity">Christianity</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option value="Other religions">Other religions</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6 mb-3 mb-md-0">
                                        <div class="donate-now__personal-info-input" >
                                            <label for="relation">Gender / লিঙ্গ</label>
                                            <select name="gender" class="selectpicker" >
                                                <option selected>Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="number"><span style="color: red">*</span>Passport No. / পাসপোর্ট নংঃ</label>
                                            <input type="text" placeholder="Passport Number" name="passport_no" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="number">NID No. / এন আইডি নংঃ</label>
                                            <input type="text" placeholder="NID Number" name="nid" >
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="number">E-ID No. / ই-আইডি নংঃ</label>
                                            <input type="text" placeholder="E-ID Number" name="e_nid" >
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="number"><span style="color: red">*</span>Personal Phone No. / ব্যক্তিগত ফোন নম্বরঃ</label>
                                            <input type="number" placeholder="Personal Phone Number" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="number"><span style="color: red">*</span>Familly Phone No. / পারিবারিক ফোন নম্বরঃ</label>
                                            <input type="number" placeholder="Family Phone Number" name="family_phone" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="number"><span style="color: red">*</span>Whatsapp No. / হোয়াটসঅ্যাপ নম্বরঃ</label>
                                            <input type="number" placeholder="Whatsapp Number" name="whatsapp_number" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="become-volunteer-page__input">
                                            <label for="email"><span style="color: red">*</span>Email / ইমেইলঃ</label>
                                            <input type="email" placeholder="Email Address" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="become-volunteer-page__input">
                                            <label for="email"><span style="color: red">*</span>Password / পাসওয়ার্ডঃ</label>
                                            <input type="password" placeholder="Enter Password" name="password" required>
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
                                            <label for="address"><span style="color: red">*</span>Permanent Address / স্থায়ী ঠিকানাঃ</label>
                                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                                <div class="col-12 col-xl-6 mb-3 mb-md-0">

                                                    <input type="text" placeholder="Village"
                                                        name="permanent_a_village" required>
                                                    </div>

                                                {{-- <div class="col-12 col-xl-5">

                                                    <input type="text" placeholder="Word no."
                                                        name="permanent_word_no" required>
                                                    </div> --}}
                                                    <style>

                                                    </style>
                                                    <div class="col-12 col-xl-6 mb-3 mb-md-0">
                                                        <div class="donate-now__personal-info-input" >
                                                            <select name="permanent_word_no" class="selectpicker" >
                                                                <option selected>Word No.</option>
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
                                                <div class="col-12 col-xl-6 mb-3 mb-md-0">
                                                    <div class="donate-now__personal-info-input" >
                                                        <select name="permanent_upazila" class="selectpicker" id="selectId" onchange="toggleUnionOption()" >
                                                            <option selected>Upazila </option>
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
                                                    <div class="donate-now__personal-info-input" id="unionOption" style="display: none;" >
                                                        <select name="permanent_union" class="selectpicker" >
                                                            <option selected>Union</option>
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
                                            <label for="address"><span style="color: red">*</span>Present Address / বর্তমান ঠিকানাঃ</label>
                                            <input type="text" placeholder="Address" name="address" required>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="become-volunteer-page__input">
                                            <label for="formFile" class="form-label"><span style="color: red">*</span>Upload Photo / ছবিঃ</label>
                                            <input class="form-control" type="file" id="formFile" name="image" required>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="become-volunteer-page__input">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                                <label class="form-check-label" for="gridCheck">
                                                    Confirm / নিশ্চিত করুন
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="become-volunteer-page__btn-box">
                                            <button type="submit" class="thm-btn become-volunteer-page__btn">Submit /
                                                জমা দিন</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Become Volunteer Page End-->


@endsection

@push('js')
<script>
    function toggleUnionOption() {
      var selectElement = document.getElementById("selectId");
      var unionOption = document.getElementById("unionOption");

      if (selectElement.value === "চকরিয়া") {
        unionOption.style.display = "block";
      } else {
        unionOption.style.display = "none";
      }
    }
  </script>
@endpush
