<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Travel Dashboard </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<ul class = "nav nav-pills">
		<li role = "presentation" class = "active"> <a href="/dashboard"> Dashboard </a> </li>
		<li role = "presentation"> <a href="/trips/index"> New Trip </a> </li>
		<li role = "presentation"> <a href="/logout"> Logout </a> </li>
	</ul>
	<div class = "container-fluid">
		<h1> Hello, <?= $this->session->userdata["name"]?> </h1>
		<h4> Your Trip Schedules </h4>
		<table class = "table table-bordered">
			<thead>
				<th> Destination </th>
				<th> Travel Start Date </th>
				<th> Travel End Date </th>
				<th> Plan </th>
			</thead>
			<?php //var_dump($personal_trips); die();
			foreach($personal_trips as $my_info) { ?>
			<?php //var_dump($my_info); ?>
			<tr>
				<td> <a href="trip_info/<?=$my_info['trip_id']?>"> <?= $my_info['destination']?> </a> </td>
				<td> <?= date("M. d, Y", strtotime($my_info['travel_start'])) ?> </td>
				<td> <?= date("M. d, Y", strtotime($my_info['travel_end'])) ?> </td>
				<td> <?= $my_info['description']?> </td>
			</tr>
			<?php } ?>
		</table>

		<h4> Other User's Travel Plans </h4>
		<table class = "table table-bordered">
			<thead>
				<th> Name </th>
				<th> Destination </th>
				<th> Travel Start Date </th>
				<th> Travel End Date </th>
				<th> Do You Want to Join? </th>
			</thead>
			
			<?php foreach($other_trips as $trip_info) { ?>
			<?php //var_dump($trip_info); ?>
			<tr>
				<td> <?= $trip_info["name"]?> </td>
				<td> <a href="trip_info/<?=$trip_info['trips_id']?>"> <?= $trip_info["destination"] ?> </a></td>
				<td> <?= date("M. d, Y", strtotime($trip_info["travel_start"]))?> </td>
				<td> <?= date("M. d, Y", strtotime($trip_info["travel_end"]))?> </td>
				<td> <a href="/join/<?=$trip_info["trips_id"]?>"> Join </a> </td>
			</tr>
			<?php } ?>
			
		</table>
		
		<a href="/trips/index"> Add Travel Plan </a>
	</div>

		<?php //var_dump($this->session->userdata, $personal_trips, $all_trips); ?>

</body>
</html>