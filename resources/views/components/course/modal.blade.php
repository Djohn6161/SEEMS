<div class="modal fade" id="editModal{{ $course->id }}" tabindex="-1" aria-labelledby="createProgram"
    aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">Edit {{ $course->name }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateCourse{{ $course->id }}" method="POST"
                    action="{{ route('admin.course.update', ['course' => $course->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="name[{{ $course->id }}]" class="text-dark">Name</label>
                        @error('name')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="name[{{ $course->id }}]" name="name" placeholder=""
                            value="{{ $course->name }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="acrocode[{{ $course->id }}]" class="text-dark">acrocode</label>
                        @error('acrocode')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="acrocode[{{ $course->id }}]" name="acrocode" placeholder=""
                            value="{{ $course->acrocode }}" required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button form="updateCourse{{ $course->id }}" type="submit"
                    class="btn btn-primary btn-user btn-block" style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal{{ $course->id }}" aria-labelledby="deleteProduct" tabindex="-1"
    role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure you want to delete this Course:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class='text-danger font-size-20'>{{ $course->name }}</span>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.course.delete', ['course' => $course->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="id[{{$course->id}}]" value="{{ $course->id }}">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mr-3" data-dismiss="modal">Close</button>
                        <button type="submit" class=" btn btn-danger">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>