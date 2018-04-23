<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Editar Permisos</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-12">
									<label for="rol">Tipo de Usuario</label>
									<select name="rol" id="rol" class="form-control" disabled>
										<option value="">Seleccione...</option>
										<?php foreach ($roles as $value): ?>
											<option value="<?= $value->id?>" <?= $value->id == $permiso->rolid ? 'selected' : ''?>><?= $value->nombre?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group col-md-12">
									<label for="menus">Menus</label>
									<select name="menus" id="menus" class="form-control" disabled>
										<option value="">Seleccione...</option>
										<?php foreach ($menus as $value): ?>
											<option value="<?= $value->id?>" <?= $value->id == $permiso->menuid ? 'selected' : ''?>><?= $value->nombre?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group col-md-12">
	                                <label for="read">Leer:</label>
	                                <label class="radio-inline">
	                                    <input type="radio" id="read" name="read" value="1" checked="checked" <?= $permiso->read==1 ? "checked":"" ?>>Si
	                                </label>
	                                 <label class="radio-inline">
	                                    <input type="radio" id="read" name="read" value="0" <?= $permiso->read==0 ? "checked":"" ?>>No
	                                </label>
	                            </div>

	                            <div class="form-group col-md-12">
	                                <label for="insert">Agregar:</label>
	                                <label class="radio-inline">
	                                    <input type="radio" id="insert" name="insert" value="1" checked="checked" <?= $permiso->insert==1 ? "checked":"" ?>>Si
	                                </label>
	                                 <label class="radio-inline">
	                                    <input type="radio" id="insert" name="insert" value="0" <?= $permiso->insert==0 ? "checked":"" ?>>No
	                                </label>
	                            </div>

	                            <div class="form-group col-md-12">
	                                <label for="update">Editar:</label>
	                                <label class="radio-inline">
	                                    <input type="radio" id="update" name="update" value="1" checked="checked" <?= $permiso->update==1 ? "checked":"" ?>>Si
	                                </label>
	                                 <label class="radio-inline">
	                                    <input type="radio" id="update" name="update" value="0" <?= $permiso->update==0 ? "checked":"" ?>>No
	                                </label>
	                            </div>

	                            <div class="form-group col-md-12">
	                                <label for="delete">Eliminar:</label>
	                                <label class="radio-inline">
	                                    <input type="radio" id="delete" name="delete" value="1" checked="checked" <?= $permiso->delete==1 ? "checked":"" ?>>Si
	                                </label>
	                                 <label class="radio-inline">
	                                    <input type="radio" id="delete" name="delete" value="0" <?= $permiso->delete==0 ? "checked":"" ?>>No
	                                </label>
	                            </div>
									<br><br>
									<div class="form-group col-md-12">
									<a href="<?= base_url()?>administrar/permisos" class="btn btn-danger pull-left">Volver</a>
									<button type="button" id="btn-permisos" class="btn btn-primary pull-right">Registrar</button>
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
	$("#btn-permisos").on("click", function(){
		var datos = {
			"read"   : $('input:radio[name=read]:checked').val(),
			"insert" : $('input:radio[name=insert]:checked').val(),
			"update" : $('input:radio[name=update]:checked').val(),
			"delete" : $('input:radio[name=delete]:checked').val(),
		}

		$.ajax({
			type    : "GET",
			dataType: "json",
			data    : datos,
			url     : "<?= base_url()?>administrar/permisos/update/<?= $id ?>",

			beforeSend: function () {
		       $('#btn-permisos').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
		    },

			success(data){
				//console.log(data);
			}
		}).done((data, textStatus, jqXHR) => {

	    if (jqXHR.status === 200) {
	        if(jqXHR.responseJSON.success == true){
	          toastr.success(jqXHR.responseJSON.message);
	           setTimeout(function(){
	          	location.href="<?= base_url()?>administrar/permisos/";
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
        $('#btn-permisos').text('Registrar').removeAttr('disabled');
      });
		//console.log(datos);
	})
</script>