<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>로그인</title>
</head>

<body>
	
</body>
	<?php
		if($_SERVER['REQUEST_METHOD'] === 'post')
		{
			$id = $_POST['txtId'];
			$password = $_POST['txtPassword'];

			if($id == $password)
				echo '<h1>로그인 성공</h1>';
			else
				echo '<h1>로그인 실패</h1>';

			echo "ID: {$id}<br>Password: {$password}";
		}
	?>
</html>