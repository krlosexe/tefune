<!-- main content start-->

		<div id="page-wrapper">

			<div class="main-page">

				<div class="blank-page widget-shadow scroll" id="style-2 div1">

					<h3 class="title1">Registrar Denuncia por Arriendo Equipos</h3>

					<div class="row">

						<div class="col-md-12">

							<form class="forms">

								<div class="form-group col-md-6">

									 <label for="marca">Marca</label> 

									 <input type="text" class="form-control" id="marca" name="marca" >

								</div>



								<div class="form-group col-md-6">

									 <label for="ano">Año</label> 

									 <input type="number" class="form-control" id="ano" name="ano" >

								</div>



								<div class="form-group col-md-6">

									 <label for="caracteristicas">Caracteristicas</label> 

									 <input type="text" class="form-control" id="caracteristicas" name="caracteristicas" >

								</div>



								<div class="form-group col-md-6">

									 <label for="monto_deuda">Monto deuda</label> 

									 <input type="text" class="form-control" id="monto_deuda" name="monto_deuda" >

								</div>

								<div class="form-group col-md-6">
									 <div class="checkbox"> 
									 	<label> <input type="checkbox" id="aceptar"> Acepto los <a target="_banck" href="<?= base_url()?>terminos/terminos-y-condiciones.pdf">Terminos y condiciones</a> </label> 
									 </div>
								</div>

								<div class="form-group col-md-12">
									<a href="<?= base_url()?>operaciones/denuncias/<?= $controlador?>" class="btn btn-danger pull-left">Volver</a>
									<a id="btn-save" class="btn btn-primary pull-right" disabled >Guardar</a>
								</div>

							</form>

							

						</div>

					</div>

				</div>

			</div>

		</div>









		<script>
			var act = 0;
			$("#aceptar").on("change", function(){
				if (act == 0) {
					$("#btn-save").removeAttr("disabled");
					act = 1;
				}else if (act == 1) {
					$("#btn-save").attr("disabled", "disabled");
					act = 0;
				}
			});
			$("#btn-save").on("click", function(){

				var datos = {

					"marca"            : $("#marca").val(),

					"ano"              : $("#ano").val(),

					"caracteristicas"  : $("#caracteristicas").val(),

					"monto_deuda"      : $("#monto_deuda").val()

					

				}



				$.ajax({



					type    : "GET",

					dataType: "json",

					data    : datos,

					url     : "<?= base_url()?>operaciones/denuncias/store_arriendo_equipos",



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



						     location.href="<?= base_url()?>operaciones/denuncias/upload/7/"+id_denuncia;



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

