<!-- main content start-->
<div id="page-wrapper">
	<div class="main-page">
		<div class="panel-body widget-shadow table-responsive">
			<div class="form-title">
				<h4>Usuarios :</h4>
				<?php if ($control_permisos["permisos"]->insert == 1): ?>
					<a href="<?= base_url()?>administrar/usuarios/add" class="btn btn-primary btn-flat btn-pri pull-right" style="margin-top: -25px;"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Registro</a>
				<?php endif ?>
			</div>
			<br>
			<table class="table" id="table1">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Usuario</th>
					  <th>Correo</th>
					  <th>Nombre y Apellido</th>
					  <th>Tipo de Usuario</th>
					  <th>Estado</th>
					  <th>Accion</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($users as  $value): ?>
						<tr>
						  <th scope="row"><?= $value->id?></th>
						  <td><?= $value->loginUsers?></td>
						  <td><?= $value->email?></td>
						  <td><?= $value->p_nombre." ".$value->p_apellido?></td>
						  <td><?= $value->tipo_user?></td>
						  <td>
						  	<?php if ($value->estatus ==0): ?>
						  		<span class="label label-danger">Pendiente</span>
						  	<?php else: ?>
						  		<span class="label label-success">Activo</span>
						  	<?php endif ?>
						  </td>
						  <td>
						  	 <div class="btn-group">
						  	 	<?php if ($control_permisos["permisos"]->update == 1): ?>
							  		<a href="<?= base_url()?>administrar/usuarios/edit/<?= $value->id?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"> <i class="fa fa-edit"></i></a>
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
