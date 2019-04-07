<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
	function getMaps()
	{
		$servers = scandir("/var/www/craftandfun.fr/dynmap/");
		$serversList = array();
		foreach ($servers as $server)
		{
			if ($server == "." || $server == ".." || $server == ".well-known")
			{
				continue;
			}
			$serversList[$server] = array();
			$maps = scandir("/var/www/craftandfun.fr/dynmap/".$server."/dynmap/web/tiles/");
			foreach ($maps as $map)
			{
				if ($map == "." || $map == ".." || $map == "faces" || $map == "_markers_")
				{
					continue;
				}
				array_push($serversList[$server], $map);
			}
		}
		return($serversList);
	}
	
	public function showServers()
	{
		return view('maps',
		[
			"servers" => $this->getMaps(),
		]);
	}
}
