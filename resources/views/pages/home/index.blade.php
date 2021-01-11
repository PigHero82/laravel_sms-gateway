@extends('layout.layout')

@section('title')
    Home
@endsection

@section('content')
    <!-- Card Statistic -->
    <section>
        <div class="row">
            <x-card-statistic class="col-lg-3 col-sm-6 col-12" title="Inbox" value="0" icon="icon-inbox" color="text-danger"/>
            <x-card-statistic class="col-lg-3 col-sm-6 col-12" title="Sent" value="0" icon="icon-send" color="text-primary"/>
            <x-card-statistic class="col-lg-3 col-sm-6 col-12" title="Signal" value="0" icon="icon-bar-chart" color="text-warning"/>
        </div>
    </section>
    <!--/ Card Statistic -->

    <!-- Statistic -->
    <section>
        <div class="row">
            <x-chart class="col-md-6" title="Chart Pesan Masuk" id="line-chart" classHeight="height-300"/>
            <x-chart class="col-md-6" title="Chart Pesan Terkirim" id="simple-pie-chart" classHeight="height-300"/>
        </div>
    </section>
    <!--/ Statistic -->

    <!-- Card Statistic -->
    <section>
        <div class="row">
            <x-card-statistic class="col-lg-3 col-sm-6 col-12" title="SMS Gagal" value="0" icon="icon-alert-octagon" color="text-danger"/>
            <x-card-statistic class="col-lg-3 col-sm-6 col-12" title="SMS Terjadwal" value="0" icon="icon-clock" color="text-primary"/>
            <x-card-statistic class="col-lg-3 col-sm-6 col-12" title="Kontak" value="0" icon="icon-users" color="text-success"/>
            <x-card-statistic class="col-lg-3 col-sm-6 col-12" title="Email" value="0" icon="icon-mail" color="text-warning"/>
        </div>
    </section>
    <!--/ Card Statistic -->
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script>
        var $primary = '#7367F0';
        var $success = '#28C76F';
        var $danger = '#EA5455';
        var $warning = '#FF9F43';
        var $label_color = '#1E1E1E';
        var grid_line_color = '#dae1e7';
        var scatter_grid_color = '#f3f3f3';
        var $scatter_point_light = '#D1D4DB';
        var $scatter_point_dark = '#5175E0';
        var $white = '#fff';
        var $black = '#000';

        var themeColors = [$primary, $success, $danger, $warning, $label_color];

        // Line Chart
        // ------------------------------------------
        //Get the context of the Chart canvas element we want to select
        var lineChartctx = $("#line-chart");

        // Chart Options
        var linechartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
            position: 'top',
            },
            hover: {
            mode: 'label'
            },
            scales: {
            xAxes: [{
                display: true,
                gridLines: {
                color: grid_line_color,
                },
                scaleLabel: {
                display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                color: grid_line_color,
                },
                scaleLabel: {
                display: true,
                }
            }]
            }
        };

        // Chart Data
        var linechartData = {
            labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
            datasets: [{
            label: "Africa",
            data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
            borderColor: $primary,
            fill: false
            }, {
            data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
            label: "Asia",
            borderColor: $success,
            fill: false
            }, {
            data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],
            label: "Europe",
            borderColor: $danger,
            fill: false
            }, {
            data: [40, 20, 10, 16, 24, 38, 74, 167, 508, 784],
            label: "Latin America",
            borderColor: $warning,
            fill: false
            }, {
            data: [6, 3, 2, 2, 7, 26, 82, 172, 312, 433],
            label: "North America",
            borderColor: $label_color,
            fill: false
            }]
        };

        var lineChartconfig = {
            type: 'line',

            // Chart Options
            options: linechartOptions,

            data: linechartData
        };

        // Create the chart
        var lineChart = new Chart(lineChartctx, lineChartconfig);


        // Pie Chart
        // --------------------------------
        //Get the context of the Chart canvas element we want to select
        var pieChartctx = $("#simple-pie-chart");

        // Chart Options
        var piechartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500
        };

        // Chart Data
        var piechartData = {
        labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
        datasets: [{
            label: "My First dataset",
            data: [2478, 5267, 734, 784, 433],
            backgroundColor: themeColors,
        }]
        };

        var pieChartconfig = {
        type: 'pie',

        // Chart Options
        options: piechartOptions,

        data: piechartData
        };

        // Create the chart
        var pieSimpleChart = new Chart(pieChartctx, pieChartconfig);
    </script>
@endsection