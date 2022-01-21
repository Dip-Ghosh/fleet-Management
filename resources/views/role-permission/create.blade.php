@extends('layouts.admin.master')
@section('dashboard')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create User Role</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="card text-white" style="background-color: #183757;">

                    @if ($errors->any())
                        <div class="alert alert-dismissible fade show" style="color: black; background-color: #d4edda"
                             role="alert">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <br>
                    <form action="{{route('role-permissions.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role_name">Roles </label>
                                        <select name="role_name" id="" class="form-control select2">
                                            <option value="" class="select">select an Option</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role}}">{{$role}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="route">Routes </label>
                                        <select name="route_name[]" id="choices-multiple-remove-button"
                                                class="form-control select2" multiple>
                                            @foreach($routes as $route)
                                                @if(!empty($route))
                                                    <option value="{{$route}}">{{$route}} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-2" style="margin-top: 32px">
                                    <button type="submit" class="form-group form-control btn btn-info"> Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
        <script>
            $(document).ready(function () {

                var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                    removeItemButton: true,
                    maxItemCount: 1100,
                    searchResultLimit: 100,
                    renderChoiceLimit: 100
                });


            });
        </script>
    </section>

@endsection
