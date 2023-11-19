@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-capitalize">{{ $examination_now->name }}</h1>
        <button data-toggle="modal" data-target="#createQuestionModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Questions</button>
                {{-- {{dd($type)}} --}}
        <x-exam.question.details :type=$type :examination="$examination_now" ></x-exam.question.details>
    </div>
    <div class="container-fluid">
        @foreach ($type as $question_type)
            <h4 class="text-uppercase font-weight-bold text-primary">{{ $question_type->name }}</h4>
            @unless (count($questions->where('type_id', $question_type->id)) == 0)
                @foreach ($questions->where('type_id', $question_type->id) as $question)
                    <div class="card mb-3">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-9">
                                    <span class="h6">{{ $question->Question }}</span>
                                </div>
                                <div class="col-md-3 d-flex justify-content-center">
                                    <button data-toggle="modal" data-target="#updateQuestionModal{{$question->id}}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm mx-3"><i
                                        class="fas fa-pen fa-sm "></i> Edit</button>
                                        <button data-toggle="modal" data-target="#deleteQuestionModal{{$question->id}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mx-3" ><i
                                            class="fas fa-trash fa-sm "></i> Delete</button>
                                </div>
                                <x-exam.question.modal :data=$question :subData=$choices ></x-exam.question.modal>
                            </div>
                            
                            
                        
                        </div>
                        <div class="card-body p-5">
                            <div class="row">
                                @foreach ($choices->where('questions_id', $question->id) as $item)
                                    <div class="col-md-6 d-flex align-items-center custom-control custom-radio">
                                        <input class="mr-2 custom-control-input" type="radio" name="choice[{{ $question->id }}]" id="choice[{{ $item->id }}]"
                                            value="{{ $item->id }}"  {{$question->answer == $item->letter ? 'checked' : ''}}>
                                        <label class="mb-0 custom-control-label" for="choice[{{ $item->id }}]"> {{ $item->letter }})
                                            {{ $item->description }} 
                                            {{-- {{dd()}} --}}
                                            @if ($question->answer == $item->letter)
                                            <b class="font-weight-bold text-dark">(Correct)</b>
                                            @endif
                                            
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="card-footer">
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus fa-sm text-white-50"></i> Add Choices</a>
                        </div> --}}
                    </div>
                @endforeach
            @else
                <div class=" alert alert-secondary text-center font-size-20 pt-3 text-uppercase">No Record of questions for this type</div>
            @endunless
        @endforeach

    </div>





    <!-- Content Row -->
@endsection
