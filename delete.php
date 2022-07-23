<?php
	$wrong_connection = <<< HERE
	<script>
	alert('잘못된 접근입니다.');
	location.replace('/');
	<script>
	HERE;

	if(!isset($_SESSION['user_id']))
	{
		echo $wrong_connection;
	}

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$post_num = $_GET['number'];

		$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
		$sql_find = "SELECT * FROM board WHERE post_num=$post_num";

		if($result = mysqli_fetch_array(mysqli_query($conn, $sql_find)))
		{
			if($result['user_id'] != $_SESSION['user_id'])
			{
				echo $wrong_connection;
			}
			$sql_delete = "DELETE FROM board WHERE post_num = $post_num";
			if(mysqli_query($conn, $sql_delete))
			{
				$heredoc = <<< HERE
				<script>
				alert('게시글을 삭제했습니다.')
				location.replace('/');
				</script>
				HERE;

				echo $heredoc;
			}
		}
		else
		{
			echo $wrong_connection;
		}
	}
	else
	{
		echo $wrong_connection;
	}
?>