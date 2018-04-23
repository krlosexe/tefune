<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Solicitud de Datos</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-12">
									<label for="tipo">Tipo de Denuncia</label>
									<select name="tipo" id="tipo" class="form-control">
										<option value="">Seleccione...</option>
										<?php foreach ($type_denuncia as $value): ?>
											<option value="<?= $value->id_fune?>"><?= $value->fune?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group col-md-12">
									 <label for="type_document">Tipo de documento</label> 
									 <select name="type_document" id="type_document" class="form-control">
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($type_documents as $value): ?>
									 		<option value="<?= $value->id?>"><?=$value->nombre?></option>
									 	<?php endforeach ?>
									 </select>
								</div>

								<div class="form-group col-md-12">
									 <label for="identidad">N° Identidad</label> 
									 <input type="text" name="identidad" id="identidad" class="form-control">
								</div>
									<br><br>
								<div class="form-group col-md-12">
									<a href="<?= base_url()?>solicitudes/solicitar_datos" class="btn btn-danger pull-left">Volver</a>
									<button type="button" id="btn-save" class="btn btn-primary pull-right" style="margin-top: 3%;">Registrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


<!-- 
ESCRIPT REGISTRO DE USUARIO -->
<script>
	$("#btn-save").on("click", function(){
		var datos = {
			"tipo"          : $("#tipo").val(),
			"type_document" : $("#type_document").val(),
			"identidad"     : $("#identidad").val(),
		}

		$.ajax({
			type    : "GET",
			dataType: "json",
			data    : datos,
			url     : "<?= base_url()?>solicitudes/solicitar_datos/store",

			beforeSend: function () {
		       $('#btn-save').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
		    },
			success(data){
				//console.log(data);
			}
		}).done((data, textStatus, jqXHR) => {

	    if (jqXHR.status === 200) {
	        if(jqXHR.responseJSON.success == true){
	          toastr.success(jqXHR.responseJSON.message);
	           setTimeout(function(){
	          	location.href="<?= base_url()?>solicitudes/solicitar_datos";
	          }, 3000);
	        }else{
	           if(jqXHR.responseJSON.valid == true){
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
	           	toastr.error(jqXHR.responseJSON.message);
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