<?php require RUTA_APP.'/views/shared/header.php' ?>

<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Servicios mas frecuentes</h2>
					<p>Servicios realizados con mayor frecuencia por nuestros clientes</p>
				</div>
			</div>
			<div class="row">
 
				<?php 

					foreach ($datos as $cards => $card) 
					{
						
						echo( '<div class="col-lg-4 col-md-4 col-sm-6">
									<a href="images/img_1.jpg" class="fh5co-card-item image-popup">
										<figure>
											<div class="overlay"><i class="ti-plus"></i></div>
											<img src="'.$card['imagen'].'" alt="Image" class="img-responsive">
										</figure>
										<div class="fh5co-text">
											<h2>'.$card['service'].'</h2>
											<p>'.$card['descripcion'].'</p>
											<p><span class="btn btn-primary">Schedule a Trip</span></p>
										</div>
									</a>
								</div>');
					}
				?>
			</div>
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
					<h1>We have high quality services that you will surely love!</h1>
				</div>	
			</div>
		</div>
	</div>

	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Our Success</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="196" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Destination</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Hotels</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12402" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Travelers</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Happy Customer</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>

	

	<div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Subscribe</h2>
					<p>Be the first to know about the new templates.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Your Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require RUTA_APP.'/views/shared/footer.php' ?>