<!-- main content start-->

		<div id="page-wrapper">

			<div class="main-page">

				<h2 class="title1">Home</h2>

				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<?php if (!$valid): ?>
						<div class="alert alert-danger" role="alert">
							<strong>Aviso!</strong> Debe completar su perfil para poder acceder a las demás funciones. <a href="<?= base_url()?>cuenta/users/profile"><span class="label label-success">Ir al perfil</span></a>
						</div>
					<?php else: ?>
						<div class="alert alert-info" role="alert">
							Bienvenido
						</div>
					<?php endif ?>
				</div>

			</div>

		</div>