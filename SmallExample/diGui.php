<html>
<head>
	<meta charset="utf-8">
	<title>递归</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<script type="text/javascript" src="js/js.js"></script>
<body>
<div>
	<?php
		function diGui($x){
			static $y = 0;
			$y++;
			echo $y."<br>";

			if (97>=$x) {
				return $x + diGui($x+1);
			}else{
				return 0;
			}
		}
		$z = diGui(0);
		echo $z;
	?>

</div>
</body>
</html>