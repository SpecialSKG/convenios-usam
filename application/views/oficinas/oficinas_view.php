<div class="d-flex flex-row pt-4 pb-3 mb-2 ml-3 border-bottom">
	<i class="fas fa-landmark fa-lg fa-4x colorusam mr-5"></i>
	<h1 class="colorusam pt-3"> Oficinas Administrativas</h1>
</div>
<div class="row" id="barra">
	<div class="col ml-3">
		<?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
			<a href="<?= base_url('/oficinas/nuevo'); ?>" class="btn btn-success btn-sm px-5 m-0 mb-5" title="Crear registro"><i class="material-icons">add</i></a>
		<?php } ?>
	</div>
</div>
<div class="col-12">
	<table class="table table-bordered border-0 pt-5 pb-5 w-100" id="tabla">
		<thead class="">
			<tr class="color-gris-oscuro fondo-usam">
				<th scope="col" colspan="1">Oficina</th>
				<th scope="col" colspan="1">Contacto</th>
				<th scope="col" colspan="1">Teléfono</th>
				<th scope="col" colspan="1">E-mail</th>
				<th scope="col" colspan="1">¿Activo?</th>
				<th scope="col" colspan="1">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_table as $d) { ?>
				<tr class="<?php $d->activo == 1 ? print '' : print 'table-warning' ?>">
					<th scope="row"> <?= $d->nombre ?> </th>
					<td><?= $d->personacontacto ?> </td>
					<td><?= $d->personatelefono ?> </td>
					<td><?= $d->personaemail ?> </td>
					<td class="text-center"><?php $d->activo == 1 ? print "<i class='material-icons text-success' title='Activo'>check_circle</i>" : print "<i class='material-icons text-danger' title='Inactivo'>error</i>" ?> </td>
					<td>
						<!--  -->
						<div class="btn-group">
							<a type="submit" href="<?= base_url() . 'Oficinas/ver/' . $d->codigo ?>" class="btn btn-indigo btn-sm" title="Ver registro">
								<i class="material-icons">visibility</i>
							</a>
							<?php if ($this->session->userdata('rol_') == 1 || $this->session->userdata('rol_') == 2) { ?>
								<a type="submit" href="<?= base_url() . 'Oficinas/Modificar/' . $d->codigo ?>" class="btn btn-info btn-sm" title="Editar registro">
									<i class="material-icons">edit</i>
								</a>
							<?php }
							if ($this->session->userdata('rol_') == 1) { ?>
								<a type="submit" data-id="<?= $d->codigo ?>" id="eliminar_oficinas" class="btn btn-red btn-sm" title="Eliminar registro">
									<i class="material-icons">delete</i>
								</a>
							<?php } ?>
						</div>
						<!--  -->
					</td>
				</tr>
			<?php } ?>

		</tbody>
	</table>
</div>