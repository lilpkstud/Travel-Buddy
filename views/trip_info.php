<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Destination</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<?php //var_dump($trip_info, $favorite); ?>
	<ul class = "nav nav-pills">
		<li role = "presentation"> <a href="/dashboard"> Dashboard </a> </li>
		<li role = "presentation"> <a href="/trips/index"> New Trip </a> </li>
		<li role = "presentation"> <a href="/logout"> Logout </a> </li>
	</ul>
	<div class = "container-fluid">
		<h1> <?= $trip_info["destination"] ?> </h1>
		<p>
			Planned By: <?= $trip_info["name"]?>
		</p>
		<p>
			Description: <?= $trip_info["description"] ?>
		</p>
		<p>
			Traveling From: <?= date("M. d, Y", strtotime($trip_info["travel_start"]))?>
		</p>
		<p>
			Traveling To: <?= date("M. d, Y", strtotime($trip_info["travel_end"]))?>
		</p>

		<h1> Other Users' Joining the Trip </h1>
		<ul>
			<?php foreach($favorite as $person) { ?>
			<li> <?= $person['name']?> </li>
			<?php } ?>
		</ul>
	</div>
</body>
</html>