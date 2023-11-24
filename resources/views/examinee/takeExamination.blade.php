@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-capitalize">{{ $examination_now->name }}</h1>

    </div>
    <div class="container-fluid">

        @unless (count($questions) == 0)
            <form method="POST" action="{{route('examinee.examination.submit', ['examination' => $examination_now->id, 'attempt' => $attempt])}}" id="attemptExamination">
                @csrf
                @foreach ($type as $question_type)
                    @unless (count($questions->where('type_id', $question_type->id)) == 0)
                        <h4 class="text-uppercase font-weight-bold text-primary">{{ $question_type->name }}</h4>
                        @foreach ($questions->where('type_id', $question_type->id) as $question)
                            <div class="card mb-3">
                                <div class="card-header ">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="hidden" name="question_id[]"
                                                                value="{{ $question->id }}">
                                            <span class="h6">{{ $question->Question }}</span>
                                        </div>
                                        {{-- <div class="col-md-3 d-flex justify-content-center">
                                    <button data-toggle="modal" data-target="#updateQuestionModal{{$question->id}}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm mx-3"><i
                                        class="fas fa-pen fa-sm "></i> Edit</button>
                                        <button data-toggle="modal" data-target="#deleteQuestionModal{{$question->id}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mx-3" ><i
                                            class="fas fa-trash fa-sm "></i> Delete</button>
                                </div> --}}
                                    </div>



                                </div>
                                <div class="card-body p-5">
                                    <div class="row">
                                        
                                        @if ($question->type_id == 3)
                                            <div class="col-md-12 form-group">
                                                <label for="answer">Example textarea</label>
                                                 <textarea class="form-control" id="answer" name="choice[{{ $question->id }}]" rows="3"></textarea>
                                            </div>
                                            @else
                                            @foreach ($choices->where('questions_id', $question->id) as $item)
                                            <div class="col-md-6 d-flex align-items-center custom-control custom-radio">
                                                <input class="mr-2 custom-control-input" type="radio"
                                                    name="choice[{{ $question->id }}]" id="choice[{{ $item->id }}]"
                                                    value="{{ $item->letter }}">
                                                <label class="mb-0 custom-control-label" for="choice[{{ $item->id }}]">
                                                    {{ $item->letter }})
                                                    {{ $item->description }}
                                                    {{-- {{dd()}} --}}
                                                    {{-- @if ($question->answer == $item->letter)
                                            <b class="font-weight-bold text-dark">(Correct)</b>
                                            @endif --}}

                                                </label>
                                            </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="card-footer">
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus fa-sm text-white-50"></i> Add Choices</a>
                        </div> --}}
                            </div>
                        @endforeach
                    @else
                        {{-- <div class=" alert alert-secondary text-center font-size-20 pt-3 text-uppercase">No Record of questions for this type</div> --}}
                    @endunless
                @endforeach
            @else
                <div class=" alert alert-secondary text-center font-size-20 pt-3 text-uppercase">No questions found</div>
            @endunless
            <div class="d-flex align-items-center justify-content-center mt-3">
                <button class="btn btn-primary w-100" type=submit>Submit</button>
            </div>
        </form>


    </div>





    <!-- Content Row -->
@endsection
