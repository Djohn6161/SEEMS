@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Courses</h1>
        <a href="#" data-toggle="modal" data-target="#createModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Courses</a>
    </div>
    <x-course.create ></x-course.create>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">DATABASE</h6>
                {{-- <div class="d-flex justify-content-lg-center">
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
                    <button type="button" id="filterButton" class="btn mx-2 btn-primary"
                        data-toggle="modal" data-target="#filterThesisModal">
                        <i class="fas fa-filter"></i>
                        Filter
                    </button>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    {{-- <div class="custom-control custom-control-lg custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkAll">
                                        <label class="custom-control-label" for="checkAll">Check All ID</label>
                                    </div> --}}
                                    ID
                                </th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Acrocode</th>
                                {{-- <th class="text-center">Score</th> --}}
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
                            @foreach ($courses as $item)
                            {{-- {{dd($score->examination);}} --}}
                                <tr class="border border-primary" data-id="{{ $item->id }}">
                                    <td class='text-center'>
                                        {{-- <div class="custom-control custom-control-lg custom-checkbox">
    
    
                                            <input type="checkbox" class="custom-control-input"
                                                id="thesis[{{ $score->id }}]" name="thesis[]"
                                                value="{{ $score->id }}">
                                            <label class="custom-control-label" for="thesis[{{ $score->id }}]">
                                                </label>
                                                
                                        </div> --}}
                                        {{ $item->id }}
                                    </td>
                                    <td> {{ $item->name }}  </td>
                                    <td> {{ $item->acrocode }}</td>
                                    {{-- <td class="text-center">{{ $item->Score }}</td> --}}
                                    <td width="25%" class='py-1 text-center'>
                                        <div class="d-flex justify-content-lg-center">
                                            <button type="button" class="btn btn-warning mx-2" data-toggle="modal"
                                                data-target="#editModal{{ $item->id }}">
                                                <i class="fas fa-pen"></i>
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger mx-2" data-toggle="modal"
                                                data-target="#deleteModal{{ $item->id }}">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
    
                                        </div>
                                    </td>
                                    <x-course.modal :course=$item></x-course.modal>
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
@endsection