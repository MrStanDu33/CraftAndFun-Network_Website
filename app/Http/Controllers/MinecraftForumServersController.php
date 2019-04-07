<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MinecraftForumServer;

class MinecraftForumServersController extends Controller
{
	public function showServers()
	{
		$servers = $this->getServers();
		return view('forum',
		[
			'servers' => $servers
		]);
	}

	public static function getServers()
	{
		return (MinecraftForumServer::get());
	}

	public static function getServer($selector)
	{
		return (MinecraftForumServer::where($selector)->get()->first());
	}
}
