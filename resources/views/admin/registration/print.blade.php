@extends('layouts.report')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 p-5">
    <h1 class="h3 mb-0 text-gray-800">Registration - Accounts</h1>
    <button onclick="download(this)"
                    id="downbtn"class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm p-2"><i
                        class="fas fa-download fa-sm"></i> Download Report</button>
</div>


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">DATABASE</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            {{-- <th class="text-center">
                                <div class="custom-control custom-control-lg custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkAll">
                                    <label class="custom-control-label" for="checkAll">Check All ID</label>
                                </div>
                            </th> --}}
                            <th class="text-center">Email</th>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Middle Name</th>
                            <th class="text-center">Last Name</th>
                            <th class="text-center">Extension</th>
                            <th class="text-center">Password</th>
                        </tr>
                    </thead>
                    <tfoot>
                    </tfoot>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr class="border border-primary" data-id="{{ $registration->id }}">
                                {{-- <td class='text-center'>
                                    <div class="custom-control custom-control-lg custom-checkbox">


                                        <input type="checkbox" class="custom-control-input"
                                            id="thesis[{{ $registration->id }}]" name="thesis[]"
                                            value="{{ $registration->id }}">
                                        <label class="custom-control-label" for="thesis[{{ $registration->id }}]">
                                            {{ $registration->id }}</label>
                                    </div>

                                </td> --}}
                                <td> {{ $registration->email }}  </td>
                                <td> {{ $registration->first_name }}</td>
                                <td >{{ $registration->middle_name }}</td>
                                <td>{{ $registration->last_name }}</td>
                                <td>{{ $registration->extension }}</td>
                                <td width="30%" class="text-center text-black font-weight-bold">{{ $registration->password }}</td>
                                <x-registration.modal :registration=$registration :courses=$courses  />
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
    function download() {
            $('#downbtn').addClass('d-none');
            $('#downbtn').removeClass('d-sm-inline-block');
            // console.log('hello');
            window.print();

        }
    $(document).ready(function() {
        window.addEventListener("afterprint", (event) => {
                $('#downbtn').removeClass('d-none');
                $('#downbtn').addClass('d-sm-inline-block');
            });
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