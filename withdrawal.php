<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>회원탈퇴</title>
	<style>
		.outer {
			display: flex;
			justify-content: center;
			flex-direction: column;
		}
	</style>
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
		else
		{
			$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
			$sql = "SELECT * FROM user_login WHERE login_id='{$_SESSION['user_id']}'";

			$result = mysqli_fetch_array(mysqli_query($conn, $sql));

			if($result == "")
			{
				echo $wrong_connection;
			}
		}
	?>
</head>
<body>
	<div>
		<form method="POST" action="withdrawal_ok.php">
			<fieldset class="outer" style="width: 20%; margin: 10% auto; padding:2px 10px 30px 10px">
				<legend>회원탈퇴</legend>
				<input type="password" name="userPassword" placeholder="비밀번호" required="required"><br>
				<input type="password" name="userPasswordAgain" placeholder="비밀번호 확인" required="required"><br>
				<button type="summit" name="withdrawal">회원탈퇴</button>
			</fieldset>
		</form>
	</div>
</body>
</html>