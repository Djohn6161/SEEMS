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
                <form id="updateRegistration{{ $registration->id }}" method="POST"
                    action="{{ route('admin.registration.update', ['registration' => $registration->id]) }}">
                    @csrf
                    @method('PUT')
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
                            value="{{ $registration->middle_name }}" required>
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