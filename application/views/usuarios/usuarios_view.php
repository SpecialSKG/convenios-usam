<div class="d-flex flex-row pt-4 pb-3 mb-2 ml-3 border-bottom">
	<i class="fas fa-paste fa-lg fa-4x colorusam mr-5"></i>
	<h1 class="colorusam pt-3">Usuarios</h1>
</div>
<div class="row" id="barra">
	<div class="col ml-3">
		<?php if ($this->session->userdata('rol_') == 1) { ?>
			<a href="<?= base_url('/usuarios/nuevo'); ?>" class="btn btn-success btn-sm px-5 m-0 mb-5" title="Crear registro">
				<i class="material-icons">add</i>
			</a>
		<?php } ?>
	</div>
</div>


<div class="col-12">
	<table class="table table-bordered border-0 pt-5 pb-5 w-100" id="tabla">
		<thead class="">
			<tr class="color-gris-oscuro fondo-usam">
				<th scope="col" colspan="1">Nombre</th>
				<th scope="col" colspan="1">Usuario</th>
				<th scope="col" colspan="1">Contraseña</th>
				<th scope="col" colspan="1">Rol</th>
				<th scope="col" colspan="1">Acciones</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($Usuarios as $u) { ?>
				<tr>
					<td><?= $u->nombre_user ?> </td>
					<td><?= $u->user ?> </td>
					<td><?= base64_decode($u->pass) ?> </td>
					<td><?= $u->rol ?> </td>
					<td>
						<?php if ($this->session->userdata('rol_') == 1) { ?>

							<a type="submit" href="<?= base_url() . 'usuarios/detalle/' . $u->id_user ?>" class="btn btn-indigo btn-sm" title="Ver registro">
								<i class="material-icons">visibility</i>
							</a>

							<a type="submit" href="<?= base_url() . 'usuarios/obtener/' . $u->id_user ?>" class="btn btn-info btn-sm" title="Editar registro">
								<i class="material-icons">edit</i>
							</a>

							<?php if ($this->session->userdata('id_usuario') == $u->id_user) : ?>
								<a type="submit" data-id="<?= $u->id_user ?>" id="eliminar_usuario" class="btn btn-red btn-sm disabled" title="Eliminar registro">
									<i class="material-icons">delete</i>
								</a>
							<?php else : ?>
								<a type="submit" data-id="<?= $u->id_user ?>" id="eliminar_usuario" class="btn btn-red btn-sm" title="Eliminar registro">
									<i class="material-icons">delete</i>
								</a>
							<?php endif; ?>

						<?php } ?>
					</td>
				</tr>
			<?php } ?>

		</tbody>
	</table>
</div>