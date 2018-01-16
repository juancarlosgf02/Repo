<?php

get_header(); ?>
    <section class="afiliate">
    	<div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
            	<div>
            		<img src="http://www.triathlon.com.pe/media/wysiwyg/reclamaciones/libro-de-reclamaciones.png" style="width: 100%; margin: 30px 0 25px;">
            		<p class="text-justify">Conforme a lo establecido en el código de la Protección y Defensa del consumidor, contamos con un libro de reclamaciones a tu disposición.</p>
					<p class="text-justify">Ingresa una queja o reclamo aquí. Recuerda que los campos con un (*) son obligatorios</p>
            	</div>
            	<div class="reclamaciones">
            		<h4 style="color: #000; margin: 25px 0 15px;">HOJA DE RECLAMACIÓN Nº 000850</h4>
            		<p>Fecha de Reclamo o queja: <strong class="fecha">29 de mayo de 2017</strong></p>
            		<?php
						if ( function_exists( 'ninja_forms_display_form' ) ) {
						  ninja_forms_display_form( 3 );
						}
					?>
            	</div>
            	<div style="margin-bottom: 30px;">
            		<h4 style="color: #000; margin: 0 0 20px;">NOTA:</h4>
            		<p class="text-justify"><strong>Reclamo(*): </strong>Disconformidad relacionada a los bienes expendidos o suministrados o a los servicios prestados.</p>
					<p class="text-justify"><strong>Queja(*): </strong>Disconformidad que NO se encuentran relacionada a los bienes expendidos o suministrados o a los servicios prestados.</p>
					<p class="text-justify">El proveedor deberá dar respuesta al reclamo en un plazo no mayor de treinta (30) días calendario, pudiendo ampliar el plazo hasta por treinta (30) días más, previa comunicación al consumidor.</p>
            	</div>
			</div>
		</div>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/borde-final.png">
    </section>
<?php

get_footer(); ?>