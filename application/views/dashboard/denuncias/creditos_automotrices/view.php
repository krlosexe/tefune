<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Detalle creditos Automotrices</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
								 	<label for="id_tipo_dedua">Tipo Deuda</label> 
									 <select name="id_tipo_dedua" id="id_tipo_dedua" class="form-control" disabled>
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($tipo_deudas as  $value): ?>
									 		<option value="<?= $value->id?>" <?= $value->id == $creditos_automotrices->id_tipo_deuda? 'selected' : ''?>><?= $value->descripcion?></option> 
									 	<?php endforeach ?>
									 </select>
								</div>

								<div class="form-group col-md-6">
								 	<label for="id_tipo_vehiculo">Tipo vehiculo</label> 
									 <select name="id_tipo_vehiculo" id="id_tipo_vehiculo" class="form-control" disabled>
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($tipo_vehiculo as  $value): ?>
									 		<option value="<?= $value->id?>" <?= $value->id == $creditos_automotrices->id_tipo_vehiculos? 'selected' : ''?>><?= $value->descripcion?></option>
									 	<?php endforeach ?>
									 </select>
								</div>
								<div class="form-group col-md-6">
									 <label for="marca">Marca</label> 
									 <input type="text" class="form-control" id="marca" name="marca" value="<?= $creditos_automotrices->marca?>" disabled>
								</div>

								<div class="form-group col-md-6">
									 <label for="ano">Año</label> 
									 <input type="number" class="form-control" id="ano" name="ano" value="<?= $creditos_automotrices->ano?>" disabled>
								</div>

								<div class="form-group col-md-6">

									 <label for="patente">Patente</label> 

									 <input type="text" class="form-control" id="patente" name="patente" value="<?= $creditos_automotrices->patente?>" disabled>

								</div>

								<div class="form-group col-md-12">
									 <label for="caracteristicas">Caracteristicas</label> 
									 <input type="text" class="form-control" id="caracteristicas" name="caracteristicas" value="<?= $creditos_automotrices->caracteristicas?>" disabled>
								</div>

								<div class="form-group col-md-6">
									 <label for="monto_deuda">Monto deuda</label> 
									 <input type="number" class="form-control" id="monto_deuda" name="monto_deuda" value="<?= $creditos_automotrices->monto_deuda?>" disabled>
								</div>

								<div class="form-group col-md-6">

									 <label for="rut_deudor">Rut deudor</label> 

									 <input type="text" class="form-control" id="rut_deudor" name="rut_deudor" value="<?= $creditos_automotrices->rut_deudor?>" disabled>

								</div>

								<div class="form-group col-md-6">

									 <label for="nombre_deudor">Nombre deudor</label> 

									 <input type="text" class="form-control" id="nombre_deudor" name="nombre_deudor" value="<?= $creditos_automotrices->nombre_deudor?>" disabled>

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
