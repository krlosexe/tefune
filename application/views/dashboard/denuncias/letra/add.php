<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Registrar Denuncia por Letra</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
								 	<label for="no_letra">Numero de letra</label> 
									 <input type="text" class="form-control" id="no_letra" name="no_letra" >
								</div>
								<div class="form-group col-md-6">
									 <label for="fecha_vencimiento">Fecha de vencimiento</label> 
									 <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" >
								</div>

								<div class="form-group col-md-6">
									 <label for="rut_deudor">Rut del deudor</label> 
									 <input type="text" class="form-control" id="rut_deudor" name="rut_deudor" >
								</div>
								<div class="form-group col-md-6">
									 <label for="nombre_deudor">Nombre del deudor</label> 
									 <input type="text" class="form-control" id="nombre_deudor" name="nombre_deudor" >
								</div>

								
								<div class="form-group col-md-6">
									 <label for="monto">Monto</label> 
									 <input type="text" class="form-control" id="monto" name="monto">
								</div>

								<div class="form-group col-md-6">
									 <label for="notaria">Notaria</label> 
									 <input type="text" class="form-control" id="notaria" name="notaria">
								</div>

								<div class="form-group col-md-12">
									 <label for="tipo_deuda">Tipo de deuda</label> 
									 <input type="text" class="form-control" id="tipo_deuda" name="tipo_deuda">
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
					"no_letra"          : $("#no_letra").val(),
					"fecha_vencimiento" : $("#fecha_vencimiento").val(),
					"rut_deudor"        : $("#rut_deudor").val(),
					"nombre_deudor"     : $("#nombre_deudor").val(),
					"monto"             : $("#monto").val(),
					"notaria"           : $("#notaria").val(),
					"tipo_deuda"        : $("#tipo_deuda").val()
				}

				$.ajax({

					type    : "GET",
					dataType: "json",
					data    : datos,
					url     : "<?= base_url()?>operaciones/denuncias/store_letra",

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

						     location.href="<?= base_url()?>operaciones/denuncias/upload/3/"+id_denuncia;

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
