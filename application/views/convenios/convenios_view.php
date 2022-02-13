<div class="d-flex flex-row pt-4 pb-3 mb-2 ml-3 border-bottom">
	<i class="fas fa-file fa-lg fa-4x colorusam mr-5"></i>
	<h1 class="colorusam pt-3"> Convenios</h1>
</div>
<div class="row" id="barra">
	<div class="col ml-3">
		<?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
			<a href="<?= base_url('/convenios/nuevo'); ?>" class="btn btn-success btn-sm px-5 m-0 mb-5" title="Crear registro"><i class="material-icons">add</i>
			</a>
		<?php } ?>
	</div>
</div>

<div class="row col-12">
	<h2>Buscar convenio</h2>
	<form class="border rounded col-12 mx-0 my-2" action="<?= base_url('convenios/index') ?>" method="get">
		<div class="row col-12 d-flex flex-wrap pt-4">
			<div class="col-md-12 col-sm-12 m-0  p-0 d-flex flex-wrap pt-4">
				<div class="col-md-6 col-sm-12 m-0  p-0 d-flex flex-wrap">
					<div class="col-md-12 col-sm-12 m-0 p-0 d-flex">
						<div class="col-md-3 col-sm-12 m-0">
							Código:
						</div>
						<input type="text" name="codigo" id="codigo" placeholder="Ej: NA-2020-001" class="col-md-9 col-sm-12 m-0">
					</div>
				</div>
				
				<div class="col-md-6 col-sm-12 m-0  p-0 d-flex flex-wrap">
					<div class="col-md-12 col-sm-12 m-0 p-0 d-flex">
						<div class="col-md-3 col-sm-12 m-0">
							Estado:
						</div>
						<select class="col-md-9  col-sm-12 m-0" name="estado" id="estado">
							<option value="">Vacío</option>
							<option value="Activo">Activo</option>
							<option value="Inactivo">Inactivo</option>
							<option value="Descartado">Descartado</option>
						</select>
					</div>
				</div>
			</div>
			<div class="ccol-md-6 col-sm-12 m-0  p-0 d-flex flex-wrap pt-4">
				<div class="col-md-6 p-0 d-flex">
					<div class="col-md-3 m-0">
						Área Temática:
					</div>
					<select class="col-md-9 m-0" name="areatematica" id="areatematica">
						<option value="">Vacío</option>
						<option value="Investigación">Investigación</option>
						<option value="Docencia">Docencia</option>
						<option value="Proyección Social">Proyección Social</option>
						<option value="Extensión Universitaria">Extensión Universitaria</option>
						<option value="Becas">Becas</option>
						<option value="Beneficios">Beneficios</option>
						<option value="Becas y Beneficios">Becas y Beneficios</option>
					</select>
				</div>
				<div class="col-md-6 p-0 d-flex">
					<div class="col-md-3 m-0">
						Fecha inicio desde:
					</div>
					<input type="date" class="col-md-9 m-0" name="fechainicio" id="fechainicio" />
				</div>
			</div>
		</div>
		<div class="row col-12 d-flex flex-wrap">
			<div class="col-md-6 col-sm-12 m-0  p-0 d-flex flex-wrap pt-4">
				<div class="col-md-3 m-0">
					Entidad:
				</div>
				<select class="col-md-9 m-0" name="entidad" id="entidad">
					<option value="">Vacío</option>
					<?php foreach ($entidades as $ntd) { ?>
						<option value="<?= $ntd->id ?>"><?= $ntd->nombre ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-6 col-sm-12 m-0  p-0 d-flex flex-wrap pt-4">
				<div class="col-md-3 m-0">
					Facultad:
				</div>
				<select class="col-md-9 m-0" name="facultad" id="facultad">
					<option value="">Vacío</option>
					<?php foreach ($facultades as $fcltd) { ?>
						<option value="<?= $fcltd->codigo ?>"><?= $fcltd->nombre ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-6 col-sm-12 m-0  p-0 d-flex flex-wrap pt-4">
				<div class="col-md-3 m-0">
					Área Administrativa:
				</div>
				<select class="col-md-9 m-0" name="oficina" id="oficina">
					<option value="">Vacío</option>
					<?php foreach ($oficinas as $fcn) { ?>
						<option value="<?= $fcn->codigo ?>"><?= $fcn->nombre ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-6 col-sm-12 m-0  p-0 d-flex flex-wrap pt-4">
				<div class="col-md-3 m-0">
					Fecha finalización hasta:
				</div>
				<input type="date" class="col-md-9 m-0" name="fechacaducidad" id="fechacaducidad" />
			</div>
		</div>
		<div class="d-flex justify-content-center col-12 py-4">
			<button type="submit" class="btn btn-usam"><i class="fas fa-search mr-2"></i>Buscar</button>
		</div>
	</form>
</div>

<div class="row col-12 mt-5">
	<h2>Cantidad de convenios: </h2>
	<p class="text-left h2"><?= ' ' . count($data_table); ?></p>
</div>

<?php foreach ($data_table as $convenio) { ?>
	<div class="m-0 p-1 col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
		<div class="container col-12 border-convenio rounded p-1">
			<div class="m-0 d-flex col-12 pt-2">
				<div class="m-0 p-0 col-lg-12 col-md-12 col-sm-12 d-flex flex-wrap">
					<div class="col-lg-1  	col-sm-2 m-0"> <b>N°:</b> <?= $convenio->id ?></div>
					<div class="col-lg-2   	col-sm-2 m-0"> <b>Código:</b> <?= $convenio->Codigo ?> </div>
					<div class="col-lg-8  	col-sm-6 m-0"> <b>Nombre:</b> <?= $convenio->nombre ?> </div>
					<div class="col-lg-1 	col-sm-2 m-0 d-flex flex-row-reverse">

						<span class="badge bg-dark">
							<?= $convenio->estado . " " ?>
							<?php
							if ($convenio->estado == "Activo") {
								echo ("<i class='fas fa-check px-3 pt-2'></i>");
							} else if ($convenio->estado == "Inactivo") {
								echo ("<i class='fas fa-exclamation px-3 pt-2'></i>");
							} else {
								echo ("<i class='fas fa-times px-3 pt-2'></i>");
							}
							?>
						</span>

					</div>
				</div>
			</div>
			<div class="m-0 d-flex col-12 pt-2">
				<div class="col-3 m-0"> <b>Clasificación:</b> <?= "\n" . $convenio->clasificacion ?></div>
				<div class="col-3 m-0"> <b>Área Temática:</b> <?= "\n" . $convenio->areatematica ?></div>
				<div class="col-3 m-0"> <b>Tipo:</b> <?= "\n" . $convenio->tipo ?></div>
				<div class="col-3 m-0"> <b>Proceso:</b><?= "\n" . $convenio->activo ?></div>
			</div>
			<div class="m-0 d-flex flex-wrap col-12 pt-4">
				<div class="col-md-4 col-sm-12 m-0">
					<div><b>Entidades</b></div>
					<div class="m-0 p-0 d-flex flex-wrap col-12">
						<?php
						$entidades = $this->convenios_model->mostrarEntidadWhere($convenio->id);
						if (count($entidades) != 0) {
							foreach ($entidades as $entidad) {
								echo ("<div class='m-1 badge badge-primary d-flex flex-wrap'>" . $entidad->nombre . "</div>");
							}
						} else {
							echo ("(No hay entidades)");
						}
						?>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 m-0">
					<div><b>Oficinas</b></div>
					<div class="m-0 p-0 d-flex flex-wrap col-12">
						<?php
						$oficinas = $this->convenios_model->mostrarOficinaWhere($convenio->id);
						if (count($entidades) != 0) {
							foreach ($oficinas as $oficina) {
								echo ("<div class='m-1 badge badge-info d-flex flex-wrap'>" . $oficina->nombre . "</div>");
							}
						} else {
							echo ("(No hay Oficinas)");
						}
						?>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 m-0">
					<div><b>Facultades</b></div>
					<div class="m-0 p-0 d-flex flex-wrap col-12">
						<?php
						$facultades = $this->convenios_model->mostrarFacultadWhere($convenio->id);
						if (count($facultades) != 0) {
							foreach ($facultades as $facultad) {
								echo ("<div class='m-1 badge badge-success d-flex flex-wrap'>" . $facultad->nombre . "</div>");
							}
						} else {
							echo ("(No hay Facultades)");
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-12 m-0 d-flex flex-wrap pt-4">
				<div class="col-md-12 col-sm-12 d-flex flex-wrap m-0 p-0">
					<div class="col-4 m-0"><b>Inicio:</b> <?= "\n" . $convenio->fechainicio ?></div>
					<div class="col-4 m-0"><b>Final:</b> <?= "\n" . $convenio->fechacaducidad ?></div>
					<div class="col-4 m-0">
						<?php if ($convenio->archivo != "no_archivo") { ?>
							<b>Archivo:</b> <?= " " ?> <a href="<?= base_url() . "assets/PDFs/" . $convenio->archivo ?>" target="_blank" type="Documento de <?= $convenio->Codigo ?>"><?= $convenio->archivo ?> </a>
						<?php } else { ?>
							No archivo
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-12 m-0 d-flex flex-wrap pt-4">
				<div class="col-md-12 col-sm-12 m-0 p-0">
					<div class="col-12 m-0 d-flex flex-wrap justify-content-end">
						<a type="submit" href="<?= base_url() . 'convenios/ver/' . $convenio->id ?>" class="btn btn-indigo btn-sm" title="Ver registro">
							<i class="material-icons">visibility</i>
						</a>
						<?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
							<a type="submit" href="<?= base_url() . 'convenios/Modificar/' . $convenio->id ?>" class="btn btn-info btn-sm" title="Editar registro">
								<i class="material-icons">edit</i>
							</a>
						<?php }
						if ($this->session->userdata('rol_') == 1) { ?>
							<a type="submit" data-id="<?= $convenio->id ?>" id="eliminar" class="btn btn-red btn-sm" title="Eliminar registro">
								<i class="material-icons">delete</i>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php	} ?>

<script>
	$(document).ready(function() {
		$("div div #eliminar").click(function(e) {
			e.preventDefault();
			Swal.fire({
				title: '¡PELIGRO!',
				text: 'ESTAS A PUNTO DE ELIMINAR ESTE CONVENIO (ese proceso es reversible únicamente con el personal de IT)',
				showDenyButton: true,
				showCancelButton: true,
				confirmButtonText: 'Sí, quiero eliminar',
				denyButtonText: 'No quiero eliminar',
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: "get",
						url: baseurl + "convenios/cambiarAEliminado",
						data: {
							id: $(this).attr('data-id')
						},
						dataType: "json",
						success: function(response) {
							if (response.response == 1) {
								location.reload();
							}
						}
					});
				} else if (result.isDenied) {
					Swal.fire('No se eliminó el registro', '', 'info')
				}
			});
		});

		$('#entidad').select2({
			tags: "true",
			placeholder: "Vacío",
			allowClear: true
		});

		$('#oficina').select2({
			tags: "true",
			placeholder: "Vacío",
			allowClear: true
		});

		$('#areatematica').select2({
			tags: "true",
			placeholder: "Vacío",
			allowClear: true
		});

		$('#estado').select2({
			tags: "true",
			placeholder: "Vacío",
			allowClear: true
		});

		$('#facultad').select2({
			tags: "true",
			placeholder: "Vacío",
			allowClear: true
		});

	});
</script>
<script src="<?= base_url() . 'assets/js/select2.min.js' ?>"></script>