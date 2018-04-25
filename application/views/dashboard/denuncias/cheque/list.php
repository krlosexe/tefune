<!-- main content start-->

<div id="page-wrapper">

	<div class="main-page">

		<div class="panel-body widget-shadow table-responsive">

			<div class="form-title">

				<h4>Cheques :</h4>

				<?php if ($control_permisos["permisos"]->insert == 1): ?>

					<a href="<?= base_url()?>operaciones/denuncias/cheque_add" class="btn btn-primary btn-flat btn-pri pull-right" style="margin-top: -25px;">

						<i class="fa fa-plus" aria-hidden="true">

							

						</i> Nuevo Registro

					</a>

				<?php endif ?>

				

			</div>

			<br>

			<table class="table" id="table1">

				<thead>

					<tr>

					  <th>#</th>

					  <th>Nº cheque</th>

					  <th>Fecha protesto</th>

					  <th>Rut girador</th>
					  <th>Nombre</th>

					  <th>Motivo</th>
					  <th>Banco</th>
					  <th>Estado</th>

					  <th>Accion</th>

					</tr>

				</thead>

				<tbody>



					<?php foreach ($denuncias as  $value): ?>

						<tr>

						  <th scope="row"><?= $value->id?></th>


						  <td><?= $value->no_cheque?></td>

						  <td><?= $value->fecha_protesto?></td>

						  <td><?= $value->rut_girador?></td>

						  <td><?= $value->nombre?></td>

						  <td><?= $value->motivo?></td>
						  <td><?= $value->banco?></td>

						  <td>

						  	<?php if ($value->estatus ==0): ?>
						  		<span class="label label-danger">Validar pago</span>
						  	<?php else: ?>
								<?php if ($value->estatus ==2): ?>
									<span class="label label-warning">proceso de aprobación</span>
								<?php else: ?>
									<?php if ($value->estatus == 1): ?>
									<span class="label label-success">publicado</span>
								<?php endif ?>
								<?php endif ?>
						  	<?php endif ?>

						  		

						  </td>

						  <td>

						  	 <div class="btn-group">

						  	 	<?php if ($control_permisos["permisos"]->update == 1): ?>

						  	 		<a href="<?= base_url()?>operaciones/denuncias/cheque_view/<?= $value->id?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detalles"> <i class="fa fa-eye"></i></a>



							  		<a href="<?= base_url()?>operaciones/denuncias/upload/2/<?= $value->id?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cargar Evidencias"> <i class="fa fa-upload"></i></a>


							  		<?php if (($this->session->userdata("rol") == 3) AND $value->estatus == 0): ?>
										<a href="<?= base_url()?>operaciones/pagos/index/2/" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pagar"> <i class="fa  fa-check"></i></a>
										<a href="<?= base_url()?>operaciones/pagos/add/2/<?= $value->id?>" class="btn bg-system light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Validar pago"> <i class="fa fa-credit-card"></i></a>
									<?php endif ?>

									<?php if ((($this->session->userdata("rol") == 2) || ($this->session->userdata("rol") == 4)) AND $value->estatus == 2): ?>
										<a href="<?= base_url()?>operaciones/pagos/view/2/<?= $value->id?>" class="btn bg-system light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ver pago"> <i class="fa fa-credit-card"></i></a>
									<?php endif ?>

						  	 	<?php endif ?>

						  </div>

						  </td>

						</tr>

					<?php endforeach ?>

				</tbody>

			</table>

		</div>

	</div>

</div>



<script>$(function () {

  $('[data-toggle="tooltip"]').tooltip()

})</script>

