<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MinecraftForumSection;

class MinecraftForumSectionsController extends Controller
{
	public function showPosts()
	{
		$server = MinecraftForumServersController::getServer([['name', request('Server')]]);
		$section = MinecraftForumSectionsController::getSection([['serverId', $server->{'id'}], ['name', request('Section')]]);
		$posts = MinecraftForumPostsController::getPosts([['sectionId', $section->{'id'}]]);
		return view('posts',
		[
			'posts' => $posts
		]);
	}
	public static function getSections($selector)
	{
		return (MinecraftForumSection::where($selector)->get());
	}

	public static function getSection($selector)
	{
		return (MinecraftForumSection::where($selector)->get()->first());
	}
}
