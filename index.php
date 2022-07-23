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
				if(!isset($_SESSION['user_name']))
				{
					$heredoc = <<< HERE
					<a href="login.html">로그인</a>하세요.
					HERE;

					echo $heredoc;
				}
				else
				{
					$heredoc = <<< HERE
					{$_SESSION['user_name']}님 어서오세요
					<button onclick="location.href='logout.php'">로그아웃</button>
					<button onclick="location.href='mypage.php'">마이페이지</button>
					HERE;

					echo $heredoc;
				}
			?>
		</span>
	</div>
	<div>
		<h1>게시판</h1>
		<div>
			<thead>
				<tr>
					<th width="70">번호</th>
					<th width="500">제목</th>
					<th width="120">글쓴이</th>
				</tr>
			</thead>
		</div>
	</div>
</body>
</html>