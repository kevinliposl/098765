<?php
include_once 'public/header.php';
?>
<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Reporte</h1>
        <span>Sus Datos Importantes en Gráficos Interactivos</span>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acctitle">
                    <div class="acc_content clearfix">
                        <div id="canvas-holder">                            
                            <canvas id="chart-area" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->

</div><!-- #wrapper end -->

<script>
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                    data: [
                        10,
                        40,
                        30,
                        20,
                        0
                    ],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue
                    ],
                    label: 'Dataset 1'
                }],
            labels: [
                "Red",
                "Orange",
                "Yellow",
                "Green",
                "Blue"
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right'
            }
        }
    };

    window.onload = function () {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };

</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
