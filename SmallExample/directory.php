<html>
<head>
	<meat charset='utf-8'>
	<title>目录</title>
</head>
<?php	
	/* 遍历文件夹下的文件（目录） */
	function directory(){
		$dir = dir(dirname(__file__));
		while (($directory =$dir->read()) !== false) {
			echo $directory . "<br>";
		}
		$dir->close();
	}
?>

<body>
<?php
	directory();
?>
</body>
</html>