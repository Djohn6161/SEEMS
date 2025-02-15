<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createRegistration" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">New Registration</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createRegistration" method="POST" action="{{ route('admin.registration.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="card d-flex align-items-center justify-content-center p-3" style="width: 18rem;">
                            <p class="text-venter">2x2 PICTURE</p>
                            <img src="{{asset('img/undraw_profile.svg')}}" alt="" width="150px"/> 
                            
                            <div class="card-body pb-0">
                                <div class="form-group mb-4">
                                    <div class="form-group mb-0">
                                    @if(!empty($errors->create->first('picture')))
                                        <span class="text-danger alert " role="alert">{{ $errors->create->first('picture') }}</span>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        
                                        <input type="file" class="form-control-file border" id="picture" name="picture" style="" accept=".jpg, .jpeg, .png" required>
                                        {{-- <label for="psa_file" class="custom-file-label" style="">Choose a image File</label> --}}
                                      </div>
                                </div>
                            </div>
                          </div>
                    </div>
                    
                    
                    <div class="form-group mb-4">
                        <label for="email" class="text-dark">Email Address</label>
                        @if(!empty($errors->create->first('email')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('email') }}</span>
                        @endif
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            name="email"
                            placeholder="example@example.com" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="first_name" class="text-dark">First name</label>
                        @if(!empty($errors->create->first('first_name')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('first_name') }}</span>
                        @endif
                        <input type="text" name="first_name" class="form-control" style="font-size: 14px"
                            placeholder="Enter your first name" value="{{ old('first_name') }}"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="middle_name" class="text-dark">Middle Name</label>
                        @if(!empty($errors->create->first('middle_name')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('middle_name') }}</span>
                        @endif
                        <input type="text" name="middle_name" class="form-control" style="font-size: 14px"
                            placeholder="Enter your middle name" value="{{ old('middle_name') }}"
                            >
                    </div>
                    <div class="form-group mb-4">
                        <label for="last_name" class="text-dark">Last Name</label>
                        @if(!empty($errors->create->first('last_name')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('last_name') }}</span>
                        @endif
                        <input type="text" name="last_name" class="form-control" style="font-size: 14px"
                            placeholder="Enter your last name" value="{{ old('last_name') }}"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="extension" class="text-dark">Extension Name <b>(Optional)</b></label>
                        @if(!empty($errors->create->first('extension')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('extension') }}</span>
                        @endif
                        <input type="text" name="extension" class="form-control" style="font-size: 14px"
                            placeholder="Ex: Jr. Sr. (leave it blank if none)" value="{{ old('extension') }}"
                            >
                    </div>
                    <div class="form-group " style="">
                        <label for="gender"  class="form-label">Gender</label>
                        <br>
                        <div class="col-sm-9 d-inline-flex justify-content-start align-items-center">
                                <div class="d-inline-flex justify-content-start align-items-center">
                                    <label class="form-check-label mx-3">
                                        <input type="radio" class="form-check-input " name="gender" value="1" 
                                            {{ old('gender') == 1 ? 'checked' : '' }}> <span class="">Male</span>
                                    </label>
                                </div>

                            <div class="d-inline-flex justify-content-start align-items-center">
                                <label class="form-check-label mx-3">
                                    <input type="radio" class="form-check-input" name="gender" value="0" 
                                    {{ old('gender') == 0 ? 'checked' : '' }}> <span class="">Female</span>
                                </label>
                            </div>

                            @if(!empty($errors->create->first('gender')))
                                <span class="text-danger alert p-0 TeditError" role="alert">{{ $message }}</span>
                            @endif
                        </div>
                      </div>
                    <div class="form-group mb-4">
                        <label for="date_of_birth" class="text-dark">Birthday</label>
                        @if(!empty($errors->create->first('date_of_birth')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('date_of_birth') }}</span>
                        @endif
                        <input type="date" name="date_of_birth" class="form-control" style="font-size: 14px"
                            placeholder="" value="{{ old('date_of_birth') }}"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="mobile_number" class="text-dark">Mobile Number</label>
                        @if(!empty($errors->create->first('mobile_number')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('mobile_number') }}</span>
                        @endif
                        <input type="text" name="mobile_number" class="form-control" style="font-size: 14px"
                            placeholder="11 digit mobile number: 09123456789" value="{{ old('mobile_number') }}"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="course"  class="form-label">Course Preferred</label>
                            <select class="form-control w-100" id="course" name="courses_id" style="">
                                <option style="">Choose course</option>
                                @foreach ($courses as $course)
                                <option @if (old('courses_id') == $course->id) class="text-light font-weight-bold bg-primary" selected @endif value="{{$course->id}}">{{$course->name . " " . $course->acrocode}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group mb-4">
                        <div class="form-group mb-0">
                            <label class="form-label  mb-2">PSA File</label>
                            @if(!empty($errors->create->first('psa_file')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('psa_file') }}</span>
                        @endif
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file border" id="psa_file" name="psa_file" style="" accept=".jpg, .jpeg, .png" required>
                            {{-- <label for="psa_file" class="custom-file-label" style="">Choose a image File</label> --}}
                          </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="province" class="text-dark">Province</label>
                        @if(!empty($errors->create->first('province')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('province') }}</span>
                        @endif
                        <input type="text" name="province" class="form-control" style="font-size: 14px"
                            placeholder="Province" value="{{ old('province') }}"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="municipality" class="text-dark">Municipality</label>
                        @if(!empty($errors->create->first('municipality')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('municipality') }}</span>
                        @endif
                        <input type="text" name="municipality" class="form-control" style="font-size: 14px"
                            placeholder="Municipality" value="{{ old('municipality') }}"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="barangay" class="text-dark">Barangay</label>
                        @if(!empty($errors->create->first('barangay')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('barangay') }}</span>
                        @endif
                        <input type="text" name="barangay" class="form-control" style="font-size: 14px"
                            placeholder="Barangay" value="{{ old('barangay') }}"
                            required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button form="createRegistration" type="submit" class="btn btn-primary btn-user btn-block"
                    style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>