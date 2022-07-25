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
	if(strcmp($_SERVER['REQUEST_METHOD'], "POST"))
	{
		echo $wrong_connection;
	}

	$password = $_POST['userPassword'];
	$passwordAgain = $_POST['userPasswordAgain'];

	if(strcmp($password, $passwordAgain))
	{
		$heredoc = <<< HERE
		<script>
		alert('비밀번호가 다릅니다.');
		history.back();
		</script>
		HERE;
	}

	$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
	$sql_find = "SELECT * FROM user_login WHERE login_id = '{$_SESSION['user_id']}' && user_pw = '{$password}'";

	if(mysqli_fetch_array(mysqli_query($conn, $sql_find)) == "")
	{
		echo $wrong_connection;
	}

	$sql_delete = "DELETE FROM user_login WHERE login_id = '{$_SESSION['user_id']}'";
	
	if(mysqli_query($conn, $sql_delete))
	{
		session_start();
		session_unset();
		session_destroy();

		$heredoc = <<< HERE
		<script>
		alert('정상적으로 회원탈퇴되었습니다.');
		location.replace('/');
		</script>
		HERE;

		echo $heredoc;
	}	
?>