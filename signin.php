<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>로그인</title>
</head>
<body>
	<?php
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$id = $_POST['txtId'];
			$password = $_POST['txtPassword'];

			$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');

			$sql = "SELECT * FROM user_login where login_id='$id' && login_pw='$password'";

			if($result = mysqli_fetch_array(mysqli_query($conn, $sql)))
			{
				$heredoc = <<< HERE
				<h2>로그인 성공</h2>
				<br>사용자 아이디: {$result['login_id']}
				<br>아이디 생성시간: {$result['created']}
				<br><button onclick="history.back()">돌아가기</button>
				HERE;

				echo $heredoc;
			}
			else
			{
				$heredoc = <<< HERE
				<h2>로그인 실패</h2>
				<br><button onclick="history.back()">돌아가기</button>
				HERE;

				echo $heredoc;
			}
		}
	?>
</body>
</html>