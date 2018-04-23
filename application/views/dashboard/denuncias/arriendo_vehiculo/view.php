<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Registrar Denuncia por Arriendo Vehiculo</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
								 	<label for="id_tipo_vehiculo">Tipo vehiculo</label> 
									 <select disabled name="id_tipo_vehiculo" id="id_tipo_vehiculo" class="form-control">
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($tipo_vehiculo as  $value): ?>
									 		<option value="<?= $value->id?>" <?= $arriendo_vehiculo->id_tipo_vehiculo == $value->id ? 'selected' : ''?>><?= $value->descripcion?></option>
									 	<?php endforeach ?>
									 </select>
								</div>

								<div class="form-group col-md-6">
								 	<label for="id_motivo">Tipo motivo</label> 
									 <select disabled name="id_motivo" id="id_motivo" class="form-control">
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($tipo_motivo as  $value): ?>
									 		<option value="<?= $value->id?>" <?= $arriendo_vehiculo->id_motivo == $value->id ? 'selected' : ''?>><?= $value->descripcion?></option>
									 	<?php endforeach ?>
									 </select>
								</div>

								<div class="form-group col-md-6">
									 <label for="marca">Marca</label> 
									 <input type="text" class="form-control" id="marca" name="marca" disabled value="<?= $arriendo_vehiculo->marca ?>">
								</div>



								<div class="form-group col-md-6">
									 <label for="ano">Año</label> 
									 <input type="number" class="form-control" id="ano" name="ano" disabled value="<?= $arriendo_vehiculo->ano ?>">
								</div>

								<div class="form-group col-md-12">
									 <label for="caracteristicas">Caracteristicas</label> 
									 <input type="text" class="form-control" id="caracteristicas" name="caracteristicas" disabled value="<?= $arriendo_vehiculo->caracteristicas ?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="monto_deuda">Monto deuda</label> 
									 <input type="text" class="form-control" id="monto_deuda" name="monto_deuda" disabled value="<?= $arriendo_vehiculo->monto_deuda ?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="patente">Patente</label> 
									 <input type="text" class="form-control" id="patente" name="patente" disabled value="<?= $arriendo_vehiculo->patente ?>">
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

