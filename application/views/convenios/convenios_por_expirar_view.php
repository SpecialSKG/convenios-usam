<div class="d-flex flex-row pt-4 pb-3 mb-2 ml-3 border-bottom">
	<i class="fas fa-file fa-lg fa-4x colorusam mr-5"></i>
	<h1 class="colorusam pt-3"> Convenios</h1>
</div>

<div class="mb-2 col-12 row d-flex flex-wrap">
	<div class="mr-3">Cantidad de convenios: </div>
	<div>
		<?= ' '.count($data_table);?>
	</div>
</div>
<?php foreach ($data_table as $convenio) { ?>

	<div class=" m-0  p-1 col-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container col-12 border-convenio rounded p-1">
			<div class="m-0 d-flex  col-12">
				<div class="m-0 p-0 col-lg-12 col-md-12 col-sm-12 d-flex flex-wrap">
					<div class="col-lg-1  	col-sm-2 m-0"> <b>#:</b> <?= $convenio->id ?></div>
					<div class="col-lg-2   	col-sm-2 m-0"> <b>Código:</b> <?= $convenio->Codigo ?> </div>
					<div class="col-lg-8  	col-sm-6 m-0"> <?= $convenio->nombre ?> </div>
					<div class="col-lg-1 	col-sm-2 m-0 d-flex flex-row-reverse">

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

					</div>
				</div>
			</div>
			<div class="m-0 d-flex col-12 pt-2">
				<div class="col-3 m-0"> <b>Clasificación:</b> <?= "\n" . $convenio->clasificacion ?></div>
				<div class="col-3 m-0"> <b>Area Tematica:</b> <?= "\n" . $convenio->areatematica ?></div>
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
				<div class="col-md-9 col-sm-12 d-flex flex-wrap m-0 p-0">
					<div class="col-4 m-0"><b>Inicio:</b> <?= "\n" . $convenio->fechainicio ?></div>
					<div class="col-4 m-0"><b>Final:</b> <?= "\n" . $convenio->fechacaducidad ?></div>
					<div class="col-4 m-0">
						<?php if ($convenio->archivo != "no_archivo") { ?>
							<b>archivo:</b> <?= " " ?> <a href="<?= base_url() . "assets/PDFs/" . $convenio->archivo ?>" target="_blank" type="Documento de <?= $convenio->Codigo ?>"><?= $convenio->archivo ?> </a>
						<?php } else { ?>
							No archivo
						<?php } ?>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 m-0 p-0">
					<div class="col-12 m-0 d-flex flex-wrap justify-content-end">
						<a type="submit" href="<?= base_url() . 'convenios/ver/' . $convenio->id ?>" class="btn btn-indigo btn-sm">
							<i class="material-icons">visibility</i>
						</a>
						<?php if ($this->session->userdata('rol_') == 2) { ?>
							<a type="submit" href="<?= base_url() . 'convenios/Modificar/' . $convenio->id ?>" class="btn btn-info btn-sm">
								<i class="material-icons">edit</i>
							</a>
							<a type="submit" data-id="<?= $convenio->id ?>" id="eliminar" class="btn btn-red btn-sm">
								<i class="material-icons">delete</i>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

	</div>
<?php	} ?>

</div>
</div>

<script>
	$(document).ready(function() {
		$("div div #eliminar").click(function(e) {
			e.preventDefault();
			Swal.fire({
				title: 'PELIGRO',
				text: 'ESTAS APUNTO DE ELIMINAR ESTE CONVENIO (ese proceso es reversible unicamente con el personal de IT)',
				showDenyButton: true,
				showCancelButton: true,
				confirmButtonText: 'si, quiero eliminar',
				denyButtonText: `no quiero eliminar`,
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
					Swal.fire('Changes are not saved', '', 'info')
				}
			});
		});
	});
</script>