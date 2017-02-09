<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>灯泡开关</title>
</head>
<link rel="stylesheet" type="text/css" href="css/css.css">
<body>
<div>
<?php
/*
	用一个变量控制多个灯泡的开关
	
	灯泡1        1 ==> 00000001
	灯泡2        2 ==> 00000010
	灯泡3        4 ==> 00000100
	灯泡4        8 ==> 00001000
	灯泡5       16 ==> 00010000

	二进制： 1 表示开，0 表示关
*/
const d1 = 1;	//灯泡1   1 ==> 00000001
const d2 = 2;	//灯泡2   2 ==> 00000010
const d3 = 4;	//灯泡3   4 ==> 00000100
const d4 = 8;	//灯泡4   8 ==> 00001000
const d5 = 16;	//灯泡5  16 ==> 00010000
$d = 0;	//所有灯泡状态    0 ==> 00000000

showAll();
openD("d2");
openD("d2");
openD("d5");
unD("d5");
unD("d3");
showAll();
//unAll();
// showAll();
openAll();
showAll();

// 关闭某个灯泡
function unD($ds){
	global $d;
	$dn = substr($ds, 1); // 截取字符串ds，例："2" = substr("d2",1); 
	if (constant($ds) & $d) {		
		$d = $d & ~constant($ds); // 关闭灯泡
		echo "灯泡$dn:关闭成功";
	}else{
		echo "灯泡$dn:已关闭，无需再关闭";
	}
	echo "<br>";
	echo "<br>";
}

// 打开某个灯泡
function openD($ds){
	global $d;
	$dn = substr($ds, 1);
	if (constant($ds) & $d) {		
		echo "灯泡$dn:已打开，无需再打开";
	}else{
		$d = $d | constant($ds); //打开灯泡
		echo "灯泡$dn:打开成功";
	}
	echo "<br>";
	echo "<br>";
}

// 查看所有灯泡的状态
function showAll(){
	for($i = 1; $i <= 5; $i++){
		$dAll = 'd'.$i;	
		global $d;
		if (constant($dAll) & $d) {
			echo "灯泡$i:亮<br>";
		}else{
			echo "灯泡$i:灭<br>";
		}
	}
	echo "<br>";	
}

// 关闭所有的灯泡
function unAll(){
	global $d;
	$d = 0;
	echo "成功关闭所有灯泡<br><br>";
}

// 打开所有灯泡
function openAll(){
	global $d;
	// $d = d1 + d2 + d3 + d4 + d5;
	$d = ~0;
	echo "$d 成功打开所有灯泡<br><br>";
}
?>
</div>
</body>
</html>

