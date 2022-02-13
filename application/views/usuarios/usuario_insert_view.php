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
            <input type="text" id="nombre_user" class="form-control rounded-pill" required />
        </div>

        <div class="col-2">
            <label for="descripcion" class="font-weight-bold">Usuario: </label>
        </div>
        <div class="col-4">
            <input type="text" id="user" class="form-control rounded-pill" required />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="descripcion" class="font-weight-bold">Contraseña: </label>
        </div>
        <div class="col-4">
            <input type="text" id="pass" class="form-control rounded-pill" required />
        </div>

        <div class="col-2">
            <label for="sel_cont" class="font-weight-bold">Roles: </label>
        </div>
        <div class="col-4">
            <select class="js-example-basic-single form-control rounded-pill select" id="rol_">
                <option value="" hidden selected>-----------</option>
                <?php foreach ($rol as $r) { ?>
                    <option value="<?= $r->id_rol ?>">
                        <?= $r->rol ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="ml-5">
        <div class="container d-flex justify-content-center mt-4 mb-4 ">
            <input type="button" class="btn btn-lg btn-usam" id="agregar_usuario" value="Guardar Usuario">
            <a type="submit" href="<?= base_url() . 'usuarios/' ?>" class="btn btn-lg btn-outline-primary">Regresar</a>
        </div>
    </div>
</form>