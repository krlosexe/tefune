<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Registrar denuncia por incumplimiento comerciales </h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
								 	<label for="id_tipo_incumplimiento">Tipo Laboral</label> 
									 <select name="id_tipo_incumplimiento" id="id_tipo_incumplimiento" class="form-control">
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($tipo_incumplimiento as  $value): ?>
									 		<option value="<?= $value->id?>"><?= $value->descripcion?></option>
									 	<?php endforeach ?>
									 </select>
								</div>

								<div class="form-group col-md-6">
								 	<label for="id_tipo_deudor">Tipo deudor</label> 
									 <select name="id_tipo_deudor" id="id_tipo_deudor" class="form-control">
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($tipo_deudor as  $value): ?>
									 		<option value="<?= $value->id?>"><?= $value->descripcion?></option>
									 	<?php endforeach ?>
									 </select>
								</div>
								
								<div class="form-group col-md-6">
									 <label for="motivo_deuda">Motivo deuda</label> 
									 <input type="text" class="form-control" id="motivo_deuda" name="motivo_deuda" >
								</div>

								<div class="form-group col-md-6">
									 <label for="rut_deudor">Rut deudor</label> 
									 <input type="text" class="form-control" id="rut_deudor" name="rut_deudor" >
								</div>

								<div class="form-group col-md-6">

									 <label for="nombre_deudor">Nombre deudor</label> 

									 <input type="text" class="form-control" id="nombre_deudor" name="nombre_deudor" >

								</div>

								<div class="form-group col-md-6">

									 <label for="rut_empresa">Rut de la empresa</label> 

									 <input type="text" class="form-control" id="rut_empresa" name="rut_empresa" >

								</div>



								

								<div class="form-group col-md-6">

									 <label for="nombre_empresa">Nombre de la empresa</label> 

									 <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa">

								</div>



								<div class="form-group col-md-6">

									 <label for="rut_representante">Rut del representante</label> 

									 <input type="text" class="form-control" id="rut_representante" name="rut_representante">

								</div>



								<div class="form-group col-md-6">

									 <label for="nombre_representante">Nombre del representante</label> 

									 <input type="text" class="form-control" id="nombre_representante" name="nombre_representante">

								</div>
								
								
								<div class="form-group col-md-12">
									<a href="<?= base_url()?>operaciones/denuncias/<?= $controlador?>" class="btn btn-danger pull-left">Volver</a>
									<a id="btn-save" class="btn btn-primary pull-right">Guardar</a>
								</div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>




		
		<script>
			$("#btn-save").on("click", function(){
				var datos = {
					"id_tipo_incumplimiento" : $("#id_tipo_incumplimiento").val(),
					"id_tipo_deudor"         : $("#id_tipo_deudor").val(),
					"motivo_deuda"           : $("#motivo_deuda").val(),
					"rut_deudor"             : $("#rut_deudor").val(),
					"nombre_deudor"          : $("#nombre_deudor").val(),
					"rut_empresa"            : $("#rut_empresa").val(),
					"nombre_empresa"         : $("#nombre_empresa").val(),
					"rut_representante"      : $("#rut_representante").val(),
					"nombre_representante"   : $("#nombre_representante").val(),

				}
				$.ajax({
					type    : "GET",
					dataType: "json",
					data    : datos,
					url     : "<?= base_url()?>operaciones/denuncias/store_incumplimiento_comerciales",
					beforeSend: function () {
				       $('#btn-save').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
				    },
					success(data){
						//console.log(data);
					}
				}).done((data, textStatus, jqXHR) => {
			    if (jqXHR.status === 200) {
			        if(jqXHR.responseJSON.success == true){
			          var id_denuncia = jqXHR.responseJSON.id_denuncia;
			          toastr.success(jqXHR.responseJSON.message);
				        setTimeout(function(){
						     location.href="<?= base_url()?>operaciones/denuncias/upload/10/"+id_denuncia;
						}, 3000);
			        }else{
			           if(jqXHR.responseJSON.valid == true){
			           	toastr.error("Sucedio algo");
			           	//console.log(jqXHR.responseJSON.campos);
			           	var campos = jqXHR.responseJSON.campos;
			           	$.each(campos, function(i, item) {
			           		if (item != "") {
			           			var id = "#"+i;
			           			var cont = $(id).parent().addClass("has-error");
			           			$(id).parent().children("span").remove();
			           			cont = $(id).parent().append(item);
			           		}else{
			           			var id = "#"+i;
			           			var cont = $(id).parent().removeClass("has-error");
			           			$(id).parent().children("span").remove();
			           			
			           		}
						});
			           }else{
			           	toastr.warning(jqXHR.responseJSON.message);
			           }
			         }
			    }
			  })
			  .always(() => {
		        $('#btn-save').text('Registrar').removeAttr('disabled');
		      });
				//console.log(datos);
			})
		</script>