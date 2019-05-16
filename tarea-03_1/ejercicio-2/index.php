<?php
	$title = "Ejercicio 2";
	include("menus.php");
	include("functions.php");
	include("../include/tpl/header.php");
?>
	<div class="row">
	<p><br /></p>
	<h3>Dashboard</h3>
      <div class="large-6 columns">
        <h5>FootBall</h5>
		[<a href="football.php">ver lista</a>]
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
			
				<table style="width:100%;">
					<thead>
						<tr>
							<th>Equipos</th>
							<th>Jugadores</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=getCount("torneo_equipos","tipo",1);?></td>
							<td><?=getCount("torneo_jugadores_football",NULL,NULL);?></td>
						</tr>
					</tbody>
				</table>
			
            </div>
          </section>
        </div>
      </div>
      <div class="large-6 columns">
        <h5>BasketBall</h5>
		[<a href="basketball.php">ver lista</a>]
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
			
				<table style="width:100%;">
					<thead>
						<tr>
							<th>Equipos</th>
							<th>Jugadores</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=getCount("torneo_equipos","tipo",2);?></td>
							<td><?=getCount("torneo_jugadores_basketball",NULL,NULL);?></td>
						</tr>
					</tbody>
				</table>
			
            </div>
          </section>
        </div>
      </div>


<?php include("../include/tpl/footer.php"); ?>