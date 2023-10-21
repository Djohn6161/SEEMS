@extends('layouts.admin')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-uppercase">{{$examination_now->name}}</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add Question</a>
</div>
<div class="container-fluid">
    @foreach ($questions as $question)
    <div class="card mb-3">
        <div class="card-header">{{$question->Question}}</div>
        <div class="card-body">
            <div class="row">
                @foreach ($choices->where('questions_id', $question->id) as $item)
                    <div class="col-md-6 d-flex align-items-center ">
                        <input class="mr-2" type="radio" name="choice[{{$question->id}}]" value="{{$item->id}}">
                        <label class="mb-0" for="choice1"> {{$item->letter}}) {{$item->description}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Choices</a>
        </div>
      </div>
    @endforeach
</div>





<!-- Content Row -->

@endsection