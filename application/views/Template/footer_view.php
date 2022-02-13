</div>
</div>
<!-- Footer -->
<footer class="page-footer">
	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">&copy; <?php echo date('Y'); ?> Copyright:
		<a href="https://www.usam.edu.sv/" target="_blank"> Universidad Salvadoreña Alberto Masferrer.</a>
	</div>
	<!-- Programado con mucho ❤ por:
	Ángel Antonio López Sorto #200680 (https://www.linkedin.com/in/angel-antonio-l%C3%B3pez-sorto-006384189/)
	José Alvaro Guerra Tamayo #200487 (https://www.linkedin.com/in/josealvarogt/)
	María Teresa Aguillón Elías #200110 (https://www.linkedin.com/in/tere-aguill%C3%B3n-639b40231/)
	Ronald Alcides Méndez Orellana #200378 (https://www.linkedin.com/in/ronaldorellana/)
	Tamara Sofía López Granados #200109 (https://www.linkedin.com/in/sof%C3%ADa-l%C3%B3pez-49b887207/) -->

</footer>

<script src="<?= base_url() . 'assets/js/main.js'; ?>"></script>

<script src="<?= base_url() . 'assets/mdb/js/popper.min.js'; ?>"></script>
<script src="<?= base_url() . 'assets/mdb/js/bootstrap.min.js'; ?>"></script>
<script src="<?= base_url() . 'assets/mdb/js/mdb.min.js'; ?>"></script>
<script src="<?= base_url() . 'assets/plugins/sweetalert/sweetalert2.all.js'; ?>"></script>
<script src="<?= base_url() . 'assets/plugins/toastr/toastr.js'; ?>"></script>

<!-- DataTables JS -->
<script src="<?= base_url() . 'assets/mdb/js/addons/datatables.min.js'; ?>"></script>
<!-- -------------------------------------------------------------------------------- -->
<?php if ($view == 'oficinas/oficinas_view') {  ?>
	<script src="<?= base_url() . 'assets/js/oficina/delete_oficina.js' ?>"></script>
<?php } elseif ($view == 'oficinas/oficinas_insert_view') { ?>
	<script src="<?= base_url() ?>assets/js/oficina/insert_oficina.js"></script>
<?php } elseif ($view == 'oficinas/oficinas_update_view') { ?>
	<script src="<?= base_url() . 'assets/js/oficina/update_oficina.js' ?>"></script>
	<!-- -------------------------------------------------------------------------------- -->
<?php } elseif ($view == 'actividades/actividades_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/actividad/delete_actv.js'; ?>"></script>
<?php } elseif ($view == 'actividades/actividades_insert_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/actividad/insert_actv.js'; ?>"></script>
<?php } elseif ($view == 'actividades/actividades_update_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/actividad/update_actv.js'; ?>"></script>
	<!-- -------------------------------------------------------------------------------- -->
<?php } elseif ($view == 'usuarios/usuarios_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/usuario/delete_user.js'; ?>"></script>
<?php } elseif ($view == 'usuarios/usuario_insert_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/usuario/insert_user.js'; ?>"></script>
<?php } elseif ($view == 'usuarios/usuario_update_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/usuario/update_user.js'; ?>"></script>
	<!-- -------------------------------------------------------------------------------- -->

<?php } elseif ($view == 'facultades/facultades_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/facultad/delete_facultad.js'; ?>"></script>
<?php } elseif ($view == 'facultades/facultades_insert_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/facultad/insert_facultad.js'; ?>"></script>
<?php } elseif ($view == 'facultades/facultades_update_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/facultad/update_facultad.js'; ?>"></script>
	<!-- -------------------------------------------------------------------------------- -->

<?php } elseif ($view == 'entidades/entidades_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/entidad/delete_entidad.js'; ?>"></script>
<?php } elseif ($view == 'entidades/entidades_insert_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/entidad/insert_entidad.js'; ?>"></script>
<?php } elseif ($view == 'entidades/entidades_update_view') { ?>
	<script src="<?php echo base_url() . 'assets/js/entidad/update_entidad.js'; ?>"></script>
	<!-- -------------------------------------------------------------------------------- -->
<?php } ?>

<?php if (strcmp($view, 'convenios/convenios_insert_view') == 0) { ?>
	<!-- INICIO - insertar convenio -->
	<script src="<?= base_url() . 'assets/js/convenio/insertarConvenio.js' ?>"></script>
	<!-- FINAL - insertar convenio -->
<?php } ?>

<?php if (strcmp($view, 'convenios/convenios_update_view') == 0) { ?>
	<!-- INICIO - Actualizacion de Convenios -->
	<script src="<?= base_url() .  'assets/js/convenio/actualizaConvenio.js'; ?>"></script>
	<!-- FINAL - Actualizacion de Convenios -->
<?php } ?>

</body>

</html>