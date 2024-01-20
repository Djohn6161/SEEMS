<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">New Admin</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createAccount" method="POST" action="{{ route('admin.account.store') }}" >
                    @csrf
                    
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
                        <label for="name" class="text-dark">Name</label>
                        @if(!empty($errors->create->first('name')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('name') }}</span>
                        @endif
                        <input type="text" name="name" class="form-control" style="font-size: 14px"
                            placeholder="Enter a Name" value="{{ old('name') }}"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="text-dark">Password</label>
                        @if(!empty($errors->create->first('password')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('password') }}</span>
                        @endif
                        <input type="password" name="password" class="form-control" style="font-size: 14px"
                            placeholder="Enter a password" value="{{ old('password') }}"
                            >
                    </div>
                    <div class="form-group mb-4">
                        <label for="password_confirmation" class="text-dark">Confirm Password</label>
                        @if(!empty($errors->create->first('password_confirmation')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('password_confirmation') }}</span>
                        @endif
                        <input type="password" name="password_confirmation" class="form-control" style="font-size: 14px"
                            placeholder="Re-enter your password" value="{{ old('password_confirmation') }}"
                            >
                    </div>
                    <div class="form-group mb-4">
                        <label for="active" class="text-dark">Status:</label>
                        @if(!empty($errors->create->first('active')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('active') }}</span>
                        @endif
                        <div class="col-sm-9 d-inline-flex justify-content-start align-items-center">
                            <div class="d-inline-flex justify-content-start align-items-center">
                                <label class="form-check-label mx-3">
                                    <input type="radio" class="form-check-input" name="active" value="0"
                                        {{ old('active') == false ? 'checked' : '' }}>Inactive
                                </label>
                            </div>
                            <div class="d-inline-flex justify-content-start align-items-center">
                                <label class="form-check-label mx-3">
                                    <input type="radio" class="form-check-input" name="active" value="1"
                                        {{ old('active') == true ? 'checked' : '' }} checked>Active
                                </label>
                            </div>
                            @error('role')
                                <span class="text-danger alert p-0 TeditError" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button form="createAccount" type="submit" class="btn btn-primary btn-user btn-block"
                    style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>