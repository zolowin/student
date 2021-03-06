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
                Thống kê danh sách trúng tuyển vào lớp 10 THPT Quốc Học Huế năm
            
                <select id="select-year" name="year" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="{{ route('years', 10) }}">2019 - 2020</option>
                    @for($i = 9; $i > 0; $i--)
                    {{$j = $i - 1}}
                    <option value="{{ route('years', $i) }}">
                        {{201 . $j . " - " . 201 . $i}}
                    </option>
                    @endfor
                </select>
            </div>
            <div class="card-body">
                <div class="">
                    <!-- <button class="btn btn-success" id="optGender">Theo giới tính</button>
                    <button class="btn btn-success" id="optMonth">Theo tháng</button>
                    <button class="btn btn-success" id="optQuarter">Theo quý</button> -->
                    <p class="float-right font-weight-bold">Tổng số học sinh : {{ $totalStudent }}</p>
                </div>
                <div id="gender" class="mt-2">
                    <canvas id="gender-chart"></canvas>
                    <input type="hidden" id="male" value="{{ count($maleChart) }}">
                    <input type="hidden" id="female" value="{{ count($femaleChart) }}">
                </div>
                <div id="month" class="mt-2">
                    <canvas id="month-chart"></canvas>
                    <input type="hidden" id="dataMaleMonth" value="{{json_encode($dataMaleMonth)}}">
                    <input type="hidden" id="dataFemaleMonth" value="{{json_encode($dataFemaleMonth)}}">
                </div>
                <div id="quarter" class="mt-2">
                    <canvas id="quarter-chart"></canvas>
                    <input type="hidden" id="dataQuarter" value="{{json_encode($dataQuarter)}}">
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
                "#FF6633",
                "#0099CC"
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
                    color: '#222222',
                    anchor: 'star',
                    align: 'between',
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


        var ctx = document.getElementById("gender-chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: data,
                labels: ['nam', 'nữ'],
            },
            options: options
        });
    </script>
    </hr>
    <script>
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        var ctx = document.getElementById("month-chart");
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
                            '#00CCFF',
                            '#00CCFF',
                            '#00CCFF',
                            '#00CCFF',
                            '#00CCFF',
                            '#00CCFF',
                            '#00CCFF',
                            '#00CCFF',
                            '#00CCFF',
                            '#00CCFF',
                            '#00CCFF',
                            '#00CCFF'
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
                            '#FFCC66',
                            '#FFCC66',
                            '#FFCC66',
                            '#FFCC66',
                            '#FFCC66',
                            '#FFCC66',
                            '#FFCC66',
                            '#FFCC66',
                            '#FFCC66',
                            '#FFCC66',
                            '#FFCC66',
                            '#FFCC66'
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
                    text: 'Theo tháng (số học sinh)'
                },
                legend: {
                    position: 'bottom',
                },
            }
        });
    </script>
    <script>
        var dataQuarter = JSON.parse($('#dataQuarter').val());

        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';
        var data = [{
            data: dataQuarter,
            labels: ["số học sinh"],
            backgroundColor: [
                "#EE0000",
                "#FF9933",
                "#99FF66",
                "#3399FF",
            ],
            borderColor: "#fff"
        }];

        var options = {
            responsive: true,
            title: {
                display: true,
                text: 'Theo quý (%)'
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
                    color: '#000000',
                    anchor: 'star',
                    align: 'beetween',
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


        var ctx = document.getElementById("quarter-chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: data,
                labels: ['Quý 1', 'Quý 2', 'Quý 3', 'Quý 4'],
            },
            options: options
        });
    </script>
    <script>
        // $(document).ready(function() {
        //     $("#month").hide();
        //     $("#quarter").hide();
        //     $("#optGender").css("background-color", "navy");
        // });

        // $(document).ready(function() {
        //     $("#optMonth").click(function() {
        //         $("#gender").hide();
        //         $("#quarter").hide();
        //         $("#month").show();
        //         $("#optMonth").css("background-color", "navy");
        //         $("#optGender").css("background-color", "green");
        //         $("#optQuarter").css("background-color", "green");
        //     });
        // });

        // $(document).ready(function() {
        //     $("#optGender").click(function() {
        //         $("#month").hide();
        //         $("#quarter").hide();
        //         $("#gender").show();
        //         $("#optGender").css("background-color", "navy");
        //         $("#optMonth").css("background-color", "green");
        //         $("#optQuarter").css("background-color", "green");
        //     });
        // });


        // $(document).ready(function() {
        //     $("#optQuarter").click(function() {
        //         $("#gender").hide();
        //         $("#month").hide();
        //         $("#quarter").show();
        //         $("#optQuarter").css("background-color", "navy");
        //         $("#optGender").css("background-color", "green");
        //         $("#optMonth").css("background-color", "green");
        //     });
        // });

        // let year = $('#year').val();
        
        $(document).ready(function() {
            console.log(window.location.href)
            if(window.location.href != 'http://127.0.0.1:8000/')
            document.getElementById('select-year').value = window.location.href;
        })
    </script>

</body>

</html>