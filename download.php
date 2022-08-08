<?php
	$wrong_connection = <<< HERE
	<script>
	alert('잘못된 접근입니다.');
	location.replace('/');
	</script>
	HERE;

	if(!isset($_GET['number']))
	{
		echo $wrong_connection;
	}

	$post_num = $_GET['number'];
	$filedir = '/var/fileupload/'.$post_num;

	if(is_dir($filedir))
	{
		$path = dir($filedir);
		$filepath = $path->read();
		$filesize = filesize($filepath);
		$filename = $filepath;

		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename='$filename'");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: $filesize");

		ob_clean();
		flush();
		readfile($filepath);
	}
	else
	{
		echo $wrong_connection;
	}
?>