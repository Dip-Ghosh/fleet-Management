
@extends('layouts.admin.master')
@section('dashboard')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DashBoard</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
        <section class="content">

            <div class="container-fluid">

                <!-- counting start -->
               @include('counting',['userCounts'=>$userCount])
                <!-- counting end -->

                <!-- graph start -->
               @include('graph' ,[
                    'isOwner'=>$isOwner,
                    'drivenBy'=>$drivenBy,
                    'placeWiseUser'=>$placeWiseUser,
                    'interestedRental'=>$interestedRental,
                    'partnerType'=>$partnerType,
                    'rideShareIncluded'=>$rideShareIncluded
                    ])
                <!-- graph end -->




            </div>
        </section>

@endsection

