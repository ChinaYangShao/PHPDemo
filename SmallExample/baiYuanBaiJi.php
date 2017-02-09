<html>
<head>
	<meta charset="utf-8">
	<title>百元百鸡</title>
</head>
<?php
include 'php/php.php';   // 引入文件
?>
<link rel="stylesheet" type="text/css" href="css/css.css">   <!--  引入css文件  --> 
<body>
<div>
<h1>问：</h1>    
<h2>公鸡5元一只，母鸡3元一只，小鸡一元3只，100元钱买了100只鸡，公鸡母鸡小鸡各多少只？</h2>
<hr>
<?php
/*
        百元百鸡
问：公鸡5元一只，母鸡3元一只，小鸡一元3只，100元钱买了100只鸡，公鸡母鸡小鸡各多少只？
*/

baiYuanBaiJi1();
echo "<hr>";
baiYuanBaiJi2();

// 优化之前
function baiYuanBaiJi1(){
	echo "<h2>优化之前</h2>";
	$t1 = floatMicroTime();
	$z = 0;
	for ($gongJi=0; $gongJi <= 100; $gongJi++) { 
		for ($muJi=0; $muJi <= 100; $muJi++) { 
			for ($xiaoJi=0; $xiaoJi <=100 ; $xiaoJi++) { 
				$z++;
				if (($gongJi + $muJi + $xiaoJi == 100) && ($gongJi * 5 + $muJi * 3 + $xiaoJi / 3 == 100)) {
					echo "公鸡：$gongJi,母鸡：$muJi,小鸡：$xiaoJi <br>";				
				}
			}
		}
	}
	echo "运算次数为：$z 次<br>";
	$t2 = floatMicroTime();
	$t = $t2 - $t1;
	echo "运算时间为：" . $t . "秒<br>";
}

// 优化之后
function baiYuanBaiJi2(){
	echo "<h2>优化之后</h2>";
	$t1 = floatMicroTime();
	$z = 0;
	for ($gongJi=0; $gongJi <= 100/5; $gongJi++) { 
		for ($muJi=0; $muJi <= (100-$gongJi*5)/3; $muJi++) { 
				$xiaoJi = (100-$gongJi*5-$muJi*3)*3;
				if ($gongJi + $muJi + $xiaoJi == 100	) {
					echo "公鸡：$gongJi,母鸡：$muJi,小鸡：$xiaoJi <br>";
				}
				$z++;
		}
	}
	echo "运算次数为：$z 次<br>";
	$t2 = floatMicroTime();
	$t = $t2 - $t1;
	echo "运算时间为：" . $t . "秒<br>";
}
?>

</div>
</body>
</html>