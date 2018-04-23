<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Detalle Denuncia por factura</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
								 	<label for="no_factura">Numero de Factura</label> 
									 <input type="text" class="form-control" id="no_factura" name="no_factura" disabled value="<?= $factura->no_factura?>">
								</div>
								<div class="form-group col-md-6">
									 <label for="fecha_emision">Fecha de emision</label> 
									 <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" disabled value="<?= $factura->fecha_emision?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="monto_impago">Monto impago</label> 
									 <input type="text" class="form-control" id="monto_impago" name="monto_impago" disabled value="<?= $factura->monto_impago?>">
								</div>
								<div class="form-group col-md-6">
									 <label for="rut_empresa">Rut de la empresa</label> 
									 <input type="text" class="form-control" id="rut_empresa" name="rut_empresa" disabled value="<?= $factura->rut_empresa?>">
								</div>

								
								<div class="form-group col-md-12">
									 <label for="nombre_empresa">Nombre de la empresa</label> 
									 <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" disabled value="<?= $factura->nombre_empresa?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="rut_representante">Rut del representante</label> 
									 <input type="text" class="form-control" id="rut_representante" name="rut_representante" disabled value="<?= $factura->rut_representante?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="nombre_representante">Nombre del representante</label> 
									 <input type="text" class="form-control" id="nombre_representante" name="nombre_representante" disabled value="<?= $factura->nombre_representante?>">
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
