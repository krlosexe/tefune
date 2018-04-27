
		<div id="page-wrapper" style="height: 2524px !important:">
			<h2 class="title1">Cambiar Contraseña</h2>
	
			<div class="col-md-12">
				<div class="blank-page widget-shadow scroll" >
					<h3 class="title1">Seguridad</h3>
					<div class="row">

						<div class="col-md-12">

							<form  class="row forms" method="POST">

								<div class="form-group col-md-12">

									 <label for="pass">Contraseña Actual</label> 

									 <input type="password" class="form-control" id="pass" name="pass" value="">

								</div>

								<div class="form-group col-md-12">

									 <label for="pass1">Nueva Contraseña</label> 

									 <input type="password" class="form-control" id="pass1" name="pass1"  value="">

								</div>

								<div class="form-group col-md-12">

									 <label for="pass2">Repita la contraseña</label> 

									 <input type="password" class="form-control" id="pass2" name="pass2"  value="">

								</div>



								<center><button type="button" id="btn-pass" class="btn btn-primary">Actualizar</button></center>

							</form>

						</div>

					</div>
				</div>
			</div>





		</div>

		


		








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