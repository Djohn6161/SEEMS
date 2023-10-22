@extends('layouts.admin')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Examinations</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add Examination</a>
</div>

<div class="container-fluid">
    <div class="row">
        {{-- {{dd($Qtype)}} --}}
        @foreach ($exams as $exam)
            <x-exam.card :exam=$exam :type=$Qtype></x-exam.card>
        @endforeach
    </div>
    
</div>
   


<!-- Content Row -->

@endsection