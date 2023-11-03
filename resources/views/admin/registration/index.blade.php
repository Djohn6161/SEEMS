@extends('layouts.admin')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Registration</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
    data-target="#createModal"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add Registration</a>
</div>
<x-registration.create></x-registration.create>


<div class="container-fluid">
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
                <button type="button" id="filterButton" class="btn mx-2 btn-primary"
                    data-toggle="modal" data-target="#filterThesisModal">
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
                            <th class="text-center">Email</th>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Middle Name</th>
                            <th class="text-center">Last Name</th>
                            <th class="text-center">Extension</th>
                            <th class="text-center">Date Of Birth</th>
                            <th class="text-center">Mobile Number</th>
                            <th class="text-center">Password</th>
                            
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
                        @foreach ($registrations as $registration)
                            <tr class="border border-primary" data-id="{{ $registration->id }}">
                                <td class='text-center'>
                                    <div class="custom-control custom-control-lg custom-checkbox">


                                        <input type="checkbox" class="custom-control-input"
                                            id="thesis[{{ $registration->id }}]" name="thesis[]"
                                            value="{{ $registration->id }}">
                                        <label class="custom-control-label" for="thesis[{{ $registration->id }}]">
                                            {{ $registration->id }}</label>
                                    </div>

                                </td>
                                <td> {{ $registration->email }}  </td>
                                <td> {{ $registration->first_name }}</td>
                                <td >{{ $registration->middle_name }}</td>
                                <td>{{ $registration->last_name }}</td>
                                <td>{{ $registration->extension }}</td>
                                <td>{{ $registration->date_of_birth }}</td>
                                <td>{{ $registration->mobile_number }}</td>
                                <td>{{ $registration->password }}</td>
                                <td width="15%" class='py-1'>
                                    <div class="d-flex justify-content-lg-center">
                                        <button type="button" class="btn btn-warning mx-2" data-toggle="modal"
                                            data-target="#editModal{{ $registration->id }}">
                                            <i class="fas fa-pen"></i>
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger mx-2" data-toggle="modal"
                                            data-target="#deleteModal{{ $registration->id }}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>

                                    </div>

                                </td>
                                <x-registration.modal :registration=$registration  />
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
<script>
    $(document).ready(function() {
            const collegeCheckboxes = document.querySelectorAll('input[name="thesis[]"]');

            collegeCheckboxes.forEach(function(collegeCheckbox) {
                collegeCheckbox.addEventListener("click", function() {
                    const collegeId = this.value;
                    const programCheckboxes = document.querySelectorAll(
                        'input[name="thesis[]"][data-college="' + collegeId + '"]');

                    programCheckboxes.forEach(function(programCheckbox) {
                        programCheckbox.checked = collegeCheckbox.checked;
                    });
                });
            });
            $('#dataTable tbody').on('click', 'tr', function() {
                var checkbox = $(this).find('input[type="checkbox"]');
                checkbox.prop('checked', !checkbox.prop('checked'));
                updateRowDataList()

            });
            $('#checkAll').on('click', function() {
                var checkAllState = $(this).prop('checked');
                $('#dataTable tbody').find('input[type="checkbox"]').prop('checked', checkAllState);
                $(this).next('label').text(checkAllState ? 'Uncheck All' : 'Check All');
                updateRowDataList();
            });

            function updateRowDataList() {
                if ($('#dataTable tbody').find('input[type="checkbox"]:checked').length > 0) {
                    $('#deleteButton').show();
                    $('#featuredButton').show();
                } else {
                    $('#deleteButton').hide();
                    $('#featuredButton').hide();
                }

                var rowDataList = $('#rowDataList');
                var featuredDataList = $('#featuredDataList');
                $('#dataTable tbody').find('input[type="checkbox"]:checked').each(function() {
                    var id = $(this).val();
                    var row = $(this).closest('tr');
                    var rowname = row.find('td:eq(2)').text();
                    var rowValue = parseInt(row.find('td:eq(4)').text());
                    var rowacro = row.find('td:eq(3)').text();
                    if (!rowDataList.find('input[value="' + id + '"]').length) {
                        rowDataList.append('<input type="hidden" id="' + id + '" name="ids[]" value="' +
                            id + '">');
                        rowDataList.append("<li class='text-danger font-size-20' id='span" + id + "'>" +
                            rowname + "</li>");
                    }
                    if (!featuredDataList.find('input[value="' + id + '"]').length) {
                        featuredDataList.append('<input type="hidden" id="' + id +
                            '" name="ids[]" value="' +
                            id + '">');
                        featuredDataList.append("<li class='text-primary font-size-20' id='span" + id +
                            "'>" +
                            rowname + "</li>");
                    }
                });
                rowDataList = $('#rowDataList');
                rowDataList.find('input[type="hidden"]').each(function() {
                    var id = $(this).val();
                    if ($('#dataTable tbody').find('input[value="' + id + '"]').length && !$(
                            '#dataTable tbody').find('input[value="' + id + '"]:checked').length) {
                        $('#' + id).remove();

                        $('#span' + id).remove();
                    }
                });
                featuredDataList = $('#featuredDataList');
                featuredDataList.find('input[type="hidden"]').each(function() {
                    var id = $(this).val();
                    if ($('#dataTable tbody').find('input[value="' + id + '"]').length && !$(
                            '#dataTable tbody').find('input[value="' + id + '"]:checked').length) {
                        $('#' + id).remove();

                        $('#span' + id).remove();
                    }
                });
            }
        });
</script>


<!-- Content Row -->

@endsection