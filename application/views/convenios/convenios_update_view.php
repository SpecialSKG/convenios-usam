<div class="d-flex border-bottom border-dark pb-3">

    <i class="fas fa-book colorusam fa-lg fa-4x mx-5"></i>
    <h1 class="colorusam">Convenios</h1>

</div>
<form method="post" action="../../convenios/actualizar" class="mt-0 pt-0 pb-5" enctype="multipart/form-data">
    <div class="container d-flex d-flex justify-content-between mt-5">
        <h2>Información general</h2>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap justify-content-between col-12">
            <div class="col-md-1 col-sm-12">#</div>
            <input class="col-md-5 col-sm-12 form-control rounded-pill" type="text" name="idconvenio" id="idconvenio" readonly value="<?= $convenio->id ?>">
            <div class="col-md-1 col-sm-12">codigo: </div>
            <input class="col-md-5 col-sm-12 form-control rounded-pill" type="text" name="codigo" id="codigo" readonly value="<?= $convenio->Codigo ?>">
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-md-2 col-sm-12 font-weight-bold">Nombre: </div>
            <input class="col-md-10 col-sm-12 form-control rounded-pill" type="text" name="nombre" id="nombre" required='true' value="<?= $convenio->nombre ?>">
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-md-2 col-sm-12 font-weight-bold">Objetivos de Convenio: </div>
            <input class="col-md-10 col-sm-12 form-control rounded-pill" type="text" name="obj" id="obj" required='true' value="<?= $convenio->objetivo ?>">
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-md-2 col-sm-12 font-weight-bold">Entidad: </div>
            <select class="col-md-8 col-sm-8 form-control rounded-pill" name="selectentidad" id="selectentidad">
                <!--TODO llenar este select de forma dinamica con el contenido de las entidades-->
                <?php
                foreach ($entidades as $entidad) {
                    if ($entidad->activo == 1) {
                ?>
                        <option value="<?= $entidad->id ?>"><?= $entidad->nombre ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <div class="d-flex flex-wrap col-md-2 col-sm-4">
                <div name="insertarEntidad" id="insertarEntidad" class="btn btn-usam"><i class="fas fa-folder-plus"></i></div>
            </div>
        </div>
    </div>

    <div class="row pt-3 ml-5" id="entidadesConvenioLista" name="entidadesConvenioLista">
        <!--TODO llenar esta parte con el contenido de la tabla temp-entidades -->
    </div>

    <div class="row pt-5">
        <div class="d-flex col-12 flex-wrap">
            <div class="col-md-2 col-sm-12 font-weight-bold">Areas Academicas: </div>
            <select class="col-md-8 col-sm-8 form-control rounded-pill" name="selectfacultad" id="selectfacultad">
                <!--TODO llenar este select de forma dinamica con el contenido de las Facultades-->
                <?php foreach ($facultades as $facultad) {
                    if ($facultad->activo == 1) {
                ?>
                        <option value="<?= $facultad->codigo ?>"><?= $facultad->nombre ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <div class="d-flex flex-wrap col-md-2 col-sm-4">
                <div id="insertarFacultad" name="insertarFacultad" class="btn btn-usam"><i class="fas fa-folder-plus"></i></div>
            </div>
        </div>
    </div>

    <div class="row pt-3 ml-5" id="FacultadListaConvenios" name="FacultadListaConvenios">
        <!--TODO llenar esta parte con el contenido de la tabla temp-Facultades -->
    </div>

    <div class="row pt-5">
        <div class="d-flex col-12 flex-wrap">
            <div class="col-md-2 col-sm-12 font-weight-bold">Áreas Administrativas: </div>
            <select class="col-md-8 col-sm-8 form-control rounded-pill" name="selectoficina" id="selectoficina">
                <!--TODO llenar este select de forma dinamica con el contenido de las Oficina-->
                <?php foreach ($oficinas as $oficina) {
                    if ($oficina->activo == 1) { ?>
                        <option value="<?= $oficina->codigo ?>"><?= $oficina->nombre ?></option>
                <?php }
                } ?>
            </select>
            <div class="d-flex flex-wrap col-md-2 col-sm-4">
                <div id="insertarOficina" name="insertarOficina" class="btn btn-usam"><i class="fas fa-folder-plus"></i></div>
            </div>
        </div>
    </div>

    <div class="row pt-3 ml-5" id="oficinaListaConvenio" name="oficinaListaConvenio">
        <!--TODO llenar esta parte con el contenido de la tabla temp-Oficina -->
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-md-2 col-sm-12 font-weight-bold">
                Clasificacion :
            </div>
            <select class="col-md-10 col-sm-12 form-control rounded-pill" name="selectclasificacion" id="selectclasificacion">
                <option value="<?= $convenio->clasificacion ?>" selected><?= $convenio->clasificacion ?></option>
                <option value="Acuerdo de Colaboración">Acuerdo de Colaboración</option>
                <option value="Acuerdo de Cooperación">Acuerdo de Cooperación</option>
                <option value="Convenio de Colaboración">Convenio de Colaboración</option>
                <option value="Convenio de Cooperación Interinstitucional">Convenio de Cooperación Interinstitucional</option>
                <option value="Convenio de Cooperación">Convenio de Cooperación</option>
                <option value="Convenio de Beneficios">Convenio de Beneficios</option>
                <option value="Convenio de Becas">Convenio de Becas</option>
                <option value="Convenio de Becas y Beneficios">Convenio de Becas y Beneficios </option>
                <option value="Carta de Entendimiento">Carta de Entendimiento</option>
                <option value="Carta de Acuerdo">Carta de Acuerdo</option>
                <option value="Carta de Compromiso">Carta de Compromiso</option>
                <option value="Memorándum de Entendimiento">Memorándum de Entendimiento</option>
                <option value="Otro">Otro</option>

            </select>
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-md-2 col-sm-12 font-weight-bold">
                Area Tematica :
            </div>
            <select class="col-md-10 col-sm-12 form-control rounded-pill" name="selecttematica" id="selecttematica">
                <option value="<?= $convenio->areatematica ?>" selected><?= $convenio->areatematica ?></option>
                <option value="Investigación">Investigación</option>
                <option value="Docencia">Docencia</option>
                <option value="Proyección Social">Proyección Social</option>
                <option value="Extensión Universitaria">Extensión Universitaria</option>
                <option value="Becas">Becas</option>
                <option value="Beneficios">Beneficios</option>
                <option value="Becas y Beneficios">Becas y Beneficios</option>
            </select>
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-md-2 col-sm-12 font-weight-bold">
                Tipo de Convenio :
            </div>
            <select class="col-md-10 col-sm-12 form-control rounded-pill" name="selecttipoconvenio" id="selecttipoconvenio">
                <option value="<?= $convenio->tipo ?>" selected><?= $convenio->tipo ?></option>

                <option value="Marco">Marco</option>
                <option value="Especifico">Especifico</option>
            </select>
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-md-2 col-sm-12 font-weight-bold">
                Estado del proceso :
            </div>
            <select class="col-md-10 col-sm-12 form-control rounded-pill" name="selectproceso" id="selectproceso">
                <option value="<?= $convenio->activo ?>" selected><?= $convenio->activo ?></option>
                <option value="Fecha de inicio">Inicio</option>
                <option value="Planeación">Planeación</option>
                <option value="Proceso">Proceso</option>
                <option value="Firmado">Firmado</option>
            </select>
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-ms-12 col-md-2 font-weight-bold">
                Estado del Convenio:
            </div>
            <select class="col-ms-12 col-md-10 form-control rounded-pill" name="selectestado" id="selectestado">
                <option value="<?= $convenio->estado ?>" selected><?= $convenio->estado ?></option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
                <option value="Descartado">Descartado</option>
            </select>
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-ms-12 col-md-2 font-weight-bold">
                Fecha de inicio:
            </div>
            <input class="col-sm-12 col-md-10 form-control rounded-pill" type="date" name="fechainicio" id="fechainicio" required='true' value="<?= $convenio->fechainicio ?>">
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-ms-12 col-md-2 font-weight-bold">
                Fecha de finalización:
            </div>
            <input class="col-ms-12 col-md-10 form-control rounded-pill" type="date" name="fechafinalizar" id="fechafinalizar" required='true' value="<?= $convenio->fechacaducidad ?>">
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex justify-content-center w-100">
            <div class="mr-4 w-10 h-100 d-flex justify-content-center align-items-center font-weight-bold">
                Subir PDF
            </div>
            <div>
                <input type="file" class="btn btn-light" id="archivo" name="archivo"></input>

                <input type="hidden" name="archivold" id="archivold" value="<?= $convenio->archivo ?>">
                <?php
                if (file_exists('assets/PDFs/' . $convenio->archivo)) {
                ?>
                    <a href="<?php echo (base_url() . 'assets/PDFs/' . $convenio->archivo); ?>"><?= $convenio->archivo ?></a>
                <?php
                }
                ?>

            </div>
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex flex-wrap col-12">
            <div class="col-ms-12 col-md-2 font-weight-bold">
                Observaciones:
            </div>
            <textarea class="col-ms-12 col-md-10 form-control rounded" type="text" name="observaciones" id="observaciones" required='true' rows="4" cols="50"><?= $convenio->observaciones ?></textarea>
        </div>
    </div>

    <div class="row pt-5">
        <div class="d-flex justify-content-center w-100">
            <div>
                <input type="submit" class="btn btn-usam " id="insertar" name="insertar" style="font-size: 30px;" value="Guardar Convenio" />

                <a type="submit" href="<?= base_url() . 'convenios/' ?>" class="btn btn-lg btn-outline-primary">
                    Regresar
                </a>
            </div>
        </div>
    </div>

</form>

<script src="<?= base_url() . 'assets/js/select2.min.js' ?>"></script>