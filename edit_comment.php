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
	else if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
		
		$comment_num = $_GET['number'];
		$comment = $_POST['comment'];
		
		$sql_find = "SELECT * FROM comment WHERE comment_num = $comment_num";

		$find_result = mysqli_fetch_array(mysqli_query($conn, $sql_find));

		if($find_result == "" || strcmp($find_result['user_id'], $_SESSION['user_id']))
		{
			echo $wrong_connection;
		}

		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, "UPDATE comment SET comment='? WHERE comment_num = $comment_num");
		mysqli_stmt_bind_param($stmt, 's', $comment);

		if(mysqli_stmt_execute($stmt))
		{
			echo "<script>history.back()</script>";
		}
	}
	else
	{
		echo $wrong_connection;
	}
?>