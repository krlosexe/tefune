<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Registrar Denuncia por Arriendo Habitacional</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
								 	<label for="id_tipo_habitacional">Tipo habitacional</label> 
									 <select disabled name="id_tipo_habitacional" id="id_tipo_habitacional" class="form-control">
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($tipo_habitacional as  $value): ?>
									 		<option value="<?= $value->id?>" <?= $arriendo_habitacional->id_tipo_habitacional == $value->id ? 'selected' : ''?>><?= $value->descripcion?></option>
									 	<?php endforeach ?>
									 </select>
								</div>

								<div class="form-group col-md-6">
									 <label for="monto_deuda">Monto deuda</label> 
									 <input type="text" class="form-control" id="monto_deuda" disabled name="monto_deuda" value="<?= $arriendo_habitacional->monto_deuda?>" >
								</div>

								<div class="form-group col-md-6">
								 	<label for="id_tipo_contrato">Tipo Contrato</label> 
									 <select disabled name="id_tipo_contrato" id="id_tipo_contrato" class="form-control">
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($tipo_contrato as  $value): ?>
									 		<option value="<?= $value->id?>" <?= $arriendo_habitacional->id_tipo_contrato == $value->id ? 'selected' : ''?>><?= $value->descripcion?></option>
									 	<?php endforeach ?>
									 </select>
								</div>


								<div class="form-group col-md-6">
									 <label for="rut_deudor">Rut deudor</label> 
									 <input type="text" class="form-control" id="rut_deudor" disabled name="rut_deudor"  value="<?= $arriendo_habitacional->rut_deudor?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="nombre_deudor">Nombre deudor</label> 
									 <input type="text" class="form-control" id="nombre_deudor" disabled name="nombre_deudor"  value="<?= $arriendo_habitacional->nombre_deudor?>">
								</div>

								
								<div class="form-group col-md-12">
									 <label for="direccion_arriendo">Direccion arriendo</label> 
									 <textarea disabled name="direccion_arriendo" id="direccion_arriendo" class="form-control"><?= $arriendo_habitacional->direccion_arriendo?>"</textarea>
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
