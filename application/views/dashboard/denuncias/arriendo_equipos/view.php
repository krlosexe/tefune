<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Registrar Denuncia por Arriendo Vehiculo</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								
								<div class="form-group col-md-6">
									 <label for="marca">Marca</label> 
									 <input type="text" class="form-control" id="marca" name="marca" disabled value="<?= $arriendo_equipos->marca ?>">
								</div>



								<div class="form-group col-md-6">
									 <label for="ano">Año</label> 
									 <input type="number" class="form-control" id="ano" name="ano" disabled value="<?= $arriendo_equipos->ano ?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="caracteristicas">Caracteristicas</label> 
									 <input type="text" class="form-control" id="caracteristicas" name="caracteristicas" disabled value="<?= $arriendo_equipos->caracteristicas ?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="monto_deuda">Monto deuda</label> 
									 <input type="text" class="form-control" id="monto_deuda" name="monto_deuda" disabled value="<?= $arriendo_equipos->monto_deuda ?>">
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

