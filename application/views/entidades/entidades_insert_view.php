<div>
    <div class="container d-flex flex-row justify-content-md-center pt-4 pb-3 border-bottom">
        <i class="fas fa-industry fa-lg fa-4x colorusam mr-5"></i>
        <h1 class="colorusam pt-3"> Entidades</h1>
    </div>
</div>
<form class="container mx-0 px-0 ">
    <div class="container d-flex d-flex justify-content-between mt-5">
        <h2>Información general</h2>
        <div class="row">
            <p class="col">Activo:</p>
            <label class="switch col">
                <input type="checkbox" name="activo" id="activo" value="1" checked>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-2">
            <label for="nombre" class="font-weight-bold">Nombre: </label>
        </div>
        <div class="col-10">
            <input type="text" name="" id="nombre" class="form-control rounded-pill" required />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="siglas" class="font-weight-bold">Siglas: </label>
        </div>
        <div class="col-10">
            <input type="text" name="" id="siglas" class="form-control rounded-pill" required />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="direccion" class="font-weight-bold">Direccion: </label>
        </div>
        <div class="col-10">
            <input type="text" name="" id="direccion" class="form-control rounded-pill" required />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="sel_cont" class="font-weight-bold">Continente: </label>
        </div>
        <div class="col-4">
            <select class="js-example-basic-single form-control rounded-pill select" id="sel_cont">
                <option value="" hidden selected>--Continente--</option>
                <?php foreach ($continenteSelect as $continente) { ?>
                    <option value="<?= $continente->id ?>">
                        <?= $continente->nombre ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-2">
            <label for="pais" class="font-weight-bold">Pais: </label>
        </div>
        <div class="col-4">
            <select class="js-example-basic-single form-control rounded-pill select" id="sel_pais">
                <option value='' hidden selected> --Paises-- </option>
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="tentidad" class="font-weight-bold">Carácter de la Entidad: </label>
        </div>
        <div class="col-10">
            <select class="js-example-basic-single form-control rounded-pill select" id="tentidad">
                <option value=""></option>
                <?php foreach ($tentidad as $te) : ?>
                    <option value="<?= $te->idtipo_entidad; ?>">
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
            <input type="text" name="" id="telefono" class="form-control rounded-pill" required />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="email" class="font-weight-bold">Email: </label>
        </div>
        <div class="col-10">
            <input type="email" name="" id="email" class="form-control rounded-pill" required />
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-2">
            <label for="web" class="font-weight-bold">Web: </label>
        </div>
        <div class="col-10">
            <input type="text" name="" id="web" class="form-control rounded-pill" required />
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
                <input type="text" name="" id="personacontacto" class="form-control rounded-pill" required />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-2">
                <label for="personacargo" class="font-weight-bold">Cargo: </label>
            </div>
            <div class="col-10">
                <input type="text" name="" id="personacargo" class="form-control rounded-pill" required />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-2">
                <label for="personatelefono" class="font-weight-bold">Telefono: </label>
            </div>
            <div class="col-10">
                <input type="text" name="" id="personatelefono" class="form-control rounded-pill" required />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="personaemail" class="font-weight-bold">Email: </label>
            </div>
            <div class="col-10">
                <input type="email" name="" id="personaemail" class="form-control rounded-pill" required />
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-4 mb-4 ">
            <input type="button" class="btn btn-lg btn-usam" id="agregar_entidades" value="Guardar Entidad">
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