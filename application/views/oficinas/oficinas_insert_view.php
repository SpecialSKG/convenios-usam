<div>
    <div class="container d-flex flex-row justify-content-md-center pt-4 pb-3 border-bottom">
        <i class="fas fa-landmark fa-lg fa-4x mr-5 colorusam"></i>
        <h1 class="colorusam pt-3"> Oficinas Administrativas</h1>
    </div>
</div>
<div class="container mx-0 px-0 ">
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
    <div class="row mt-5">
        <div class="col-2">
            <label for="codigo" class="font-weight-bold">Codigo: </label>
        </div>
        <div class="col-10">
            <input type="text" name="codigo" id="codigo" class="form-control rounded-pill" required />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-2">
            <label for="nombre" class="font-weight-bold">Nombre: </label>
        </div>
        <div class="col-10">
            <input type="text" name="nombre" id="nombre" class="form-control rounded-pill" required />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-2">
            <label for="telefono" class="font-weight-bold">Telefono: </label>
        </div>
        <div class="col-10">
            <input type="text" name="telefono" id="telefono" class="form-control rounded-pill" required />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-2">
            <label for="email" class="font-weight-bold">Email: </label>
        </div>
        <div class="col-10">
            <input type="email" name="email" id="email" class="form-control rounded-pill" required />
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
                <input type="text" name="personacontacto" id="personacontacto" class="form-control rounded-pill" required />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="personatelefono" class="font-weight-bold">Telefono: </label>
            </div>
            <div class="col-10">
                <input type="text" name="personatelefono" id="personatelefono" class="form-control rounded-pill" required />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="personaemail" class="font-weight-bold">Email: </label>
            </div>
            <div class="col-10">
                <input type="email" name="personaemail" id="personaemail" class="form-control rounded-pill" required />
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-4 mb-4 ">
            <button type="submit" class="btn btn-lg btn-usam" id="guardar">Guardar Oficina </button>
            <a type="submit" href="<?= base_url() . 'oficinas/' ?>" class="btn btn-lg btn-outline-primary">Regresar</a>
        </div>
    </div>
</div>
</div>
</div>