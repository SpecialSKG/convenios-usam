<div class="d-flex flex-row pt-4 pb-3 mb-2 ml-3 border-bottom">
	<i class="fas fa-industry fa-lg fa-4x colorusam mr-5"></i>
	<h1 class="colorusam pt-3"> Entidades</h1>
</div>
<div class="row" id="barra">
	<div class="col ml-3">
		<?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
			<a href="<?= base_url('/entidades/nuevo'); ?>" class="btn btn-success btn-sm px-5 m-0 mb-5" title="Crear registro">
				<i class="material-icons">add</i>
			</a>
		<?php } ?>
	</div>
</div>
<div class="col-12">
	<table class="table table-bordered border-0 pt-5 pb-5 w-100" id="tabla">
		<thead class="">
			<tr class="color-gris-oscuro fondo-usam">
				<th scope="col" colspan="1">Entidad</th>
				<th scope="col" colspan="1">Siglas</th>
				<th scope="col" colspan="1">País</th>
				<th scope="col" colspan="1">Correo Entidad</th>
				<th scope="col" colspan="1">Tel Entidad</th>
				<th scope="col" colspan="1">Contacto</th>
				<th scope="col" colspan="1">¿Activo?</th>
				<th scope="col" colspan="1">Acciones</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($entidad as $e) { ?>
				<tr class="<?php $e->activo == 1 ? print '' : print 'table-warning' ?>">
					<th scope="row"> <?= $e->nombre ?> </th>
					<td><?= $e->Siglas ?> </td>
					<td><?= $e->pais ?> </td>
					<td><?= $e->email ?> </td>
					<td><?= $e->telefono ?> </td>
					<td><?= $e->personacontacto ?> </td>
					<td class="text-center">
						<?= ($e->activo == 1) ? '<i class="material-icons text-success" title="Activo">check_circle</i>' : '<i class="material-icons text-danger" title="Inactivo">error</i>'; ?>
					</td>

					<td>
						<a type="submit" href="<?= base_url() . 'entidades/detalle/' . $e->id ?>" class="btn btn-indigo btn-sm" title="Ver registro">
							<i class="material-icons">visibility</i>
						</a>
						<?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
							<a type="submit" href="<?= base_url() . 'entidades/obtener/' . $e->id ?>" class="btn btn-info btn-sm" title="Editar registro">
								<i class="material-icons">edit</i>
							</a>
						<?php }
						if ($this->session->userdata('rol_') == 1) { ?>
							<a type="submit" data-id="<?= $e->id ?>" id="eliminar_entidad" class="btn btn-red btn-sm" title="Eliminar registro">
								<i class="material-icons">delete</i>
							</a>
						<?php } ?>
					</td>
				</tr>
			<?php } ?>

		</tbody>
	</table>
</div>