@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create {{ $questionType->name }} Questions </h1>
        {{-- <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
    data-target="#createModal"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add Examination</button>
            <x-exam.create></x-exam.create> --}}
    </div>
    @php
        $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    @endphp
    <div class="container">
        {{-- {{dd($Qtype)}} --}}
        {{-- @foreach ($exams as $exam)
            <x-exam.card :exam=$exam :type=$Qtype></x-exam.card>
        @endforeach --}}
        <form id="createQuestion" method="POST"
            action="{{ route('admin.exams.question.store', ['examination' => $examination->id]) }}">
            @csrf
            <input type="hidden" name="type_id" value="{{ $questionType->id }}">
            @for ($i = 0; $i < $numQuestion; $i++)
                <div class="card mb-3">
                    <div class="card-header ">
                        <div class="row">
                            @if ($questionType->id != 3)
                                <div class="form-group mb-4 col-md-9">
                                    <label for="Question[]" class="text-dark">Question {{ $i + 1 }} <b
                                            class="text-dark">(Optional)</b></label>
                                    @if (!empty($errors->create->first('Question')))
                                        <span class="text-danger alert "
                                            role="alert">{{ $errors->create->first('Question') }}</span>
                                    @endif
                                    <input type="text" class="form-control text-dark" style="font-size: 14px"
                                        name="Question[]" placeholder="Your Question??" value="{{ old('Question') }}">
                                </div>
                                <div class="form-group mb-4 col-md-3">
                                    <label for="answer[]" class="text-dark">Answer</label>
                                    @if (!empty($errors->create->first('answer')))
                                        <span class="text-danger alert "
                                            role="alert">{{ $errors->create->first('answer') }}</span>
                                    @endif
                                    <select class="selectpicker form-control" name="answer[]" id="answer[]"
                                        data-live-search="true" required>
                                        <option value="" class="text-dark font-weight-bold">Select Answer</option>
                                        @for ($x = 0; $x < $numChoice; $x++)
                                            <option value="{{ $letters[$x] }}"
                                                @if (old('answer') == $letters[$x]) class="text-light font-weight-bold bg-primary" selected @endif>
                                                {{ $letters[$x] }}
                                            </option>
                                        @endfor
                                    </select>
                                    @if (!empty($errors->create->first('answer')))
                                        <span class="text-danger alert p-0 "
                                            role="alert">{{ $errors->create->first('answer') }}</span>
                                    @endif
                                </div>
                            @else
                                <div class="form-group mb-4 col-md-12">
                                    <label for="Question[]" class="text-dark">Question {{ $i + 1 }} <b
                                            class="text-dark">(Optional)</b></label>
                                    @if (!empty($errors->create->first('Question')))
                                        <span class="text-danger alert "
                                            role="alert">{{ $errors->create->first('Question') }}</span>
                                    @endif
                                    <input type="text" class="form-control text-dark" style="font-size: 14px"
                                        name="Question[]" placeholder="Your Question??" value="{{ old('Question') }}">
                                </div>
                            @endif

                        </div>
                    </div>
                    {{-- {{dd($numChoice)}} --}}
                    @unless ($numChoice == 0 || $numChoice == null)
                        <div class="card-body">
                            <div class="row">



                                @for ($x = 0; $x < $numChoice; $x++)
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3"><input type=""
                                                    class="form-control text-capitalize text-center"
                                                    name="letter[{{ $i }}][{{ $x }}]" id="Username"
                                                    aria-describedby="emailHelp" placeholder="Choice Text" readonly
                                                    value="{{ $letters[$x] }}" required></div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-capitalize "
                                                    name="description[{{ $i }}][{{ $x }}]"
                                                    id="Username" aria-describedby="emailHelp" placeholder="Choice Text"
                                                    value="{{ old('description') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3"><input type=""
                                            class="form-control text-capitalize text-center"
                                            name="choiceLetter[{{ $i }}][{{ $x }}]" id="Username"
                                            aria-describedby="emailHelp" placeholder="Choice Text" readonly
                                            value="{{ $letters[$x] }}" required></div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control text-capitalize "
                                            name="choiceText[{{ $i }}][{{ $x }}]" id="Username"
                                            aria-describedby="emailHelp" placeholder="Choice Text"
                                            value="{{ old('choiceText') }}" required>
                                    </div>
                                </div>
                            </div> --}}
                                @endfor
                            </div>

                        </div>
                    @else
                        <div></div>
                    @endunless

                </div>
            @endfor
            <button form="createQuestion" type="submit" class="btn btn-primary btn-user btn-block" style="font-size: 14px">
                Submit
            </button>
        </form>
    </div>



    <!-- Content Row -->

@endsection
