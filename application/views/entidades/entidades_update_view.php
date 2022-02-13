<div>
    <div class="container d-flex flex-row justify-content-md-center pt-4 pb-3 border-bottom">
        <i class="fas fa-industry fa-lg fa-4x colorusam mr-5"></i>
        <?php if ($detail == 0) { ?>
            <h1 class="colorusam pt-3"> Detalle Entidad</h1>
        <?php }
        if ($detail == 1) { ?>
            <h1 class="colorusam pt-3"> Actualizar Entidad</h1>
        <?php } ?>
    </div>
</div>
<form class="container mx-0 px-0 ">
    <div class="container d-flex d-flex justify-content-between mt-5">
        <h2>Información general</h2>

        <?php if ($detail == 0) { ?>
            <div class="row">
                <p class="col">Activo:</p>
                <label class="switch col">
                    <input type="checkbox" disabled name="activo" id="activo" value="<?= $edit->activo; ?>" <?php if ($edit->activo == 1) { ?> checked <?php } else { ?> <?php } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        <?php }
        if ($detail == 1) { ?>
            <div class="row">
                <p class="col">Activo:</p>
                <label class="switch col">
                    <input type="checkbox" name="activo" id="activo" value="<?= $edit->activo; ?>" <?php if ($edit->activo == 1) { ?> checked <?php } else { ?> <?php } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        <?php } ?>

    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="nombre" class="font-weight-bold">Nombre: </label>
        </div>
        <div class="col-10">
            <input type="text" name="" id="nombre" value="<?= $edit->nombre; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="siglas" class="font-weight-bold">Siglas: </label>
        </div>
        <div class="col-10">
            <input type="text" name="" id="siglas" value="<?= $edit->Siglas; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="direccion" class="font-weight-bold">Direccion: </label>
        </div>
        <div class="col-10">
            <input type="text" name="" id="direccion" value="<?= $edit->direccion; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="sel_cont" class="font-weight-bold">Continente: </label>
        </div>
        <div class="col-3">
            <select <?php if ($detail == 0) { ?>disabled<?php } ?> class="form-control rounded-pill select" id="sel_cont">
                <option value=""></option>
                <?php foreach ($cont as $c) : ?>
                    <option value="<?= $c->id; ?>" <?= $c->id == $edit->idcontinente  ? 'selected' : '' ?>>
                        <?= $c->nombre; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-2"></div>


        <div class="col-2">
            <label for="sel_pais" class="font-weight-bold">Pais: </label>
        </div>
        <div class="col-3">
            <select <?php if ($detail == 0) { ?>disabled<?php } ?> class="form-control rounded-pill select" id="sel_pais">
                <option value=""></option>
                <?php foreach ($pais as $p) : ?>
                    <option value="<?= $p->id; ?>" <?= $p->id == $edit->idpais  ? 'selected' : '' ?>>
                        <?= $p->pais; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="tentidad" class="font-weight-bold">Carácter de la Entidad:</label>
        </div>
        <div class="col-10">
            <select <?php if ($detail == 0) { ?>disabled<?php } ?> class="form-control rounded-pill select" id="tentidad">
                <option value=""></option>
                <?php foreach ($tentidad as $te) : ?>
                    <option value="<?= $te->idtipo_entidad; ?>" <?= $te->idtipo_entidad == $edit->idtipoentidad  ? 'selected' : '' ?>>
                        <?= $te->tipo_entidad; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="telefono" class="font-weight-bold">Telefono: </label>
        </div>
        <div class="col-10">
            <input type="text" name="" id="telefono" value="<?= $edit->telefono; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="email" class="font-weight-bold">Email: </label>
        </div>
        <div class="col-10">
            <input type="email" name="" id="email" value="<?= $edit->email; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="web" class="font-weight-bold">Web: </label>
        </div>
        <div class="col-10">
            <input type="text" name="" id="web" value="<?= $edit->web; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
        </div>
    </div>

    <div class="container col-12 border-bottom mt-5">
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <h5>Contactar a:</h5>
        </div>
    </div>

    <div class="ml-5">
        <div class="row mt-3">
            <div class="col-2">
                <label for="personacontacto" class="font-weight-bold">Contacto: </label>
            </div>
            <div class="col-10">
                <input type="text" name="" id="personacontacto" value="<?= $edit->personacontacto; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-2">
                <label for="personacargo" class="font-weight-bold">Cargo: </label>
            </div>
            <div class="col-10">
                <input type="text" name="" id="personacargo" value="<?= $edit->personacargo; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-2">
                <label for="personatelefono" class="font-weight-bold">Telefono: </label>
            </div>
            <div class="col-10">
                <input type="text" name="" id="personatelefono" value="<?= $edit->personatelefono; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="personaemail" class="font-weight-bold">Email: </label>
            </div>
            <div class="col-10">
                <input type="email" name="" id="personaemail" value="<?= $edit->personaemail; ?>" class="form-control rounded-pill" required <?php if ($detail == 0) { ?>disabled<?php } ?> />
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-4 mb-4 ">
            <input type="hidden" id="id" value="<?= $edit->id; ?>">
            <?php if ($detail == 0) { ?>
                <?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
                    <a type="submit" href="<?= base_url() . 'entidades/obtener/' . $edit->id ?>" class="btn btn-lg btn-usam">Actualizar Entidad</a>
                <?php } ?>

            <?php }
            if ($detail == 1) { ?>
                <input type="button" class="btn btn-lg btn-usam" id="actualizar_entidades" value="Actualizar Entidad">
            <?php } ?>
            <br>
            <a type="submit" href="<?= base_url() . 'entidades/' ?>" class="btn btn-lg btn-outline-primary">Regresar</a>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#sel_cont').select2();

        $('#sel_cont').change(function() {
            var id = document.getElementById("sel_cont").value;
            $.ajax({
                type: "post",
                url: baseurl + "entidades/pais",
                data: {
                    'id': id
                },
                dataType: "json",
                success: function(response) {
                    console.log("id continente " + response.id);
                    $("#sel_pais").empty();
                    var htmlPaises = [];
                    var paisSelected = "<option value='' hidden selected> --Paises-- </option>";
                    htmlPaises.push(paisSelected);
                    $.each(JSON.parse(response.paises), function(llave, valor) {
                        if (llave >= 0) {
                            var template = "<option value=" + valor.id + ">" + valor.pais + "</option>";
                            htmlPaises.push(template);
                        }
                    });
                    $("#sel_pais").select2();
                    $("#sel_pais").append(htmlPaises.join(""));

                }
            });
        });

    });
</script>