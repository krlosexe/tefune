<!-- main content start-->
<style>
	#page-wrapper{
		height: 1700px !important;
    	min-height: 563px !important;
	}
</style>
		<div id="page-wrapper" style="height: 2524px !important:">
			<h2 class="title1">Mi Perfil</h2>
			<div class="main-page col-md-7">
				<div class="blank-page widget-shadow scroll" >
					<h3 class="title1">Datos Personales</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="img-profile">
								<form action="<?= base_url()?>carga/uploadprofile/5" id="formFotoss" name="formFoto" method="POST" enctype="multipart/form-data"> 
									<center id="img-profile">
										<label for="files" id="list">
											<?php if ($user->fotos == ""): ?>

												<img src="<?= base_url()?>assets/dashboard/images/img-profile.png" width="180" height="180">
											<?php else: ?>
												<img src="<?= base_url()?>uploads/<?=$user->fotos?>" width="180" height="180">
											 <?php endif ?>
											<div class="pattern">Cambiar imagen</div>
										</label>
									</center>
									<input type="file" id="files" name="files">
									<center>
										<br>
										<button class="btn btn-primary" id="btn-uploads" type="button">Actualizar</button>
									</center>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form method="POST" class="row forms">
								<div class="form-group col-md-6">
									 <label for="name1">Primer Nombre</label> 
									 <input type="text" class="form-control" id="name1" name="name1" value="<?= $user->p_nombre?>">
								</div>
								<div class="form-group col-md-6">
									 <label for="name2">Segundo Nombre</label> 
									 <input type="text" class="form-control" id="name2" name="name2" value="<?= $user->s_nombre?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="lastname1">Primer Apellido</label> 
									 <input type="text" class="form-control" id="lastname1" name="lastname1" value="<?= $user->p_apellido?>">
								</div>
								<div class="form-group col-md-6">
									 <label for="lastname2">Segundo Apellido</label> 
									 <input type="text" class="form-control" id="lastname2" name="lastname2" value="<?= $user->s_apellido?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="type_document">Tipo de documento</label> 
									 <select name="type_document" id="type_document" class="form-control">
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($type_documents as $value): ?>

									 		<option value="<?= $value->id?>" <?= $value->id == $user->id_identidad ? 'selected' : ''?>><?=$value->nombre?></option>

									 	<?php endforeach ?>
									 </select>
								</div>
								<div class="form-group col-md-6">
									 <label for="num_document">Numero de Documento</label> 
									 <input type="text" class="form-control" id="num_document" name="num_document" value="<?= $user->identidad?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="serie">Serie</label> 
									 <input type="text" class="form-control" id="serie" name="serie" value="<?= $user->serie?>" disabled>
								</div>

								<div class="form-group col-md-6">
									 <label for="date_nac">Fecha de Nacimiento</label> 
									 <input type="date" class="form-control" id="date_nac" name="date_nac" value="<?= $user->fecha_nac?>">
								</div>

									<br>

								<center><button type="button" id="btn-personales" class="btn btn-primary">Actualizar</button></center>

							</form>
						</div>
					</div>
				</div>



				<div class="blank-page widget-shadow scroll" >
					<h3 class="title1">Datos de Contacto</h3>
					<div class="row">
						<div class="col-md-12">
							<form action="" class="row forms">
								<div class="form-group col-md-12">
									 <label for="email">Correo Electronico</label> 
									 <input type="email" class="form-control" id="email" name="email" value="<?= $user->email?>">
								</div>

								<div class="form-group col-md-6">
									 <label for="telefono_casa">Telefono Residencial</label> 
									 <input type="text" class="form-control" id="telefono_casa" name="telefono_casa"  value="<?= $user->telefono?>">
								</div>
								<div class="form-group col-md-6">
									 <label for="phone">Telefono Movil</label> 
									 <input type="text" class="form-control" id="phone" name="phone"  value="<?= $user->celular?>">
								</div>

								<center><button type="button" id="btn-contacto" class="btn btn-primary">Actualizar</button></center>
							</form>
						</div>
					</div>
				</div>



				<div class="blank-page widget-shadow scroll" >
					<h3 class="title1">Direccion</h3>
					<div class="row">
						<div class="col-md-12">
							<form action="" class="row forms">
								<div class="form-group col-md-6">
									 <label for="provincias">Provincia</label> 
									 <select name="provincias" id="provincias" class="form-control">
									 	<option value="">Seleccione..</option>
									 	<?php foreach ($provincias as $value): ?>
									 		<option value="<?= $value->id_provincia ?>" <?= $user->id_provincia == $value->id_provincia ? 'selected': ''?>><?=$value->provincia?></option>
									 	<?php endforeach ?>
									 </select>
								</div>

								<div class="form-group col-md-6">
									 <label for="comunas">Comuna</label> 
									 <select name="comunas" id="comunas" class="form-control" disabled>
									 	<option value="">Seleccione..</option>
									 	<?php if ($user->id_provincia != 0): ?>
									 		<?php foreach ($comunas as $value): ?>
									 			<?php if ($value->id_comuna == $user->id_comuna): ?>
									 				<option value="<?= $user->id_comuna ?>" selected><?= $value->comuna?></option>
									 			<?php endif ?>
									 		<?php endforeach ?>
									 	<?php endif ?>
									 </select>
								</div>

								<div class="form-group col-md-12">
									 <label for="direccion">Direccion</label> 
									 <textarea name="direccion" id="direccion" class="form-control"><?=$user->direccion?></textarea>
								</div>
									<br><br>
								<div>
									<center><button type="button" id="btn-location" class="btn btn-primary">Actualizar</button></center>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-5">
				<div class="blank-page widget-shadow scroll" >
					<h3 class="title1">Seguridad</h3>
					<div class="row">
						<div class="col-md-12">
							<form action="" class="row forms">
								<div class="form-group col-md-12">
									 <label for="email">Correo Electronico</label> 
									 <input type="email" class="form-control" id="email" name="email" value="<?= $user->email?>">
								</div>
								<div class="form-group col-md-6">
									 <label for="telefono_casa">Telefono Residencial</label> 
									 <input type="text" class="form-control" id="telefono_casa" name="telefono_casa"  value="<?= $user->telefono?>">
								</div>
								<div class="form-group col-md-6">
									 <label for="phone">Telefono Movil</label> 
									 <input type="text" class="form-control" id="phone" name="phone"  value="<?= $user->celular?>">
								</div>

								<center><button type="button" id="btn-contacto" class="btn btn-primary">Actualizar</button></center>
							</form>
						</div>
					</div>
				</div>
			</div>





		</div>

		<script>
			$("#type_document").on("change", function(){
				var id_select = $("#type_document").val();
				if (id_select == 2) {
					$("#serie").removeAttr("disabled");
				}else{
					$("#serie").attr("disabled", "disabled").val("");
				}
			});
		</script>

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

			        type: 'GET',

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
					"serie"         : $("#serie").val(),

					"date_nac"      : $("#date_nac").val()

				}



				$.ajax({

					type    : "GET",

					dataType: "json",

					data    : datos,

					url     : "<?= base_url()?>users/updatePerfilPersonales",



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

					url     : "<?= base_url()?>users/updatePerfilContacto",



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

			$("#provincias").on("change", function(){



			  $('#comunas option').remove();

				var datos = {

					"id" : this.value

				}

				$.ajax({

					type    : "get",

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

					url     : "<?= base_url()?>users/updatePerfilLocation",



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

			$("#btn-pass").on("click", function(){

				var datos = {

					"pass"  : $("#pass").val(),

					"pass1" : $("#pass1").val(),

					"pass2" : $("#pass2").val()

				}

				//console.log(datos);

				$.ajax({

					type    : "GET",

					dataType: "json",

					data    : datos,

					url     : "<?= base_url()?>users/updatePass",



					beforeSend: function () {

				       $('#btn-pass').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');

				    },



					success(data){

						console.log(data);

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

		        $('#btn-pass').text('Actualizar').removeAttr('disabled');

		      });

				//console.log(datos);

			})

		</script>