<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll col-md-6" id="style-2 div1">
					<h3 class="title1">Datos del usuario</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
									 <label for="identidad">Nombre</label> 
									 <input type="text" name="identidad" id="identidad" class="form-control" disabled value="<?= $solicitud->p_nombre?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="identidad">Nombre</label> 
									 <input type="text" name="identidad" id="identidad" class="form-control" disabled value="<?= $solicitud->p_apellido?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="identidad">N° Identidad</label> 
									 <input type="text" name="identidad" id="identidad" class="form-control" disabled value="<?= $solicitud->identidad_user?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="identidad">Celular</label> 
									 <input type="text" name="identidad" id="identidad" class="form-control" disabled value="<?= $solicitud->celular?>">
								</div>
								<div class="form-group col-md-12">
									 <label for="identidad">Correo</label> 
									 <input type="text" name="identidad" id="identidad" class="form-control" disabled value="<?= $solicitud->email?>">
								</div>
								<br><br>
							</form>
						</div>

						<div class="col-md-12">
							<div class="form-group col-md-12">
							 	<a href="<?= base_url()?>solicitudes/solicitar_datos" class="btn btn-danger pull-left">Volver</a>
							</div>
						</div>
					</div>
				</div>


				<div class="blank-page widget-shadow scroll col-md-6" id="style-2 div1">
					<h3 class="title1">Detalle de la solicitud</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-12">
									<label for="tipo">Tipo de Denuncia</label>
									<select name="tipo" id="tipo" class="form-control" disabled>
										<option value="">Seleccione...</option>
										<?php foreach ($type_denuncia as $value): ?>
											<option value="<?= $value->id_fune?>" <?= $value->id_fune == $solicitud->id_tipo_fune ? 'selected': ''?>><?= $value->fune?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group col-md-12">
									 <label for="type_document">Tipo de documento</label> 
									 <select name="type_document" id="type_document" class="form-control" disabled>
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($type_documents as $value): ?>
									 		<option value="<?= $value->id?>" <?= $value->id == $solicitud->tipe_document ? 'selected': ''?>><?=$value->nombre?></option>
									 	<?php endforeach ?>
									 </select>
								</div>

								<div class="form-group col-md-12">
									 <label for="identidad">N° Identidad</label> 
									 <input type="text" name="identidad" id="identidad" class="form-control" disabled value="<?= $solicitud->identidad?>">
								</div>
								<br><br>
							</form>
						</div>
						<div class="col-md-12">
							<?php if ($this->session->userdata("rol") == 4 || $this->session->userdata("rol") == 2): ?>
								<div class="form-group col-md-12">
								 	<div class="btn-group pull-right">
								 		<?php if ($solicitud->estatus == 0 || $solicitud->estatus == 2): ?>
								 			<a href="<?= base_url()?>solicitudes/solicitar_datos/revision/<?= $solicitud->id?>/1" class="btn btn-success btn-act">Procesar</a>
								 		<?php endif ?>
							 			<?php if ($solicitud->estatus == 0 || $solicitud->estatus == 1): ?>
							 				<a href="<?= base_url()?>solicitudes/solicitar_datos/revision/<?= $solicitud->id?>/2" class="btn btn-warning btn-act">Denegar</a>
							 			<?php endif ?>
								 	</div>
								</div>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>


<!-- 
ESCRIPT REGISTRO DE USUARIO -->
<script>
	$(".btn-act").on("click", function(e){
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
	           setTimeout(function(){
	          	location.href="<?= base_url()?>solicitudes/solicitar_datos";
	          }, 3000);
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
