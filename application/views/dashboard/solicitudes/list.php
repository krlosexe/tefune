<!-- main content start-->
<div id="page-wrapper">
	<div class="main-page">
		<div class="panel-body widget-shadow table-responsive">
			<div class="form-title">
				<h4>Solicitudes :</h4>
				<?php if ($control_permisos["permisos"]->insert == 1): ?>
					<a href="<?= base_url()?>solicitudes/solicitar_datos/add" class="btn btn-primary btn-flat btn-pri pull-right" style="margin-top: -25px;">
						<i class="fa fa-plus" aria-hidden="true">
							
						</i> Nueva Solicitud
					</a>
				<?php endif ?>
				
			</div>
			<br>
			<table class="table" id="table1">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Tipo</th>
					  <th>Tipo Ducumento</th>
					  <th>Identidad</th>
					  <th>Estado</th>
					  <th>Accion</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($solicitudes as  $value): ?>
						<tr>
						  <th scope="row"><?= $value->id?></th>
						  <td><?= $value->tipo_fune?></td>
						  <td><?= $value->tipo_ducumento?></td>
						  <td><?= $value->identidad?></td>
						  <td>
						  	<?php if ($value->estatus ==0): ?>
						  		<span class="label label-danger">en revision</span>
						  	<?php else: ?>
						  		<?php if ($value->estatus == 2): ?>
						  			<span class="label label-warning">Sin resultados</span>
						  		<?php else: ?>
						  			<?php if ($value->estatus == 1): ?>
						  				<span class="label label-success">Exitoso</span>
						  			<?php endif ?>
						  		<?php endif ?>
						  	<?php endif ?>
						  		
						  </td>
						  <td>
						  	 <div class="btn-group">
						  	 	<?php if ($control_permisos["permisos"]->update == 1): ?>
						  	 		<a href="<?= base_url()?>solicitudes/solicitar_datos/view/<?= $value->id?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detalles"> <i class="fa fa-eye"></i></a>
						  	 	<?php endif ?>
						  	 	<?php if ($control_permisos["permisos"]->delete == 1): ?>
									<a href="<?= base_url()?>solicitudes/solicitar_datos/delete/<?= $value->id?>" class="btn btn-danger btn-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar" value="ss"> <i class="fa fa-remove"></i></a>
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
<script>
	$(".btn-remove").on("click", function(e){
        e.preventDefault();//PREVENIR LA ACCION DEL HREF
        var ruta = $(this).attr("href");
        $.ajax({
            url: ruta,
            type: "GET",
            dataType: "json",
            beforeSend: function () {
		       // $(this).text('').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
		    }
        }).done((data, textStatus, jqXHR) => {

	   if (jqXHR.status === 200) {
	        if(jqXHR.responseJSON.success == true){
	          toastr.success(jqXHR.responseJSON.message);
	           $(this).closest("tr").remove();
	        }else{
	           toastr.error(jqXHR.responseJSON.message);
	        }
	    }
	  })
	  .always(() => {
        //$(this).text('Registrar').removeAttr('disabled');
      });
    });
</script>
