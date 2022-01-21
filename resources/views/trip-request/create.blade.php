@extends('layouts.admin.master')
@section('dashboard')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Trip Request</h1>
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
                        <div class="alert alert-dismissible fade show" style="color: black; background-color: #d4edda" role="alert">
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
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="location_id">Route  </label>
                                        <select name="location_id" id=""   class="form-control">
                                            <option value="" class="select">select an Option</option>
{{--                                            @foreach($routes as $route)--}}
{{--                                                <option value="{{$route->id}}" >{{$route->name}} </option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="location_id">Pick Up Points  </label>
                                        <select name="location_id" id=""   class="form-control">
                                            <option value="" class="select">select an Option</option>
{{--                                            @foreach($areas as $area)--}}
{{--                                                <option value="{{$area->id}}" >{{$area->name}} </option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="location_id">Drop Off Point  </label>
                                        <select name="location_id" id=""   class="form-control">
                                            <option value="" class="select">select an Option</option>
{{--                                            @foreach($areas as $area)--}}
{{--                                                <option value="{{$area->id}}" >{{$area->name}} </option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Specifying Date</label>
                                        <input type="text" name="name"   class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status">Customizing Time </label>
                                        <select name="status" id=""   class="form-control">
                                            <option value="" class="select">select an Option</option>
                                            <option value="Active" >Active </option>
                                            <option value="Inactive">Inactive </option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Price">Price  </label>
                                        <input type="text" name="price"   class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Bonus Amount</label>
                                        <select name="location_id" id=""   class="form-control">
                                            <option value="" class="select">select an Option</option>
                                            {{--                                            @foreach($areas as $area)--}}
                                            {{--                                                <option value="{{$area->id}}" >{{$area->name}} </option>--}}
                                            {{--                                            @endforeach--}}
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Trip Type</label>
                                        <select name="location_id" id=""   class="form-control">
                                            <option value="" class="select">select an Option</option>
                                            {{--                                            @foreach($areas as $area)--}}
                                            {{--                                                <option value="{{$area->id}}" >{{$area->name}} </option>--}}
                                            {{--                                            @endforeach--}}
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Input Space </label>
                                        <textarea  class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Instruction field </label>
                                        <textarea  class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="form-group  btn btn-info"> Submit</button>
                           

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>

@endsection
