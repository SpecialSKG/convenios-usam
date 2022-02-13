<div>
    <div class="container d-flex flex-row justify-content-md-center pt-4 pb-3 border-bottom">
        <i class="fas fa-users fa-lg fa-4x colorusam mr-5"></i>
        <h1 class="colorusam pt-3"> Usuario</h1>
    </div>
</div>
<form class="container mx-25 px-25">
    <div class="container d-flex d-flex justify-content-between mt-5">
        <h2>Información general</h2>
    </div>


    <div class="row mt-3">
        <div class="col-2">
            <label for="actividad" class="font-weight-bold">Nombre: </label>
        </div>
        <div class="col-4">
            <input type="text" id="nombre_user" value="<?= $edit->nombre_user; ?>" <?php if ($detail == 0) { ?>disabled<?php } ?> class="form-control rounded-pill" required />
        </div>

        <div class="col-2">
            <label for="descripcion" class="font-weight-bold">Usuario: </label>
        </div>
        <div class="col-4">
            <input type="text" id="user" value="<?= $edit->user; ?>" <?php if ($detail == 0) { ?>disabled<?php } ?> class="form-control rounded-pill" required />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="descripcion" class="font-weight-bold">Contraseña: </label>
        </div>
        <div class="col-4">
            <input type="text" id="pass" value="<?= base64_decode($edit->pass); ?>" <?php if ($detail == 0) { ?>disabled<?php } ?> class="form-control rounded-pill" required />
        </div>

        <div class="col-2">
            <label for="sel_cont" class="font-weight-bold">Roles: </label>
        </div>
        <div class="col-4">
            <select class="js-example-basic-single form-control rounded-pill select" id="rol_" <?php if ($detail == 0) { ?>disabled<?php } ?>>
                <option value="" hidden selected>-----------</option>
                <?php foreach ($rol as $r) { ?>
                    <option value="<?= $r->id_rol ?>" <?= $r->id_rol == $edit->rol_   ? 'selected' : '' ?>>
                        <?= $r->rol ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="ml-5">
        <div class="container d-flex justify-content-center mt-4 mb-4 ">
            <input type="hidden" id="id_user" value="<?= $edit->id_user; ?>">
            <?php if ($detail == 0) { ?>
                <a type="submit" href="<?= base_url() . 'usuarios/obtener/' . $edit->id_user ?>" class="btn btn-lg btn-usam">
                    Actualizar Usuario
                </a>
            <?php }
            if ($detail == 1) { ?>
                <input type="button" class="btn btn-lg btn-usam" id="editar_usuario" value="Actualizar Usuario">
            <?php } ?>
            <a type="submit" href="<?= base_url() . 'usuarios/' ?>" class="btn btn-lg btn-outline-primary">Regresar</a>
        </div>
    </div>
</form>