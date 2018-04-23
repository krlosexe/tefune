<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Registrar Denuncia por Letra</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
								 	<label for="no_letra">Numero de letra</label> 
									 <input type="text" class="form-control" id="no_letra" name="no_letra"  disabled value="<?= $letra->no_letra?>">
								</div>
								<div class="form-group col-md-6">
									 <label for="fecha_vencimiento">Fecha de vencimiento</label> 
									 <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento"  disabled value="<?= $letra->fecha_vencimiento?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="rut_deudor">Rut del deudor</label> 
									 <input type="text" class="form-control" id="rut_deudor" name="rut_deudor"  disabled value="<?= $letra->rut_deudor?>">
								</div>
								<div class="form-group col-md-6">
									 <label for="nombre_deudor">Nombre del deudor</label> 
									 <input type="text" class="form-control" id="nombre_deudor" name="nombre_deudor"  disabled value="<?= $letra->nombre_deudor?>">
								</div>

								
								<div class="form-group col-md-6">
									 <label for="monto">Monto</label> 
									 <input type="text" class="form-control" id="monto" name="monto" disabled value="<?= $letra->monto?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="notaria">Notaria</label> 
									 <input type="text" class="form-control" id="notaria" name="notaria" disabled value="<?= $letra->notaria?>">
								</div>

								<div class="form-group col-md-12">
									 <label for="tipo_deuda">Tipo de deuda</label> 
									 <input type="text" class="form-control" id="tipo_deuda" name="tipo_deuda" disabled value="<?= $letra->tipo_deuda?>">
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

