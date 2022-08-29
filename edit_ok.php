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
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$referer_domain = $_SERVER['HTTP_REFERER'];

		$post_num = (int)substr($referer_domain, strrpos($referer_domain, "number=") + 7);

		$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
		$sql_find = "SELECT * FROM board WHERE post_num = $post_num";

		$result = mysqli_fetch_array(mysqli_query($conn, $sql_find));

		if($result == "")
		{
			echo $wrong_connection;
		}
		if(strcmp($_SESSION['user_id'], $result['user_id']))
		{
			echo $wrong_connection;
		}

		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, "UPDATE board SET title = ?, body = ? WHERE post_num = $post_num");
		mysqli_stmt_bind_param($stmt, 'ss', $_POST['title'], $_POST['body']);

		if(mysqli_stmt_execute($stmt))
		{
			$heredoc = <<< HERE
			<script>
			alert('정상적으로 수정되었습니다.');
			location.replace('view.php?number={$post_num}');
			</script>
			HERE;

			echo $heredoc;
		}
	}
	else
	{
		echo $wrong_connection;
	}
?>