<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$post_num = $_GET['number'];

			$conn = mysqli_connect('localhost', 'TeamA', 'TeamA1234567@', 'test');
			$sql = "SELECT * FROM board WHERE post_num = $post_num";

			$result = mysqli_fetch_array(mysqli_query($conn, $sql));
		}
	?>
	<title><?php echo $result['title'] ?></title>
</head>
<body>
	
</body>
</html>