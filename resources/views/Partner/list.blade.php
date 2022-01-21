@extends('layouts.admin.master')
@section('dashboard')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List of Partners</h1>
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

                    <form action="{{route('partners.search')}}" method="GET">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">নাম</label>
                                        <input type="text" name="name"
                                               value="{{isset($requestData['name'])?$requestData['name']:''}}"
                                               class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">মোবাইল নাম্বার</label>
                                        <input type="text" name="mobile"
                                               value="{{isset($requestData['mobile'])?$requestData['mobile']:''}}"
                                               class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">ই-মেইল </label>
                                        <input type="text" name="email"
                                               value="{{isset($requestData['email'])?$requestData['email']:''}}"
                                               class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">শাটেল পার্টনার</label>
                                        <select name="partner_type" id="" class="form-control select2">
                                            <option value="" class="select">নির্বাচন করুন</option>
                                            <option value="Person"
                                                    @if(isset($requestData[
                                            'partner_type']) && $requestData['partner_type'] == 'Person') selected @endif >
                                                পার্সন
                                            </option>
                                            <option value="Fleet Owner"
                                                    @if(isset($requestData[
                                            'partner_type']) && $requestData['partner_type'] == 'Fleet Owner') selected
                                                    @endif >
                                                ফ্লিট মালিক
                                            </option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">রাইড শেয়ারিং সার্ভিসের অন্তর্ভূক্ত?</label>
                                        <select name="is_ride_sharing_service_included" id=""
                                                class="form-control select2">
                                            <option value="" class="select">নির্বাচন করুন</option>
                                            <option value="Yes"
                                                    @if(isset($requestData[
                                            'is_ride_sharing_service_included']) &&
                                            $requestData['is_ride_sharing_service_included'] == 'Yes') selected @endif >
                                                হ্যাঁ
                                            </option>
                                            <option value="No"
                                                    @if(isset($requestData[
                                            'is_ride_sharing_service_included']) &&
                                            $requestData['is_ride_sharing_service_included'] == 'No') selected @endif >
                                                না
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">গ্যারেজ লোকেশন</label>
                                        <select name="garage_location" id="" class="form-control select2">
                                            <option value="" class="select">নির্বাচন করুন</option>
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}"
                                                        @if(isset($requestData['garage_location']) && $requestData['garage_location'] == $location->id)
                                                        selected @endif>
                                                    {{$location->name}}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="phone">গাড়ির ধরন</label>
                                    <select name="car_type" id="" class="form-control select2">
                                        <option value="">নির্বাচন করুন</option>
                                        @foreach($carTypes as $carType)
                                            <option value="{{$carType->id}}"
                                                    @if(isset($requestData['car_type']) && $requestData['car_type'] == $carType->id) selected @endif>
                                                {{$carType->name}}
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
                                                <option value="{{$carModel->id}}"
                                                        @if(isset($requestData[
                                                'car_model']) && $requestData['car_model'] == $carModel->id) selected @endif>
                                                    {{$carModel->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">আপনি কি রেন্টালে দিতে ইচ্ছুক ?</label>
                                        <select name="interest_in_rental_service"
                                                class="custom-select form-control-border select2">
                                            <option value="" class="select">নির্বাচন করুন</option>
                                            <option value="Yes"
                                                    @if(isset($requestData[
                                            'interest_in_rental_service']) && $requestData['interest_in_rental_service'] ==
                                            'Yes') selected @endif>
                                                হ্যাঁ
                                            </option>
                                            <option value="No"
                                                    @if(isset($requestData[
                                            'interest_in_rental_service']) && $requestData['interest_in_rental_service'] ==
                                            'No') selected @endif>
                                                না
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">আপনার পছন্দের ড্রপ লোকেশন</label>
                                        <select name="drop_location" id="" class="form-control select2">
                                            <option value="" class="select">নির্বাচন করুন</option>
                                            @foreach($locations as $location)

                                                <option value="{{$location->id}}"
                                                        @if(isset($requestData[
                                                'drop_location']) && $requestData['drop_location'] == $location->id) selected
                                                        @endif>
                                                    {{$location->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">অবস্থা </label>
                                        <select name="status" id="" class="form-control select2">
                                            <option value="" class="select">নির্বাচন করুন</option>
                                            <option value="Active"
                                                    @if(isset($requestData[
                                            'status']) && $requestData['status'] == 'Active') selected @endif>
                                                সচল
                                            </option>
                                            <option value="Inactive"
                                                    @if(isset($requestData[
                                            'status']) && $requestData['status'] == 'Inactive') selected @endif>
                                                নিষ্ক্রিয়
                                            </option>
                                            <option value="Pending"
                                                    @if(isset($requestData[
                                            'status']) && $requestData['status'] == 'Pending') selected @endif>
                                                বিচারাধীন
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3" style="margin-top: 32px">
                                    <button type="submit" class="form-group form-control btn btn-info"> Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <style>
                #partner-list thead tr th {
                    font-size: 13px
                }
            </style>
            <div class="card-body">


                <table id="partner-list" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Partner Type</th>
                        <th>Vehicle Type</th>
                        <th>Vehicle Model</th>
                        <th>Vehicle Owner</th>
                        <th>Garage Location</th>
                        <th>Drop Location</th>
                        <th>Ride sharing service</th>
                        <th>Interested For Rental</th>
                        <th>Created Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($data as $datum)
{{--                        {{dd($datum)}}--}}
                        <tr data-widget="expandable-table" aria-expanded="false" scope="row">
                            <td><i class="expandable-table-caret fas fa-caret-right fa-fw"></i>{{isset($datum->name)?$datum->name:'N/A'}}</td>
                            <td>{{isset($datum->email)?$datum->email:'N/A'}}</td>
                            <td>{{isset($datum->mobile)?$datum->mobile:'N/A'}}</td>
                            <td>{{isset($datum->partner_type)?$datum->partner_type:'N/A'}}</td>
                            <td>{{isset($datum->car_type)?$datum->car_type:'N/A'}}</td>
                            <td>{{isset($datum->car_model)?$datum->car_model:'N/A'}}</td>
                            <td>{{isset($datum->is_owner)?$datum->is_owner:'N/A'}}</td>
                            <td>{{isset($datum->garage_location)?$datum->garage_location:'Any Location'}}</td>
                            <td>{{($datum->drop_location != Null)?$datum->drop_location :'Any Location'}}</td>
                            <td>{{isset($datum->is_ride_sharing_service_included)?$datum->is_ride_sharing_service_included:'N/A'}}</td>
                            <td>{{isset($datum->interest_in_rental_service)?$datum->interest_in_rental_service:'N/A'}}</td>
                            <td>{{isset($datum->created_at)?date('d-m-Y', strtotime($datum->created_at)):'N/A'}}</td>
                            <td>{{isset($datum->status)?$datum->status:'N/A'}}</td>

                        </tr>
                        <tr class="expandable-body">
                            <div class="p-0">
                                <td colspan="13">

                                    <button style="margin-top: 5px;margin-bottom: 5px;margin-left: 5px;margin-right: 5px"
                                            type="button"
                                            data-toggle="modal"
{{--                                            data-target="#driver-license-info-{{$datum->id}}"--}}
                                            class="btn btn-primary btn-sm justify-content-center "><i
                                                class="fas fa-eye"></i> ড্রাইভিং লাইসেন্স
                                    </button>

                                    <button style="margin-top: 5px;margin-bottom: 5px;margin-left: 5px;margin-right: 5px"
                                            type="button"
                                            data-toggle="modal"
{{--                                            data-target="#registration-number-info-{{$datum->id}}"--}}
                                            class="btn btn-sm btn-info justify-content-center"><i
                                                class="fas fa-eye"></i> গাড়ির রেজিস্ট্রেশন কাগজ
                                    </button>

                                    <button style="margin-top: 5px;margin-bottom: 5px;margin-left: 5px;margin-right: 5px"
                                            type="button"
                                            data-toggle="modal"
{{--                                            data-target="#tax-token-info-{{$datum->id}}"--}}
                                            class="btn btn-sm btn-warning justify-content-center"><i
                                                class="fas fa-eye"></i> ট্যাক্স টোকেন
                                    </button>

                                    <button style="margin-top: 5px;margin-bottom: 5px;margin-left: 5px;margin-right: 5px"
                                            type="button"
                                            data-toggle="modal"
{{--                                            data-target="#fitness-info-{{$datum->id}}"--}}
                                            class="btn btn-sm btn-warning justify-content-center"><i
                                                class="fas fa-eye"></i> ফিটনেস সার্টিফিকেট
                                    </button>

                                    <button style="margin-top: 5px;margin-bottom: 5px;margin-left: 5px;margin-right: 5px"
                                            type="button"
                                            data-toggle="modal"
{{--                                            data-target="#car-info-{{$datum->id}}"--}}
                                            class="btn btn-sm btn-secondary justify-content-center"><i
                                                class="fas fa-eye"></i> গাড়ির ছবি
                                    </button>

                                    <button style="margin-top: 5px;margin-bottom: 5px;margin-left: 5px;margin-right: 5px"
                                            type="button"
{{--                                            data-id="{{$datum->id}}"--}}
                                            data-toggle="modal"
{{--                                            data-target="#modal-info-{{$datum->id}}"--}}
                                            class="btn btn-sm btn-primary justify-content-center">
                                        <i class="fas fa-edit"></i> Change status
                                    </button>

                                    <button style="margin-top: 5px;margin-bottom: 5px;margin-left: 5px;margin-right: 5px"
                                            type="button"
{{--                                            data-id="{{$datum->id}}"--}}
                                            data-toggle="modal"
                                            id="edit-info-x"
                                            data-target="#edit-info"
                                            class="btn btn-sm btn-info justify-content-center edit-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                </td>
                            </div>

                        </tr>
{{--                        <!-- status change modal start -->--}}
{{--                        <div class="modal fade" id="modal-info-{{$datum->id}}">--}}
{{--                            <div class="modal-dialog">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h4 class="modal-title">Change Status</h4>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal"--}}
{{--                                                aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-body">--}}
{{--                                        <input type="hidden" id="user-info-id" value="{{$datum->id}}">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <select class="custom-select form-control-border"--}}
{{--                                                    id="status">--}}
{{--                                                <option value="Pending"--}}
{{--                                                        @if($datum->status === 'Pending') selected @endif>Pending--}}
{{--                                                </option>--}}
{{--                                                <option value="Active"--}}
{{--                                                        @if($datum->status === 'Active') selected @endif>Active--}}
{{--                                                </option>--}}
{{--                                                <option value="Inactive"--}}
{{--                                                        @if($datum->status === 'Inactive') selected @endif>--}}
{{--                                                    Inactive--}}
{{--                                                </option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-footer justify-content-between">--}}
{{--                                        --}}{{--                                <button type="button" class="btn btn-danger" data-dismiss="modal">বন্ধ করুন</button>--}}
{{--                                        <button type="button" data-id="{{$datum->id}}" id="change-status"--}}
{{--                                                class="btn btn-sm btn-primary">আপডেট--}}
{{--                                            করুন--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <!-- status change modal  end -->--}}

{{--                        <!-- ড্রাইভার লাইসেন্স view modal start -->--}}
{{--                        <div class="modal fade" id="driver-license-info-{{$datum->id}}" tabindex="-1" role="dialog"--}}
{{--                             aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog" role="document">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h5 class="modal-title" id="exampleModalLabel">ড্রাইভিং লাইসেন্স </h5>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-body">--}}
{{--                                        <div class="form-group">--}}
{{--                                            @if (isset($datum->driving_license))--}}
{{--                                                <img src="{{asset('/upload/'.$datum->driving_license)}}"--}}
{{--                                                     width="100%"--}}
{{--                                                     alt="">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('/img/default.jpg')}}"--}}
{{--                                                     width="100%"--}}
{{--                                                     alt=" default">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">বন্ধ--}}
{{--                                            করুন--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- ড্রাইভার লাইসেন্স view modal  end -->--}}

{{--                        <!-- গাড়ির রেজিস্ট্রেশন কাগজ view modal start -->--}}
{{--                        <div class="modal fade" id="registration-number-info-{{$datum->id}}" tabindex="-1" role="dialog"--}}
{{--                             aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog" role="document">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h5 class="modal-title" id="exampleModalLabel">গাড়ির রেজিস্ট্রেশন কাগজ</h5>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-body">--}}
{{--                                        <div class="form-group">--}}
{{--                                            @if (isset($datum->registration_number))--}}
{{--                                                <img src="{{asset('/upload/'.$datum->registration_number)}}"--}}
{{--                                                     width="100%" alt="">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('/img/default.jpg')}}" width="100%"--}}
{{--                                                     alt=" default">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">বন্ধ--}}
{{--                                            করুন--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- গাড়ির রেজিস্ট্রেশন কাগজ view modal  end -->--}}


{{--                        <!-- ফিটনেস সার্টিফিকেট view modal start -->--}}
{{--                        <div class="modal fade" id="fitness-info-{{$datum->id}}" tabindex="-1" role="dialog"--}}
{{--                             aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog" role="document">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h5 class="modal-title" id="exampleModalLabel">ফিটনেস সার্টিফিকেট </h5>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-body">--}}
{{--                                        <div class="form-group">--}}
{{--                                            @if (isset($datum->fitness_certificate))--}}
{{--                                                <img src="{{asset('/upload/'.$datum->fitness_certificate)}}"--}}
{{--                                                     width="100%"--}}
{{--                                                     alt="">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('/img/default.jpg')}}"--}}
{{--                                                     width="100%"--}}
{{--                                                     alt=" default">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">বন্ধ--}}
{{--                                            করুন--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- ফিটনেস সার্টিফিকেট view modal  end -->--}}

{{--                        <!-- গাড়ির ছবি view modal start -->--}}
{{--                        <div class="modal fade" id="car-info-{{$datum->id}}" tabindex="-1" role="dialog"--}}
{{--                             aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog" role="document">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h5 class="modal-title" id="exampleModalLabel">গাড়ির ছবি </h5>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-body">--}}
{{--                                        <div class="form-group">--}}
{{--                                            @if (isset($datum->car_image))--}}
{{--                                                <img src="{{asset('/upload/'.$datum->car_image)}}"--}}
{{--                                                     width="100%">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('/img/default.jpg')}}"--}}
{{--                                                     width="100%"--}}
{{--                                                     alt=" default">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">বন্ধ--}}
{{--                                            করুন--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- গাড়ির ছবি  view modal  end -->--}}

{{--                        <!-- ট্যাক্স টোকেন view modal start -->--}}
{{--                        <div class="modal fade" id="tax-token-info-{{$datum->id}}" tabindex="-1" role="dialog"--}}
{{--                             aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog" role="document">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h5 class="modal-title" id="exampleModalLabel">ট্যাক্স টোকেন </h5>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-body">--}}
{{--                                        <div class="form-group">--}}
{{--                                            @if (isset($datum->tax_token))--}}
{{--                                                <img src="{{asset('/upload/'.$datum->tax_token)}}"--}}
{{--                                                     width="100%"--}}
{{--                                                     alt="">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('/img/default.jpg')}}"--}}
{{--                                                     width="100%"--}}
{{--                                                     alt=" default">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">বন্ধ--}}
{{--                                            করুন--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- ট্যাক্স টোকেন view modal  end -->--}}


                    @endforeach
                    </tbody>
                </table>

                <!-- edit modal start -->

{{--                <div class="modal fade" id="edit-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--                     aria-hidden="true">--}}
{{--                    <div class="modal-dialog modal-xl" role="document">--}}
{{--                        <div class="modal-content">--}}
{{--                            <div class="modal-header">--}}
{{--                                <h5 class="modal-title" id="exampleModalLabel">আপডেট </h5>--}}
{{--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                    <span aria-hidden="true">&times;</span>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class=" col-md-12 text-white errors-panel">--}}
{{--                                <div class="alert alert-dismissible fade show "--}}
{{--                                     style="color: black; background-color: #d4edda" role="alert">--}}
{{--                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--                                    <ul id="errors">--}}
{{--                                    </ul>--}}
{{--                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                        <span aria-hidden="true">&times;</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="modal-body">--}}
{{--                                <div class="container-fluid">--}}
{{--                                    <form method="POST" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="id" id="user-id">--}}
{{--                                        <div class="card text-white" style="background-color: #0d2339;">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="name">নাম</label>--}}
{{--                                                            <input type="text" name="name" id="name"--}}
{{--                                                                   class="form-control">--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="mobile">মোবাইল নাম্বার</label>--}}
{{--                                                            <input type="text" name="mobile" id="mobile"--}}
{{--                                                                   class="form-control">--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label>ই-মেইল </label>--}}
{{--                                                            <input type="email" name="email" id="email"--}}
{{--                                                                   class="form-control">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="city_id">শহর</label>--}}
{{--                                                            <select name="city" id="city_id" class="form-control">--}}

{{--                                                            </select>--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="password">পাসওয়ার্ড</label>--}}
{{--                                                            <input type="text" name="password" id="password" value=""--}}
{{--                                                                   class="form-control">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="phone">অবস্থা </label>--}}
{{--                                                            <select name="status" id="status-id" class="form-control">--}}
{{--                                                                <option value="">নির্বাচন করুন</option>--}}
{{--                                                                <option value="Active">সচল</option>--}}
{{--                                                                <option value="Inactive">নিষ্ক্রিয়</option>--}}
{{--                                                                <option value="Pending">বিচারাধীন</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="card text-white" style=" background-color: #183757;">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row person" style="display: none">--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="garage_location">গ্যারেজ লোকেশন</label>--}}
{{--                                                            <select name="garage_locations" id="garage_locations"--}}
{{--                                                                    class="form-control garage_locations">--}}

{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="phone">পছন্দের ড্রপ লোকেশন</label>--}}
{{--                                                            <select name="drop_locations" id="drop_locations"--}}
{{--                                                                    class="form-control drop_locations">--}}

{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="phone">আপনি কি গাড়িটির মালিক?</label>--}}
{{--                                                            <select name="is_owner" id="is_owner"--}}
{{--                                                                    class="form-control is_owner">--}}
{{--                                                                <option value="" selected>নির্বাচন করুন</option>--}}
{{--                                                                <option value="Yes">হ্যাঁ--}}
{{--                                                                </option>--}}
{{--                                                                <option value="No">না</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="phone">স্ব-চালিত নাকি ড্রাইভার চালিত?</label>--}}
{{--                                                            <select name="is_driven_by" id="is_driven_by"--}}
{{--                                                                    class="form-control">--}}
{{--                                                                <option value="" selected>নির্বাচন করুন</option>--}}
{{--                                                                <option value="Self-Driven">--}}
{{--                                                                    স্ব-চালিত--}}
{{--                                                                </option>--}}
{{--                                                                <option value="Driver-Driven">ড্রাইভার--}}
{{--                                                                    চালিত--}}
{{--                                                                </option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="phone">রাইড শেয়ারিং সার্ভিসের--}}
{{--                                                                অন্তর্ভূক্ত?</label>--}}
{{--                                                            <select name="is_ride_sharing_service_included"--}}
{{--                                                                    id="is_ride_sharing_service_included"--}}
{{--                                                                    class="form-control is_ride_sharing_service_included">--}}
{{--                                                                <option value="" selected>নির্বাচন করুন</option>--}}
{{--                                                                <option value="Yes">--}}
{{--                                                                    হ্যাঁ--}}
{{--                                                                </option>--}}
{{--                                                                <option value="No">--}}
{{--                                                                    না--}}
{{--                                                                </option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="row owner" style="display: none">--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="type">ধরন</label>--}}
{{--                                                            <select name="type" id="type" class="form-control">--}}
{{--                                                                <option value="" selected>নির্বাচন করুন</option>--}}
{{--                                                                <option value="Personal">ব্যক্তিগত--}}
{{--                                                                </option>--}}
{{--                                                                <option value="Company">কোম্পানি</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="name">কোম্পানি নাম</label>--}}
{{--                                                            <input type="text" id="company_name" name="company_name"--}}
{{--                                                                   class="form-control">--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="phone">কোম্পানি ঠিকানা</label>--}}
{{--                                                            <input type="text" id="company_location"--}}
{{--                                                                   name="company_location" class="form-control">--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="drop_locations">পছন্দের ড্রপ লোকেশন</label>--}}
{{--                                                            <select name="drop_locations" id="drop_locations"--}}
{{--                                                                    class="form-control drop_locations">--}}

{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="garage_locations">ফ্লিট লোকেশন </label>--}}
{{--                                                            <select name="garage_locations" id="garage_locations"--}}
{{--                                                                    class="form-control garage_locations">--}}

{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label>গাড়ির সংখ্যা </label>--}}
{{--                                                            <input type="text" name="number_of_car" id="number_of_car"--}}
{{--                                                                   class="form-control">--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="is_owner">আপনি কি গাড়িটির মালিক?</label>--}}
{{--                                                            <select name="is_owner" id="is_owner"--}}
{{--                                                                    class="form-control is_owner">--}}
{{--                                                                <option value="" selected>নির্বাচন করুন</option>--}}
{{--                                                                <option value="Yes">হ্যাঁ--}}
{{--                                                                </option>--}}
{{--                                                                <option value="No">না</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="is_ride_sharing_service_included">রাইড শেয়ারিং--}}
{{--                                                                সার্ভিসের অন্তর্ভূক্ত?</label>--}}
{{--                                                            <select name="is_ride_sharing_service_included"--}}
{{--                                                                    id="is_ride_sharing_service_included"--}}
{{--                                                                    class="form-control is_ride_sharing_service_included">--}}
{{--                                                                <option value="" selected>নির্বাচন করুন</option>--}}
{{--                                                                <option value="Yes">--}}
{{--                                                                    হ্যাঁ--}}
{{--                                                                </option>--}}
{{--                                                                <option value="No">--}}
{{--                                                                    না--}}
{{--                                                                </option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="card text-white" style="background-color: #3e454d;">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <label for="car_type">গাড়ির ধরন</label>--}}
{{--                                                        <select name="carType" id="carType" class="form-control">--}}

{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <label for="car_brand">গাড়ির ব্র্যান্ড</label>--}}
{{--                                                        <select name="carBrand" id="carBrand"--}}
{{--                                                                class="form-control"></select>--}}

{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="car_model">গাড়ির মডেল</label>--}}
{{--                                                            <select name="carModel" id="carModel"--}}
{{--                                                                    class="form-control"></select>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <label for="license_plate_number">লাইসেন্স প্লেট নাম্বার</label>--}}
{{--                                                        <input class="form-control" type="text"--}}
{{--                                                               name="license_plate_number" id="license_plate_number"--}}
{{--                                                               placeholder="টাইপ করুন (৭-১০ ডিজিটের মধ্যে)">--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="exampleInputEmail1">আপনি কি আপনার গাড়ি রেন্টালে--}}
{{--                                                                দিতে ইচ্ছুক?</label>--}}
{{--                                                            <select name="interest_in_rental_service"--}}
{{--                                                                    class="custom-select form-control-border "--}}
{{--                                                                    id="interest_in_rental_service">--}}
{{--                                                                <option value="" selected>নির্বাচন করুন</option>--}}
{{--                                                                <option value="Yes">হ্যাঁ</option>--}}
{{--                                                                <option value="No">না</option>--}}

{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="card  bg-default">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for=""> ড্রাইভিং লাইসেন্স </label><br>--}}
{{--                                                        <div class="custom-file" style="margin-bottom: 10px">--}}
{{--                                                            <input type="file" id="driving_license"--}}
{{--                                                                   name="driving_license" class="custom-file-input">--}}
{{--                                                            <label class="custom-file-label" for="exampleInputFile">Choose--}}
{{--                                                                file</label>--}}
{{--                                                        </div>--}}
{{--                                                        <br>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for=""> গাড়ির রেজিস্ট্রেশন কাগজ </label><br>--}}
{{--                                                        <div class="custom-file" style="margin-bottom: 10px">--}}
{{--                                                            <input type="file" id="registration_number"--}}
{{--                                                                   name="registration_number" class="custom-file-input">--}}
{{--                                                            <label class="custom-file-label" for="exampleInputFile">Choose--}}
{{--                                                                file</label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    --}}{{--                                                    <div class="col-md-4">--}}
{{--                                                    --}}{{--                                                        <label for=""> ইনসিওরেন্স কাগজ </label><br>--}}
{{--                                                    --}}{{--                                                        <div class="custom-file" style="margin-bottom: 10px">--}}
{{--                                                    --}}{{--                                                            <input type="file"  id="insurance_paper" name="insurance_paper" class="custom-file-input">--}}
{{--                                                    --}}{{--                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
{{--                                                    --}}{{--                                                        </div>--}}
{{--                                                    --}}{{--                                                    </div>--}}
{{--                                                    <div class="col-md-4" style="margin-bottom:10px">--}}
{{--                                                        <label for=""> ট্যাক্স টোকেন </label><br>--}}
{{--                                                        <div class="custom-file" style="margin-bottom: 10px">--}}
{{--                                                            <input type="file" id="tax_token" name="tax_token"--}}
{{--                                                                   class="custom-file-input">--}}
{{--                                                            <label class="custom-file-label" for="exampleInputFile">Choose--}}
{{--                                                                file</label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-4" style="margin-top:10px">--}}
{{--                                                        <label for=""> ফিটনেস সার্টিফিকেট </label><br>--}}
{{--                                                        <div class="custom-file" style="margin-bottom: 10px">--}}
{{--                                                            <input type="file" id="fitness_certificate"--}}
{{--                                                                   name="fitness_certificate" class="custom-file-input">--}}
{{--                                                            <label class="custom-file-label" for="exampleInputFile">Choose--}}
{{--                                                                file</label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-4" style="margin-top:10px">--}}
{{--                                                        <label for=""> গাড়ির ছবি </label><br>--}}
{{--                                                        <div class="custom-file" style="margin-bottom: 10px">--}}
{{--                                                            <input type="file" id="car_image" name="car_image"--}}
{{--                                                                   class="custom-file-input">--}}
{{--                                                            <label class="custom-file-label" for="exampleInputFile">Choose--}}
{{--                                                                file</label>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}


{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="modal-footer">--}}
{{--                                <button type="button" id="update-user-info" class="btn btn-sm btn-primary">আপডেট করুন--}}
{{--                                </button>--}}
{{--                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">বন্ধ করুন--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- edit modal  end -->
                <div style="margin-top: 10px">
                    {!! $data->appends( $requestData[0]=isset($requestData)?$requestData:'')->render('vendor.pagination.custom') !!}
{{--                    {{ $data->links('vendor.pagination.custom') }}--}}
                </div>

            </div>

        </div>

    </section>

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script>


        $(function () {
            $('.select2').select2();
            $("#partner-list").DataTable({
                "responsive": false,
                "lengthChange": false,
                "scrollX": true,
                "autoWidth": true
            });
        });
    </script>
{{--        $(document).on('click', '#change-status', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            var id = $(this).data('id');--}}
{{--            var status = $('#status').val();--}}
{{--            var url = "{{route('partners.edit.status')}}";--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                url: url,--}}
{{--                data: {--}}
{{--                    "_token": "{{ csrf_token() }}",--}}
{{--                    "id": id,--}}
{{--                    "status": status--}}
{{--                },--}}
{{--                success: function (response) {--}}
{{--                    if (response.status_code == 200) {--}}
{{--                        $('.modal').modal('hide');--}}
{{--                        window.location.reload();--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}
{{--        });--}}

{{--        $(document).on('change', '#status', function () {--}}
{{--            $('#status').find(":selected").val($(this).val());--}}
{{--        })--}}

{{--        $(document).on('click', '.edit-info', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            var id = $(this).data('id');--}}
{{--            var locations = @json($cities);--}}
{{--            var areas = @json($locations);--}}
{{--            var car_type = @json($carTypes);--}}
{{--            var car_brand = @json($carBrands);--}}
{{--            var car_model = @json($carModels);--}}


{{--            $('select[name="city"]').html('');--}}
{{--            $('select[name="garage_locations"]').html('');--}}
{{--            $('select[name="drop_locations"]').html('');--}}
{{--            $('select[name="carType"]').html('');--}}
{{--            $('select[name="carBrand"]').html('');--}}
{{--            $('select[name="carModel"]').html('');--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                url: '{{route('partners.edit')}}',--}}
{{--                data: {--}}
{{--                    "_token": "{{ csrf_token() }}",--}}
{{--                    "id": id--}}
{{--                },--}}
{{--                success: function (response) {--}}

{{--                    if (response.data) {--}}
{{--                        var partner_type = response.data.partner_type;--}}
{{--                        if (partner_type == "Person") {--}}
{{--                            $('.owner').hide();--}}
{{--                            $('.person').show();--}}


{{--                        }--}}
{{--                        if (partner_type == "Fleet Owner") {--}}
{{--                            $('.owner').show();--}}
{{--                            $('.person').hide();--}}
{{--                        }--}}
{{--                        $("#user-id").val(response.data.id);--}}
{{--                        $("#name").val(response.data.name);--}}
{{--                        $("#email").val(response.data.email);--}}
{{--                        $("#mobile").val(response.data.mobile);--}}
{{--                        $("#status-id").val(response.data.status).attr('selected', true);--}}

{{--                        //city--}}
{{--                        var html = ' <option value="" selected>নির্বাচন করুন</option>';--}}
{{--                        $('select[name="city"]').append(html);--}}
{{--                        html = '';--}}
{{--                        locations.forEach(function (arrayItem) {--}}
{{--                            if (response.data.city == arrayItem.name) {--}}
{{--                                html += '<option  value="' + arrayItem.id + '"  selected >' + arrayItem.name + '</option>';--}}
{{--                            } else {--}}
{{--                                html += '<option  value="' + arrayItem.id + '" >' + arrayItem.name + '</option>';--}}
{{--                            }--}}
{{--                        });--}}
{{--                        $('select[name="city"]').append(html);--}}

{{--                        $('#type').val(response.data.type).attr('selected', true);--}}
{{--                        $('#company_name').val(response.data.company_name);--}}
{{--                        $('#company_location').val(response.data.company_location);--}}
{{--                        $('.is_owner').val(response.data.is_owner).attr('selected', true);--}}
{{--                        $('#is_driven_by').val(response.data.is_driven_by).attr('selected', true);--}}
{{--                        $('.is_ride_sharing_service_included').val(response.data.is_ride_sharing_service_included).attr('selected', true);--}}
{{--                        $('#number_of_car').val(response.data.number_of_car);--}}
{{--                        $('#license_plate_number').val(response.data.license_plate_number);--}}
{{--                        $('#interest_in_rental_service').val(response.data.interest_in_rental_service);--}}

{{--                        //area--}}
{{--                        var html_garage = ' <option value="" selected>নির্বাচন করুন</option>';--}}
{{--                        var html_drop = ' <option value="" selected>নির্বাচন করুন</option>';--}}
{{--                        $('select[name="garage_locations"]').append(html_garage);--}}
{{--                        $('select[name="drop_locations"]').append(html_drop);--}}
{{--                        html_garage = '';--}}
{{--                        html_drop = '';--}}
{{--                        areas.forEach(function (arrayItem) {--}}
{{--                            if (response.data.garage_location == arrayItem.name) {--}}
{{--                                html_garage += '<option  value="' + arrayItem.id + '" selected >' + arrayItem.name + '</option>';--}}
{{--                            } else {--}}
{{--                                html_garage += '<option  value="' + arrayItem.id + '" >' + arrayItem.name + '</option>';--}}
{{--                            }--}}
{{--                            if (response.data.drop_location == arrayItem.name) {--}}
{{--                                html_drop += '<option  value="' + arrayItem.id + '" selected >' + arrayItem.name + '</option>';--}}

{{--                            } else {--}}
{{--                                html_drop += '<option  value="' + arrayItem.id + '" >' + arrayItem.name + '</option>';--}}
{{--                            }--}}
{{--                        });--}}
{{--                        $('select[name="garage_locations"]').append(html_garage);--}}
{{--                        $('select[name="drop_locations"]').append(html_drop);--}}


{{--                        //car type--}}
{{--                        var html_carType = ' <option value="" selected>নির্বাচন করুন</option>';--}}
{{--                        $('select[name="carType"]').append(html_carType);--}}
{{--                        html_carType = '';--}}
{{--                        car_type.forEach(function (arrayItem) {--}}
{{--                            if (response.data.car_type == arrayItem.name) {--}}
{{--                                html_carType += '<option  value="' + arrayItem.id + '" data-id="' + arrayItem.id + '" selected >' + arrayItem.name + '</option>';--}}

{{--                            } else {--}}
{{--                                html_carType += '<option  value="' + arrayItem.id + '" data-id="' + arrayItem.id + '">' + arrayItem.name + '</option>';--}}
{{--                            }--}}
{{--                        });--}}
{{--                        $('select[name="carType"]').append(html_carType);--}}

{{--                        //car brands--}}
{{--                        var html_brand = ' <option value="" selected>নির্বাচন করুন</option>';--}}
{{--                        $('select[name="carBrand"]').append(html_brand);--}}
{{--                        html_brand = '';--}}
{{--                        car_brand.forEach(function (arrayItem) {--}}
{{--                            if (response.data.car_brand == arrayItem.name) {--}}
{{--                                html_brand += '<option  value="' + arrayItem.id + '" selected >' + arrayItem.name + '</option>';--}}
{{--                            } else {--}}
{{--                                html_brand += '<option  value="' + arrayItem.id + '" >' + arrayItem.name + '</option>';--}}
{{--                            }--}}
{{--                        });--}}
{{--                        $('select[name="carBrand"]').append(html_brand);--}}

{{--                        //car model--}}
{{--                        var html_car_model = ' <option value="" selected>নির্বাচন করুন</option>';--}}
{{--                        $('select[name="carModel"]').append(html_car_model);--}}
{{--                        html_car_model = '';--}}
{{--                        car_model.forEach(function (arrayItem) {--}}

{{--                            if (response.data.car_model == arrayItem.name) {--}}
{{--                                html_car_model += '<option  value="' + arrayItem.id + '" selected >' + arrayItem.name + '</option>';--}}
{{--                            } else {--}}
{{--                                html_car_model += '<option  value="' + arrayItem.id + '" >' + arrayItem.name + '</option>';--}}
{{--                            }--}}
{{--                        });--}}

{{--                        $('select[name="carModel"]').append(html_car_model);--}}
{{--                        $('.errors-panel').hide();--}}
{{--                        $('#edit-info').modal('show');--}}

{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        $(document).on('click', '#update-user-info', function (e) {--}}
{{--            e.preventDefault();--}}

{{--            //user--}}
{{--            var id = $('#user-id').val();--}}
{{--            var name = $('#name').val();--}}
{{--            var mobile = $('#mobile').val();--}}
{{--            var status = $('#status-id').val();--}}
{{--            var email = $('#email').val();--}}
{{--            var password = $('#password').val();--}}

{{--            //user info--}}
{{--            var city = $('#city_id').val();--}}
{{--            var type = $('#type').val();--}}
{{--            var company_name = $('#company_name').val();--}}
{{--            var company_location = $('#company_location').val();--}}
{{--            var garage_location = $('#garage_locations').val();--}}
{{--            var drop_location = $('#drop_locations').val();--}}
{{--            var is_owner = $('.is_owner').val();--}}
{{--            var is_driven_by = $('#is_driven_by').val();--}}
{{--            var number_of_car = $('#number_of_car').val();--}}
{{--            var is_ride_sharing_service_included = $('.is_ride_sharing_service_included').val();--}}

{{--            //car information--}}

{{--            var carType = $('#carType').val();--}}
{{--            var carBrand = $('#carBrand').val();--}}
{{--            var carModel = $('#carModel').val();--}}
{{--            var license_plate_number = $('#license_plate_number').val();--}}
{{--            var interest_in_rental_service = $('#interest_in_rental_service').val();--}}

{{--            // file upload--}}
{{--            var registration_number = ($('#registration_number')[0].files[0]) ? $('#registration_number')[0].files[0] : '';--}}
{{--            var fitness_certificate = ($('#fitness_certificate')[0].files[0]) ? $('#fitness_certificate')[0].files[0] : '';--}}
{{--            var tax_token = ($('#tax_token')[0].files[0]) ? $('#tax_token')[0].files[0] : '';--}}
{{--            // var  insurance_paper = ($('#insurance_paper')[0].files[0])?$('#insurance_paper')[0].files[0]:'';--}}
{{--            var car_image = ($('#car_image')[0].files[0]) ? $('#car_image')[0].files[0] : '';--}}
{{--            var driving_license = ($('#driving_license')[0].files[0]) ? $('#driving_license')[0].files[0] : '';--}}

{{--            var formData = new FormData($('#form-update-user'.id)[0]);--}}
{{--            formData.append('id', id);--}}
{{--            formData.append('name', name);--}}
{{--            formData.append('mobile', mobile);--}}
{{--            formData.append('status', status);--}}
{{--            formData.append('email', email);--}}
{{--            formData.append('password', password);--}}

{{--            formData.append('city', city);--}}
{{--            formData.append('type', type);--}}
{{--            formData.append('company_name', company_name);--}}
{{--            formData.append('company_location', company_location);--}}
{{--            formData.append('garage_location', garage_location);--}}
{{--            formData.append('drop_location', drop_location);--}}
{{--            formData.append('is_owner', is_owner);--}}
{{--            formData.append('is_driven_by', is_driven_by);--}}
{{--            formData.append('number_of_car', number_of_car);--}}
{{--            formData.append('is_ride_sharing_service_included', is_ride_sharing_service_included);--}}


{{--            formData.append('car_type', carType);--}}
{{--            formData.append('car_brand', carBrand);--}}
{{--            formData.append('car_model', carModel);--}}
{{--            formData.append('license_plate_number', license_plate_number);--}}
{{--            formData.append('interest_in_rental_service', interest_in_rental_service);--}}

{{--            formData.append('registration_number', registration_number);--}}
{{--            formData.append('fitness_certificate', fitness_certificate);--}}
{{--            formData.append('tax_token', tax_token);--}}
{{--            // formData.append('insurance_paper',insurance_paper);--}}
{{--            formData.append('car_image', car_image);--}}
{{--            formData.append('driving_license', driving_license);--}}

{{--            formData.append('_token', "{{ csrf_token() }}");--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                url: '{{route('partners.update')}}',--}}
{{--                data: formData,--}}
{{--                enctype: 'multipart/form-data',--}}
{{--                processData: false,--}}
{{--                contentType: false,--}}
{{--                success: function (response) {--}}
{{--                    if (response.status_code == 200) {--}}
{{--                        $('.modal').modal('hide');--}}
{{--                        window.location.reload();--}}
{{--                    } else {--}}

{{--                        $('#errors').empty();--}}
{{--                        $('.errors-panel').show();--}}
{{--                        var html = '';--}}
{{--                        $.each(response, function (key, value) {--}}
{{--                            html += '<li>' + value + '</li>'--}}
{{--                        });--}}
{{--                        $('#errors').append(html);--}}
{{--                    }--}}

{{--                }--}}

{{--            });--}}
{{--        });--}}

{{--        $(document).on('change', '#carType', function () {--}}
{{--            $('select[name="carBrand"]').empty();--}}
{{--            var id = $(this).find('option:selected').data('id');--}}

{{--            var url = "{{route('car-brands.car_type_wise_brands')}}"--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                url: url,--}}
{{--                data: {--}}
{{--                    "_token": "{{ csrf_token() }}",--}}
{{--                    "car_type_id": id,--}}
{{--                },--}}
{{--                success: function (response) {--}}
{{--                    if (response.carBrand.length != 0) {--}}
{{--                        $('select[name="carBrand"]').empty();--}}
{{--                        var html = '';--}}
{{--                        html += '<option value="">নির্বাচন করুন</option>';--}}
{{--                        $.each(response.carBrand, function (key, value) {--}}
{{--                            html += ' <option data-id="' + value.id + '" value="' + value.id + '">' + value.name + '</option>';--}}
{{--                        });--}}
{{--                        $('select[name="carBrand"]').append(html);--}}
{{--                    } else {--}}
{{--                        $('select[name="carBrand"]').empty();--}}
{{--                        alert('This car type has no specific type car Brand');--}}
{{--                    }--}}
{{--                },--}}


{{--            })--}}
{{--        })--}}

{{--        $(document).on('change', '#city_id', function () {--}}
{{--            var id = $(this).val()--}}
{{--            $('select[name="garage_locations"]').empty();--}}
{{--            $('select[name="drop_locations"]').empty();--}}
{{--            var url = "{{route('partners.location_wise_area')}}"--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                url: url,--}}
{{--                data: {--}}
{{--                    "_token": "{{ csrf_token() }}",--}}
{{--                    "id": id,--}}
{{--                },--}}
{{--                success: function (response) {--}}
{{--                    console.log(response);--}}
{{--                    if (response.data.length != 0) {--}}
{{--                        $('select[name="garage_location"]').html('');--}}
{{--                        $('select[name="drop_location"]').html('');--}}
{{--                        var html = '';--}}
{{--                        html += '<option value="">নির্বাচন করুন</option>';--}}
{{--                        $.each(response.data, function (key, value) {--}}
{{--                            html += ' <option data-id="' + value.id + '" value="' + value.id + '">' + value.name + '</option>';--}}
{{--                        });--}}
{{--                        $('select[name="drop_locations"]').append(html);--}}
{{--                        $('select[name="garage_locations"]').append(html);--}}
{{--                    } else {--}}
{{--                        $('select[name="drop_locations"]').html('');--}}
{{--                        $('select[name="garage_locations"]').html('');--}}
{{--                        alert('No location for Specific City');--}}
{{--                    }--}}
{{--                },--}}


{{--            })--}}
{{--        })--}}

{{--        $(document).on('change', '#drop_locations', function () {--}}
{{--            $('#drop_locations').find(":selected").val($(this).val());--}}
{{--        })--}}

{{--        $(document).on('change', '#garage_locations', function () {--}}
{{--            $('#garage_locations').find(":selected").val($(this).val());--}}
{{--        })--}}

{{--        $(document).on('change', '.is_ride_sharing_service_included', function () {--}}
{{--            $('.is_ride_sharing_service_included').find(":selected").val($(this).val());--}}
{{--        })--}}


{{--    </script>--}}
@endsection

