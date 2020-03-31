<!DOCTYPE html>
<html>

<head>
    <title>Thống kê danh sách trúng tuyển vào lớp 10 THPT Quốc Học Huế năm 2016-2017</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Thống kê danh sách trúng tuyển vào lớp 10 THPT Quốc Học Huế năm 2016-2017
            </div>
            <div class="card-body">
                <div class="text-center">
                    <button class="btn btn-success" id="optGender">Theo giới tính</button>
                    <button class="btn btn-success" id="optMonth">Theo tháng sinh</button>
                    <button class="btn btn-success" id="optQuarter">Theo quý sinh</button>

                </div>
                <div id="gender">
                    <canvas id="pie-chart"></canvas>
                    <input type="hidden" id="male" value="{{ count($maleChart) }}">
                    <input type="hidden" id="female" value="{{ count($femaleChart) }}">
                </div>
                <div id="month">
                    <canvas id="bar-chart"></canvas>
                    <input type="hidden" id="dataMaleMonth" value="{{json_encode($dataMaleMonth)}}">
                    <input type="hidden" id="dataFemaleMonth" value="{{json_encode($dataFemaleMonth)}}">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        let bienX = +[$('#male').val()];
        let bienY = +[$('#female').val()];

        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';
        var data = [{
            data: [bienX, bienY],
            labels: ["số học sinh"],
            backgroundColor: [
                "#B27200",
                "#d21243"
            ],
            borderColor: "#fff"
        }];

        var options = {
            responsive: true,
            title: {
                display: true,
                text: 'Theo giới tính (%)'
            },
            legend: {
                position: 'bottom',
            },
            tooltips: {
                enabled: true
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                        let sum = 0;
                        let dataArr = ctx.chart.data.datasets[0].data;
                        dataArr.map(data => {
                            sum += data;
                        });
                        let percentage = (value * 100 / sum).toFixed(0) + "%";
                        return percentage;
                    },
                    color: '#fff',
                    anchor: 'end',
                    align: 'start',
                    offset: -18,
                    borderWidth: 2,
                    borderColor: '#fff',
                    borderRadius: 25,
                    backgroundColor: (context) => {
                        return context.dataset.backgroundColor;
                    }

                }
            }
        };


        var ctx = document.getElementById("pie-chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: data,
                labels: ['nam', 'nữ'],
            },
            options: options
        });
    </script>
    <script>
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';
        
        var ctx = document.getElementById("bar-chart");
        dataMaleMonth = JSON.parse($('#dataMaleMonth').val());
        dataFemaleMonth = JSON.parse($('#dataFemaleMonth').val());

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                        label: 'Nam',
                        data: dataMaleMonth,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 2
                    },
                    {
                        label: 'Nữ',
                        data: dataFemaleMonth,
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]

                },
                title: {
                    display: true,
                    text: 'Theo tháng sinh (số học sinh)'
                },
                legend: {
                    position: 'bottom',
                },
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#month").hide();
            $("#optGender").css( "background-color", "navy");
        });

        $(document).ready(function() {
            $("#optMonth").click(function() {
                $("#gender").hide();
                $("#month").show();
                $("#optMonth").css( "background-color", "navy");
                $("#optGender").css( "background-color", "green");
            });
        });

        $(document).ready(function() {
            $("#optGender").click(function() {
                $("#month").hide();
                $("#gender").show();
                $("#optGender").css( "background-color", "navy");
                $("#optMonth").css( "background-color", "green");
            });
        });
    </script>

</body>

</html>