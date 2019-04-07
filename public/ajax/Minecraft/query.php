<?php
	require __DIR__ . '/src/MinecraftQuery.php';
	require __DIR__ . '/src/MinecraftQueryException.php';
	use xPaw\MinecraftQuery;
	use xPaw\MinecraftQueryException;
	$Query = new MinecraftQuery();
	try
	{
		$Query->Connect('176.31.115.99', request('port');
	}
	catch(MinecraftQueryException $e)
	{
		die();
	}
	$info = $Query->GetInfo();
	if (!empty($info))
	{
		if (empty($_GET['type']))
		{
			echo(json_encode($info));
		}
	}
?>
