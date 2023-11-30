@extends('layouts.landing')

@section('content')
    <!--? slider Area Start-->
    <section class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-12">
                            <div class="hero__caption ">
                                <h1 data-animation="fadeInLeft" data-delay="0.2s" class="text-uppercase">Bcc Online Entrance Examination<br></h1>
                                <p data-animation="fadeInLeft" data-delay="0.4s" >Welcome to the BCC Online Entrance Examination</p>
                                {{-- <a href="{{url('/#register')}}" class="btn hero-btn" data-animation="fadeInLeft"
                                    data-delay="0.7s">Register Now!</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ? services-area -->
    {{-- <div class="services-area">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="assets/img/icon/icon1.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>60+ UX courses</h3>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="assets/img/icon/icon2.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Expert instructors</h3>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="assets/img/icon/icon3.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Life time access</h3>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--? About Area-3 Start -->
    <section class="about-area3 fix " style="margin-top: 20px">
        <div class="support-wrapper align-items-center">
            {{-- <div class="right-content3">
                
                <div class="right-img">
                    <img src="{{ asset('assets/img/gallery/about3.png') }}" alt="">
                </div>
            </div> --}}
            <div class="left-content3 " >
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-20 text-center  ">
                    <div class="front-text">
                        <h2 class="">INSTRUCTIONS</h2>
                    </div>
                </div>

                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Examinee must not be involved in any kind of communication during the examination.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Examinee must not browse during the examination.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Examinee must not bring their phones inside the examination room.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Only one tab on the browser should be open during the examination.
                            Good Luck!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-area3 fix my-5">
        <div class="mx-3">
            <div class="container-flex px- px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="front-text" id="register"><b>Registration</b></h1>
                        {{-- <p><span style="color: red;">* required fields</span></p> --}}
                        <form action="{{ route('registration') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email')  is-invalid @enderror" style="font-size: 2.5rem" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Email Address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"  style="font-size: 2.5rem"
                                            placeholder="First Name" value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="middle_name" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name" value="{{ old('middle_name') }}" style="font-size: 2.5rem"
                                            placeholder="Middle Name" required>
                                    </div>
                                        @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" style="font-size: 2.5rem"
                                            placeholder="Last Name" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="extension" class="form-label">Extension Name <b>(Optional)</b></label>
                                        <input type="text" class="form-control" name="extension" id="extension" style="font-size: 2.5rem"
                                            placeholder="Extension Name" value="{{ old('extension') }}">
                                        @error('extension')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="birthday" class="form-label">Birthday</label>
                                        <input type="date" class="form-control" name="date_of_birth" id="birthday" value="{{old('date_of_birth')}}" style="font-size: 2.5rem"
                                            required>
                                        @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="mobile_number" class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile_number" value="{{old('mobile_number')}}" style="font-size: 2.5rem"
                                            id="mobile_number" placeholder="Mobile Number" required>
                                            @error('mobile_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row-md-6 form-group mt-4">
                                <div class="card-title text-md text-dark font-weight-bold text-uppercase form-check">
                                    
                                    <label class="form-check-label " for="confirmationCheck" style="font-size: 2.5rem; ">
                                        <input class="form-check-input mt-3 " type="checkbox" name="confirmationCheck" id="confirmationCheck" style="height:20px; width:20px" required> <b class="ml-4">I confirm that the Informations are correct.</b></label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right" style="font-size: 2.5rem; ">Submit</button>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
@endsection
<!-- About Area End -->
