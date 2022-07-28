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

			if($result == "")
			{
				$heredoc = <<< HERE
				<script>
				alert('글을 찾을 수 없습니다.');
				location.replace('/');
				</script>
				HERE;
				
				echo $heredoc;
			}

			$comment_sql = "SELECT * FROM comment WHERE post_num = $post_num ORDER BY comment_num ASC";

			$comment_result = mysqli_query($conn, $comment_sql);
		}
	?>
	<title><?php echo $result['title'] ?></title>
</head>
<body>
	<div>
		<h2><?php echo $result['title'] ?></h2>
		<?php
			if(isset($_SESSION['user_id']))
			{
				if($_SESSION['user_id'] == $result['user_id'])
				{
					$heredoc = <<<HERE
					<button onclick="location.href='delete.php?number={$result['post_num']}'">삭제</button>
					<button onclick="location.href='edit.php?number={$result['post_num']}'">수정</button>
					HERE;
					
					echo $heredoc;
				}
			}
		?>
		<p> <?php echo nl2br($result['body']) ?></p>
	</div>
	<div>
		<h4>댓글</h4>
		<?php
			if(isset($_SESSION['user_id']))
			{
				$comment_form = <<< HERE
				<div>
				<form action="write_comment.php" method="post">
				<textarea name="comment" cols="40" rows="5" placeholder="댓글"></textarea><br>
				<button type="submit">댓글 쓰기</button>
				</form>
				</div>
				HERE;

				echo $comment_form;
			}
		?>
		<div>
			<hr>
			<?php
				while($row = mysqli_fetch_assoc($comment_result))
				{
					$heredoc = <<< HERE
					<strong>{$row['user_name']}</strong><br>
					<p>{$row['comment']}</p>
					<span>작성일시: {$row['commented']}</span>
					<hr>
					HERE;

					echo $heredoc;
				}
			?>
		</div>
	</div>
</body>
</html>