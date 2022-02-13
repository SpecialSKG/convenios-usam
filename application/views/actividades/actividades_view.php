<div class="d-flex flex-row pt-4 pb-3 mb-2 ml-3 border-bottom">
	<i class="fas fa-paste fa-lg fa-4x colorusam mr-5"></i>
	<h1 class="colorusam pt-3">Actividades</h1>
</div>
<div class="row" id="barra">
	<div class="col ml-3">
		<?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
			<a href="<?= base_url('/actividades/nuevo'); ?>" class="btn btn-success btn-sm px-5 m-0 mb-5" title="Crear registro">
				<i class="material-icons">add</i>
			</a>
		<?php } ?>
	</div>
</div>


<div class="col-12">
	<table class="table table-bordered border-0 pt-5 pb-5 w-100" id="tabla">
		<thead class="">
			<tr class="color-gris-oscuro fondo-usam">
				<th scope="col" colspan="1">Actividad</th>
				<th scope="col" colspan="1">Descripcion</th>
				<th scope="col" colspan="1">Fecha Actividad</th>
				<th scope="col" colspan="1">Convenio</th>
				<th scope="col" colspan="1">Beneficiarios</th>
				<th scope="col" colspan="1">Acciones</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($actividad as $a) { ?>
				<tr>
					<td><?= $a->actividad ?> </td>
					<td><?= $a->descripcion ?> </td>
					<td><?= $a->fechaact ?> </td>
					<td><?= $a->Codigo . " || " . $a->nombre ?> </td>
					<td><?= $a->beneficiarios ?> </td>
					<td>
						<a type="submit" href="<?= base_url() . 'actividades/detalle/' . $a->id ?>" class="btn btn-indigo btn-sm" title="Ver registro">
							<i class="material-icons">visibility</i>
						</a>
						<?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
							<a type="submit" href="<?= base_url() . 'actividades/obtener/' . $a->id ?>" class="btn btn-info btn-sm" title="Editar registro">
								<i class="material-icons">edit</i>
							</a>
						<?php }
						if ($this->session->userdata('rol_') == 1) { ?>
							<a type="submit" data-id="<?= $a->id ?>" id="eliminar_actividad" class="btn btn-red btn-sm" title="Eliminar registro">
								<i class="material-icons">delete</i>
							</a>
						<?php } ?>
					</td>
				</tr>
			<?php } ?>

		</tbody>
	</table>
</div>