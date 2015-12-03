<!DOCTYPE html>
<hmtl>
	<head>
		<title>Single Family Home</title>
	</head>
	<body>
	<?php
		$SingleFamilyHome = 399500;
		$SingleFamilyHome_Print=number_format($SingleFamilyHome,2);
		echo "<p>TheCurrent median price of a single family home in Pleasanton, CA is $$SingleFamilyHome_Print.</p>"
    ?>
	</body>
</html>