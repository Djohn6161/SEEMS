<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">New Course</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createCourse" method="POST" action="{{ route('admin.course.store') }}" >
                    @csrf
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
                        <label for="acrocode" class="text-dark">Acrocode</label>
                        @if(!empty($errors->create->first('acrocode')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('acrocode') }}</span>
                        @endif
                        <input type="text" name="acrocode" class="form-control" style="font-size: 14px"
                            placeholder="Enter the acrocode of the name" value="{{ old('acrocode') }}"
                            required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button form="createCourse" type="submit" class="btn btn-primary btn-user btn-block"
                    style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>