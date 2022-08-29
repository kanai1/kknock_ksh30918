<?php
	$wrong_connection = <<< HERE
	<script>
	alert('잘못된 접근입니다.');
	history.back();
	</script>
	HERE;

	if(!isset($_SESSION['user_id']))
	{
		echo $wrong_connection;
	}
	else if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$comment = $_POST['comment'];

		$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
		$sql = "INSERT INTO comment(post_num, user_id, user_name, comment, commented) VALUE (?, ?, ?, ?, now())";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 'isss', $_GET['number'], $_SESSION['user_id'], $_SESSION['user_name'], $comment);

		if(!mysqli_stmt_execute($stmt))
		{
			echo $wrong_connection;
		}
		else
		{
			echo "<script>history.back();</script>";
		}


	}
	else if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		echo $wrong_connection;
	}
?>