<?php
	$wrong_connection = <<< HERE
	<script>
	alert('잘못된 접근입니다.');
	location.replace('/');
	</script>
	HERE;

	session_start();

	if(!isset($_SESSION['user_id']))
	{
		echo $wrong_connection;
	}
	else if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$user_name = $_POST['userName'];
		$password = $_POST['userPassword'];
		$passwordAgain = $_POST['userPasswordAgain'];

		$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
		$sql_find = "SELECT * FROM user_login WHERE login_id = '{$_SESSION['user_id']}'";

		if(strcmp($password, $passwordAgain))
		{
			$heredoc = <<< HERE
			<script>
			alert('비밀번호가 다릅니다.');
			location.replace('mypage.php');
			</script>
			HERE;

			echo $heredoc;
		}
		else if(mysqli_fetch_array(mysqli_query($conn, $sql_find)) == "")
		{
			echo $wrong_connection;
		}
		else
		{
			$sql_update = "UPDATE user_login SET login_pw='{$password}', user_name='{$user_name}' WHERE login_id = '{$_SESSION['user_id']}'";
			
			if(mysqli_query($conn, $sql_update))
			{
				session_unset();
				session_destroy();
		
				$heredoc = <<< HERE
				<script>
				alert(`정상적으로 변경되었습니다.
				다시 로그인해주세요.`);
				location.replace('/');
				</script>
				HERE;
		
				echo $heredoc;
			}
		}
	}
	else
	{
		echo $wrong_connection;
	}
?>