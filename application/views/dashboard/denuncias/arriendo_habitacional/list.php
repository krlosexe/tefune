<!-- main content start-->

<div id="page-wrapper">

	<div class="main-page">

		<div class="panel-body widget-shadow table-responsive">

			<div class="form-title">

				<h4>Arriendo Habitacional :</h4>

				<?php if ($control_permisos["permisos"]->insert == 1): ?>

					<a href="<?= base_url()?>operaciones/denuncias/arriendo_habitacional_add" class="btn btn-primary btn-flat btn-pri pull-right" style="margin-top: -25px;">

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
					  <th>Tipo Habitacional</th>
					  <th>Monto deuda</th>
					  <th>Tipo contacto</th>
					  <th>Rut del deudor</th>
					  <th>Nombre deudor</th>
					  <th>Direccion arriendo</th>
					  <th>Estado</th>
					  <th>Accion</th>

					</tr>

				</thead>

				<tbody>



					<?php foreach ($denuncias as  $value): ?>

						<tr>
						  <th scope="row"><?= $value->id?></th>
						  <td>
						  	<?php foreach ($tipo_habitacional as$tipo): ?>
						  		<?= $tipo->id == $value->id_tipo_habitacional ? $tipo->descripcion : ''?>
						  	<?php endforeach ?>
						  </td>
						  <td><?= $value->monto_deuda?></td>
						  <td>
						  	<?php foreach ($tipo_contrato as $tipo_con): ?>
						  		<?= $tipo_con->id == $value->id_tipo_contrato ? $tipo_con->descripcion : ''?>
						  	<?php endforeach ?>
						  </td>
						  <td><?= $value->rut_deudor?></td>
						  <td><?= $value->nombre_deudor?></td>
						  <td><?= $value->direccion_arriendo?></td>

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

						  	 		<a href="<?= base_url()?>operaciones/denuncias/arriendo_habitacional_view/<?= $value->id?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detalles"> <i class="fa fa-eye"></i></a>



							  		<a href="<?= base_url()?>operaciones/denuncias/upload/4/<?= $value->id?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cargar Evidencias"> <i class="fa fa-upload"></i></a>

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

