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
                                data[1].data,
                                data[2].data
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
                        data[0].permissions,
                        data[1].permissions,
                        data[2].permissions
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

        }, "json");
    } else if (option === "") {
        $.post("?controller=Report&action=selectUserState", {}, function (data) {

            config = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: [
                                data[0].data,
                                data[1].data,
                                data[2].data
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
                        data[0].permissions,
                        data[1].permissions,
                        data[2].permissions
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
        }, "json");
    } else if (option === "null") {
        config.data.datasets.splice(0, 1);
        myPie.update();
    }

});

