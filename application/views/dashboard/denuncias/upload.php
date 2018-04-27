<!-- main content start-->

		<div id="page-wrapper">

			<div class="main-page">

				<div class="blank-page widget-shadow scroll" id="style-2 div1">

					<h3 class="title1">Evidencias</h3>

					<div class="row">

						<div class="col-md-12">



							<ul id="myTabs" class="nav nav-tabs" role="tablist">

								<li role="presentation" class="active">

									<a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Documentos</a>

								</li> 


							</ul>

							<div id="myTabContent" class="tab-content scrollbar1" tabindex="5001" style="overflow: hidden; outline: none;"> 

								<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab"> 

									<br>

									<?php if($this->session->flashdata('error')): ?>

				                         <div class="alert alert-danger alert-dismissible">

				                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				                            <h4><i class="icon fa fa-ban"></i> Alerta!</h4>

				                            <?=  $this->session->flashdata('error'); ?>

				                          </div>

				                     <?php endif; ?>



			                     <?php if($this->session->flashdata('valid')): ?>

			                         <div class="alert alert-success alert-dismissible">

			                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			                            <h4><i class="icon fa fa-ban"></i> Alerta!</h4>

			                            <?=  $this->session->flashdata('valid'); ?>

			                          </div>

			                     <?php endif; ?>

									<form action="<?= base_url()?>operaciones/denuncias/uploadPdf/<?= $tipo ?>/<?= $id ?>" method="post" class="row form" enctype="multipart/form-data">

										<input type="file" class="form-control" id="file" name="file" required style="display: none">

										<div class="col-md-12" id="top_upload">

										 	Subir Documentos <i class="fa fa-upload pull-right"></i>

										</div>

										<div class="col-md-12">

										 	<div class="stats-info">

												<div class="stats-info-agileits">

													<div class="stats-body">

														<ul class="list-unstyled">

															<?php foreach ($evidencias_pdf as $value): ?>

																<li>

																	<a href="<?= base_url()?>uploads/evidencias/<?= $value->documento?>" target="_blank"><?= $value->documento?></a> 

																	<span class="pull-right">

																		<a href="<?= base_url()?>evidencias/deletePdf/<?= $value->id?>" class=" btn btn-danger pull-left"><i class="fa fa-trash"></i></a>

																	</span>  

																</li>

															<?php endforeach ?>

														</ul>

													</div>

												</div>

											</div>

										</div>

										<div class="col-md-12">

										 	<label for="file" class="btn bg-warning dark pv20 text-white fw600 text-center pull-left">Agregar <i class="fa fa-plus-circle"></i></label>



										 	<button for="file" class="btn bg-success dark pv20 text-white fw600 text-center pull-right">Subir <i class="fa fa-check-circle-o"></i></button>

										</div>

									</form>

										<br>

								</div>

							</div>

						</div>
						<div class="form-group col-md-12">
							<a href="<?= base_url()?>operaciones/denuncias/<?= $controlador?>" class="btn btn-danger pull-left">Volver</a>
						</div>
					</div>

				</div>

			</div>

		</div>



