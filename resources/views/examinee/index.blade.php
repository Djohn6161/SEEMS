@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Examinations</h1>
    </div>

    <div class="container-fluid">
        {{-- {{dd($Qtype)}} --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">DATABASE</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Time Duration</th>
                                <th class="text-center">Remaining attempt</th>
                                <th class="text-center">Start of Examination</th>
                                <th class="text-center">End of Examination</th>
                                <th class="text-center">Total number of question</th>
                                <th class="text-center">Action</th>
                                {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="">
                                    Showing {{ $theses->firstItem() ?? '0' }}
                                    to {{ $theses->lastItem() ?? '0' }}
                                    of {{ $theses->total() }} entries
                                </div>
                                {{ $theses->links() }}
                            </div> --}}

                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                            @foreach ($exams as $item)
                            {{-- {{dd(count($attempts->where('examinations_id', $item->id)->where('users_id', auth()->user()->id)))}} --}}
                            <tr>
                                <td class="text-capitalize">{{$item->name}}</td>
                                <td class="text-center">{{$item->duration}}</td>
                                <td class="text-center">{{ $attempt = $item->numberOfAttempts - count($attempts->where('examinations_id', $item->id)->where('users_id', auth()->user()->id))}}</td>
                                <td>{{$item->start_dateTime}}</td>
                                <td>{{$item->end_dateTime}}</td>
                                <td class="text-center">{{count($item->Question)}}</td>
                                <td class="text-center">
                                    @if ($item->numberOfAttempts - count($attempts->where('examinations_id', $item->id)->where('users_id', auth()->user()->id)) > 0)
                                    <a href="{{route('examinee.examination.attempt', ['examination' => $item->id, 'attempt' => $attempt])}}" class="btn btn-primary">
                                        {{count($attempts->where('examinations_id', $item->id)->where('users_id', auth()->user()->id)) == 0 ? 'Take' : 'Re attempt'}}
                                    </a>
                                    @else
                                    <button class="btn btn-secondary">Not Available</button>
                                    @endif
                                    
                                    {{-- @if ($account->active == 1)
                                    <a href="{{route('admin.accounts.active', ['user' => $account->id])}}" class="btn btn-success">Active</a>
                                    @else
                                    <a href="{{route('admin.accounts.active', ['user' => $account->id])}}" class="btn btn-secondary">Inactive</a>
                                    @endif --}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table> 
                    <div class="d-flex justify-content-center my-3">
                        {{-- {{ $theses->links() }} --}}
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Content Row -->
@endsection