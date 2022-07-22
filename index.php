<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>메인페이지</title>
</head>
<body>
	<div>
		<span style="float:right">		
			<?php
				if(!session_id())
				{
					$heredoc = <<< HERE
					<a onclick="login.html">로그인<a>하세요.
					HERE;

					echo $heredoc;
				}
				else
				{
					$heredoc = <<< HERE
					{$_SESSION['userName']}님 어서오세요
					<button>로그아웃</button>
					HERE;
				}
			?>
		</span>
	</div>
</body>
</html>