@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-capitalize">{{ $score->examination->name }} - {{ $score->user->name }}</h1>
        {{-- {{dd($type)}} --}}
        <x-exam.question.details :type=$type :examination="$score->examination"></x-exam.question.details>
    </div>
    <div class="container-fluid">
        <form id="updateScore" method="POST" action="{{ route('admin.scores.update', ['score' => $score->id]) }}">
            @csrf
            @method('PUT')
            @foreach ($type as $question_type)
                <h4 class="text-uppercase font-weight-bold text-primary">{{ $question_type->name }}</h4>
                @unless (count($questions->where('type_id', $question_type->id)) == 0)
                    @foreach ($questions->where('type_id', $question_type->id) as $question)
                        <div class="card mb-3">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-md-9 d-flex align-items-center">
                                        <span class="h6">{{ $question->Question }}</span>
                                    </div>
                                    <div class="col-md-3 form-group d-flex align-items-center justify-content-center">
                                        <label for="score['{{ $question->id }}']" class="mb-0 mr-2">Score: </label>
                                        <div style="width:70px" class="">
                                            <input type="number"
                                                value="{{ $score->Results->where('questions_id', $question->id)->first()->score ?? '0' }}"
                                                class="form-control text-dark"
                                                name="results[{{ $score->Results->where('questions_id', $question->id)->first()->id ?? '0' }}]"
                                                id="score[{{ $question->id }}]" max="100" min="0">
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-3 d-flex justify-content-center">
                                    <button data-toggle="modal" data-target="#updateQuestionModal{{$question->id}}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm mx-3"><i
                                        class="fas fa-pen fa-sm "></i> Edit</button>
                                        <button data-toggle="modal" data-target="#deleteQuestionModal{{$question->id}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mx-3" ><i
                                            class="fas fa-trash fa-sm "></i> Delete</button>
                                </div> --}}
                                    {{-- <x-exam.question.modal :data=$question :subData=$choices ></x-exam.question.modal> --}}
                                </div>



                            </div>
                            <div class="card-body p-5">
                                <div class="row">
                                    @foreach ($choices->where('questions_id', $question->id) as $item)
                                        {{-- {{dd($score->Results->where('questions_id', $item->id)->first()->answer)}} --}}
                                        @php
                                            $ans = $score->Results->where('questions_id', $question->id)->first()->answer ?? '';
                                        @endphp
                                        <div class="col-md-6 d-flex align-items-center custom-control custom-radio">
                                            {{-- @if ($ans == $item->letter) --}}

                                            {{-- @endif --}}

                                            <input class="mr-2 custom-control-input" type="radio"
                                                name="choice[{{ $question->id }}]" id="choice[{{ $item->id }}]"
                                                value="{{ $item->id }}" {{ $ans == $item->letter ? 'checked' : '' }}
                                                disabled>
                                            <label class="mb-0 custom-control-label" for="choice[{{ $item->id }}]">
                                                {{ $item->letter }})
                                                {{ $item->description }}
                                                {{-- {{dd()}} --}}
                                                @if ($question->answer == $item->letter)
                                                    <b class="font-weight-bold text-dark">(Correct)</b>
                                                @endif

                                            </label>
                                        </div>
                                    @endforeach
                                    @if ($question_type->id == 3)
                                        @php
                                            $ans = $score->Results->where('questions_id', $question->id)->first()->answer ?? '';
                                        @endphp
                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" id="answer" name="choice[{{ $question->id }}]" rows="3" disabled>{{ $ans }}</textarea>
                                        </div>
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
                    <div class=" alert alert-secondary text-center font-size-20 pt-3 text-uppercase">No Record of questions for
                        this
                        type</div>
                @endunless
            @endforeach
            <div class="d-flex align-items-center justify-content-center mt-3">
                <button class="btn btn-primary w-100" type=submit form="updateScore">Update</button>
            </div>
        </form>
    </div>





    <!-- Content Row -->
@endsection
