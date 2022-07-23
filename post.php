<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>글쓰기</title>
</head>
<body>
	<?php
		if(!session_id())
		{
			$heredoc = <<< HERE
			<script>
			alert('로그인이 필요합니다.');
			location.href('login.html');
			</script>
			HERE;

			echo $heredoc;
		}

		$title = $_POST['title'];
		$body = $_POST['body'];
		$user_name = $_SESSION['user_name'];
		$user_id = $_SESSION['user_id'];

		$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');

		$sql = "INSERT INTO board(title, body, user_id, user_name, posted) VALUES ('$title', '$body', '$user_id', '$user_name', now())";

		if(mysqli_query($conn, $sql))
		{
			$heredoc = <<< HERE
			<script>
			alert('글쓰기가 완료되었습니다.');
			location.href('/');
			</script>
			HERE;

			echo $heredoc;
		}
		else
		{
			$heredoc = <<< HERE
			<script>
			alert('글쓰기가 정상적으로 처리되지 않았습니다.');
			location.href('/');
			</script>
			HERE;

			echo $heredoc;
		}
	?>
</body>
</html>