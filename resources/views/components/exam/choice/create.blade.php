<div class="modal fade" id="createChoiceModal" tabindex="-1" aria-labelledby="createChoice" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">New Choice in {{$question->Question}}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- {{dd($type)}} --}}
            <div class="modal-body">
                <form id="createChoice" method="POST" action="{{ route('admin.exams.choice.store', ['question' => $question->id]) }}">
                    @csrf
                    <div class="row">
                        <label for="type_id" class="text-dark col-sm-3">Question Type: </label>
                        <div class="col-sm-9">
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
                    @for ($i = 1; $i <= 10; $i++)
                    <div class="form-group mb-4">
                        <label for="Question[]" class="text-dark">Question {{$i}} <b class="text-dark">(Optional)</b></label>
                        @if(!empty($errors->create->first('Question')))
                            <span class="text-danger alert " role="alert">{{ $errors->create->first('Question') }}</span>
                        @endif
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            name="Question[]"
                            placeholder="Your Question??" value="{{ old('Question') }}" >
                    </div>
                    @endfor
                    
                    
                    

                </form>
            </div>
            <div class="modal-footer">
                <button form="createChoice" type="submit" class="btn btn-primary btn-user btn-block"
                    style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>