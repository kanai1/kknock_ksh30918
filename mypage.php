<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>마이페이지</title>
</head>
<body>
	<?php
		// if(!isset($_SESSION['user_id']))
		if(!session_id())
		{
			$heredoc = <<< HERE
			<span>잘못된 접근입니다.</span>
			<button onclick="location.href='/'">돌아가기</button>
			HERE;

			echo $heredoc;
		}
	?>
</body>
</html>