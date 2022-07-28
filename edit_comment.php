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
	else// if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
		$sql = "";

		echo $_GET['number'];
		echo $_POST['comment'];
	}
?>