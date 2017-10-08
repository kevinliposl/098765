<?php
include_once 'public/header.php';
?>
<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Charts</h1>
        <span>Your Important Data on Interactive Charts</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Shortcodes</a></li>
            <li class="active">Charts</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="col_half" id="lineChart" style="opacity: 0;">
                <h3 class="center">Line Chart</h3>
                <canvas id="lineChartCanvas" width="547" height="300"></canvas>
            </div>

            <div class="col_half col_last" id="barChart" style="opacity: 0;">
                <h3 class="center">Bar Chart</h3>
                <canvas id="barChartCanvas" width="547" height="300"></canvas>
            </div>

            <div class="line"></div>

            <div class="col_half" id="radarChart" style="opacity: 0;">
                <h3 class="center">Radar Chart</h3>
                <canvas id="radarChartCanvas" width="547" height="300"></canvas>
            </div>

            <div class="col_half col_last" id="polarAreaChart" style="opacity: 0;">
                <h3 class="center">Polar Area Chart</h3>
                <canvas id="polarAreaChartCanvas" width="547" height="300"></canvas>
            </div>

            <div class="line"></div>

            <div class="col_half nobottommargin" id="pieChart" style="opacity: 0;">
                <h3 class="center">Pie Chart</h3>
                <canvas id="pieChartCanvas" width="547" height="300"></canvas>
            </div>

            <div class="col_half nobottommargin col_last" id="doughnutChart" style="opacity: 0;">
                <h3 class="center">Doughnut Chart</h3>
                <canvas id="doughnutChartCanvas" width="547" height="300"></canvas>
            </div>

            <div class="clear"></div>

        </div>

    </div>

</section><!-- #content end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>

<script type="text/javascript">

    jQuery(window).load(function () {
        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    data: [65, 59, 90, 81, 56, 55, 40]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    data: [28, 48, 40, 19, 96, 27, 100]
                },
                {
                    fillColor: "rgba(200,147,165,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    data: [50, 68, 17, 57, 24, 96, 100]
                }
            ]
        };

        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    data: [65, 59, 90, 81, 56, 55, 50]
                }
            ]

        };

        var radarChartData = {
            labels: ["A", "B", "C", "D", "E", "F", "G"],
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    data: [65, 59, 90, 81, 56, 55, 40]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    data: [28, 48, 40, 19, 96, 27, 100]
                }
            ]

        };

        var pieChartData = [
            {
                value: 30,
                color: "#F38630"
            },
            {
                value: 50,
                color: "#E0E4CC"
            },
            {
                value: 100,
                color: "#69D2E7"
            },
            {
                value: 45,
                color: "#1E73BE"
            }

        ];

        var polarAreaChartData = [
            {
                value: 62,
                color: "#D97041"
            },
            {
                value: 70,
                color: "#C7604C"
            },
            {
                value: 41,
                color: "#21323D"
            },
            {
                value: 24,
                color: "#9D9B7F"
            },
            {
                value: 55,
                color: "#7D4F6D"
            },
            {
                value: 18,
                color: "#584A5E"
            }
        ];

        var doughnutChartData = [
            {
                value: 30,
                color: "#F7464A"
            },
            {
                value: 50,
                color: "#46BFBD"
            },
            {
                value: 100,
                color: "#FDB45C"
            },
            {
                value: 40,
                color: "#949FB1"
            },
            {
                value: 120,
                color: "#4D5360"
            }
        ];

        var globalGraphSettings = {animation: Modernizr.canvas};

        function showLineChart() {
            var ctx = document.getElementById("lineChartCanvas").getContext("2d");
            new Chart(ctx).Line(lineChartData, globalGraphSettings);
        }

        function showBarChart() {
            var ctx = document.getElementById("barChartCanvas").getContext("2d");
            new Chart(ctx).Bar(barChartData, globalGraphSettings);
        }

        function showRadarChart() {
            var ctx = document.getElementById("radarChartCanvas").getContext("2d");
            new Chart(ctx).Radar(radarChartData, globalGraphSettings);
        }

        function showPolarAreaChart() {
            var ctx = document.getElementById("polarAreaChartCanvas").getContext("2d");
            new Chart(ctx).PolarArea(polarAreaChartData, globalGraphSettings);
        }

        function showPieChart() {
            var ctx = document.getElementById("pieChartCanvas").getContext("2d");
            new Chart(ctx).Pie(pieChartData, globalGraphSettings);
        }

        function showDoughnutChart() {
            var ctx = document.getElementById("doughnutChartCanvas").getContext("2d");
            new Chart(ctx).Doughnut(doughnutChartData, globalGraphSettings);
        }

        $('#lineChart').appear(function () {
            $(this).css({opacity: 1});
            setTimeout(showLineChart, 300);
        }, {accX: 0, accY: -155}, 'easeInCubic');

        $('#barChart').appear(function () {
            $(this).css({opacity: 1});
            setTimeout(showBarChart, 300);
        }, {accX: 0, accY: -155}, 'easeInCubic');

        $('#radarChart').appear(function () {
            $(this).css({opacity: 1});
            setTimeout(showRadarChart, 300);
        }, {accX: 0, accY: -155}, 'easeInCubic');

        $('#polarAreaChart').appear(function () {
            $(this).css({opacity: 1});
            setTimeout(showPolarAreaChart, 300);
        }, {accX: 0, accY: -155}, 'easeInCubic');

        $('#pieChart').appear(function () {
            $(this).css({opacity: 1});
            setTimeout(showPieChart, 300);
        }, {accX: 0, accY: -155}, 'easeInCubic');

        $('#doughnutChart').appear(function () {
            $(this).css({opacity: 1});
            setTimeout(showDoughnutChart, 300);
        }, {accX: 0, accY: -155}, 'easeInCubic');
    });

</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
