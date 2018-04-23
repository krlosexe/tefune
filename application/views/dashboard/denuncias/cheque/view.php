<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Detalle Denuncia por cheque</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
								 	<label for="no_cheque">Numero de cheque</label> 
									 <input type="text" class="form-control" id="no_cheque" name="no_cheque" disabled value="<?= $cheque->no_cheque?>">
								</div>
								<div class="form-group col-md-6">
									 <label for="fecha_protesto">Fecha de protesto</label> 
									 <input type="date" class="form-control" id="fecha_protesto" disabled value="<?= $cheque->fecha_protesto?>" name="fecha_protesto" >
								</div>

								<div class="form-group col-md-6">
									 <label for="rut_girador">Rut del girador</label> 
									 <input type="text" class="form-control" id="rut_girador" disabled value="<?= $cheque->rut_girador?>" name="rut_girador" >
								</div>
								<div class="form-group col-md-6">
									 <label for="nombre">nombre</label> 
									 <input type="text" class="form-control" id="nombre" disabled value="<?= $cheque->nombre?>" name="nombre" >
								</div>

								
								<div class="form-group col-md-6">
									 <label for="motivo">Motivo</label> 
									 <input type="text" class="form-control" id="motivo" disabled value="<?= $cheque->motivo?>" name="motivo">
								</div>

								<div class="form-group col-md-6">
									 <label for="banco">Banco</label> 
									 <input type="text" class="form-control" id="banco" disabled value="<?= $cheque->banco?>" name="banco">
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

