<div class="container d-flex flex-row justify-content-md-center pt-4 pb-3 border-bottom">
  <i class="fas fa-graduation-cap fa-lg fa-4x colorusam mr-5"></i>
  <?php if ($detail == 0) { ?>
    <h1 class="colorusam pt-3"> Detalle Facultad</h1>
  <?php }
  if ($detail == 1) { ?>
    <h1 class="colorusam pt-3"> Actualizar Facultad</h1>
  <?php } ?>
</div>

<div class="container">
  <div class="my-5">
    <h4><strong>Información general</strong></h4>
    <hr class="w-75 bg-primary">
  </div>
  <form>
    <div class="container d-flex d-flex justify-content-between mt-5">
      <div class="row">
        <p class="col">Activo:</p>
        <?php if ($detail == 0) { ?>
          <label class="switch col">
            <input type="checkbox" disabled name="activo" id="activo" value="<?= $facult->activo; ?>" <?php if ($facult->activo == 1) { ?> checked <?php } else { ?> <?php } ?>>
            <span class="slider round"></span>
          </label>
        <?php }
        if ($detail == 1) { ?>
          <label class="switch col">
            <input type="checkbox" name="activo" id="activo" value="<?= $facult->activo; ?>" <?php if ($facult->activo == 1) { ?> checked <?php } else { ?> <?php } ?>>
            <span class="slider round"></span>
          </label>
        <?php } ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="form-group col-6">
        <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" required value="<?= $facult->codigo; ?>" <?php if ($detail == 0) { ?>disabled<?php } ?> />
      </div>

      <div class="form-group col-6">
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Facultad" required value="<?= $facult->nombre; ?>" <?php if ($detail == 0) { ?>disabled<?php } ?> />
      </div>

      <div class="form-group col-6">
        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" required value="<?= $facult->telefono; ?>" <?php if ($detail == 0) { ?>disabled<?php } ?> />
      </div>

      <div class="form-group col-6">
        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required value="<?= $facult->email; ?>" <?php if ($detail == 0) { ?>disabled<?php } ?> />
      </div>
    </div>

    <!-- Contact Section -->
    <div class="row my-5">
      <div class="col-12">
        <h4><strong>Datos de contacto</strong></h4>
        <hr class="w-50 bg-primary">
      </div>
    </div>

    <div class="row mb-3">
      <div class="form-group col-6">
        <input type="text" class="form-control" name="personacontacto" id="personacontacto" placeholder="Nombre del contacto" required value="<?= $facult->personacontacto; ?>" <?php if ($detail == 0) { ?>disabled<?php } ?> />
      </div>

      <div class="form-group col-6">
        <input type="text" class="form-control" name="personatelefono" id="personatelefono" placeholder="Número telefónico del contacto" required value="<?= $facult->personatelefono; ?>" <?php if ($detail == 0) { ?>disabled<?php } ?> />
      </div>

      <div class="form-group col-12">
        <input type="text" class="form-control" name="personaemail" id="personaemail" placeholder="E-mail del contacto" required value="<?= $facult->personaemail; ?>" <?php if ($detail == 0) { ?>disabled<?php } ?> />
      </div>
    </div>

    <div class="row mb-5">
      <div class="container d-flex justify-content-center mt-4 mb-4">
        <?php if ($detail == 0) { ?>
          <?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
            <a type="submit" href="<?= base_url() . 'facultades/accion/' . $facult->codigo ?>" class="btn btn-lg btn-indigo">Actualizar</a>
          <?php } ?>
        <?php }
        if ($detail == 1) { ?>
          <input type="button" class="btn btn-lg btn-indigo" id="actualizar_facultades" value="Actualizar">
        <?php } ?>
        <a type="submit" href="<?= base_url() . 'facultades/' ?>" class="btn btn-lg btn-outline-primary">Regresar</a>
      </div>
    </div>
  </form>
</div>