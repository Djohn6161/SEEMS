<div class="modal fade" id="editModal{{ $registration->id }}" tabindex="-1" aria-labelledby="createProgram"
    aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">Edit {{ $registration->email }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateRegistration{{ $registration->id }}" method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.registration.update', ['registration' => $registration->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="card d-flex align-items-center justify-content-center p-3" style="width: 18rem;">
                            <p class="text-venter">2x2 PICTURE</p>
                            @if ($registration->psa_file!==null) 
                                <img src="{{asset('storage/' . $registration->picture)}}" alt="" width="150px"/> 
                            @else
                                <img src="{{asset('img/undraw_profile.svg')}}" alt="" width="150px"/> 
                            @endif
                            
                            
                            <div class="card-body pb-0">
                                <div class="form-group mb-4">
                                    <div class="form-group mb-0">
                                        @error('picture')
                                        <span class="text-danger alert " role="alert">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        
                                        <input type="file" class="form-control-file border" id="picture" name="picture" style="" accept=".jpg, .jpeg, .png" >
                                        {{-- <label for="psa_file" class="custom-file-label" style="">Choose a image File</label> --}}
                                      </div>
                                </div>
                            </div>
                          </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="email[{{ $registration->id }}]" class="text-dark">Email</label>
                        @error('email')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="email[{{ $registration->id }}]" name="email" placeholder=""
                            value="{{ $registration->email }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="first_name[{{ $registration->id }}]" class="text-dark">First Name</label>
                        @error('first_name')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="first_name[{{ $registration->id }}]" name="first_name" placeholder=""
                            value="{{ $registration->first_name }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="middle_name[{{ $registration->id }}]" class="text-dark">Middle name</label>
                        @error('middle_name')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="middle_name[{{ $registration->id }}]" name="middle_name" placeholder=""
                            value="{{ $registration->middle_name }}" >
                    </div>
                    <div class="form-group mb-4">
                        <label for="last_name[{{ $registration->id }}]" class="text-dark">Last name</label>
                        @error('last_name')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="last_name[{{ $registration->id }}]" name="last_name" placeholder=""
                            value="{{ $registration->last_name }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="extension[{{ $registration->id }}]" class="text-dark">Extension</label>
                        @error('extension')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="extension[{{ $registration->id }}]" name="extension" placeholder=""
                            value="{{ $registration->extension }}" >
                    </div>
                    <div class="form-group mb-4">
                        <label for="date_of_birth[{{ $registration->id }}]" class="text-dark">Birthday</label>
                        @error('date_of_birth')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="date" class="form-control text-dark" style="font-size: 14px"
                            id="date_of_birth[{{ $registration->id }}]" name="date_of_birth" placeholder=""
                            value="{{ $registration->date_of_birth }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="mobile_number[{{ $registration->id }}]" class="text-dark">Mobile number</label>
                        @error('mobile_number')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="mobile_number[{{ $registration->id }}]" name="mobile_number" placeholder=""
                            value="{{ $registration->mobile_number }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="course"  class="form-label">Course Preferred</label>
                            <select class="form-control w-100" id="course" name="courses_id" style="">
                                <option style="">Choose course</option>
                                @foreach ($courses as $course)
                                <option @if ($registration->courses_id == $course->id) class="text-light font-weight-bold bg-primary" selected @endif value="{{$course->id}}">{{$course->name . " " . $course->acrocode}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group mb-4">
                        <div class="form-group mb-0">
                            <label class="form-label  mb-2">PSA File</label>
                            @error('psa_file')
                                <span class="text-danger alert " role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file border" id="psa_file" name="psa_file" style="" accept=".jpg, .jpeg, .png" >
                            {{-- <label for="psa_file" class="custom-file-label" style="">Choose a image File</label> --}}
                          </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="province[{{ $registration->id }}]" class="text-dark">Province</label>
                        @error('province')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="province[{{ $registration->id }}]" name="province" placeholder=""
                            value="{{ $registration->province }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="municipality[{{ $registration->id }}]" class="text-dark">Municipality</label>
                        @error('municipality')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="municipality[{{ $registration->id }}]" name="municipality" placeholder=""
                            value="{{ $registration->municipality }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="barangay[{{ $registration->id }}]" class="text-dark">Barangay</label>
                        @error('barangay')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="barangay[{{ $registration->id }}]" name="barangay" placeholder=""
                            value="{{ $registration->barangay }}" required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button form="updateRegistration{{ $registration->id }}" type="submit"
                    class="btn btn-primary btn-user btn-block" style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal{{ $registration->id }}" aria-labelledby="deleteProduct" tabindex="-1"
    role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure you want to delete this Registration:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class='text-danger font-size-20'>{{ $registration->email }}</span>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.registration.destroy', ['registration' => $registration->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="id[{{$registration->id}}]" value="{{ $registration->id }}">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mr-3" data-dismiss="modal">Close</button>
                        <button type="submit" class=" btn btn-danger">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>