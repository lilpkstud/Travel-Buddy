<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Login/Registration </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class = "container-fluid"> 
		<h1>Welcome!</h1>
		<?= $this->session->flashdata('errors') ?>
		<?= $this->session->flashdata('success') ?>
		<form action = "/users/registration" method = "post">
			<h3> Register </h3>
			<p>
				Name:
				<input type = "text" name = "name">
			</p>
			<p>
				Username: 
				<input type = "text" name = "user_name">
			</p>
			<p>
				Password:
				<input type = "password" name = "password"> <br>
				***Password should be at least 8 characters 
			</p>
			<p>
				Confirm Password:
				<input type = "password" name = "password_confirmation">
			</p>
			<input type = "submit" value = "Register">
		</form>

		<form action = "/users/login" method = "post">
			<h3> Login </h3>
			<p>
				Username:
				<input type = "text" name = "user_name">
			</p>
			<p>
				Password:
				<input type = "password" name = "password">
			</p>
			<input type = "submit" value = "Login">
		</form>
	</div>
</body>
</html>