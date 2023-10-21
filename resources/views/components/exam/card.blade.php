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
            
            
        </div>
        <div class="card-body">
            <h4 class="card-title text-center">Informations</h4>
            <div class="row">
                <div class="col-md-6"><p class="card-text">Number Of Questions: </p></div>
                <div class="col-md-6">{{count($exam->Question)}}</div>
            </div>
            
        </div>
        <div class="card-footer d-flex justify-content-end align-items-center">
            <a href="#" class="btn btn-warning mx-1">
                Edit
            </a>
            <a href="#" class="btn btn-danger mx-1">
                Delete
            </a>
        </div>
    </div>
</div>
