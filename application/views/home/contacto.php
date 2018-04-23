<!-- contact -->
	<div class="contact" id="contact">
		<div class="container">
			<div class="wthree-heading">
				<h3>Contacto</h3>
				<p></p>
			</div>
			<div class="contact-form">
				<form action="#" method="post">
					<div class="fields-grid">
						<div class="styled-input agile-styled-input-top">
							<input type="text" name="Full Name" id="name_con" required="">
							<label>Nombre y Apellido</label>
							<span></span>
						</div>
						<div class="styled-input agile-styled-input-top">
							<input type="text" name="Phone"  id="telefono_con" required=""> 
							<label>Telefono</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="email" name="Email" id="email_con" required=""> 
							<label>Correo</label>
							<span></span>
						</div> 
						<div class="styled-input">
							<input type="text" name="Subject" id="asunto_con" required="">
							<label>Motivo</label>
							<span></span>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="styled-input textarea-grid">
						<textarea name="Message" id="message_con" required=""></textarea>
						<label>Mensaje</label>
						<span></span>
					</div>	 
					<button type="button" class="btn btn-primary" id="btn-contacto">Enviar</button>
				</form>
			</div>
		
		</div>
	</div>
	<!-- //contact -->



	<script>
			$("#btn-contacto").on("click", function(){
				var datos = {
					"name"       : $("#name_con").val(),
					"telefono"   : $("#telefono_con").val(),
					"email"      : $("#email_con").val(),
					"asunto"     : $("#asunto_con").val(),
					"message"    : $("#message_con").val()
				}

				$.ajax({
					type    : "GET",
					dataType: "json",
					data    : datos,
					url     : "<?= base_url()?>home/contact",

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
				       
			        }else{
			           if(jqXHR.responseJSON.valid == true){
			           	toastr.error(jqXHR.responseJSON.message);
			           }else{
			           	toastr.error(jqXHR.responseJSON.message);
			           }
			         }
			    }
			  })
			  .always(() => {
		        $('#btn-contacto').text('Enviar').removeAttr('disabled');
		      });
				//console.log(datos);
			})
	</script>