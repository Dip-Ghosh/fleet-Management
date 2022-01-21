<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shuttle Partner</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card"  style=" border:2px solid #e8e3e875; border-radius:25px; box-shadow:3px 11px 8px  #00000033; ">
        <div class="login-logo" style="margin-top: 15px;align-content: center">
            <img src="{{asset('img/shuttle-logo.png')}}" alt="image-responsive" width="150px" >
        </div>
        <div class="card-body login-card-body" style="border-radius: 25px;  box-shadow:3px 11px 8px  #00000033;">

            @if ($errors->any())
                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" style="background-color:#fff3cd">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>
                    </div>
                @endif
            @endif

            <form action="{{url('dashboard')}}" method="POST">
                @csrf
                <div class="input-group mb-4" >
                    <input type="text" name="email" class="form-control" placeholder="Email Or Mobile"  style="border-radius:25px;box-shadow:3px 11px 8px  #00000033;" >

                </div>
                <div class="input-group mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password"  style="border-radius:25px;box-shadow:3px 11px 8px  #00000033;">
                </div>
                <div class="input-group mb-4">
                    <div class="input-group ">
                        <button type="submit" class="btn btn-primary btn-block"  style="border-radius:25px; box-shadow:0px 8px 5px  #00000033;">Sign In</button>
                    </div>

                </div>
            </form>

        </div>

    </div>
</div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
