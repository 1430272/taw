<?php
	$title = "Ejercicio 1";
	include("menus.php");
	include("functions.php");
	include("../include/tpl/header.php");
?>
	<div class="row">
      <div class="large-12 columns">
        <h5>Contando datos</h5>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
			
				<table style="width:100%;">
					<thead>
						<tr>
							<th>Usuarios</th>
							<th>Tipos</th>
							<th>Status</th>
							<th>Accesos</th>
							<th>Usuarios Activos</th>
							<th>Usuarios Inactivos</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=getCount("user",NULL,NULL);?></td>
							<td><?=getCount("user_type",NULL,NULL);?></td>
							<td><?=getCount("status",NULL,NULL);?></td>
							<td><?=getCount("user_log",NULL,NULL);?></td>
							<td><?=getCount("user","status_id",1);?></td>
							<td><?=getCount("user","status_id",2);?></td>
						</tr>
					</tbody>
				</table>

            </div>
          </section>
        </div>
      </div>
	</div>
	
	
	<div class="row">

      <div class="large-12 columns">
        <h5>a) user</h5>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
			
				<?php echo getRows("user",NULL,NULL); ?>
	
            </div>
          </section>
        </div>
      </div>

      <div class="large-12 columns">
        <h5>b) user_type</h5>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
			
				<?php echo getRows("user_type",NULL,NULL); ?>
	
            </div>
          </section>
        </div>
      </div>

      <div class="large-12 columns" >
        <h5>c) status</h5>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
			
				<?php echo getRows("status",NULL,NULL); ?>
	
            </div>
          </section>
        </div>
      </div>

      <div class="large-12 columns">
        <h5>d) user_log</h5>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
			
				<?php echo getRows("user_log",NULL,NULL); ?>
	
            </div>
          </section>
        </div>
      </div>

	</div>
	
	
	<div class="row">
	
      <div class="large-12 columns">
        <h5>e) user, status_id, 1 (Users activos)</h5>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
			
				<?php echo getRows("user","status_id",1); ?>
	
            </div>
          </section>
        </div>
      </div>

      <div class="large-12 columns">
        <h5>f) user, status_id, 2 (Users inactivos)</h5>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
			
				<?php echo getRows("user","status_id",2); ?>
	
            </div>
          </section>
        </div>
      </div>
	  
	</div>

	

<?php include("../include/tpl/footer.php"); ?>