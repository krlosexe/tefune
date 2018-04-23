<!-- main content start-->

<div id="page-wrapper">

	<div class="main-page">

		<div class="panel-body widget-shadow table-responsive">

			<div class="form-title">

				<h4>Arriendo Equipos :</h4>

				<?php if ($control_permisos["permisos"]->insert == 1): ?>

					<a href="<?= base_url()?>operaciones/denuncias/arriendo_equipos_add" class="btn btn-primary btn-flat btn-pri pull-right" style="margin-top: -25px;">

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
					  <th>Marca</th>
					  <th>Año</th>
					  <th>Caracteristicas</th>
					  <th>Monto dedua</th>
					  <th>Estado</th>
					  <th>Accion</th>

					</tr>

				</thead>

				<tbody>



					<?php foreach ($denuncias as  $value): ?>

						<tr>
						  <th scope="row"><?= $value->id?></th>
						  <td><?= $value->marca?></td>
						  <td><?= $value->ano?></td>
						  <td><?= $value->caracteristicas?></td>
						  <td><?= $value->monto_deuda?></td>

						  <td>
						  	<?php if ($value->estatus ==0): ?>
						  		<span class="label label-danger">proceso de aprobación</span>
						  	<?php else: ?>
						  		<span class="label label-success">Activo</span>
						  	<?php endif ?>
						  </td>

						  <td>
						  	 <div class="btn-group">

						  	 	<?php if ($control_permisos["permisos"]->update == 1): ?>

						  	 		<a href="<?= base_url()?>operaciones/denuncias/arriendo_equipos_view/<?= $value->id?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detalles"> <i class="fa fa-eye"></i></a>



							  		<a href="<?= base_url()?>operaciones/denuncias/upload/7/<?= $value->id?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cargar Evidencias"> <i class="fa fa-upload"></i></a>

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

