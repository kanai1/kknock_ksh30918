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
		if(!isset($_SESSION['user_id']))
		{
			$heredoc = <<< HERE
			<script>
			alert('로그인이 필요합니다.');
			location.replace('login.html');
			</script>
			HERE;

			echo $heredoc;
		}
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$title = $_POST['title'];
			$body = $_POST['body'];
			$user_name = $_SESSION['user_name'];
			$user_id = $_SESSION['user_id'];

			
			$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
			
			$sql = "INSERT INTO board(title, body, user_id, user_name, posted) VALUES ('$title', '$body', '$user_id', '$user_name', now())";
			
			if($result = mysqli_query($conn, $sql))
			{
				$heredoc = <<< HERE
				<script>
				alert('글쓰기가 완료되었습니다.');
				location.replace('/');
				</script>
				HERE;

				echo $result;

				if(isset($_FILES))
				{
					$filename = $_FILES['file']['name'];
	
					$dir = "/var/fileupload";
				}
	
				//echo $heredoc;
			}
			else
			{
				$heredoc = <<< HERE
				<script>
				alert('글쓰기가 정상적으로 처리되지 않았습니다.');
				location.replace('/');
				</script>
				HERE;
	
				echo $heredoc;
			}
		}
		else
		{
			echo "잘못된 접근입니다.";
		}

	?>
</body>
</html>