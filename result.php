<!DOCTYPE html>
<html>
	<head>
		<title>Time Converter</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Time Converter</h1>

		<?php

			$offset = $_POST["zoneB"] - $_POST["zoneA"];

			$hour = $_POST["time_hour"] + (int)$offset;


			# for offsets with .5
			if ($offset - (int)$offset != 0){
			 	if ($offset >= 0) {
					$minute = $_POST["time_min"] + 30;
				} else {
					$minute = $_POST["time_min"] - 30;
				}
			} else {
				$minute = $_POST["time_min"];
			}

			if ($minute < 0){
				$minute = 60 + $minute;
				$hour -= 1;
			}

			#for negative offsets
			if ($hour < 0){
				$hour = 24 + $hour;
			}

			#adding hours
			if ($minute >= 60){
				$minute -= 60;
				$hour += 1;
			}

			#keeping hours within 0-23
			if ($hour >= 24){
				$hour -= 24;
			}

			echo "<p>At ";

			print_time($_POST["time_hour"],$_POST["time_min"]);

			echo " in City A, it is ";

			print_time($hour, $minute);

			echo " in City B</p>";


			function print_time($hr, $min){

				$twelve = $hr - 12;

				if ($hr > 12){
					echo $twelve;
				} elseif ($hr == 0){
					echo "12";
				}else {
					echo $hr;
				}

				echo ":";

				if ($min == 0){
					echo "00";
				} else{
					echo $min;
				}

				if ($hr >= 12){
					echo "pm";
				} else{
					echo "am";
				}

			}

		?>
	</body>
</html>