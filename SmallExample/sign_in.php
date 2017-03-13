<?php
/*
*此demo模仿注册页面写的一个小练习。
*
*下面是数据库表的设计
create table user_info(
	id int auto_increment key,   # ID
	user_name varchar(30) unique not null,   # 用户名
	user_pswd varchar(32) not null,   # 密码
	user_age tinyint unsigned,   # 年龄
	user_sex enum('保密','男','女') default '保密',   # 性别
	user_skill set('PHP','MySQL','JS','HTML','CSS'),  # 技能
	date_time datetime default now()
)auto_increment=10000 charset=utf8;
*/

/* 链接数据库 */
$mysqli = mysqli_connect("localhost", "root","");
mysqli_set_charset($mysqli, "utf8");
mysqli_query($mysqli, "use userdb;");

/* 删除 */
if ($_GET) {
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "delete from user_info where id=$id;";
		$result = mysqli_query($mysqli, $sql);
		if ($result === false) {
			$errMsg = "执行失败，请参考：" . mysql_error();
		}else{
			$errMsg = "删除成功。";
		}
	}
}

/* 添加 */
if ($_POST) {
	$user_name = $_POST["user_name"];
	$user_pswd = $_POST["user_pswd"];
	$user_age = $_POST["user_age"];
	$user_sex = $_POST["user_sex"];
	$user_skill = empty($_POST["user_skill"]) ? array() : $_POST["user_skill"];  //数组

	if (empty($user_name) || empty($user_pswd)) {
		$errMsg = "用户名或密码不能为空。";
	}else{
		$user_skillSum = array_sum($user_skill);
		$sql = "insert into user_info(user_name, user_pswd, user_age, user_sex, user_skill) values"	;
		$sql .= "('$user_name', '$user_pswd', '$user_age', '$user_sex', '$user_skillSum');"	;
		$result = mysqli_query($mysqli, $sql);
		if ($result === false) {
			$errMsg = "执行失败，请参考：" . mysql_error();
		}else{
			$errMsg = "注册成功。";
		}
	}
}

?>
<html>
<head>
	<meta setchar='utf-8'>
	<title>sign in</title>
</head>
<body>
	<div>
		<h1>sign in</h1>
		<div>
			<?php
				if (!empty($errMsg)) {
					echo $errMsg;
				}
			?>
		</div>
		<form action="" method="POST">
			用户名：<input type="text" name="user_name"> <br>
			密码：<input type="password" name="user_pswd"> <br>
			年龄：<input type="text" name="user_age"> <br>
			性别：
				<select name="user_sex">
					<option value="1">保密</option>
					<option value="2">男</option>
					<option value="3">女</option>
				</select>  <br>
			技能：
				<input type="checkbox" name="user_skill[]" value="1">PHP
				<input type="checkbox" name="user_skill[]" value="2">MySQL
				<input type="checkbox" name="user_skill[]" value="4">JS
				<input type="checkbox" name="user_skill[]" value="8">HTML
				<input type="checkbox" name="user_skill[]" value="16">CSS <br>
				<input type="submit" value="sign in">
		</form>
	</div>
	<hr>
	<div>
		<?php
			$pageSize = 10;  // 每页显示多少条
			$page = isset($_GET['page']) ? $_GET['page'] : 1;  // 默认起始页
			$start = ($page - 1) * $pageSize;  // 第几页
			$pageSum = 1;  // 一共有多少页


			$mysqli = mysqli_connect("localhost", "root","");
			mysqli_set_charset($mysqli, "utf8");
			mysqli_query($mysqli, "use userdb;");


			$sql = "select * from user_info limit $start, $pageSize;";
			$result = mysqli_query($mysqli, $sql);
			if ($result === false) {
				echo "执行失败，请参考：" . mysql_error();
			}else{
				/* 输出表头 */
				echo "<table border ='1'>";
				echo "<tr>";
				echo "<td>ID</td>";
				echo "<td>用户名</td>";
				echo "<td>密码</td>";
				echo "<td>年龄</td>";
				echo "<td>性别</td>";
				echo "<td>技能</td>";
				echo "<td>注册时间</td>";
				echo "<td></td>";
				echo "</tr>";

				/* 输出表中的内容 */
				$fileName = $_SERVER['SCRIPT_NAME'];  // 获取当前文件路径
				while ($rec = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $rec['id'] . "</td>";
					echo "<td>" . $rec['user_name'] . "</td>";
					echo "<td>" . $rec['user_pswd'] . "</td>";
					echo "<td>" . $rec['user_age'] . "</td>";
					echo "<td>" . $rec['user_sex'] . "</td>";
					echo "<td>" . $rec['user_skill'] . "</td>";
					echo "<td>" . $rec['date_time'] . "</td>";
					echo "<td><a href='$fileName?id=" . $rec['id'] . "'>删除</a></td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			/* 分页处理 */
			$sql = "select count(*) from user_info;";
			$result = mysqli_query($mysqli, $sql);
			if ($result === false) {
				echo "执行失败，请参考：" . mysql_error();
			}else{
				$rowSum = mysqli_fetch_assoc($result);  // 一共有多少条数据
				$pageSum = ceil (intval($rowSum['count(*)']) / $pageSize );  // 一共有多少页
				echo "第";
				for ($i=1; $i <= $pageSum; $i++) { 
					echo "<a href='$fileName?page=" . $i . "'> $i </a>";
				}
				echo "页  共 $pageSum 页";
			}
		?>		
	</div>
</body>
</html>
