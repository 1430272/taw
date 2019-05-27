<?php Nucleo::require_session(); ?>
                <div class="col-lg-12">
                    <h1 class="page-header">Fotos de la habitacion</h1>
                </div>


<?php
			$vistaUsuario = new FotosController();
			$vistaUsuario::ver_fotos();
?>
