<?php require RUTA_APP.'/views/shared/header.php' ?>

<div class="gtco-section1">
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
				<h2>Ultimos Servicios Realizados</h2>
				<p>Lista de los servicios mas recientes</p>
			</div>
		</div>
		<div class="row">
		<?php 	
		
		foreach ($datos['CardServ'] as $cards => $card) 
		{
			
			echo( '<div class="col-lg-4 col-md-4 col-sm-6">
						<a class="fh5co-card-item ">
							<figure>
								<div class="overlay"><i></i></div>
								<img src="'. RUTA_URL .'/public/images/pagina/'.$card->imageName.'" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>'.$card->name.' '.$card->operadoraname.' '.$card->pais.'</h2>
								<p>'.$card->descripcion.'</p>
								<p><span class="btn btn-primary">Schedule a Trip</span></p>
							</div>
						</a>
					</div>
					');
		}
		?>
		</div>
	</div>
	
	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Como funciona</h2>
					<p>Cual es el proceso para solicitar un servicio en la pagina</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>1</i>
						</span>
						<h3>llenar solicitud de servicio</h3>
						<p>LLene los datos solicitados en el formulario que se encuentra al inicio de la pagina </p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>2</i>
						</span>
						<h3>Pagar servicio</h3>
						<p>Pagar el precio del servicio solicitado al numero de cuenta que se te envio por correo electronico y WhatsApp 
							junto con la cantidad total a pagar</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>3</i>
						</span>
						<h3>Enviar boutcher de pago</h3>
						<p>El boucher de pago se puede enviar a los siguientes medios: <br>
							<a href="https://wa.me/528711726623"><span class='colorTextLink'>Whatsapp</span></a><br>
							<a href="http://m.me/CodigoLiberacionViaIMEI"><span class='colorTextLink'>Facebook</span></a><br>
							<a href="https://wa.me/528711726623"><span class='colorTextLink'>Email</span></a><br>
						</p>
					</div>
				</div>
				

			</div>
		</div>
	</div>


	<div class="gtco-cover gtco-cover-sm" style="background-image: url(images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<h1>Nosotros tenemos alta calidad en nuestros servicios</h1>
				</div>	
			</div>
		</div>
	</div>

<?php require RUTA_APP.'/views/shared/footer.php' ?>