<div class="row">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header" style="background-color: #eac861">
                <h3 class="card-title">Interested In Rental Service</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header" style="background-color:#cbe8b8">
                <h3 class="card-title">Partner Type</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="barChart-partner" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" style="background-color:#a39be4">
                <h3 class="card-title">Ride Sharing service Pie Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="pieChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header" style="background-color:#89d4e0">
                <h3 class="card-title">Owner Pie Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="pieChart-owner"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
        <div class="card">
            <div class="card-header" style="background-color:#f5dfe3">
                <h3 class="card-title">Driven By Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="areaChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card ">
            <div class="card-header" style="background-color: #a7a696">
                <h3 class="card-title">Location Wise Chart</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="donutChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>

    </div>

</div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

<script>
    //interested in rental service3
    $(function () {
        var ctx = document.getElementById('barChart').getContext('2d');
        var graphData = @json($interestedRental);
        const labels = [];
        const val = [];
        $.each(graphData, function (key, value) {
            labels.push(value.interest_in_rental_service);
            val.push(value.total);
        });

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Interest in Rental Service',
                    data: val,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Color of Cars',
                            color: '#911',
                            font: {
                                family: 'Comic Sans MS',
                                size: 20,
                                weight: 'bold',
                                lineHeight: 1.2,
                            },
                            padding: {top: 20, left: 0, right: 0, bottom: 0}
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Value',
                            color: '#191',
                            font: {
                                family: 'Times',
                                size: 20,
                                style: 'normal',
                                lineHeight: 1.2
                            },
                            padding: {top: 30, left: 0, right: 0, bottom: 0}
                        }
                    }
                }
            }
        });
    })
</script>
<script>
    //interested in rental service3
    $(function () {
        var ctx = document.getElementById('barChart').getContext('2d');
        var graphData = @json($interestedRental);
        const labels = [];
        const val = [];
        $.each(graphData, function (key, value) {
            labels.push(value.interest_in_rental_service);
            val.push(value.total);
        });

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Interest in Rental Service',
                    data: val,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Color of Cars',
                            color: '#911',
                            font: {
                                family: 'Comic Sans MS',
                                size: 20,
                                weight: 'bold',
                                lineHeight: 1.2,
                            },
                            padding: {top: 20, left: 0, right: 0, bottom: 0}
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Value',
                            color: '#191',
                            font: {
                                family: 'Times',
                                size: 20,
                                style: 'normal',
                                lineHeight: 1.2
                            },
                            padding: {top: 30, left: 0, right: 0, bottom: 0}
                        }
                    }
                }
            }
        });
    })

    //partner Type
    $(function () {
        var ctx = document.getElementById('barChart-partner').getContext('2d');
        var graphData = @json($partnerType);
        const labels = [];
        const val = [];
        $.each(graphData, function (key, value) {
            labels.push(value.partner_type);
            val.push(value.total);
        });

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Partner Type',
                    data: val,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Color of Cars',
                            color: '#911',
                            font: {
                                family: 'Comic Sans MS',
                                size: 20,
                                weight: 'bold',
                                lineHeight: 1.2,
                            },
                            padding: {top: 20, left: 0, right: 0, bottom: 0}
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Value',
                            color: '#191',
                            font: {
                                family: 'Times',
                                size: 20,
                                style: 'normal',
                                lineHeight: 1.2
                            },
                            padding: {top: 30, left: 0, right: 0, bottom: 0}
                        }
                    }
                }
            }
        });
    })

    //ride sharing service included or not
    $(function () {
        var areaChartCanvas = $("#areaChart").get(0).getContext('2d');
        var graphData = @json($rideShareIncluded);
        const labels = [];
        const val = [];
        $.each(graphData, function (key, value) {
            labels.push(value.is_ride_sharing_service_included);
            val.push(value.total);

        });
        var donutData = {
            labels: labels,
            datasets: [
                {
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: val
                },

            ]
        }
        var donutData = {
            labels: labels,
            datasets: [
                {
                    data: val,
                    backgroundColor: ['#17a2b8', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }
            ]
        }
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = donutData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })
    })

    //is owneer
    $(function () {
        var areaChartCanvas = $("#areaChart").get(0).getContext('2d');
        var graphData = @json($isOwner);
        const labels = [];
        const val = [];
        $.each(graphData, function (key, value) {

            labels.push(value.is_owner);
            val.push(value.total);

        });
        var donutData = {
            labels: labels,
            datasets: [
                {
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: val
                },

            ]
        }
        var donutData = {
            labels: labels,
            datasets: [
                {
                    data: val,
                    backgroundColor: ['#89d4e0', '#ffe0e6', '#3c8dbc', '#d2d6de'],
                }
            ]
        }
        var pieChartCanvas = $('#pieChart-owner').get(0).getContext('2d')
        var pieData = donutData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })
    })

    //driven by graph
    $(function () {
        var areaChartCanvas = $("#areaChart").get(0).getContext('2d');
        var graphData = @json($drivenBy);
        const labels = [];
        const val = [];
        $.each(graphData, function (key, value) {

            labels.push(value.is_driven_by);
            val.push(value.total);

        });
        var areaChartData = {
            labels: labels,
            datasets: [
                {
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: val
                },

            ]
        }
        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: true,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true,
                    }
                }]
            }
        }
        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })
    });

    //location wise graph
    $(function () {
        var areaChartCanvas = $("#areaChart").get(0).getContext('2d');
        var graphData = @json($placeWiseUser);
        const labels = [];
        const val = [];
        let sum = 0 ;
        $.each(graphData, function (key, value) {
           if(value.area !== null){
               val.push(value.total);
               labels.push(value.area.name);
           }

        });
        var areaChartData = {
            labels: labels,
            datasets: [
                {
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: val
                },

            ]
        }
        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: true,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true,
                    }
                }]
            }
        }
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: labels,
            datasets: [
                {
                    data: val,
                    backgroundColor: [
                        '#89d4e0', '#ffe0e6', '#e48fb6', '#9f77e8', '#4f98c3', '#dabd66',
                        '#FFC0CB', '#FFFAFA', '#000000', '#708090', '#778899', '#808080',
                        '#FFB6C1', '#D2691E', '#CD853F', '#B8860B', '#DAA520', '#F4A460',
                        '#FF69B4', '#BC8F8F', '#D2B48C', '#DEB887', '#F5DEB3', '#FFDEAD',
                        '#FF1493', '#191970', '#000080', '#00008B', '#00BFFF', '#87CEFA',
                        '#E6E6FA', '#4682B4', '#5F9EA0', '#00CED1', '#48D1CC', '#AFEEEE',
                        '#D8BFD8', '#00FFFF', '#008080', '#556B2F', '#6B8E23', '#006400',
                        '#696969', '#3CB371', '#90EE90', '#F0E68C', '#FFDAB9', '#FFD700',
                        '#000000', '#8A2BE2', '#663399', '#FA8072', '#FF6347', '#FF4500',


                    ],
                }
            ]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    });

</script>




