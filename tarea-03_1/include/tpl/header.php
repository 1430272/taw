<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$title;?></title>
    <link rel="stylesheet" href="../include/assets/css/foundation.css" />
    <link rel="stylesheet" href="../include/assets/css/custom.css" />
    <script src="../include/assets/js/vendor/modernizr.js"></script>
    <script src="../include/assets/js/vendor/jquery.js"></script>
    <script src="../include/assets/js/bootstrap.min.js"></script>
  </head>
  <body>
	<div class="row">
      <div class="large-3 columns">
        <h1><img src="../include/assets/img/logo.png"/></h1>
      </div>
      <div class="large-9 columns">
        <ul class="right button-group">
		  <?php	
				foreach ($menus as $key => $menu){
					echo '<li><a href="'.$menu["li_link"].'" class="button">'.$menu["li_name"].'</a></li>';
				}
		  ?>
        </ul>
      </div>
    </div>