<div class="d-flex border-bottom border-dark pb-3">

    <i class="fas fa-book colorusam fa-lg fa-4x mx-5"></i>
    <h1 class="colorusam">Convenios</h1>

</div>
<div class="container d-flex d-flex justify-content-between mt-5">
    <h2>Información general</h2>
</div>

<div class="col-sm-12 p-0 m-0">

    <div class="card mb-3">
        <div class="card-body">

            <div class="row d-flex justify-content-between m-0">
                <div class="col-12 d-flex flex-wrap m-0">
                    <div class="col-md-1 col-sm-3 d-flex">
                        <div class="bold">#</div><?= " " . $item->id ?>
                    </div>
                    <div class="col-md-8 col-sm-6 d-flex"><?= $item->nombre ?></div>
                    <div class="col-md-2 col-sm-3 d-flex flex-wrap">
                        <div class="bold">Codigo: </div>
                        <div><?= $item->Codigo ?></div>
                    </div>
                </div>
            </div>

            <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                <div class="col-12 d-flex flex-wrap m-0">
                    <div class="col-md-2 col-sm-3 bold">Objetivo:</div>
                    <div class="col-md-10 col-sm-9"><?= $item->objetivo ?></div>
                </div>
            </div>

            <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                <div class="col-12 d-flex flex-wrap m-0">
                    <div class="col-md-2 col-sm-3 bold">Estado del proceso:</div>
                    <div class="col-md-4 col-sm-9"><?= $item->activo ?></div>
                    <div class="col-md-2 col-sm-3 bold">Estado del covenio:</div>
                    <div class="col-md-4 col-sm-9"><?= $item->estado ?></div>
                </div>
            </div>

            <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                <div class="col-12 d-flex flex-wrap m-0">
                    <div class="col-md-2 col-sm-3 bold">Clasificación:</div>
                    <div class="col-md-4 col-sm-9"><?= $item->clasificacion ?></div>
                    <div class="col-md-2 col-sm-3 bold">Area Tematica:</div>
                    <div class="col-md-4 col-sm-9"><?= $item->areatematica ?></div>
                </div>
            </div>

            <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                <div class="col-12 d-flex flex-wrap m-0">
                    <div class="col-md-2 col-sm-3 bold">Tipo de convenio:</div>
                    <div class="col-md-10 col-sm-9"><?= $item->tipo ?></div>
                </div>
            </div>

            <div>

            </div>

            <div class="col-12 d-flex flex-wrap p-0">
                <div class="col-md-4 col-sm-12 m-0 p-0">
                    <div class="row pt-4 d-flex justify-content-between m-0 p-0">
                        <div class="col-12 d-flex m-0">
                            <div class="col-12 bold">
                                Entidades
                            </div>
                        </div>
                    </div>
                    <?php if (count($entidades) > 0) { ?>
                        <div class="row pt-4 d-flex justify-content-between m-0 p-0">
                            <div class="col-12 d-flex m-0">
                                <div class="col-12 d-flex flex-wrap m-0">
                                    <?php
                                    foreach ($entidades as $entidad) {
                                        echo "<div class='mx-2 px-1 border'>" . $entidad->nombre . "</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                        echo ("<div class='mx-2 px-4'>Sin Entidades</div>");
                    } ?>
                </div>

                <div class="col-md-4 col-sm-12 m-0 p-0">
                    <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                        <div class="col-12 d-flex m-0">
                            <div class="col-12 bold">
                                Oficinas
                            </div>
                        </div>
                    </div>
                    <?php if (count($oficinas) > 0) { ?>
                        <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                            <div class="col-12 d-flex m-0">
                                <div class="col-12 d-flex flex-wrap m-0">
                                    <?php
                                    foreach ($oficinas as $oficina) {
                                        echo "<div class='mx-2 px-1 border'>" . $oficina->nombre . "</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                        echo ("<div class='mx-2 px-4'>Sin Oficinas</div>");
                    } ?>
                </div>

                <div class="col-md-4 col-sm-12 m-0 p-0">
                    <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                        <div class="col-12 d-flex m-0">
                            <div class="col-12 bold">
                                Facultad
                            </div>
                        </div>
                    </div>
                    <?php if (count($facultades) > 0) { ?>
                        <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                            <div class="col-12 d-flex m-0">
                                <div class="col-12 d-flex flex-wrap m-0">
                                    <?php
                                    foreach ($facultades as $facultad) {
                                        echo "<div class='mx-2 px-1 border'>" . $facultad->nombre . "</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                        echo (" <div class='mx-2 px-4'> Sin Facultades </div>");
                    } ?>

                </div>
            </div>

            <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                <div class="col-12 d-flex flex-wrap m-0">
                    <div class="col-md-2 col-sm-3 bold">Fecha de Inicio:</div>
                    <div class="col-md-4 col-sm-9"><?php echo (date("d-m-Y", strtotime($item->fechainicio))); ?></div>
                    <div class="col-md-2 col-sm-3 bold">Fecha de Finalización:</div>
                    <div class="col-md-4 col-sm-9"><?= $item->fechacaducidad ?></div>
                </div>
            </div>

            <?php if ($item->archivo != "no_archivo") { ?>
                <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                    <div class="col-12 d-flex flex-wrap m-0">
                        <div class="col-md-2 col-sm-3 bold">archivo:</div>
                        <div class="col-md-10 col-sm-9"> <a href="<?= base_url("assets/PDFs/") . $item->archivo ?>"><?= $item->archivo ?></a> </div>
                    </div>
                </div>
            <?php } ?>

            <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                <div class="col-12 d-flex justify-content-center m-0">
                    <div class="bold">Observaciones</div>
                </div>
            </div>

            <div class="row pt-4 d-flex justify-content-between col-12 m-0 p-0">
                <div class="col-12 d-flex flex-wrap m-0">
                    <div class="col-md-12 col-sm-12">
                        <?= $item->observaciones ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex justify-content-center w-100">
            <div>
                <a type="submit" href="<?= base_url() . 'convenios/' ?>" class="btn btn-lg btn-outline-primary">
                    Regresar
                </a>
            </div>
        </div>
    </div>

</div>