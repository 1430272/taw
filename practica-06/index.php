<?php

/*
====== REQUERIMENTOS PARA LA PRACTICA 06 ======
- habitaciones
	- imagenes
	- tipo
- clientes
	- tipo (no se relaciona, se calcula segun el numero de reservaciones que realiza)
- reservaciones
*/

/*
 * Hice algunos cambios al diseno de este patron MVC para mantener un mejor order,
 * como cambiar el nombre de los ficheros para que sean similar al nombre de la clase 
 * y asi evitar confundir los nombres de los objetos.
 * Tambien Hice un controlador y un modelo para cada modulo para 
 * no tener todo amontonado en un mismo controlador y/o modelo.
 */

//Algunas definiciones de configuracion basica
define("_sitename_", "Reservaciones");	//en "layout.php", aparecera esto en <title> dentro del encabezado de la plantilla
define("_theme_", "sb-admin");			//nombre del folder del nombre de la plantilla

/* La plantilla que elegi es tan vieja que ni siquiera es compatible con DataTables. Para la otra */

require_once "enlaces.php";				//Rutas de todos los Modulos
require_once "controllers/Nucleo.php";	//El controlador principal de todo el MVC (Antes llamado "mvcController")
require_once "models/CRUD.php";			//Modelos, por default trae metodos

$dbt = new CRUD();
$dbt -> init_all_models(); //Inicializar todos los modelos
$mvc = new Nucleo();	//Objeto nucleo
$mvc -> init_all_ctrlrs(); //Inicializar todos los controladores
#$mvc -> init_all_models();
$mvc -> init_layout();	//Renderizar la plantilla. PD: Agregue una con mejor diseno	(no me parecio que el metodo se llamara "pagina")

#ME LLEVE MAYOR TIEMPO DE LA SEMANA REDISE&Ntilde;ANDO ESTE PATRON MCV que desarrollando la practica completa,
#Al menos ya no parece tan complejo este patron MVC.

?>