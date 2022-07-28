<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>수정</title>
	<?php
		$wrong_connection = <<< HERE
		<script>
		alert('잘못된 접근입니다.');
		location.replace('/');
		</script>
		HERE;

		if(!isset($_SESSION['user_id']))
		{
			echo $wrong_connection;
		}
		if($_SERVER['REQUEST_METHOD'] == "GET")
		{
			$post_num = $_GET['number'];

			$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
			$sql = "SELECT * FROM board WHERE post_num={$post_num}";

			$result = mysqli_fetch_array(mysqli_query($conn, $sql));

			if($result == "")
			{
				echo $wrong_connection;
			}
			if(strcmp($result['user_id'], $_SESSION['user_id']))
			{
				echo $wrong_connection;
			}
		}
		else
		{
			echo $wrong_connection;
		}
	?>
</head>
<body>
<div>
	<h1>자유게시판</h1>
		<form method="POST" action="edit_ok.php">
			<div style="height: 500px;display:flex;flex-direction: column;justify-content: space-evenly;">
				<input type="text" name="title" placeholder="제목" required="required" value="<?php echo $result['title'] ?>">
				<textarea name="body" cols="50" rows="30" placeholder="본문" required="required"><?php echo nl2br($result['body']) ?></textarea>
				<button type="submit">수정</button>
			</div>
		</form>
	</div>
</body>
</html>