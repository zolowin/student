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
                
                <canvas id="pie-chart"></canvas>
                <input type="hidden" id="male" value="{{ count($maleChart) }}">
                <input type="hidden" id="female" value="{{ count($femaleChart) }}">
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
            responsive : true,
            title : {
                display : true,
                text : 'Theo giới tính (%)'
            },
            legend : {
                position : 'bottom',
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
                        let percentage = (value*100 / sum).toFixed(0)+"%";
                        return percentage;
                    },
                    color: '#fff',
                    anchor : 'end',
                    align : 'start',
                    offset : -18,
                    borderWidth : 2,
                    borderColor : '#fff',
                    borderRadius : 25,
                    backgroundColor : (context) => {
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
                labels : ['nam', 'nữ'],
            },
            options: options
        });


    </script>

</body>

</html>