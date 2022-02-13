<link type="text/css" rel="stylesheet" href="<?= base_url() . 'assets/css/dashboard.css' ?>">
</link>
<div class="w-100 pr-5">

    <div class="row ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url('dashboard/conveniosPorExpirar') ?>" class="linksutil">
                        <div class="font-weight-bold mx-auto letragrande text-center">
                            <i class="fas fa-exclamation-circle text-warning"></i> Convenios por expirar: <?= $dataDashboard->convenios_por_vencer ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="linksutil">
                        <div class="font-weight-bold mx-auto letragrande text-center">
                            <i class="fas fa-calendar-alt text-info"></i> Actividades próximas: <?= $dataDashboard->proximas_actividades ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="graficas"></div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <canvas id="facultades"></canvas>
                    <div class="card-title mx-auto text-center mt-2 font-weight-bold"> <i class="fas fa-graduation-cap fa-lg"></i> Facultades: <?= $dataDashboard->facultades ?></div>
                    <div class="card-title mx-auto text-center mb-0">Facultades activas: <?= $dataDashboard->facultades_activas ?></div>
                    <div class="card-title mx-auto text-center mb-0">Facultades inactivas: <?php echo ($dataDashboard->facultades - $dataDashboard->facultades_activas) ?> </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <canvas id="entidades"></canvas>
                    <div class="card-title mx-auto text-center mt-2 font-weight-bold"><i class="fas fa-industry "></i> Entidades <?= $dataDashboard->entidades ?></div>
                    <div class="card-title mx-auto text-center mb-0">Entidades activas: <?= $dataDashboard->entidades_activas ?></div>
                    <div class="card-title mx-auto text-center mb-0">Entidades inactivas: <?php echo ($dataDashboard->entidades - $dataDashboard->entidades_activas) ?> </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <canvas id="convenios"></canvas>
                    <div class="card-title mx-auto text-center mt-2 font-weight-bold"><i class="fas fa-file"></i> Convenios: <?= $dataDashboard->convenios ?></div>
                    <div class="card-title mx-auto text-center mb-0">Convenios activos: <?= $dataDashboard->convenios_activos ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <h4 class="text-center my-2"><strong>Top 10</strong></h4>
                <div class="card-title mx-auto text-center mb-0">Países con más convenios</div>
                <div class="card-body" style="position: relative; ">
                    <canvas id="toppaises" style="height:40vh; width:80vw"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?= base_url() . 'assets/js/chart.min.js' ?>"></script>
<script>
    <?php
    $nombrePaises = "";
    $cantConvenios = "";
    foreach ($dataTopPaises as $top) {
        $nombrePaises =  $nombrePaises . '"' . $top->pais . '"' . " ,";
        $cantConvenios = $cantConvenios . $top->cant_convenios . " ,";
    }
    $nombrePaises = substr($nombrePaises, 0, -2);
    $cantConvenios = substr($cantConvenios, 0, -2);
    ?>
    var tp = document.getElementById("toppaises").getContext("2d");
    var toppaisesChart = new Chart(tp, {
        type: 'bar',
        data: {
            labels: [<?= $nombrePaises ?>],
            datasets: [{
                label: "Países",
                data: [<?= $cantConvenios ?>],
                backgroundColor: "#31417f",
                hoverBackgroundColor: "#6475a4"
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            title: {
                display: false
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    var f = document.getElementById("facultades").getContext('2d');
    var facultadesChart = new Chart(f, {
        type: 'doughnut',
        data: {
            labels: ["Facultades Activas", "Facultades Inactivas"],
            datasets: [{
                data: [<?= $dataDashboard->facultades_activas ?>, <?php echo ($dataDashboard->facultades - $dataDashboard->facultades_activas) ?>],
                backgroundColor: ["#31417f", "#8a3d23"],
                hoverBackgroundColor: ["#6475a4", "#887077"]
            }]
        },
        options: {
            responsive: true
        }
    });

    var e = document.getElementById("entidades").getContext('2d');
    var entidadesChart = new Chart(e, {
        type: 'doughnut',
        data: {
            labels: ["Entidades Activas", "Entidades Inactivas"],
            datasets: [{
                data: [<?= $dataDashboard->entidades_activas ?>, <?php echo ($dataDashboard->entidades - $dataDashboard->entidades_activas) ?>],
                backgroundColor: ["#31417f", "#8a3d23"],
                hoverBackgroundColor: ["#6475a4", "#887077"]
            }]
        },
        options: {
            responsive: true
        }
    });

    var e = document.getElementById("convenios").getContext('2d');
    var conveniosChart = new Chart(e, {
        type: 'doughnut',
        data: {
            labels: ["Convenios Activos", "Convenios Inactivos"],
            datasets: [{
                data: [<?= $dataDashboard->convenios_activos ?>, <?php echo ($dataDashboard->convenios - $dataDashboard->convenios_activos) ?>],
                backgroundColor: ["#31417f", "#8a3d23"],
                hoverBackgroundColor: ["#6475a4", "#887077"]
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
<!--
facultades, facultades_activas, entidades, entidades_activas, convenios, convenios_activos, convenios_por_vencer, proximas_actividades
-->