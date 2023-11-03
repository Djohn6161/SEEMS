<div class="modal fade" id="createQuestionModal" tabindex="-1" aria-labelledby="createQuestion" aria-hidden="true">
    <div class="modal-dialog  ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">New Questions</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- {{dd($type)}} --}}
            <div class="modal-body">
                <form id="createQuestion" method="POST" action="{{ route('admin.exams.question.create', ['examination' => $examination->id]) }}">
                    @csrf
                    <div class="row  mb-3">
                        <label for="type_id" class="text-dark col-sm-5">Question Type: </label>
                        <div class="col-sm-7">
                            <select class="selectpicker form-control" name="type_id" id="type_id"
                                data-live-search="true" required>
                                <option value="" class="text-dark font-weight-bold" >Select Type</option>
                                @foreach ($type as $type)
                                    <option value="{{ $type->id }}"
                                        @if (old('type_id') == $type->id) class="text-light font-weight-bold bg-primary" selected @endif>{{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if(!empty($errors->create->first('type_id')))
                                <span class="text-danger alert p-0 " role="alert">{{ $errors->create->first('type_id') }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- @for ($i = 1; $i <= 10; $i++)
                    <div class="form-group mb-4">
                        <label for="Question[]" class="text-dark">Question {{$i}} <b class="text-dark">(Optional)</b></label>
                        @if(!empty($errors->create->first('Question')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('Question') }}</span>
                        @endif
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            name="Question[]"
                            placeholder="Your Question??" value="{{ old('Question') }}" >
                    </div>
                    @endfor --}}
                    <div class="form-group mb-3">
                        <label for="numberOfQuestion" class="text-dark">Number Of Question </label>
                        @if(!empty($errors->create->first('numberOfQuestion')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('numberOfQuestion') }}</span>
                        @endif
                        <input type="number" class="form-control text-dark" style="font-size: 14px"
                            name="numberOfQuestion"
                            placeholder="How Many?" value="{{ old('numberOfQuestion') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="numberOfChoices" class="text-dark">Number Of Choices Per Question  <b class="text-dark">(Optional)</b></label>
                        @if(!empty($errors->create->first('numberOfChoices')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('numberOfChoices') }}</span>
                        @endif
                        <input type="number" class="form-control text-dark" style="font-size: 14px"
                            name="numberOfChoices"
                            placeholder="How Many?" value="{{ old('numberOfChoices') }}" >
                    </div>
                    
                    
                    

                </form>
            </div>
            <div class="modal-footer">
                <button form="createQuestion" type="submit" class="btn btn-primary btn-user btn-block"
                    style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>