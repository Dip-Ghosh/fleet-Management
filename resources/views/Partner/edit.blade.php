@extends('layouts.admin.master')
@section('dashboard')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">আপডেট </h1>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
@section('content')
    <section class="content">

        <div class="container-fluid">
            <form action="{{route('update-partner',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card text-white" style="background-color: #0d2339;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">নাম</label>
                                    <input type="text" name="name" value="{{$data->name}}" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">মোবাইল নাম্বার</label>
                                    <input type="text" name="mobile" value="{{$data->mobile}}" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ই-মেইল </label>
                                    <input type="email" name="email" value="{{$data->email}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="city_id">শহর</label>
                                    <select name="city" id="city_id" class="form-control">
                                        <option value="" selected>নির্বাচন করুন</option>
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}"
                                                    data-id="{{$location->id}}"
                                                    @if($data->city === $location->name)  selected @endif>
                                                {{$location->name}}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>পাসওয়ার্ড</label>
                                    <input type ="password" name="password" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">অবস্থা </label>
                                    <select name="status" id="" class="form-control select2">
                                        <option value="" >নির্বাচন করুন</option>
                                        <option value="Active" @if(isset($data->status) && $data->status == 'Active') selected @endif>সচল </option>
                                        <option value="Inactive" @if(isset($data->status) && $data->status == 'Inactive') selected @endif>নিষ্ক্রিয় </option>
                                        <option value="Pending" @if(isset($data->status) && $data->status == 'Pending') selected @endif>বিচারাধীন</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-white" style=" background-color: #183757;">
                    <div class="card-body">
                        @if($data->partner_type == 'Person')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">গ্যারেজ লোকেশন</label>
                                    <select name="garage_location" id="" class="form-control select2">
                                        <option value="" selected>নির্বাচন করুন</option>
                                        @foreach($areas as $area)
                                            <option value="{{$area->id}}"
                                                    @if($data->garage_location == $area->name)  selected @endif>
                                                {{$area->name}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">আপনার পছন্দের ড্রপ লোকেশন</label>
                                    <select name="drop_location" id="" class="form-control select2">
                                        <option value="" selected>নির্বাচন করুন</option>
                                        @foreach($areas as $area)
                                            <option value="{{$area->id}}"
                                                    @if($data->drop_location == $area->name)  selected @endif>
                                                {{$area->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">আপনি কি গাড়িটির মালিক?</label>
                                    <select name="is_owner" id="" class="form-control select2">
                                        <option value="" selected>নির্বাচন করুন</option>
                                        <option value="Yes" @if($data->is_owner == 'Yes')  selected @endif >হ্যাঁ
                                        </option>
                                        <option value="No" @if($data->is_owner == 'No')  selected @endif>না</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">স্ব-চালিত নাকি ড্রাইভার চালিত?</label>
                                    <select name="is_driven_by" id="" class="form-control select2">
                                        <option value="" selected>নির্বাচন করুন</option>
                                        <option value="Self-Driven"
                                                @if($data->is_driven_by == 'Self-Driven')  selected @endif >
                                            স্ব-চালিত
                                        </option>
                                        <option value="Driver-Driven"
                                                @if($data->is_driven_by == 'Driver-Driven')  selected @endif >ড্রাইভার
                                            চালিত
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">রাইড শেয়ারিং সার্ভিসের অন্তর্ভূক্ত?</label>
                                    <select name="is_ride_sharing_service_included" id="" class="form-control select2">
                                        <option value="" selected>নির্বাচন করুন</option>
                                        <option value="Yes"
                                                @if($data->is_ride_sharing_service_included == 'Yes')  selected @endif >
                                            হ্যাঁ
                                        </option>
                                        <option value="No"
                                                @if($data->is_ride_sharing_service_included == 'No')  selected @endif >
                                            না
                                        </option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        @else
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">ধরন</label>
                                        <select name="type" id="" class="form-control select2">
                                            <option value="" selected>নির্বাচন করুন</option>
                                            <option value="Personal" @if($data->type == 'Personal') selected @endif >ব্যক্তিগত
                                            </option>
                                            <option value="Company" @if($data->type == 'Company') selected @endif>কোম্পানি </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">কোম্পানি নাম</label>
                                        <input type="text" name="company_name" value="{{$data->company_name}}" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">কোম্পানি ঠিকানা</label>
                                        <input type="text" name="company_location" value="{{$data->company_location}}" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="drop_location">আপনার পছন্দের ড্রপ লোকেশন</label>
                                        <select name="drop_location" id="drop_location" class="form-control select2">
                                            <option value="" selected>নির্বাচন করুন</option>
                                            @foreach($areas as $area)
                                                <option value="{{$area->id}}"
                                                        @if($data->drop_location == $area->name)  selected @endif>
                                                    {{$area->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="garage_location">ফ্লিট লোকেশন </label>
                                        <select name="garage_location" id="garage_location" class="form-control select2">
                                            <option value="" >নির্বাচন করুন</option>
                                            @foreach($areas as $area)
                                                <option value="{{$area->id}}"
                                                        @if($data->garage_location == $area->name)  selected @endif>
                                                    {{$area->name}}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label >গাড়ির সংখ্যা </label>
                                        <input type="text" name="number_of_car" value="{{$data->number_of_car}}" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">আপনি কি গাড়িটির মালিক?</label>
                                        <select name="is_owner" id="" class="form-control select2">
                                            <option value="" selected>নির্বাচন করুন</option>
                                            <option value="Yes" @if($data->is_owner == 'Yes')  selected @endif >হ্যাঁ
                                            </option>
                                            <option value="No" @if($data->is_owner == 'No')  selected @endif>না</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">রাইড শেয়ারিং সার্ভিসের অন্তর্ভূক্ত?</label>
                                        <select name="is_ride_sharing_service_included" id="" class="form-control select2">
                                            <option value="">নির্বাচন করুন</option>
                                            <option value="Yes" @if($data->is_ride_sharing_service_included == 'Yes')  selected @endif >
                                                হ্যাঁ
                                            </option>
                                            <option value="No" @if($data->is_ride_sharing_service_included == 'No')  selected @endif >
                                                না
                                            </option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        @endif


                    </div>
                </div>
                <div class="card text-white" style="background-color: #3e454d;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="phone">গাড়ির ধরন</label>
                                <select name="car_type" id="car_type" class="form-control">
                                    <option value="">নির্বাচন করুন</option>
                                    @foreach($carTypes as $carType)
                                        <option data-id="{{$carType->id}}" value="{{$carType->id}}"
                                                @if(isset($data->car_type) && $data->car_type == $carType->name) selected @endif>
                                            {{$carType->name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="phone">গাড়ির ব্র্যান্ড</label>
                                <select name="car_brand"   id="car_brand" class="form-control select2">
                                    <option value="">নির্বাচন করুন</option>
                                    @foreach($carBrands as $carBrand)
                                        <option value="{{$carBrand->id}}"
                                                data-id="{{$carBrand->id}}"
                                                @if($data->car_brand == $carBrand->name)  selected @endif>
                                            {{$carBrand->name}}
                                        </option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">গাড়ির মডেল</label>
                                    <select name="car_model" class="form-control select2">
                                        <option value="">নির্বাচন করুন</option>
                                        @foreach($carModels as $carModel)
                                            <option value="{{$carModel->id}}" @if($data->car_model == $carModel->name)  selected @endif>
                                                {{$carModel->name}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <label for="license">লাইসেন্স প্লেট নাম্বার</label>
                                <input class="form-control" type="text" name="license_plate_number"
                                       value="{{isset($data->license_plate_number)?$data->license_plate_number:''}}"
                                       placeholder="টাইপ করুন (৭-১০ ডিজিটের মধ্যে)">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">আপনি কি আপনার গাড়ি রেন্টালে দিতে ইচ্ছুক?</label>
                                    <select name="interest_in_rental_service" class="custom-select form-control-border select2" id="ride_sharing_service_included">
                                        <option value="" selected>নির্বাচন করুন</option>
                                        <option value="Yes" @if($data->interest_in_rental_service == 'Yes') selected @endif>হ্যাঁ</option>
                                        <option value="No" @if($data->interest_in_rental_service == 'No') selected @endif>না</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  bg-default">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for=""> ড্রাইভার লাইসেন্স </label><br>
                                <div class="custom-file" style="margin-bottom: 10px">
                                    <input type="file" name="driving_license" class="custom-file-input"
                                           id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <br>
                                @if ($data->driving_license)
                                    <img src="{{asset('/upload/'.$data->driving_license)}}" width="313px"
                                         height="300px" alt="">
                                @else
                                    <img src="{{asset('/upload/driving_license.png')}}" width="313px"
                                         height="300px" alt="">
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for=""> গাড়ির রেজিস্ট্রেশন কাগজ </label><br>
                                <div class="custom-file" style="margin-bottom: 10px">
                                    <input type="file" name="registration_number" class="custom-file-input"
                                           id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                @if (isset($data->registration_number))
                                    <img src="{{asset('/upload/'.$data->registration_number)}}"
                                         width="313px"
                                         height="300px" alt="">
                                @else
                                    <img src="{{asset('/upload/car_registration_number_image.png')}}"
                                         width="313px"
                                         height="300px"
                                         alt="">
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for=""> ইনসিওরেন্স কাগজ </label><br>
                                <div class="custom-file" style="margin-bottom: 10px">
                                    <input type="file" name="insurance_paper" class="custom-file-input"
                                           id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                @if ($data->insurance_paper)
                                    <img src="{{asset('/upload/'.$data->insurance_paper)}}" width="313px"
                                         height="300px" alt="">
                                @else
                                    <img src="{{asset('/upload/insurance_paper.png')}}" width="313px"
                                         height="300px"
                                         alt="">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="margin-top:10px">
                                <label for=""> ফিটনেস সার্টিফিকেট </label><br>
                                <div class="custom-file" style="margin-bottom: 10px">
                                    <input type="file" name="fitness_certificate" class="custom-file-input"
                                           id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                @if ($data->fitness_certificate)
                                    <img src="{{asset('/upload/'.$data->fitness_certificate)}}"
                                         width="313px"
                                         height="300px" alt="">
                                @else
                                    <img src="{{asset('/upload/fitness_certificate_image.png')}}" width="313px"
                                         height="300px" alt="">
                                @endif
                            </div>
                            <div class="col-md-4" style="margin-top:10px">
                                <label for=""> গাড়ির ছবি </label><br>
                                <div class="custom-file" style="margin-bottom: 10px">
                                    <input type="file" name="car_image" class="custom-file-input"
                                           id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                @if ($data->car_image)
                                    <img src="{{asset('/upload/'.$data->car_image)}}" width="313px"
                                         height="300px" alt="">
                                @else
                                    <img src="{{asset('/upload/car_image.png')}}" width="313px"
                                         height="300px" alt="">
                                @endif
                            </div>
                            @if($data->partner_type =='Fleet Owner')
                                <div class="col-md-4" style="margin-top:10px">
                                    <label for=""> ট্যাক্স টোকেন </label><br>
                                    <div class="custom-file" style="margin-bottom: 10px">
                                        <input type="file" name="tax_token" class="custom-file-input"
                                               id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    @if ($data->tax_token)
                                        <img src="{{asset('/upload/'.$data->tax_token)}}" width="313px"
                                             height="300px" alt="">
                                    @else
                                        <img src="{{asset('/upload/tax_token.png')}}" width="313px"
                                             height="300px" alt="">
                                    @endif
                                </div>
                            @endif
                        </div>
                        <br>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">আপডেট করুন</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script>
        $(document).on('change', '#car_type', function () {
            $('select[name="car_brand"]').empty();
            var id =  $(this).find('option:selected').data('id');

            var url = "{{route('car-brand.value')}}"
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "car_type_id": id,
                },
                success: function (response) {
                    if (response.carBrand.length !=0) {
                        $('select[name="car_brand"]').empty();
                        var html = '';
                        html += '<option value="">নির্বাচন করুন</option>';
                        $.each(response.carBrand, function(key, value) {
                            html+= ' <option data-id="'+ value.id +'" value="'+ value.id +'">'+ value.name +'</option>';
                        });
                        $('select[name="car_brand"]').append(html);
                    }
                    else{
                        $('select[name="car_brand"]').empty();
                        alert('This car type has no specific type car Brand');
                    }
                },


            })
        })

        $(document).on('change', '#city_id', function () {
            $('select[name="garage_location"]').empty();
            $('select[name="drop_location"]').empty();
            var id =  $(this).find('option:selected').data('id');

            var url = "{{route('location-wise-area')}}"
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                success: function (response) {

                    if (response.areas.length !=0) {
                        $('select[name="garage_location"]').empty();
                        $('select[name="drop_location"]').empty();
                        var html = '';
                        html += '<option value="">নির্বাচন করুন</option>';
                        $.each(response.areas, function(key, value) {
                            console.log(value.name);
                            html+= ' <option data-id="'+ value.id +'" value="'+ value.id +'">'+ value.name +'</option>';
                        });
                        $('select[name="drop_location"]').append(html);
                        $('select[name="garage_location"]').append(html);
                    }
                    else{
                        $('select[name="drop_location"]').empty();
                        $('select[name="garage_location"]').empty();
                        alert('This car type has no specific type car Brand');
                    }
                },


            })
        })


    </script>
@endsection

