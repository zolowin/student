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
                <canvas id="myChart"></canvas>
                <input type="hidden" id="male" value="{{ count($maleChart) }}">
                <input type="hidden" id="female" value="{{ count($femaleChart) }}">
            </div>
        </div>
    </div>

    <script>
        let bienY = [$('#male').val(), $('#female').val()];
        let myChart = document.getElementById('myChart').getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let gender_Chart = new Chart(myChart, {
            type: 'pie',
            data: {
                labels: ['nam', 'nữ'],
                datasets: [{
                    label: 'số học sinh',
                    data: bienY,
                    backgroundColor: ['khaki', 'cyan']
                }]
            },
            option: {
                title: {
                    display: true,
                    text: 'Danh sách học sinh trúng tuyển vào lớp 10 Quốc Học theo giới tính',
                    fontSize: 25
                }
            }
        });
    </script>

</body>

</html>