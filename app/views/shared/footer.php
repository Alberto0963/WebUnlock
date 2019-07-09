
	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Acerca de</h3>
						<p>Somos un grupo que ayuda a que sus clientes puedan usar sus celulares con las diferentes operadoras del pais</p>
					</div>
				</div>
				
				<div class="col-md-2 col-md-push-1">

				</div>

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Servicios</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Remover Icloud</a></li>
							<li><a href="#">Liberar celular de EE.UU o Canada</a></li>
							<li><a href="#">Liberar celular Mexico</a></li>
							<li><a href="#">Limpieza de IMEI</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Contacto</h3>
						<ul class="gtco-quick-contact">
							<li><a href="https://wa.me/528711726623"><i class="icon-phone"></i> +52 871-172-6623</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@freehtml5.co</a></li>
							<li><a href="http://m.me/CodigoLiberacionViaIMEI"><i class="icon-chat"></i> Chat</a></li>
						</ul>
					</div>
				</div>

			</div>
			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; <?php echo(date('Y')); ?> WebUnlockMexico. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="https://freehtml5.co/" target="_blank">WebUnlockMexico</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="https://web.facebook.com/CodigoLiberacionViaIMEI"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.instagram.com/liberaciones_express_mexico/"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://wa.me/528711726623"><i class="fa fa-whatsapp"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?php echo RUTA_URL;?>/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo RUTA_URL;?>/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo RUTA_URL;?>/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo RUTA_URL;?>/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="<?php echo RUTA_URL;?>/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="<?php echo RUTA_URL;?>/js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="<?php echo RUTA_URL;?>/js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="<?php echo RUTA_URL;?>/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo RUTA_URL;?>/js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="<?php echo RUTA_URL;?>/js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="<?php echo RUTA_URL;?>/js/main.js"></script>
	<script type="text/javascript">
		$(document).on('change', '#servicio', function(event) 
		{
			//var valor = $('servicio').val();
			var valor = $("#servicio option:selected").text();
			console.log($("#servicio option:selected").text());
			if(valor == 'Limpieza de IMEI ')
			{
     			$('#divOperadora').hide();
			}
			else
			{
				$('#divOperadora').show();
			}
		});

		function isNumberKey(evt, entrada){
	         	var charCode = (evt.which) ? evt.which : event.keyCode
	         	if (evt.keyCode == 13 && entrada.length<14) {
	         		limpia();
	         		document.getElementById("msgValidation").style.display="block";
	    	     	return false;
	    	    }
	         	else if(entrada.length>13){
	         		limpia();
	         	}
    	     	if (charCode > 31 && (charCode < 48 || charCode > 57)){
        	    	return false;
    	     	}
         		return true;
      		}
			function limpia(){
				document.getElementById("msgValidation1").style.display="none";
				document.getElementById("msgValidation").style.display="none";
			}
			function validar(inputtxt){ 
    			var field = inputtxt.value; 
    			limpia();    			
    			if(field.length<14){ 
    				document.getElementById("msgValidation").style.display="block";
    			}
	    		else{
    				document.getElementById("form1").submit();
    			}
    		}
	</script>

	</body>
</html>
