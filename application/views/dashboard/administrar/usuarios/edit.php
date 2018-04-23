<!-- main content start-->
		<div id="page-wrapper">
			<h2 class="title1">Editar Usuario</h2>
			<div class="main-page col-md-12">
				<div class="blank-page widget-shadow scroll" >
					<h3 class="title1">Datos Personales</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="img-profile">
								<form action="cargar_archivo" id="formFoto" name="formFoto" method="POST" enctype="multipart/form-data"> 
									<center id="img-profile">
										<label  id="list">
											<?php if ($user_edit->fotos == ""): ?>
												<img src="<?= base_url()?>assets/dashboard/images/img-profile.png" width="180" height="180">
											<?php else: ?>
												<img src="<?= base_url()?>uploads/<?=$user_edit->fotos?>" width="180" height="180">
											 <?php endif ?>
										</label>
									</center>
									<input type="file" id="files" name="files">
									<center>
										<br>
										<button class="btn btn-primary" id="btn-upload">Actualizar</button>
									</center>
								</form>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<ul id="myTabs" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Datos Personales</a>
								</li> 
								<li role="presentation">
									<a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Datos de Contacto</a>
								</li>

								<li role="presentation">
									<a href="#location" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Direccion</a>
								</li>

								<li role="presentation">
									<a href="#acceso" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Acceso</a>
								</li>


							</ul>
							<div id="myTabContent" class="tab-content scrollbar1" tabindex="5001" style="overflow: hidden; outline: none;"> 
								<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab"> 
									<br>
									<form method="POST" class="row forms">
										<div class="form-group col-md-6">
											 <label for="name1">Primer Nombre</label> 
											 <input type="text" class="form-control" id="name1" name="name1" value="<?= $user_edit->p_nombre?>">
										</div>
										<div class="form-group col-md-6">
											 <label for="name2">Segundo Nombre</label> 
											 <input type="text" class="form-control" id="name2" name="name2" value="<?= $user_edit->s_nombre?>">
										</div>

										<div class="form-group col-md-6">
											 <label for="lastname1">Primer Apellido</label> 
											 <input type="text" class="form-control" id="lastname1" name="lastname1" value="<?= $user_edit->p_apellido?>">
										</div>
										<div class="form-group col-md-6">
											 <label for="lastname2">Segundo Apellido</label> 
											 <input type="text" class="form-control" id="lastname2" name="lastname2" value="<?= $user_edit->s_apellido?>">
										</div>

										<div class="form-group col-md-6">
											 <label for="type_document">Tipo de documento</label> 
											 <select name="type_document" id="type_document" class="form-control">
											 	<option value="">Seleccione..</option>
											 	<?php foreach ($type_documents as $value): ?>
											 		<option value="<?= $value->id?>" <?= $value->id == $user_edit->id_identidad ? 'selected' : ''?>><?=$value->nombre?></option>
											 	<?php endforeach ?>
											 </select>
										</div>
										<div class="form-group col-md-6">
											 <label for="num_document">Numero de Documento</label> 
											 <input type="text" class="form-control" id="num_document" name="num_document" value="<?= $user_edit->identidad?>">
										</div>
										<div class="form-group col-md-12">
											 <label for="date_nac">Fecha de Nacimiento</label> 
											 <input type="date" class="form-control" id="date_nac" name="date_nac" value="<?= $user_edit->fecha_nac?>">
										</div>
											<br>
										<div class="form-group col-md-12">
										   <a href="<?= base_url()?>administrar/usuarios" class="btn btn-danger pull-left">Volver</a>
											<button type="button" id="btn-personales" class="btn btn-primary pull-right">Actualizar</button>
										</div>
									</form>
								</div>
								<div role="tabpanel" class="tab-pane fade in" id="profile" aria-labelledby="profile-tab"> 
									<br>
									<form action="" class="row forms">
										<div class="form-group col-md-12">
											 <label for="email">Correo Electronico</label> 
											 <input type="email" class="form-control" id="email" name="email" value="<?= $user_edit->email?>">
										</div>
										<div class="form-group col-md-6">
											 <label for="telefono_casa">Telefono Residencial</label> 
											 <input type="text" class="form-control" id="telefono_casa" name="telefono_casa"  value="<?= $user_edit->telefono?>">
										</div>
										<div class="form-group col-md-6">
											 <label for="phone">Telefono Movil</label> 
											 <input type="text" class="form-control" id="phone" name="phone"  value="<?= $user_edit->celular?>">
										</div>

										<div class="form-group col-md-12">
										   <a href="<?= base_url()?>administrar/usuarios" class="btn btn-danger pull-left">Volver</a>
											<button type="button" id="btn-contacto" class="btn btn-primary pull-right">Actualizar</button>
										</div>
									</form>
								</div> 

								<div role="tabpanel" class="tab-pane fade in" id="location" aria-labelledby="profile-tab"> 
									<br>
									<form action="" class="row forms">
										<div class="form-group col-md-6">
											 <label for="provincias">Provincia</label> 
											 <select name="provincias" id="provincias" class="form-control">
											 	<option value="">Seleccione..</option>
											 	<?php foreach ($provincias as $value): ?>
											 		<option value="<?= $value->id_provincia ?>" <?= $user_edit->id_provincia == $value->id_provincia ? 'selected': ''?>><?=$value->provincia?></option>
											 	<?php endforeach ?>
											 </select>
										</div>
	
										<div class="form-group col-md-6">
											 <label for="comunas">Comuna</label> 
											 <select name="comunas" id="comunas" class="form-control" disabled>
											 	<option value="">Seleccione..</option>
											 	<?php if ($user_edit->id_provincia != 0): ?>
											 		<?php foreach ($comunas as $value): ?>
											 			<?php if ($value->id_comuna == $user_edit->id_comuna): ?>
											 				<option value="<?= $user_edit->id_comuna ?>" selected><?= $value->comuna?></option>
											 			<?php endif ?>
											 		<?php endforeach ?>
											 	<?php endif ?>
											 </select>
										</div>

										<div class="form-group col-md-12">
											 <label for="direccion">Direccion</label> 
											 <textarea name="direccion" id="direccion" class="form-control"><?=$user_edit->direccion?></textarea>
										</div>
											<br><br>
										<div class="form-group col-md-12">
										   <a href="<?= base_url()?>administrar/usuarios" class="btn btn-danger pull-left">Volver</a>
											<button type="button" id="btn-location" class="btn btn-primary pull-right">Actualizar</button>
										</div>
									</form>
								</div> 


								<div role="tabpanel" class="tab-pane fade in" id="acceso" aria-labelledby="profile-tab"> 
									<br>
									<form action="" class="row forms">
										<div class="form-group col-md-6">
											 <label for="rol">Tipo de Usuario</label> 
											 <select name="rol" id="rol" class="form-control">
											 	<option value="">Seleccione..</option>
											 	<?php foreach ($roles as $value): ?>
											 		<option value="<?= $value->id ?>" <?= $user_edit->rol_id == $value->id ? 'selected': ''?>><?=$value->nombre?></option>
											 	<?php endforeach ?>
											 </select>
										</div>

										<div class="form-group col-md-6">
											 <label for="username">Nombre de Usuario</label> 
											 <input type="text" id="username" name="username" class="form-control" value="<?= $user_edit->loginUsers?>">
										</div>
											<br><br>
										<div class="form-group col-md-12">
										   <a href="<?= base_url()?>administrar/usuarios" class="btn btn-danger pull-left">Volver</a>
											<button type="button" id="btn-acceso" class="btn btn-primary pull-right">Actualizar</button>
										</div>
									</form>
								</div>


							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			function archivo(evt) {
		      var files = evt.target.files; // FileList object
		       
		        //Obtenemos la imagen del campo "file". 
		      for (var i = 0, f; f = files[i]; i++) {         
		           //Solo admitimos imágenes.
		           if (!f.type.match('image.*')) {
		                continue;
		           }
		       
		           var reader = new FileReader();
		           
		           reader.onload = (function(theFile) {
		               return function(e) {
		               // Creamos la imagen.
		                      document.getElementById("list").innerHTML = ['<img width="180" height="180" src="', e.target.result,'" title="', escape(theFile.name), '"/><div class="pattern">Cambiar imagen</div>'].join('');
		                      $("#btn-upload").css("display", "block");
		               };
		           })(f);
		 
		           reader.readAsDataURL(f);
		       }
		}
      	document.getElementById('files').addEventListener('change', archivo, false);
		</script>

		<script>
			$('#formFoto').submit(function ( e ) {
				let objData       = {};
				var id_user       = <?= $this->session->userdata("id") ?>;
			    var data = new FormData(this); //Creamos los datos a enviar con el formulario
			    $.ajax({
			        url: 'uploadprofile/'+id_user, //URL destino
			        data: data,
			        dataType: "json",
			        processData: false, //Evitamos que JQuery procese los datos, daría error
			        contentType: false, //No especificamos ningún tipo de dato
			        type: 'POST',
			        beforeSend: function() {
				  	     $('#btn-upload').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
				        }
			    })
			   
			     .done((data, textStatus, jqXHR) => {
					if (jqXHR.status === 200) {
                        if(jqXHR.responseJSON.success == true){
                            toastr.success(jqXHR.responseJSON.message);
                        }else{
                           toastr.warning(jqXHR.responseJSON.message);
                         }
					}
				})
				.always(() => {
					$('#btn-upload').text('Actualizar').removeAttr('disabled');
					$('#btn-upload').css('display', 'none');
				});
			    

			    e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
			});
		</script>




		<script>
			$("#btn-personales").on("click", function(){
				var datos = {
					"name1"         : $("#name1").val(),
					"name2"         : $("#name2").val(),
					"lastname1"     : $("#lastname1").val(),
					"lastname2"     : $("#lastname2").val(),
					"type_document" : $("#type_document").val(),
					"num_document"  : $("#num_document").val(),
					"date_nac"      : $("#date_nac").val()
				}

				$.ajax({
					type    : "GET",
					dataType: "json",
					data    : datos,
					url     : "<?= base_url()?>users/updatePerfilPersonales/<?=$id?>",

					beforeSend: function () {
				       $('#btn-personales').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
				    },

					success(data){
						//console.log(data);
					}
				}).done((data, textStatus, jqXHR) => {

			    if (jqXHR.status === 200) {
			        if(jqXHR.responseJSON.success == true){
			          toastr.success(jqXHR.responseJSON.message);
				        setTimeout(function(){
						     location.reload();
						}, 5000);
			        }else{
			           if(jqXHR.responseJSON.valid == true){
			           //	toastr.warning(jqXHR.responseJSON.message);
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
		        $('#btn-personales').text('Actualizar').removeAttr('disabled');
		      });
				//console.log(datos);
			})
		</script>






		<script>
			$("#btn-contacto").on("click", function(){
				var datos = {
					"email"         : $("#email").val(),
					"telefono_casa" : $("#telefono_casa").val(),
					"phone"     	: $("#phone").val()
				}
				$.ajax({
					type    : "GET",
					dataType: "json",
					data    : datos,
					url     : "<?= base_url()?>users/updatePerfilContacto/<?=$id?>",

					beforeSend: function () {
				       $('#btn-contacto').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
				    },

					success(data){
						//console.log(data);
					}
				}).done((data, textStatus, jqXHR) => {

			    if (jqXHR.status === 200) {
			        if(jqXHR.responseJSON.success == true){
			          toastr.success(jqXHR.responseJSON.message);
				        setTimeout(function(){
						     location.reload();
						}, 5000);
			        }else{
			           if(jqXHR.responseJSON.valid == true){
			           //	toastr.warning(jqXHR.responseJSON.message);
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
		        $('#btn-contacto').text('Actualizar').removeAttr('disabled');
		      });
				//console.log(datos);
			})
		</script>



		<script>
			$("#btn-location").on("click", function(){
				var datos = {
					"provincias" : $("#provincias").val(),
					"comunas"    : $("#comunas").val(),
					"direccion"  : $("#direccion").val()
				}
				$.ajax({
					type    : "GET",
					dataType: "json",
					data    : datos,
					url     : "<?= base_url()?>users/updatePerfilLocation/<?=$id?>",

					beforeSend: function () {
				       $('#btn-location').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
				    },

					success(data){
						//console.log(data);
					}
				}).done((data, textStatus, jqXHR) => {

			    if (jqXHR.status === 200) {
			        if(jqXHR.responseJSON.success == true){
			          toastr.success(jqXHR.responseJSON.message);
				        setTimeout(function(){
						     location.reload();
						}, 5000);
			        }else{
			           if(jqXHR.responseJSON.valid == true){
			           //	toastr.warning(jqXHR.responseJSON.message);
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
		        $('#btn-location').text('Actualizar').removeAttr('disabled');
		      });
				//console.log(datos);
			})
		</script>



		<script>
			$("#btn-acceso").on("click", function(){
				var datos = {
					"rol"      : $("#rol").val(),
					"username" : $("#username").val()
				}
				$.ajax({
					type    : "GET",
					dataType: "json",
					data    : datos,
					url     : "<?= base_url()?>administrar/usuarios/updatePerfilAcceso/<?=$id?>",

					beforeSend: function () {
				       $('#btn-acceso').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
				    },

					success(data){
						//console.log(data);
					}
				}).done((data, textStatus, jqXHR) => {

			    if (jqXHR.status === 200) {
			        if(jqXHR.responseJSON.success == true){
			          toastr.success(jqXHR.responseJSON.message);
				        setTimeout(function(){
						     location.reload();
						}, 5000);
			        }else{
			           if(jqXHR.responseJSON.valid == true){
			           //	toastr.warning(jqXHR.responseJSON.message);
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
		        $('#btn-acceso').text('Actualizar').removeAttr('disabled');
		      });
				//console.log(datos);
			})
		</script>


		<script>
			$("#provincias").on("change", function(){

			  $('#comunas option').remove();
				var datos = {
					"id" : this.value
				}
				$.ajax({
					type    : "GET",
					dataType: "json",
					data    : datos,
					url     : "<?= base_url()?>users/getComunas",

					beforeSend: function () {
				      // $('#btn-contacto').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');
				    },

					success(data){
						var campos = data;
						$('#comunas').removeAttr('disabled');
						$('#comunas').append($('<option>',
						     {
						        value: "",
						        text : "Seleccione..."
						    }));
			           	$.each(campos, function(i, item){
			           		$('#comunas').append($('<option>',
						     {
						        value: item.id_comuna,
						        text : item.comuna 
						    }));
			           	});
					}
				})
			});
		</script>