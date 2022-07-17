<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>회원가입</title>
</head>
<body>
	<?php
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$name = $_POST['userName'];
			$id = $_POST['userId'];
			$password = $_POST['userPassword'];
			$password_again = $_POST['userPasswordAgain'];

			if(strcmp($password, $password_again) != 0)
			{
				$heredoc = <<<HERE
				<span>비밀번호가 다릅니다.</span>
				<button onclick="history.back()">돌아가기</button>
				HERE;

				echo $heredoc;
			}
		}
	?>
</body>
</html>