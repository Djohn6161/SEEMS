@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm " data-toggle="modal" data-target="#createModal"><i
             class="fas fa-plus fa-sm text-white-50"></i> Add User Admin</a>
    </div>
    <x-user.create :></x-user.create>
    <div class="container-fluid">
        {{-- {{dd($Qtype)}} --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">DATABASE</h6>
                <div class="d-flex justify-content-lg-center">
                    <button type="button" id="featuredButton" style="display: none" class="btn mx-2 btn-success "
                        data-toggle="modal" data-target="#featuredModal">
                        <i class="fas fa-star"></i>
                        Select Featured
                    </button>
                    <button type="button" id="deleteButton" style="display: none" class="btn mx-2 btn-danger"
                        data-toggle="modal" data-target="#deleteThesisModal">
                        <i class="fas fa-trash"></i>
                        Delete Selected
                    </button>
                    <button type="button" id="filterButton" class="btn mx-2 btn-primary" data-toggle="modal"
                        data-target="#filterThesisModal">
                        <i class="fas fa-filter"></i>
                        Filter
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <div class="custom-control custom-control-lg custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkAll">
                                        <label class="custom-control-label" for="checkAll">Check All ID</label>
                                    </div>
                                </th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Account type</th>
                                <th class="text-center">Date Registered</th>
                                <th class="text-center">State</th>
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
                            @foreach ($accounts as $account)
                                <tr class="border border-primary" data-id="{{ $account->id }}">
                                    <td class='text-center'>
                                        <div class="custom-control custom-control-lg custom-checkbox">


                                            <input type="checkbox" class="custom-control-input"
                                                id="thesis[{{ $account->id }}]" name="thesis[]"
                                                value="{{ $account->id }}">
                                            <label class="custom-control-label" for="thesis[{{ $account->id }}]">
                                            {{ $account->id }}</label>
                                        </div>

                                    </td>
                                    <td> {{ $account->name }} </td>
                                    <td> {{ $account->email }}</td>
                                    <td>{{ $account->role == 1 ? 'Admin' : 'Examinee' }}</td>
                                    <td class="text-center">{{ $account->role == 2 ? $account->created_at : 'null'}}</td>
                                    <td class="text-center" width="35%">
                                        <div class="d-flex align-items-center row p-2">
                                            @if ($account->active == 1)
                                            <a href="{{route('admin.accounts.active', ['user' => $account->id])}}" class="col btn btn-success">Active</a>
                                            @else
                                            <a href="{{route('admin.accounts.active', ['user' => $account->id])}}" class="col btn btn-secondary">Inactive</a>
                                            @endif
                                            <button type="button" class="col btn btn-warning mx-2" data-toggle="modal"
                                                data-target="#editModal{{ $account->id }}">
                                                <i class="fas fa-pen"></i>
                                                Edit
                                            </button>
                                            <button type="button" class="col btn btn-danger mx-2" data-toggle="modal"
                                                data-target="#deleteModal{{ $account->id }}">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                            
                                        </div>
                                        
                                    </td>
                                    {{-- <x-user.modal :account=$account /> --}}

                                    {{-- <td style="max-width: 15%"><span class="limit-line">{{ $thesis->authors }}</span>
                                </td>
                                @if ($thesis->file !== null)
                                    <td class="text-center text-capitalize">
                                        <div class="rounded bg-success text-light p-1 d-sm-inline-block w-100">
                                            <i class="fas fa-file"></i>
                                        </div>

                                    </td>
                                @else
                                    <td class="text-center text-capitalize">
                                        <div class="rounded bg-secondary text-light p-1 d-sm-inline-block w-100">
                                            <i class="fas fa-times-circle"></i>
                                        </div>

                                    </td>
                                @endif
                                @if ($userPrivilege->update == 'permitted')
                            
                                <td
                                    class="text-center text-capitalize {{ $thesis->featured == 1 ? 'text-success' : 'text-danger' }}">
                                    @if ($thesis->featured == 1)
                                        <a href="{{ route('admin.thesis.featured', ['thesis' => $thesis->id]) }}"
                                            class="rounded bg-success text-light p-1 d-sm-inline-block w-100">
                                            <i class="fas fa-star"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.thesis.featured', ['thesis' => $thesis->id]) }}"
                                            class="rounded bg-secondary text-light p-1 d-sm-inline-block w-100">
                                            <i class="far fa-star"></i>
                                        </a>
                                    @endif
                                </td>
                                @endif
                                @if ($userPrivilege->destroy == 'permitted')
                                <td width="10%" class='py-1'>
                                    <div class="d-flex justify-content-lg-center">
                                        <button type="button" class="btn btn-danger mx-2" data-toggle="modal"
                                            data-target="#deleteModal{{ $thesis->id }}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>

                                    </div>

                                </td> --}}
                                    {{-- <x-thesis.modal :thesis="$thesis" :userPrivilege=$userPrivilege /> --}}

                                    {{-- @endif --}}

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
