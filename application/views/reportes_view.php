<div class="container-fluid">

	<div class="d-flex flex-row pt-4 pb-3 mb-2 ml-3 border-bottom">
		<i class="fas fa-chart-line fa-lg fa-4x colorusam mr-5"></i>
		<h1 class="colorusam pt-3"> Reportería</h1>
	</div>
	<h2>Convenios</h2>
	<form action="<?= base_url('reportes/repoconvenios') ?>" method="post">

		<div class="d-flex flex-wrap">
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Área Temática</div>
				<div class="col-lg-9 col-sm-12">
					<select name="area" id="area" class="form-control">
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
			</div>
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Estado</div>
				<div class="col-lg-9 col-sm-12">
					<select name="estado" id="estado" class="form-control">
						<option value="">Vacío</option>
						<option value="Activo">Activo</option>
						<option value="Inactivo">Inactivo</option>
						<option value="Descartado">Descartado</option>
					</select>
				</div>
			</div>
		</div>

		<div class="d-flex flex-wrap pt-2">
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Entidad</div>
				<div class="col-lg-9 col-sm-12">
					<select name="entidad" id="entidad" class="form-control">
						<option value="">Vacío</option>
						<?php foreach ($entidades as $entidad) { ?>
							<option value="<?= $entidad->id ?>"><?= $entidad->nombre ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Facultad</div>
				<div class="col-lg-9 col-sm-12">
					<select name="facultad" id="facultad" class="form-control">
						<option value="">Vacío</option>
						<?php foreach ($facultades as $facultad) { ?>
							<option value="<?= $facultad->codigo ?>"><?= $facultad->nombre ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>

		<div class="d-flex flex-wrap pt-2">
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Fecha inicio</div>
				<div class="col-lg-4 col-sm-12 pt-1">
					<select class="col-12 form-control" name="opcioninicio" id="opcioninicio">
						<option value="">Vacío</option>
						<option value="=">En la Fecha</option>
						<option value=">=">Desde la Fecha</option>
					</select>
				</div>
				<div class="col-lg-5 col-sm-12 pt-1">
					<input class="col-12 form-control" type="date" name="inicio" id="inicio">
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Continente</div>
				<div class="col-lg-9 col-sm-12 pt-1">
					<select class="col-12 form-control" name="continente" id="continente">
						<option value="">Vacío</option>
						<?php foreach ($continentes as $continente) { ?>
							<option value="<?= $continente->id ?>"><?= $continente->nombre ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>

		<div class="d-flex flex-wrap pt-2">
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Fecha Finalización</div>
				<div class="col-lg-4 col-sm-12 pt-1">
					<select class="col-12 form-control" name="opcionfin" id="opcionfin">
						<option value="">Vacío</option>
						<option value="=">En la Fecha</option>
						<option value="<=">Hasta la Fecha</option>
					</select>
				</div>
				<div class="col-lg-5 col-sm-12 pt-1">
					<input class="col-12 form-control" type="date" name="fin" id="fin">
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Pais</div>
				<div class="col-lg-9 col-sm-12 pt-1">
					<select class="col-12 form-control" name="pais" id="pais">
						<option value="">Vacío</option>
					</select>
				</div>
			</div>
		</div>

		<div class="d-flex flex-wrap pt-2">
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Área Administrativa</div>
				<div class="col-lg-9 col-sm-12">
					<select name="oficina" id="oficina" class="form-control">
						<option value="">Vacío</option>
						<?php foreach ($oficinas as $oficina) { ?>
							<option value="<?= $oficina->codigo ?>"><?= $oficina->nombre ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Proceso del Convenio</div>
				<div class="col-lg-9 col-sm-12">
					<select class="form-control" name="proceso" id="proceso">
						<option value="">Vacío</option>
						<option value="Fecha de inicio">Inicio</option>
						<option value="Planeación">Planeación</option>
						<option value="Proceso">Proceso</option>
						<option value="Firmado">Firmado</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-12 my-4 d-flex justify-content-center">
			<input type="submit" value="Generar Reportes" class="btn btn-usam">
		</div>
	</form>

	<div class="d-flex flex-row justify-content-md-center pt-4 pb-3 mb-2 ml-3 border-bottom"></div>
	<h2>Actividades</h2>

	<form action="<?= base_url('reportes/repoactividades') ?>" method="post">

		<div class="d-flex flex-wrap pt-2">
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-4 col-sm-12">Convenio</div>
				<div class="col-lg-8 col-sm-12">
					<select name="convenio" id="convenio" class="form-control">
						<option value="">Vacío</option>
						<?php foreach ($convenio as $conv) { ?>
							<option value="<?= $conv->Codigo ?>">
								<?= $conv->Codigo . " || " . $conv->nombre ?>
							</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Entidad</div>
				<div class="col-lg-9 col-sm-12">
					<select name="entida" id="entida" class="form-control">
						<option value="">Vacío</option>
						<?php foreach ($entidades as $entidad) { ?>
							<option value="<?= $entidad->id ?>"><?= $entidad->nombre ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>

		<div class="d-flex flex-wrap pt-4">
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-4 col-sm-12">Facultad</div>
				<div class="col-lg-8 col-sm-12">
					<select name="facultad" id="facultad" class="form-control">
						<option value="">Vacío</option>
						<?php foreach ($facultades as $facultad) { ?>
							<option value="<?= $facultad->codigo ?>"><?= $facultad->nombre ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Área Administrativa</div>
				<div class="col-lg-9 col-sm-12">
					<select name="oficina" id="oficina" class="form-control">
						<option value="">Vacío</option>
						<?php foreach ($oficinas as $oficina) { ?>
							<option value="<?= $oficina->codigo ?>"><?= $oficina->nombre ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>

		<div class="d-flex flex-wrap pt-4">
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-4 col-sm-12">Fecha Inicio</div>
				<div class="col-lg-8 col-sm-12">
					<input class="col-12 form-control" type="date" name="inicio2" id="inicio2">
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 d-flex flex-wrap">
				<div class="col-lg-3 col-sm-12">Fecha Finalización</div>

				<div class="col-lg-9 col-sm-12 pt-1">
					<input class="col-12 form-control" type="date" name="fin2" id="fin2">
				</div>
			</div>
		</div>

		<div class="d-flex flex-wrap pt-4">
			<div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-wrap">
				<div class="col-lg-2 col-sm-12">Área Temática</div>
				<div class="col-lg-10 col-sm-12">
					<select name="area" id="area" class="form-control">
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
			</div>
		</div>

		<div class="col-12 d-flex justify-content-center mt-4">
			<input type="submit" value="Generar Reportes" class="btn btn-usam">
		</div>

	</form>

</div>
<script>
	$(document).ready(function() {
		$('#continente').select2();
		$('#convenio').select2();
		$('#entidad').select2();
		$('#entida').select2();

		$("#continente").change(function(e) {
			var id = $("#continente").val();
			$.ajax({
				type: "post",
				url: baseurl + "entidades/pais",
				data: {
					'id': id
				},
				dataType: "json",
				success: function(response) {
					$("#pais").empty();
					var htmlPaises = [];
					var paisSelected = "<option value='' hidden selected> Vacío </option>";
					htmlPaises.push(paisSelected);
					$.each(JSON.parse(response.paises), function(llave, valor) {
						if (llave >= 0) {
							var template = "<option value=" + valor.id + ">" + valor.pais + "</option>";
							htmlPaises.push(template);
						}
					});
					$("#pais").select2();
					$("#pais").append(htmlPaises.join(""));
				}
			});
		});
	});
</script>