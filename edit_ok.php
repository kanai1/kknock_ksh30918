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

		$sql_update = "UPDATE board SET title = '{$_POST['title']}', body = '{$_POST['body']}' WHERE post_num = $post_num";

		if($result = mysqli_fetch_array(mysqli_query($conn, $sql_update)))
		{
			$heredoc = <<< HERE
			<script>
			alert('정상적으로 수정되었습니다.');
			location.replace('view.php?nunmber=$post_num');
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