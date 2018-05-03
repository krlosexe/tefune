<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Detalle denuncia por estafadores </h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								
								<div class="form-group col-md-6">
									 <label for="nombre_estafador">Nombre estafador</label> 
									 <input type="text" class="form-control" id="nombre_estafador" name="nombre_estafador" value="<?= $estafadores->nombre_estafador?>" disabled>
								</div>

								<div class="form-group col-md-6">
									 <label for="monto_estafa">Monto estafa</label> 
									 <input type="text" class="form-control" id="monto_estafa" name="monto_estafa" value="<?= $estafadores->monto_estafa?>" disabled>
								</div>

								
								<div class="form-group col-md-12">
									 <label for="descripcion">Descripcion</label> 
									 <textarea class="form-control" id="descripcion" disabled name="descripcion"><?= $estafadores->descripcion_estafa?></textarea>
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

