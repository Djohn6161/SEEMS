<div class="modal fade" id="editModal{{ $registration->id }}" tabindex="-1" aria-labelledby="createProgram"
    aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content p-3">
            <div class="modal-header mb-3">
                <h1 class="h3 mb-2 text-gray-900 font-weight-bold modal-title">Edit {{ $registration->email }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateProgram{{ $program->id }}" method="POST"
                    action="{{ route('admin.programs.update', ['program' => $program->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="name" class="text-dark">Program Name</label>
                        @error('name')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control text-dark" style="font-size: 14px"
                            id="name[{{ $program->id }}]" name="name" placeholder="Bachelor of Science..."
                            value="{{ $program->name }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="acrocode" class="text-dark">Acronym</label>
                        @error('acrocode')
                            <span class="text-danger alert " role="alert">{{ $message }}</span>
                        @enderror
                        <input type="text" id="acrocode[{{ $program->id }}]" name="acrocode"
                            class="form-control" style="font-size: 14px" placeholder="Examples: BSCS, BSIT, BLIS"
                            value="{{ $program->acrocode }}" required>
                    </div>
                    <div class="row">
                        <label for="college" class="text-dark col-sm-3">College: </label>

                        <div class="col-sm-9">
                            <select class="selectpicker form-control" name="colleges_id"
                                id="college[{{ $program->id }}]" data-live-search="true" required>
                                <option value="" class="font-weight-bold text-dark">Select a College</option>
                                @foreach ($colleges as $college)
                                    <option value="{{ $college->id }}"
                                        @if ($program->colleges_id == $college->id) class="text-light font-weight-bold bg-primary" selected @endif>
                                        {{ $college->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('colleges_id')
                                <span class="text-danger alert p-0 " role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button form="updateProgram{{ $program->id }}" type="submit"
                    class="btn btn-primary btn-user btn-block" style="font-size: 14px">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>