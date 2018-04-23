<!-- main content start-->

		<div id="page-wrapper">

			<div class="main-page">

				<div class="blank-page widget-shadow scroll" id="style-2 div1">

					<h3 class="title1">Denuncia</h3>

					<div class="row">

						<div class="col-md-12">

							<form action="" class="row forms">

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

								</ul>

								<div id="myTabContent" class="tab-content scrollbar1" tabindex="5001" style="overflow: hidden; outline: none;"> 

									<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab"> 

										<br>

										<div class="form-group col-md-12">

											 <label for="name1">Tipo de Denuncia</label> 

											 <select name="type_denuncia" id="type_denuncia" class="form-control" disabled>

											 	<option value="">Seleccione..</option>

											 	<?php foreach ($type_denuncia as  $value): ?>

											 		<option value="<?= $value->id_fune?>" <?= $value->id_fune == $denuncia->tipo_fune ? 'selected' : ''?>><?= $value->fune?></option>

											 	<?php endforeach ?>

											 </select>

										</div>

										<div class="form-group col-md-6">

											 <label for="name1">Primer Nombre</label> 

											 <input type="text" class="form-control" id="name1" name="name1" value="<?= $denuncia->p_nombre?>" disabled>

										</div>

										<div class="form-group col-md-6">

											 <label for="name2">Segundo Nombre</label> 

											 <input type="text" class="form-control" id="name2" name="name2" value="<?= $denuncia->s_nombre?>" disabled>

										</div>



										<div class="form-group col-md-6">

											 <label for="lastname1">Primer Apellido</label> 

											 <input type="text" class="form-control" id="lastname1" name="lastname1" value="<?= $denuncia->p_apellido?>" disabled>

										</div>

										<div class="form-group col-md-6">

											 <label for="lastname2">Segundo Apellido</label> 

											 <input type="text" class="form-control" id="lastname2" name="lastname2" value="<?= $denuncia->s_apellido?>" disabled>

										</div>



										<div class="form-group col-md-6">

											 <label for="type_document">Tipo de documento</label> 

											 <select name="type_document" id="type_document" class="form-control" disabled>

											 	<option value="">Seleccione..</option>

											 	<?php foreach ($type_documents as $value): ?>

											 		<option value="<?= $value->id?>" <?= $value->id == $denuncia->tipo_identidad ? 'selected' : ''?>><?=$value->nombre?></option>

											 	<?php endforeach ?>

											 </select>

										</div>

										<div class="form-group col-md-6">

											 <label for="num_document">Numero de Documento</label> 

											 <input type="text" class="form-control" id="num_document" name="num_document" value="<?= $denuncia->identidad?>" disabled>

										</div>
										<div class="form-group col-md-12">
											<a href="<?= base_url()?>operaciones/denuncias" class="btn btn-danger pull-left">Volver</a>
										</div>


											<br>

									</div>

									<div role="tabpanel" class="tab-pane fade in" id="profile" aria-labelledby="profile-tab"> 

										<br>

										

										<div class="form-group col-md-6">

											 <label for="telefono_casa">Telefono Residencial</label> 

											 <input type="text" class="form-control" id="telefono_casa" name="telefono_casa"   value="<?= $denuncia->telefono?>" disabled>

										</div>

										<div class="form-group col-md-6">

											 <label for="phone">Telefono Movil</label> 

											 <input type="text" class="form-control" id="phone" name="phone" value="<?= $denuncia->celular?>" disabled>

										</div>

										<div class="form-group col-md-12">
											<a href="<?= base_url()?>operaciones/denuncias" class="btn btn-danger pull-left">Volver</a>
										</div>


									</div> 



									<div role="tabpanel" class="tab-pane fade in" id="location" aria-labelledby="profile-tab"> 

										<br>

										<div class="form-group col-md-6">



											 <label for="provincias">Provincia</label> 



											 <select name="provincias" id="provincias" class="form-control" disabled>



											 	<option value="">Seleccione..</option>



											 	<?php foreach ($provincias as $value): ?>



											 		<option value="<?= $value->id_provincia ?>" <?= $value->id_provincia == $denuncia->id_provincia ? 'selected' : ''?>><?=$value->provincia?></option>



											 	<?php endforeach ?>



											 </select>



										</div>







										<div class="form-group col-md-6">



											 <label for="comunas">Comuna</label> 

		

											 <select name="comunas" id="comunas" class="form-control" disabled>



											 	<option value="">Seleccione..</option>



											 	<?php if ($denuncia->id_provincia != 0): ?>

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



											 <textarea name="direccion" disabled id="direccion" class="form-control"><?= $denuncia->direccion?></textarea>



										</div>
										<div class="form-group col-md-12">
											<a href="<?= base_url()?>operaciones/denuncias" class="btn btn-danger pull-left">Volver</a>
										</div>



											<br><br>



										<div>



										</div>

									</div> 

								</div>

							</form>

						</div>
						
					</div>

				</div>

			</div>

		</div>





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



			$("#btn-registro").on("click", function(){



				var datos = {

					"type_denuncia" : $("#type_denuncia").val(),

					"name1"         : $("#name1").val(),

					"name2"         : $("#name2").val(),

					"lastname1"     : $("#lastname1").val(),

					"lastname2"     : $("#lastname2").val(),

					"type_document" : $("#type_document").val(),

					"num_document"  : $("#num_document").val(),

					"email"         : $("#email").val(),

					"telefono_casa" : $("#telefono_casa").val(),

					"phone"     	: $("#phone").val(),

					"provincias" 	: $("#provincias").val(),

					"comunas"    	: $("#comunas").val(),

					"direccion" 	: $("#direccion").val()

				}







				$.ajax({



					type    : "GET",

					dataType: "json",

					data    : datos,

					url     : "<?= base_url()?>denuncias/store",



					beforeSend: function () {



				       $('#btn-registro').text(' Enviando...').attr('disabled', 'disabled').prepend('<i class="fa fa-spinner fa-spin"></i>');



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

						     location.href="<?= base_url()?>denuncias/upload/"+id_denuncia;

						}, 3000);



			        }else{



			           if(jqXHR.responseJSON.valid == true){



			           	toastr.error(jqXHR.responseJSON.message);



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

