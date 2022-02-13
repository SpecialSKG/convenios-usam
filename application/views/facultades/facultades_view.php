<div class="container-fluid">

	<div class="d-flex flex-row pt-4 pb-3 mb-2 ml-3 border-bottom">
		<i class="fas fa-graduation-cap fa-lg fa-4x colorusam mr-5"></i>
		<h1 class="colorusam pt-3"> Facultades</h1>
	</div>

	<div class="row" id="barra">
		<div class="col">
			<?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
				<a href="<?= base_url('/facultades/nuevo'); ?>" class="btn btn-success btn-sm px-5 m-0 mb-5" title="Crear registro"><i class="material-icons">add</i></a>
			<?php } ?>
		</div>
	</div>

	<div class="col-12">
		<table id="tabla" class="table table-bordered border-0 pt-5 pb-5 w-100" cellspacing="0">
			<thead>
				<tr class="color-gris-oscuro fondo-usam">
					<th class="th-sm">Código</th>
					<th class="th-sm">Facultad</th>
					<th class="th-sm">Teléfono</th>
					<th class="th-sm">E-mail</th>
					<th class="th-sm">Contacto</th>
					<th class="th-sm">¿Activo?</th>
					<th class="th-sm">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($facultad as $f) { ?>
					<tr class="<?php $f->activo == 1 ? print '' : print 'table-warning' ?>">
						<td><?= $f->codigo; ?></td>
						<td><?= $f->nombre; ?></td>
						<td><?= $f->telefono; ?></td>
						<td><?= $f->email; ?></td>
						<td><?= $f->personacontacto; ?></td>
						<td class="text-center">
							<?= ($f->activo == 1) ? '<i class="material-icons text-success" title="Activo">check_circle</i>' : '<i class="material-icons text-danger" title="Inactivo">error</i>'; ?>
						</td>
						<td>
							<a type="submit" href="<?= base_url() . 'facultades/detalle/' . $f->codigo ?>" class="btn btn-indigo btn-sm" title="Ver registro">
								<i class="material-icons">visibility</i>
							</a>
							<?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
								<a type="submit" href="<?= base_url() . 'facultades/accion/' . $f->codigo ?>" class="btn btn-info btn-sm" title="Editar registro">
									<i class="material-icons">edit</i>
								</a>
							<?php }
							if ($this->session->userdata('rol_') == 1) { ?>
								<a type="submit" data-id="<?= $f->codigo ?>" id="eliminar_facultad" class="btn btn-red btn-sm" title="Eliminar registro">
									<i class="material-icons">delete</i>
								</a>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

</div>