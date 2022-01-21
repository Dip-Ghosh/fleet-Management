@extends('layouts.admin.master')
@section('dashboard')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Details of {{$datum->partner_type}}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class=" col-md-10 card-title" style="font-weight: bold">

                            <span style="margin-left: 20px"> নাম  : {{$datum->name}} </span>
                            <span style="margin-left: 25px"> মোবাইল নাম্বার : {{$datum->mobile}} </span>
                            <span style="margin-left: 25px"> শহর : {{$datum->city}}</span>
                            <span style="margin-left: 25px"> Status : {{$datum->status}}</span>

                        </div>

                        <div class="col-md-2">
                            <button type="button" data-id="{{$datum->id}}" data-toggle="modal"
                                    data-target="#modal-info-{{$datum->id}}" class="btn btn-primary btn-xs">
                                Change Status
                            </button>
                            <a href="{{route('edit-partner',$datum->id)}}" type="button"
                               class="btn btn-sm"><i class="fas fa-edit"></i></a>
                        </div>
                    </div>
{{--                    <div class="modal fade" id="modal-info-{{$datum->id}}">--}}
{{--                        <div class="modal-dialog">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <h4 class="modal-title">Change Status</h4>--}}
{{--                                    <button type="button" class="close" data-dismiss="modal"--}}
{{--                                            aria-label="Close">--}}
{{--                                        <span aria-hidden="true">&times;</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <div class="modal-body">--}}
{{--                                    <input type="hidden" id="user-info-id" value="{{$datum->id}}">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <select class="custom-select form-control-border"--}}
{{--                                                id="status">--}}
{{--                                            <option value="Pending"--}}
{{--                                                    @if($datum->status == 'Pending') selected @endif>Pending--}}
{{--                                            </option>--}}
{{--                                            <option value="Active"--}}
{{--                                                    @if($datum->status == 'Active') selected @endif>Active--}}
{{--                                            </option>--}}
{{--                                            <option value="Inactive"--}}
{{--                                                    @if($datum->status == 'Inactive') selected @endif>--}}
{{--                                                Inactive--}}
{{--                                            </option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="modal-footer justify-content-between">--}}
{{--                                    <button type="button" class="btn btn-default" data-dismiss="modal">--}}
{{--                                        Close--}}
{{--                                    </button>--}}
{{--                                    <button type="button" id="change-status" class="btn btn-primary">Save--}}
{{--                                        changes--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}


                </div>
                <div class="card-body">
                    <div class="card text-white" style="background-color: #234e55">
                        <div class="card-body">
                            @if($datum->partner_type == 'Person')
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for=""> গ্যারেজ লোকেশন </label><br>
                                        {{$datum->garage_location}}
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""> আপনার পছন্দের ড্রপ লোকেশন</label><br>
                                        {{$datum->drop_location}}
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">আপনি কি গাড়িটির মালিক?</label><br>
                                        {{$datum->is_owner}}
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""> স্ব-চালিত নাকি ড্রাইভার চালিত?</label><br>
                                        {{$datum->is_driven_by}}
                                    </div>
                                </div><br>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for=""> গাড়িটি কি কোন রাইড শেয়ারিং সার্ভিসের অন্তর্ভূক্ত? </label><br>
                                        {{$datum->is_ride_sharing_service_included}}
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for=""> ধরন</label><br>
                                        {{$datum->type}}
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""> গাড়ির সংখ্যা </label><br>
                                        {{$datum->number_of_car}}
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""> ফ্লিট লোকেশন </label><br>
                                        {{$datum->garage_location}}
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""> আপনার পছন্দের ড্রপ লোকেশন</label><br>
                                        {{$datum->drop_location}}
                                    </div>
                                </div><br>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for=""> কোম্পানি নাম </label><br>
                                        {{$datum->company_name}}
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">কোম্পানি ঠিকানা</label><br>
                                        {{$datum->company_location}}
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" style="font-weight: bold">আপনি কি গাড়িটির মালিক?</label><br>
                                        {{$datum->is_owner}}
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""> গাড়িটি কি কোন রাইড শেয়ারিং সার্ভিসের অন্তর্ভূক্ত? </label><br>
                                        {{$datum->is_ride_sharing_service_included}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card text-white" style="background-color: #183757;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for=""> গাড়ির ধরন</label><br>
                                    {{$datum->car_type}}
                                </div>
                                <div class="col-md-3">
                                    <label for=""> গাড়ির ব্র্যান্ড </label><br>
                                    {{$datum->car_brand}}
                                </div>
                                <div class="col-md-3">
                                    <label for="">গাড়ির মডেল </label><br>
                                    {{$datum->car_model}}
                                </div>
                                <div class="col-md-3">
                                    <label for=""> লাইসেন্স প্লেট নাম্বার </label><br>
                                    {{$datum->license_plate_number}}
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" style="font-weight: bold">আপনি কি আপনার গাড়ি রেন্টালে দিতে
                                        ইচ্ছুক?</label><br>
                                    {{$datum->interest_in_rental_service}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card  bg-default">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" style="text-align: center"> ড্রাইভার লাইসেন্স </label><br>
                                    @if ($datum->driving_license)
                                        <img src="{{asset('/upload/'.$datum->driving_license)}}" width="300px"
                                             height="300px" alt="">
                                    @else
                                        <img src="{{asset('/upload/driving_license.png')}}" width="300px"
                                             height="300px" alt="">
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for=""> গাড়ির রেজিস্ট্রেশন কাগজ </label><br>
                                    @if (isset($datum->registration_number))
                                        <img src="{{asset('/upload/'.$datum->registration_number)}}"
                                             width="300px"
                                             height="300px" alt="">
                                    @else
                                        <img src="{{asset('/upload/car_registration_number_image.png')}}"
                                             width="300px"
                                             height="300px"
                                             alt="">
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for=""> ইনসিওরেন্স কাগজ </label><br>
                                    @if ($datum->insurance_paper)
                                        <img src="{{asset('/upload/'.$datum->insurance_paper)}}" width="300px"
                                             height="300px" alt="">
                                    @else
                                        <img src="{{asset('/upload/insurance_paper.png')}}" width="300px"
                                             height="300px"
                                             alt="">
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for=""> ফিটনেস সার্টিফিকেট </label><br>
                                    @if ($datum->fitness_certificate)
                                        <img src="{{asset('/upload/'.$datum->fitness_certificate)}}"
                                             width="300px"
                                             height="300px" alt="">
                                    @else
                                        <img src="{{asset('/upload/fitness_certificate_image.png')}}" width="300px"
                                             height="300px" alt="">
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for=""> গাড়ির ছবি </label><br>
                                    @if ($datum->car_image)
                                        <img src="{{asset('/upload/'.$datum->car_image)}}" width="300px"
                                             height="300px" alt="">
                                    @else
                                        <img src="{{asset('/upload/car_image.png')}}" width="300px"
                                             height="300px" alt="">
                                    @endif
                                </div>
                                @if($datum->partner_type =='Fleet Owner')
                                    <div class="col-md-4">
                                        <label for=""> ট্যাক্স টোকেন </label><br>
                                        @if ($datum->tax_token)
                                            <img src="{{asset('/upload/'.$datum->tax_token)}}" width="300px"
                                                 height="300px" alt="">
                                        @else
                                            <img src="{{asset('/upload/TaxToken.png')}}" width="300px"
                                                 height="300px" alt="">
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

