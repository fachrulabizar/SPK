@extends('dashboard.master')
@section('title', 'Dashboard - PT. Shiddiq Sarana Mulya')
@section('custom-css')
<style>
.pegawai img {
    position: relative;
    width: 500px;
    margin: auto;
    animation-name: pegawai;
    animation-duration: 1s;}

.ranking img {
    width: 300px;
    margin: auto;
    -webkit-animation: ranking 3s;
}

@keyframes pegawai {
    0% {
        top: 200px;
    }
    100% {
        top: 0px;
    }
}
@-webkit-keyframes ranking {
    0% {
        -webkit-transform: rotateY(0deg);
    }

    100% {
        -webkit-transform: rotateY(-360deg);
    }
}

@media only screen and (min-width: 400px) and (max-width: 767px) {
    .marginResponsive {
        margin-top: 25px;
    }
}
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 col-md-6 grid-margin marginResponsive">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center pegawai">
                        <img src="{{asset('guest/assets/images/pegawai.png')}}" width="100%" height="300px">
                        <h4>Jumlah Pegawai : {{$jumlah_pegawai}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center ranking mt-4">
                        <img src="{{asset('guest/assets/images/ranking.png')}}" width="100%" height="260px">
                        <h4 class="mt-3">{{$ranking1->nama}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <figure class="highcharts-figure">
                            <div id="chart1" style="height: 500px; margin:auto;"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- hightchart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
@section('script')
<script type="text/javascript">
var chartCategories = @json($sepuluhTerbesarNama);
var chartData = @json($sepuluhTerbesarData);
Highcharts.chart('chart1', {
    chart: {
        type: 'column',
        borderRadius: 10
    },
    title: {
        text: 'Ranking 10 Terbesar',
        align: 'center'
    },
    xAxis: {
        categories: chartCategories,
        crosshair: true
    },
    yAxis: {
        min: 0,
        max: 1,
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
        color: '#F3CB51',
        data: chartData
    }]
});
</script>
@endsection