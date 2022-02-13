<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="USAM">
	<meta name="description" content="Sistema para administración de convenios de la universidad">
	<title>Administración de Convenios USAM</title>
	<link rel="icon" type="image/png" href="<?= base_url() . 'assets/img/login.png'; ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
	<div class="login-root">
		<div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
			<div class="loginbackground box-background padding-top--64">
				<div class="loginbackground-gridContainer">
					<div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
						<div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
						<div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
						<div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
						<div class="box-root box-background--vino animationLeftRight tans3s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
						<div class="box-root box-background--vino animationRightLeft tans4s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
						<div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
						<div class="box-root box-background--vino animationRightLeft tans4s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
						<div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
					</div>
				</div>
			</div>

			<div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
				<div class="formbg-outer">
					<div class="formbg">
						<div class="formbg-inner padding-horizontal--48">

							<img src='assets/img/login.png' class='imgRedonda' />

							<form id="stripe-login" action="<?php echo base_url(); ?>login/iniciar_sesion" method="POST" autocomplete="off">
								<br>
								<div class="field padding-bottom--24">
									<div class="grid--50-50">
										<label for="text">Usuario</label>
									</div>
									<input type="text" name="user" required>
								</div>

								<div class="field padding-bottom--24">
									<div class="grid--50-50">
										<label for="pass">Contraseña</label>
									</div>
									<input type="password" name="pass" id="clave" required>
								</div>

								<div class="field padding-bottom--24">
									<input type="submit" name="submit" value="Ingresar">
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</body>