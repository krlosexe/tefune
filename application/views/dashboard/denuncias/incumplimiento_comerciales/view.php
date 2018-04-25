<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Registrar denuncia por incumplimiento comerciales </h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
								 	<label for="id_tipo_incumplimiento">Tipo Laboral</label> 
									 <select name="id_tipo_incumplimiento" id="id_tipo_incumplimiento" class="form-control" disabled>
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($tipo_incumplimiento as  $value): ?>
									 		<option value="<?= $value->id?>" <?= $value->id == $incumplimiento_comerciales->id_tipo_incumplimiento ? 'selected' : ''?>><?= $value->descripcion?></option>
									 	<?php endforeach ?>
									 </select>
								</div>

								<div class="form-group col-md-6">
								 	<label for="id_tipo_deudor">Tipo deudor</label> 
									 <select name="id_tipo_deudor" id="id_tipo_deudor" class="form-control" disabled>
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($tipo_deudor as  $value): ?>
									 		<option value="<?= $value->id?>" <?= $value->id == $incumplimiento_comerciales->id_tipo_deudor ? 'selected' : ''?>><?= $value->descripcion?></option>
									 	<?php endforeach ?>
									 </select>
								</div>
								
								<div class="form-group col-md-6">
									 <label for="motivo_deuda">Motivo deuda</label> 
									 <input type="text" class="form-control" id="motivo_deuda" name="motivo_deuda" value="<?= $incumplimiento_comerciales->motivo_deuda?>" disabled>
								</div>

								<div class="form-group col-md-6">
									 <label for="rut_deudor">Rut deudor</label> 
									 <input type="text" class="form-control" id="rut_deudor" name="rut_deudor" value="<?= $incumplimiento_comerciales->rut_deudor?>" disabled>
								</div>

								<div class="form-group col-md-6">

									 <label for="nombre_deudor">Nombre deudor</label> 

									 <input type="text" class="form-control" id="nombre_deudor" name="nombre_deudor" value="<?= $incumplimiento_comerciales->nombre_deudor?>" disabled>

								</div>

								<div class="form-group col-md-6">

									 <label for="rut_empresa">Rut de la empresa</label> 

									 <input type="text" class="form-control" id="rut_empresa" name="rut_empresa" value="<?= $incumplimiento_comerciales->rut_empresa?>" disabled>

								</div>



								

								<div class="form-group col-md-6">

									 <label for="nombre_empresa">Nombre de la empresa</label> 

									 <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" value="<?= $incumplimiento_comerciales->nombre_empresa?>" disabled>

								</div>



								<div class="form-group col-md-6">

									 <label for="rut_representante">Rut del representante</label> 

									 <input type="text" class="form-control" id="rut_representante" name="rut_representante" value="<?= $incumplimiento_comerciales->rut_representante?>" disabled>

								</div>



								<div class="form-group col-md-6">

									 <label for="nombre_representante">Nombre del representante</label> 

									 <input type="text" class="form-control" id="nombre_representante" name="nombre_representante" value="<?= $incumplimiento_comerciales->nombre_representante?>" disabled>

								</div>
								
								
								<div class="form-group col-md-12">
									<a href="<?= base_url()?>operaciones/denuncias/<?= $controlador?>" class="btn btn-danger pull-left">Volver</a>
								</div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
