<div>
    <div class="container d-flex flex-row justify-content-md-center pt-4 pb-3 border-bottom">
        <i class="fas fa-paste fa-lg fa-4x colorusam mr-5"></i>
        <?php if ($detail == 0) { ?>
            <h1 class="colorusam pt-3"> Detalle Actividades</h1>
        <?php }
        if ($detail == 1) { ?>
            <h1 class="colorusam pt-3"> Actualizar Actividades</h1>
        <?php } ?>
    </div>
</div>
<form class="container mx-25 px-25">
    <div class="container d-flex d-flex justify-content-between mt-5">
        <h2>Información general</h2>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="actividad" class="font-weight-bold">Actividad: </label>
        </div>
        <div class="col-10">
            <input type="text" id="actividad" value="<?= $edit->actividad; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="descripcion" class="font-weight-bold">Descripcion: </label>
        </div>
        <div class="col-10">
            <textarea class="form-control" id="descripcion" rows="4" required <?php if ($detail == 0) { ?>disabled<?php } ?>><?= $edit->descripcion; ?></textarea>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="fechaact" class="font-weight-bold">Fecha: </label>
        </div>
        <div class="col-4">
            <input type="date" id="fechaact" value="<?= $edit->fechaact; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
        </div>

        <div class="col-2">
            <label for="sel_cont" class="font-weight-bold">Convenios: </label>
        </div>
        <div class="col-4">
            <select <?php if ($detail == 0) { ?>disabled<?php } ?> class="js-example-basic-single form-control rounded-pill select" id="convenio">
                <option value="" hidden selected>-----------</option>
                <?php foreach ($convenio as $conv) { ?>
                    <option value="<?= $conv->id ?>" <?= $conv->id == $edit->convenio  ? 'selected' : '' ?>>
                        <?= $conv->Codigo . " || " . $conv->nombre ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="nombre_benef" class="font-weight-bold">Beneficiarios: </label>
        </div>
        <div class="col-10">
            <textarea class="form-control" id="beneficiarios" rows="4" required <?php if ($detail == 0) { ?>disabled<?php } ?>><?= $edit->beneficiarios; ?></textarea>
        </div>
    </div>

    <div class="ml-5">
        <div class="container d-flex justify-content-center mt-4 mb-4 ">
            <input type="hidden" id="id" value="<?= $edit->id; ?>">
            <?php if ($detail == 0) { ?>
                <?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
                    <a type="submit" href="<?= base_url() . 'actividades/obtener/' . $edit->id ?>" class="btn btn-lg btn-usam">
                        Actualizar Actividad
                    </a>
                <?php } ?>
            <?php }
            if ($detail == 1) { ?>
                <input type="button" class="btn btn-lg btn-usam" id="actualizar_actividad" value="Actualizar Actividad">
            <?php } ?>
            <br>
            <a type="submit" href="<?= base_url() . 'actividades/' ?>" class="btn btn-lg btn-outline-primary">
                Regresar
            </a>
        </div>
    </div>

</form>