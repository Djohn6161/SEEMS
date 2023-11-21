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
                                <th class="text-center">Start of Examination</th>
                                <th class="text-center">End of Examination</th>
                                <th class="text-center">Total Items</th>
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
                            <tr>
                                <td>This is the Name</td>
                                <td>This is the start</td>
                                <td>This is the end</td>
                                <td>This is the total</td>
                                <td class="text-center">
                                    <a href="{{route('examinee.examination.attempt', ['examination' => 1])}}" class="btn btn-success">Active</a>
                                    {{-- @if ($account->active == 1)
                                    <a href="{{route('admin.accounts.active', ['user' => $account->id])}}" class="btn btn-success">Active</a>
                                    @else
                                    <a href="{{route('admin.accounts.active', ['user' => $account->id])}}" class="btn btn-secondary">Inactive</a>
                                    @endif --}}
                                </td>
                            </tr>

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
