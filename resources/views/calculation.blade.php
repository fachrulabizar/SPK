<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calculation - PT. Shiddiq Sarana Mulya</title>
    <link rel="shortcut icon" href="{{asset('guest/assets/images/logo.png')}}" />
    <link rel="stylesheet" href="{{asset('guest/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/global.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="shortcut icon" href="{{asset('admin/images/logo.png')}}" />

    <!-- hightchart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <style>
    .highcharts-figure,
    .highcharts-data-table table {
        margin-top: 30px;
    }

    .reveal h1 {
        margin-top: 80px;
    }
    </style>
</head>

<body>
    <!--HamBurger Icon-->
    <div class="bars" id="nav-action">
        <span class="bar"> </span>
    </div>

    <!--Navbar Links-->
    <nav id="nav">
        <ul>
            <li class="shape-circle circle-two">
                @if(auth()->user())
                <a href="{{url('/dashboard')}}">Dashboard</a>
                @else
                <a href="{{url('/login')}}">Login</a>
                @endif
            </li>
            <li class="shape-circle circle-three"><a href="{{url('/kriteria')}}">Kriteria</a></li>
            <li class="shape-circle circle-three"><a href="{{url('/calculation')}}">Calculation</a></li>
            <li class="shape-circle circle-five"><a href="/">Home</a></li>
        </ul>
    </nav>

    <!--Main Body Content-->
    <div class="container mb-5">
        <div class="row reveal">
            <h1 class="text-center">DATA PERHITUNGAN PT. SHIDDIQ SARANA MULYA</h1>
            <hr/>
        </div>
        <div class="row reveal">
            <figure class="highcharts-figure">
                <div id="chart1" style="height: 500px; margin:auto;"></div>
            </figure>
        </div>
        <div class="row reveal2">
            <figure class="highcharts-figure">
                <div id="chart2" style="height: 500px; margin:auto;"></div>
            </figure>
        </div>
    </div>
</body>

<script>
// Setting up the Variables
var bars = document.getElementById("nav-action");
var nav = document.getElementById("nav");


//setting up the listener
bars.addEventListener("click", barClicked, false);


//setting up the clicked Effect
function barClicked() {
    bars.classList.toggle('active');
    nav.classList.toggle('visible');
}

function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 0;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}

window.addEventListener("load", reveal);

function reveal2() {
    var reveals = document.querySelectorAll(".reveal2");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 0;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        }
    }
}

window.addEventListener("scroll", reveal2);
</script>

<script type="text/javascript">
var chartCategories1 = @json($dataAlternatifNama);
var chartData1 = @json($dataAlternatifData);
Highcharts.chart('chart1', {
    chart: {
        type: 'column',
        backgroundColor: '#FCFFC5',
        borderRadius: 10
    },
    title: {
        text: 'Hasil Perhitungan PT. Shiddiq Sarana Mulya',
        align: 'center'
    },
    xAxis: {
        categories: chartCategories1,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai Akhir'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:12px; height:40px;">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color}; padding:0; text-align:center; "></td>' +
            '<td style="padding:0; font-size:12px;"><b>Nilai Akhir&nbsp;{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Nilai Akhir',
        color: '#3b3b3b',
        data: chartData1
    }]
});
</script>

<script type="text/javascript">
var chartCategories2 = @json($sepuluhTerbesarNama);
var chartData2 = @json($sepuluhTerbesarData);
Highcharts.chart('chart2', {
    chart: {
        type: 'column',
        backgroundColor: '#FCFFC5',
        borderRadius: 10
    },
    title: {
        text: 'Ranking 10 Terbesar PT. Shiddiq Sarana Mulya',
        align: 'center'
    },
    xAxis: {
        categories: chartCategories2,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai Akhir'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:12px;">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color}; padding:0; text-align:center;"></td>' +
            '<td style="padding:0; font-size:12px;"><b>Nilai Akhir&nbsp;{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Nilai Akhir',
        color: '#3b3b3b',
        data: chartData2
    }]
});
</script>

</html>