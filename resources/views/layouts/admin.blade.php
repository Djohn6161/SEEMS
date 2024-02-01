<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - {{ $active }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    @vite(['resources/js/app.js'])
    @vite(['resources/sass/app.scss'])
    @vite(['resources/css/app.css'])
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    
    <!-- Page level custom scripts -->
    <style>
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
        }
        div.dataTables_wrapper div.dataTables_filter label{
            text-align: right;
            display: flex;
            align-items:center;
            justify-content: end;
        }
        div.dataTables_wrapper div.dataTables_filter label input{
            width: 50%;
        }
        div.dataTables_wrapper div.dataTables_length {
            text-align: left;
        }
        div.dataTables_wrapper div.dataTables_length label{
            text-align: right;
            display: flex;
            align-items:center;
            justify-content: start;
        }
        div.dataTables_wrapper div.dataTables_length label select{
            width: 10%;
        }
    </style>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('partials._sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <x-flash-message></x-flash-message>
                @include('partials._topbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This Website is Created by Tech Titans
                        </span>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        {{-- @method('DELETE') --}}
                        <button type="submit" class="btn btn-danger">
                            Logout
                        </button>
                    </form>
                    {{-- <a class="btn btn-primary" href="{{route('logout')}}">Logout</a> --}}
                </div>
            </div>
        </div>
    </div>
    @if (auth()->user()->role == 1)
    <div class="modal fade" id="changePassModal" tabindex="-1" role="dialog"
    aria-labelledby="ChangePassModalLabel" aria-hidden="true
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">Change Your
                    Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="changePass" method="POST" action="{{ route('admin.changePass') }}" class="inline">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="current_password" class="text-dark">Current Password</label>
                        @error('current_password')
                            <span class="text-danger alert TeditError" role="alert">{{ $message }}</span>
                        @enderror
                        <input type="password" id="current_password" name="current_password"
                            class="form-control" autofocus style="font-size: 14px" value="" required>
                        {{-- <i class="fa-regular fa-eye"></i> --}}
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="form-group mb-4">
                        <label for="password" class="text-dark">New Password</label>
                        @error('password')
                            <span class="text-danger alert TeditError" role="alert">{{ $message }}</span>
                        @enderror
                        <input type="password" id="password" name="password" class="form-control"
                            style="font-size: 14px" autofocus value="" required>

                    </div>
                    <div class="form-group mb-4">
                        <label for="password_confirmation" class="text-dark">Confirm Password</label>
                        @error('password_confirmation')
                            <span class="text-danger alert TeditError" role="alert">{{ $message }}</span>
                        @enderror
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control" autofocus style="font-size: 14px" value="" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>


                {{-- @method('DELETE') --}}
                <button form="changePass" type="submit" class="btn btn-primary">
                    Confirm
                </button>
                {{-- <a class="btn btn-primary" href="{{route('logout')}}">Logout</a> --}}
            </div>
        </div>
    </div>
</div>
    @endif
    
    <!-- Bootstrap core JavaScript-->

    
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(e) {
                // disable the submit button 
                $('button[type="submit"]').attr('disabled', true);
                // submit the form
                return true;
            });
        });
    </script>
</body>

</html>
