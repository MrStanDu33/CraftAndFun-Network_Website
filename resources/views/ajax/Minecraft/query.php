<?php
	//echo(file_get_contents(app_path() . '/ajax/Minecraft/src/MinecraftQuery.php'));
	require app_path() . '/ajax/Minecraft/src/MinecraftQuery.php';
	require app_path() . '/ajax/Minecraft/src/MinecraftQueryException.php';
	use xPaw\MinecraftQuery;
	use xPaw\MinecraftQueryException;
	$Query = new MinecraftQuery();
	try
	{
		$Query->Connect('176.31.115.99', $port);
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
