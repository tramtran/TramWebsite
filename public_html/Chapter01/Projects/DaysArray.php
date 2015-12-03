<!DOCTYPE html>
<hmtl>
	<head>
		<title>Exercise 1-4</title>
	</head>
	<body>
	<?php
		$Days = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
		print_r( "<p>The days of the week in English are: </br>$Days[0]</br>$Days[1]</br>$Days[2]</br>$Days[3]</br>$Days[4]</br>$Days[5]</br>$Days[6]</p>");
		$Days[0]="Dimanche";
		$Days[1]="Lundi";
		$Days[2]="Mardi";
		$Days[3]="Mecredi";
		$Days[4]="Jeudi";
		$Days[5]="Vendredi";
		$Days[6]="Samedi";
		echo "<p>The days of the week in French are: </br>$Days[0]</br>$Days[1]</br>$Days[2]</br>$Days[3]</br>$Days[4]</br>$Days[5]</br>$Days[6]";
		
	?>
	</body>
</html>