
        <footer>
            <div class="row">
                <div class="text-center">
                    Triathlon Catálogos Deportivos | Todos los derechos reservados | <?php echo date("Y"); ?>
                </div>
            </div>
        </footer>
    </div>

    <?php wp_footer(); ?>

  	<script src="//code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
  	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" type="text/javascript"></script>
  	<script type="text/javascript">
        $(document).ready(function() {
            $("#modal-ads").modal('show');
            $('#carousel-marcas').carousel({
          	    interval: 3000
          	});
        });
    </script>
</body>
</html>
