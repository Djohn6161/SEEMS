<div class="modal fade" id="updateModal{{ $data->id }}" tabindex="-1" aria-labelledby="EditModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">Edit {{ $data->name }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateData{{ $data->id }}" method="POST"
                    action="{{ route('admin.exam.update', ['examination' => $data->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="name[{{ $data->id }}]" class="text-dark">Name</label>
                        @error('name')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="name[{{ $data->id }}]" name="name" placeholder=""
                            value="{{ $data->name }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="start_dateTime[{{ $data->id }}]" class="text-dark">Start Date and Time</label>
                        @error('start_dateTime')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="datetime-local" class="form-control text-dark" style="font-size: 14px"
                            id="start_dateTime[{{ $data->id }}]" name="start_dateTime" placeholder=""
                            value="{{ $data->start_dateTime }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="end_dateTime[{{ $data->id }}]" class="text-dark">End Date and Time</label>
                        @error('end_dateTime')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="datetime-local" class="form-control text-dark" style="font-size: 14px"
                            id="end_dateTime[{{ $data->id }}]" name="end_dateTime" placeholder=""
                            value="{{ $data->end_dateTime }}" required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button form="updateData{{ $data->id }}" type="submit"
                    class="btn btn-primary btn-user btn-block" style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal{{ $data->id }}" aria-labelledby="deleteProduct" tabindex="-1"
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
                <span class='text-danger font-size-20'>{{ $data->name }}</span>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.exam.destroy', ['examination' => $data->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="id[{{$data->id}}]" value="{{ $data->id }}">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mr-3" data-dismiss="modal">Close</button>
                        <button type="submit" class=" btn btn-danger">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>