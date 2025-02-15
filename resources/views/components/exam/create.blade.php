<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createExamination" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">New Examination</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createExamination" method="POST" action="{{ route('admin.exam.store') }}">
                    @csrf
                    
                    <div class="form-group mb-4">
                        <label for="name" class="text-dark">Name</label>
                        @if(!empty($errors->create->first('name')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('name') }}</span>
                        @endif
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            name="name"
                            placeholder="Examination1" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="numberOfAttempts" class="text-dark">Number Of Attempts</label>
                        @if(!empty($errors->create->first('numberOfAttempts')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('numberOfAttempts') }}</span>
                        @endif
                        <input type="number" class="form-control text-dark" style="font-size: 14px"
                            name="numberOfAttempts" min="1"
                            placeholder="" value="{{ old('numberOfAttempts') }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="duration" class="text-dark ">Time Duration</label>
                        @if(!empty($errors->create->first('duration')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('duration') }}</span>
                        @endif
                        <input type="text" class="form-control text-dark without_ampm" style="font-size: 14px"
                            name="duration"
                            placeholder="HH:MM:SS" value="{{ old('duration') ?? '01:00:00' }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="start_dateTime" class="text-dark">Start Date and Time</label>
                        @if(!empty($errors->create->first('start_dateTime')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('start_dateTime') }}</span>
                        @endif
                        <input type="datetime-local" name="start_dateTime" class="form-control" style="font-size: 14px"
                            placeholder="" value="{{ old('start_dateTime') }}"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="end_dateTime" class="text-dark">End Date and Time</label>
                        @if(!empty($errors->create->first('end_dateTime')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('end_dateTime') }}</span>
                        @endif
                        <input type="datetime-local" name="end_dateTime" class="form-control" style="font-size: 14px"
                            placeholder="" value="{{ old('end_dateTime') }}"
                            required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button form="createExamination" type="submit" class="btn btn-primary btn-user btn-block"
                    style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>