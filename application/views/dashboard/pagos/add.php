<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<h3 class="title1">Validar pago</h3>
					<div class="row">
						<div class="col-md-12">
							<form class="forms">
								<div class="form-group col-md-6">
									<label for="codigo">Codigo</label>
									<input type="number" name="codigo" id="codigo" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label for="fecha">Fecha</label>
									<input type="date" name="fecha" id="fecha" class="form-control">
								</div>
								<div class="form-group col-md-12">
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
					"codigo" : $("#codigo").val(),
					"fecha"  : $("#fecha").val(),
					"tipo"   : <?= $tipo?>,
					"id"     : <?= $id?>
				}

				$.ajax({

					type    : "GET",
					dataType: "json",
					data    : datos,
					url     : "<?= base_url()?>operaciones/pagos/store",

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

						     location.href="<?= base_url()?>/dashboard";

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
