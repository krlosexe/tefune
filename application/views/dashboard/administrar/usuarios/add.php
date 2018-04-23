<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Registrar Nuevo Usuario</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-12">
									<label for="email">Email</label>
									<input type="email" id="email" class="form-control" name="email">
									<?= form_error("email","<span class='help-block'>","</span>") ?>
								</div>
								
								<div class="form-group col-md-6">
									<label for="rol">Tipo de Usuario</label>
									<select name="rol" id="rol" class="form-control">
										<option value="">Seleccione...</option>
										<?php foreach ($roles as $value): ?>
											<option value="<?= $value->id?>"><?= $value->nombre?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group col-md-6">
									<label for="name">Nombre de Usuario</label>
									<input type="text" id="name" class="form-control" name="name">
								</div>

								<div class="form-group col-md-6">
									<label for="pass1">Contraseña</label>
									<input type="password" id="pass1" class="form-control" name="pass1">
								</div>

								<div class="form-group col-md-6">
									<label for="pass2">Repita la Contraseña</label>
									<input type="password" id="pass2" class="form-control" name="pass2">
								</div>
									<br><br>
								<div class="form-group col-md-12">
									<a href="<?= base_url()?>administrar/usuarios" class="btn btn-danger pull-left">Volver</a>
									<button type="button" id="btn-registro" class="btn btn-primary pull-right">Registrar</button>
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
	$("#btn-registro").on("click", function(){
		var datos = {
			"email" : $("#email").val(),
			"name"  : $("#name").val(),
			"pass1" : $("#pass1").val(),
			"pass2" : $("#pass2").val(),
			"rol"   : $("#rol").val()
		}
		$.ajax({
			type    : "GET",
			dataType: "json",
			data    : datos,
			url     : "<?= base_url()?>users/registroUserAdmin",

			beforeSend: function () {
		       $('#btn-registro').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
		    },

			success(data){
				//console.log(data);
			}
		}).done((data, textStatus, jqXHR) => {

	    if (jqXHR.status === 200) {
	        if(jqXHR.responseJSON.success == true){
	          toastr.success(jqXHR.responseJSON.message);
	           setTimeout(function(){
	          	location.href="<?= base_url()?>administrar/usuarios/";
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
        $('#btn-registro').text('Registrar').removeAttr('disabled');
      });
		//console.log(datos);
	})
</script>