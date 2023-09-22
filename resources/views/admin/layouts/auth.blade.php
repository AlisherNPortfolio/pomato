<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ checked_asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ checked_asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ checked_asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                @yield('content')
            </div>
        </div>

    </div>

    @if(Session::has('error'))
    <div class="container-fluid">
        <div class="alert alert-danger main-alert">{{Session::get('error')}}</div>
    </div>
    @endif
{{-- @dd($errors->all()); --}}
    @if ($errors->any())
    <div class="alert-container">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger main-alert" style="position: initial !important;">{{ $error }}</div>
        @endforeach
    </div>
    @endif
    <!-- Bootstrap core JavaScript-->
    <script src="{{ checked_asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ checked_asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ checked_asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ checked_asset('admin/js/sb-admin-2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            setTimeout(() => {
                $('.alert').remove();
            }, 6000);
        });
        function relaodCaptcha() {console.log('rr');
            $('#captcha').val('')
            $.ajax({
                type: 'GET',
                url: '/panel/reload-captcha',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#captcha_img").html(data.captcha);
                }
            });
        }
    </script>
</body>

</html>
