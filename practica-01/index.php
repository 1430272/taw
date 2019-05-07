<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>form</title>
	<style> .error { color:red; } </style>
</head>
<body>
<h2>PHP Form Validation Example</h2>

<?php

$nameErr = "";
$genderErr = "";
$emailErr = "";
$websiteErr = "";

require_once("form.class.php");
if(isset($_POST["submit"]) && isset($_POST["name"]) || isset($_POST["gender"]) || isset($_POST["email"]) || isset($_POST["website"])){

	$name		= $_POST["name"];
	if(empty($_POST["gender"])){ $gender=""; } else { $gender	= $_POST["gender"]; }
	$email		= $_POST["email"];
	$website	= $_POST["website"];
	$comment	= $_POST["comment"];
	
	$form = new Form($name, $gender, $email, $website, $comment, $nameErr, $genderErr, $emailErr, $websiteErr);
	if(!$form->validate($name, $gender, $email, $website, $comment, $nameErr, $genderErr, $emailErr, $websiteErr)){
		echo '<b>Entra a error</b> ';
		#echo $form->getErrorMessage();
			$nameErr = $form->getErrorMessage($name);
			$genderErr = $form->getErrorMessage($gender);
			$emailErr = $form->getErrorMessage($email);
			$websiteErr = $form->getErrorMessage($website);
	} else {
		echo '<b>Entra a salida</b> ';
		echo $form->OutPut();
	}
}
?>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
	<tbody>
		<tr>
			<th>Name</th>		<td><input type="text" name="name" /></td>	<td><span class="error">* <?php echo $nameErr;?></span></td>
		</tr>
		<tr>
			<th>Gender</th>		<td><input type="radio" name="gender" value="male">Male <input type="radio" name="gender" value="female">Female</td>	<td><span class="error">* <?php echo $genderErr;?></span></td>
		</tr>
		<tr>
			<th>E-mail</th>		<td><input type="text" name="email" /></td>	<td><span class="error">* <?php echo $emailErr;?></span></td>
		</tr>
		<tr>
			<th>Website</th>	<td><input type="text" name="website" /></td>	<td><span class="error">* <?php echo $websiteErr;?></span></td>
		</tr>
		<tr>
			<th>Comment</th>	<td><textarea name="comment" rows="5" cols="22"></textarea></td>	<td></td>
		</tr>
		<tr>
			<td></td>			<td><input type="submit" name="submit" value="Submit"></td><td></td>
		</tr>
	</tbody>
</table>
</form>

</body>
</html>