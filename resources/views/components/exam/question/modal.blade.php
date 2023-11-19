<div class="modal fade" id="updateQuestionModal{{ $data->id }}" tabindex="-1" aria-labelledby="EditModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">Edit This question</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @php
                    $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                @endphp
                <form id="updateData{{ $data->id }}" method="POST"
                    action="{{ route('admin.question.update', ['question' => $data->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        @if ($data->type_id != 3)
                            <div class="form-group mb-4 col-md-9">
                                <label for="Question[]" class="text-dark">Question <b
                                        class="text-dark">(Optional)</b></label>
                                @if (!empty($errors->create->first('Question')))
                                    <span class="text-danger alert "
                                        role="alert">{{ $errors->create->first('Question') }}</span>
                                @endif
                                <input type="text" class="form-control text-dark" style="font-size: 14px"
                                    name="Question[]" placeholder="Your Question??" value="{{ $data->Question }}">
                            </div>
                            <div class="form-group mb-4 col-md-3">
                                <label for="answer[]" class="text-dark">Answer</label>
                                @if (!empty($errors->create->first('answer')))
                                    <span class="text-danger alert "
                                        role="alert">{{ $errors->create->first('answer') }}</span>
                                @endif
                                {{-- {{dd($subData->where('questions_id', $data->id))}} --}}
                                <select class="selectpicker form-control" name="answer[]" id="answer[]"
                                    data-live-search="true" required>
                                    <option value="" class="text-dark font-weight-bold">Select Answer</option>
                                    @foreach ($subData->where('questions_id', $data->id) as $choices)
                                        <option value="{{ $choices->id }}"
                                            @if ($data->answer == $choices->letter) class="text-light font-weight-bold bg-primary" selected @endif>
                                            {{ $choices->letter }}
                                        </option>
                                    @endforeach
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
                    @unless (count($subData->where('questions_id', $data->id)) == 0 || count($subData->where('questions_id', $data->id)) == null)
                        <div class="card-body">
                            <div class="row">



                                @foreach ($subData->where('questions_id', $data->id) as $choices)
                                    <div class="col-md-6 mb-2">
                                        <div class="row">
                                            <div class="col-md-3"><input type=""
                                                    class="form-control text-capitalize text-center"
                                                    name="letter[{{ $data->id }}][{{ $choices->id }}]" id="Username"
                                                    aria-describedby="emailHelp" placeholder="Choice Text" readonly
                                                    value="{{ $choices->letter }}" required></div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-capitalize "
                                                    name="description[{{ $data->id }}][{{ $choices->id }}]"
                                                    id="Username" aria-describedby="emailHelp" placeholder="Choice Text"
                                                    value="{{ $choices->description }}" required>
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
                                @endforeach
                            </div>

                        </div>
                    @else
                        <div></div>
                    @endunless
                </form>
            </div>
            <div class="modal-footer">
                <button form="updateData{{ $data->id }}" type="submit" class="btn btn-primary btn-user btn-block"
                    style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="deleteQuestionModal{{ $data->id }}" aria-labelledby="deleteProduct" tabindex="-1"
    role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure you want to delete this Question:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class='text-danger font-size-20'>{{ $data->Question }}</span>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.question.destroy', ['question' => $data->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="id[{{ $data->id }}]" value="{{ $data->id }}">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mr-3" data-dismiss="modal">Close</button>
                        <button type="submit" class=" btn btn-danger">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
