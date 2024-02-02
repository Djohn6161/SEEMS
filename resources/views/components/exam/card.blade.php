<div class="col-md-6 mb-4">
    <div class="card p-1">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <h4 class="card-title mb-0 text-uppercase">{{ $exam->name }}</h4>
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-end">
                    <a href="{{ route('admin.exam.show', ['examination' => $exam->id]) }}" class="btn btn-primary ">
                        View
                    </a>
                </div>
            </div>

            {{-- {{dd($type)}} --}}
        </div>
        <div class="card-body">
            <h4 class="card-title text-center">Informations</h4>
            <div class="row ">
                <div class="col-sm-6">
                    <p class="card-text">Number of Attempts: </p>
                </div>
                <div class="col-sm-6">{{ $exam->numberOfAttempts }}</div>
            </div>
            <div class="row ">
                <div class="col-sm-6">
                    <p class="card-text">Time Duration: </p>
                </div>
                <div class="col-sm-6">{{ $exam->duration }}</div>
            </div>
            @foreach ($type as $item)
                <div class="row ">
                    <div class="col-sm-6">
                        <p class="card-text">Number of {{ $item->name }}: </p>
                    </div>
                    <div class="col-sm-6">{{ $exam->countQuestionBytype($item->id) }}</div>
                </div>
            @endforeach
            <div class="row my-3 text-center border-left-primary text-dark">
                <div class="col-sm-6 font-weight-bold">Start Date and Time</div>
                <div class="col-sm-6">{{ $exam->start_dateTime }}</div>
            </div>
            <div class="row my-3 text-center border-left-primary text-dark">
                <div class="col-sm-6 font-weight-bold">End Date and Time</div>
                <div class="col-sm-6">{{ $exam->end_dateTime }}</div>
            </div>

        </div>
        <div class="card-footer d-flex justify-content-end align-items-center">
            {{-- @if ($exam->Announce == 0)
            <a href="{{route('admin.exam.announce', ['examination' => $exam->id])}}" class="btn btn-secondary mx-1">
                <i class="fas fa-times fa-sm "></i> Stop Score Announcement
            </a>
            @else
            <a href="{{route('admin.exam.announce', ['examination' => $exam->id])}}" class="btn btn-success mx-1">
                <i class="fas fa-bullhorn fa-sm "></i> Score Announcement
            </a>
            @endif --}}
            <button data-toggle="modal" data-target="#updateModal{{ $exam->id }}" class="btn btn-warning mx-1">
                <i class="fas fa-pen fa-sm "></i> Edit
            </button>
            <button data-toggle="modal" data-target="#deleteModal{{ $exam->id }}" class="btn btn-danger mx-1">
                <i class="fas fa-trash fa-sm "></i> Delete
            </button>
            <x-exam.modal :data=$exam></x-exam.modal>
        </div>
    </div>
</div>
