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
                        <div class="white-section">
                            <select id="form-report" class="selectpicker form-control" data-live-search="true">
                                <option value="null" data-tokens>Seleccione un Reporte</option>
                                <option value="usuariosActivos" data-tokens>Usuarios Activos</option>
                            </select>
                        </div>
                        <div class="line"></div>
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

    var config;
    var myPie;

    $("#form-report").change(function () {
        var option = $('#form-report').val();

        if (option === "usuariosActivos") {
            $.post("?controller=Report&action=selectUserState", {}, function (data) {

                config = {
                    type: 'pie',
                    data: {
                        datasets: [{
                                data: [
                                    data[0].data,
                                    data[1].data
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
                            "Inactivos ",
                            "Activos "
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'right'
                        }
                    }
                };

                var ctx = document.getElementById("chart-area").getContext("2d");
                myPie = new Chart(ctx, config);

//            }, "json");

//            config.data.datasets.forEach(function (dataset) {
//                dataset.data = dataset.data.map(function () {
//                    return 30;
//                });
//            });
//            chart.update();
//            $.post("?controller=Admin&action=deleteAdmin", null, function (data) {
            }, "json");
        } else if (option === "null") {
            config.data.datasets.splice(0, 1);
            myPie.update();
        }

    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
