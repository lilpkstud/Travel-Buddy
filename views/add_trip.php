<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Add Plan </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<ul class = "nav nav-pills">
		<li role = "presentation"> <a href="/dashboard"> Dashboard </a> </li>
		<li role = "presentation" class = "active"> <a href="/trips/index"> New Trip </a> </li>
		<li role = "presentation"> <a href="/logout"> Logout </a> </li>
	</ul>
	<div class = "container-fluid">
		<?= $this->session->flashdata('trip_errors') ?>
		<h1> Add A Trip </h1>
		<form action = "/trips/add_trip" method = "post">
			<p>
				Destination:
				<input type = "text" name = "destination">
			</p>
			<p>
				Description:
				<input type = "text" name = "description">
			</p>
			<p>
				Travel Date From:
				<input type = "date" name = "travel_start">
			</p>
			<p>
				Travel End To:
				<input type = "date" name = "travel_end">
			</p>
			<input type = "submit" value = "Add Trip">
		</form>
	</div>
</body>
</html>