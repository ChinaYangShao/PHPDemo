<html>
<head>
	<meat charset='utf-8'>
	<title>checkEmail</title>
</head>
<?php
	/* 验证邮箱 */
	function checkEmail($email){
		$pregEmail = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		return preg_match($pregEmail, $email);
	}

	if (checkEmail("yzb_vip@126.com")) {
		echo "This is correct email format";
	}else{
		echo "This is not the correct email format";
	}
?>
</html>