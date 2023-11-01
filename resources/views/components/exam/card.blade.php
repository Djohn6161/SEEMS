<div class="col-md-6 mb-4">
    <div class="card p-1">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <h4 class="card-title mb-0 text-center text-uppercase">{{$exam->name}}</h4>
                </div>
                
                <div class="col-md-6 d-flex align-items-center justify-content-end">
                    <a href="{{route('admin.exam.show', ['examination' => $exam->id])}}" class="btn btn-primary ">
                        View
                    </a>
                </div>
            </div>
            
            {{-- {{dd($type)}} --}}
        </div>
        <div class="card-body">
            <h4 class="card-title text-center">Informations</h4>
            <div class="row  p-3">
                
                @foreach ($type as $item)
                <div class="col-md-6"><p class="card-text">Number Of {{$item->name}}: </p></div>
                <div class="col-md-6">{{$exam->countQuestionBytype($item->id)}}</div>
                @endforeach

            </div>
            <div class="row my-3 text-center border-left-primary p-3 text-dark">
                <div class="col-md-6 font-weight-bold">Start Date and Time</div>
                <div class="col-md-6 font-weight-bold">End Date and Time</div>
                <div class="col-md-6">{{$exam->start_dateTime}}</div>
                <div class="col-md-6">{{$exam->end_dateTime}}</div>
            </div>
            
        </div>
        <div class="card-footer d-flex justify-content-end align-items-center">
            <button data-toggle="modal" data-target="#updateModal{{$exam->id}}" class="btn btn-warning mx-1">
                Edit
            </button>
            <button data-toggle="modal" data-target="#deleteModal{{$exam->id}}" class="btn btn-danger mx-1">
                Delete
            </button>
            <x-exam.modal :data=$exam></x-exam.modal>
        </div>
    </div>
</div>
