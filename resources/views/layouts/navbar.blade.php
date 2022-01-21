<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <div>
            <a href="{{url('trip-request')}}" type="button" class="btn btn-primary">Trip Request</a>
        </div>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">


                <span style="border: 3px solid beige; border-radius: 25px;">{{session('name')}}</span>
            </a>
            <div class="dropdown-menu">
                <a href="javascript:void(0)" class="dropdown-item btn btn-info" onclick="$('#logout-form').submit();">

                    Logout
                </a>
{{--                <a class="dropdown-item btn btn-info" href="#">Logout</a>--}}
            </div>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>

<script type="text/javascript">
    console.log( document.cookie);
</script>