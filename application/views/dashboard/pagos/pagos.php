<!-- main content start-->

		<div id="page-wrapper">

			<div class="main-page">

				<div class="blank-page widget-shadow scroll" id="style-2 div1">

					<h3 class="title1">Pago de denuncias</h3>

					<div class="row">

						<div class="col-md-12">

							<form class="forms">

								<div class="form-group col-md-12">

									<br>

									<?php if ($tipo == 1): ?>

										 <form name="btnPago" method="post" action="https://webpay3g.transbank.cl/filtroUnificado/buttonService">
											<input type="hidden" name="buttonId" value="1025f73adcfe7d14a7c833ef988f721a"/>
											<input type="image" src="https://www.transbank.cl/public/img/botonwebpay.gif"/>
										</form>

									<?php endif ?>

									<?php if ($tipo == 2): ?>

										 <form name="btnPago" method="post" action="https://webpay3g.transbank.cl/filtroUnificado/buttonService">
											<input type="hidden" name="buttonId" value="1025f73adcfe7d14a7c833ef988f721a"/>
											<input type="image" src="https://www.transbank.cl/public/img/botonwebpay.gif"/>
										</form>

									<?php endif ?>

									<?php if ($tipo == 3): ?>

										 <form name="btnPago" method="post" action="https://webpay3g.transbank.cl/filtroUnificado/buttonService">
											<input type="hidden" name="buttonId" value="1025f73adcfe7d14a7c833ef988f721a"/>
											<input type="image" src="https://www.transbank.cl/public/img/botonwebpay.gif"/>
										</form>

									<?php endif ?>

									<?php if ($tipo == 4): ?>

										 <form name="btnPago" method="post" action="https://webpay3g.transbank.cl/filtroUnificado/buttonService">
											<input type="hidden" name="buttonId" value="1025f73adcfe7d14a7c833ef988f721a"/>
											<input type="image" src="https://www.transbank.cl/public/img/botonwebpay.gif"/>
										</form>

									<?php endif ?>



									<?php if ($tipo == 5): ?>

										 <form name="btnPago" method="post" action="https://webpay3g.transbank.cl/filtroUnificado/buttonService">
											<input type="hidden" name="buttonId" value="1025f73adcfe7d14a7c833ef988f721a"/>
											<input type="image" src="https://www.transbank.cl/public/img/botonwebpay.gif"/>
										</form>

									<?php endif ?>



									<?php if ($tipo == 6): ?>

										 <form name="btnPago" method="post" action="https://webpay3g.transbank.cl/filtroUnificado/buttonService">
											<input type="hidden" name="buttonId" value="1025f73adcfe7d14a7c833ef988f721a"/>
											<input type="image" src="https://www.transbank.cl/public/img/botonwebpay.gif"/>
										</form>

									<?php endif ?>



									<?php if ($tipo == 7): ?>

										 <form name="btnPago" method="post" action="https://webpay3g.transbank.cl/filtroUnificado/buttonService">
											<input type="hidden" name="buttonId" value="1025f73adcfe7d14a7c833ef988f721a"/>
											<input type="image" src="https://www.transbank.cl/public/img/botonwebpay.gif"/>
										</form>

									<?php endif ?>

									<?php if ($tipo == 8): ?>

										 <form name="btnPago" method="post" action="https://webpay3g.transbank.cl/filtroUnificado/buttonService">
											<input type="hidden" name="buttonId" value="1025f73adcfe7d14a7c833ef988f721a"/>
											<input type="image" src="https://www.transbank.cl/public/img/botonwebpay.gif"/>
										</form>

									<?php endif ?>


									<?php if ($tipo == 9): ?>

										 <form name="btnPago" method="post" action="https://webpay3g.transbank.cl/filtroUnificado/buttonService">
											<input type="hidden" name="buttonId" value="1025f73adcfe7d14a7c833ef988f721a"/>
											<input type="image" src="https://www.transbank.cl/public/img/botonwebpay.gif"/>
										</form>

									<?php endif ?>

									<?php if ($tipo == 10): ?>

										 <form name="btnPago" method="post" action="https://webpay3g.transbank.cl/filtroUnificado/buttonService">
											<input type="hidden" name="buttonId" value="1025f73adcfe7d14a7c833ef988f721a"/>
											<input type="image" src="https://www.transbank.cl/public/img/botonwebpay.gif"/>
										</form>

									<?php endif ?>

									

								</div>

								

								<div class="form-group col-md-12">

									<!-- <a id="btn-save" class="btn btn-primary pull-right">Guardar</a> -->

								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>





<script>

	$("#tipe").on("change", function(){

		var op = $("#tipe").val();

		if (op == 1) {

		   $("#btn_factura").css("display", "block");

		}else{

			$(".btn-factura").css("display", "none");

		}

	})

</script>