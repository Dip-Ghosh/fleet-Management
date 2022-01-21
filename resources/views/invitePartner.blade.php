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
    <style type="text/css">
        /* Smartphones (portrait and landscape) ----------- */
        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 49px;
            }
        }

        /* Smartphones (landscape) ----------- */
        @media only screen and (min-width: 321px) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 115px;
            }

        }

        /* Smartphones (portrait) ----------- */
        @media only screen and (max-width: 320px) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 44px;
            }
        }

        /* iPads (portrait and landscape) ----------- */
        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 53px;
            }
        }

        /* iPads (landscape) ----------- */
        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 53px;
            }
        }

        /* iPads (portrait) ----------- */
        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 53px;
            }
        }

        /**********
        iPad 3
        **********/
        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 2) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 53px;
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait) and (-webkit-min-device-pixel-ratio: 2) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 53px;
            }
        }

        /* Desktops and laptops ----------- */
        @media only screen  and (min-width: 1224px) {
            /* Styles */

        }

        /* Large screens ----------- */
        @media only screen  and (min-width: 1824px) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 55px;
            }
        }

        /* iPhone 4 ----------- */
        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 2) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 49px;
            }
        }

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (orientation: portrait) and (-webkit-min-device-pixel-ratio: 2) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 49px;
            }
        }

        /* iPhone 5 ----------- */
        @media only screen and (min-device-width: 320px) and (max-device-height: 568px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 49px;
            }
        }

        @media only screen and (min-device-width: 320px) and (max-device-height: 568px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 49px;
            }
        }

        /* iPhone 6 ----------- */
        @media only screen and (min-device-width: 375px) and (max-device-height: 667px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2) {
            /* Styles */
            .input-para {
                font-size: 15px;
                font-weight: bold;
                text-align: justify;
                margin-left: 34px;
            }
        }

        @media only screen and (min-device-width: 375px) and (max-device-height: 667px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2) {
            /* Styles */
        }

        /* iPhone 6+ ----------- */
        @media only screen and (min-device-width: 414px) and (max-device-height: 736px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2) {
            /* Styles */
        }

        @media only screen and (min-device-width: 414px) and (max-device-height: 736px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2) {
            /* Styles */
        }

        /* Samsung Galaxy S3 ----------- */
        @media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 14px;
            }
        }

        @media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 14px;
            }
        }

        /* Samsung Galaxy S4 ----------- */
        @media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 3) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 14px;
            }
        }

        @media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 3) {
            /* Styles */
            .input-para {
                font-size: 14px;
                font-weight: bold;
                text-align: justify;
                margin-left: 14px;
            }
        }

        /* Samsung Galaxy S5 ----------- */
        @media only screen and (min-device-width: 360px) and (max-device-height: 640px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 3) {
            /* Styles */
        }

        @media only screen and (min-device-width: 360px) and (max-device-height: 640px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 3) {
            /* Styles */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center" style="margin-top:15px">
        {{--            <div class="card" style=" border:2px solid #e8e3e875; border-radius:25px; box-shadow:3px 11px 8px  #00000033; ">--}}

        <div class="card-body login-card-body">
            <div class="login-logo" style="margin-top: 15px;align-content: center">
                <img src="{{asset('img/shuttle-logo.png')}}" alt="image-responsive" width="150px">
            </div>
            <hr style="box-shadow: 3px 1px 2px #00000033;">
            <h4 class="float-center" style="text-align: center;font-weight:bold">Trip Request</h4>
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
            @php

                $data = DB::table('trip_request_to_partners')
                      ->where('trip_request_id',request()->get('tr_id'))
                      ->where('partner_id',request()->get('p_id'))->first();
                       
                $pickUpTimes = App\Models\TripRequestPickupTime :: where('trip_request_id',request()->get('tr_id'))->select('type','time')->get();
                $pickUpTimesByTrip = App\Models\TripRequestPickupTime:: where('tr_request_to_partner_id',$data->id)->select('type','time')->get();

            @endphp
            <br>
            <form action="{{url('dashboard')}}" method="POST">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-4 text-left" style="font-weight: bold">Route Name</div>
                        <div class="col-8 text-right" id="route-name">{{isset($data->route_name)?$data->route_name:"N/A"}}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-8 text-left" style="font-weight: bold">Home PickUp Time</div>
                        <div class="col-4 text-right">{{isset($pickUpTimes)? date('h.i A ',strtotime($pickUpTimes[0]['time'])):  date('h.i A ',strtotime($pickUpTimesByTrip[0]['time']))}}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-8 text-left" style="font-weight: bold">Office PickUp Time</div>
                        <div class="col-4 text-right">{{isset($pickUpTimes)? date('h.i A ',strtotime($pickUpTimes[1]['time'])):  date('h.i A ',strtotime($pickUpTimesByTrip[1]['time']))}}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-8 text-left" style="font-weight: bold">Distance</div>
                        <div class="col-4 text-right">{{isset($data->distance)?$data->distance. " km ":"N/A"}}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-6 text-left" style="font-weight: bold">Weekdays</div>
                        <div class="col-6 text-right">{{isset($data->week_days)?$data->week_days:"N/A"}}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-8 text-left" style="font-weight: bold">Price(Monthly)</div>
                        <div class="col-4 text-right">{{isset($data->price)?number_format($data->price):"N/A" }} BDT</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-8 text-left" style="font-weight: bold">Bonus</div>
                        <div class="col-4 text-right">{{isset($data->bonus)?number_format($data->bonus):"N/A" }} BDT</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-8 text-left" style="font-weight: bold">Total Price</div>
                        <div class="col-4 text-right">{{isset($data->price)? number_format($data->price + $data->bonus) :"N/A" }} BDT</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-8 text-left" style="font-weight: bold">Instructions</div>
                        <div class="col-4 text-right">{{isset($data->instruction_for_sp)?$data->instruction_for_sp:"N/A"}}</div>
                    </div>
                    <br>
                    <div class="input-group mb-6">
                        <div class="input-group ">
                            <button type="button" id="submitButton" class="btn btn-info btn-block"
                                    style="border-radius:25px; box-shadow:0px 8px 5px  #00000033;">Interested
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>


<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $('#submitButton').on('click', function (e) {
        e.preventDefault();
        var appUrl = "{{env('APP_URL')}}";
        var url = appUrl + "/api/v2/partners/triprequests/invitations/response";
        var trip_request_id = "{{ request()->get('tr_id') }}";
        var partner_id = "{{ request()->get('p_id') }}";
        var data = {
            "_token": "{{ csrf_token() }}",
            "trip_request_id": trip_request_id,
            "partner_id": partner_id
        };
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                if (response.data == "Already Responded.") {
                    swal("Warning", response.data, "warning");

                } else {
                    swal("Thanks!", "You will be notified soon!", "success");
                }
                window.location.href = "https://www.shuttlebd.com/partner";
            },
            error: function () {
                swal("Error", "Unable to bring up the dialog.", "error");
            }
        });
    });
</script>
</body>
</html>
