<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MinecraftForumPost;

class MinecraftForumPostsController extends Controller
{
	public function createPost()
	{
		$newpost = new MinecraftForumPost;
		if (request('Post') != "newThread")
		{
			$thread = $this->getPost([['id', request('Post')]]);
			$postId = request('Post');
			$sectionId = $thread->{'sectionId'};
		}
		else
		{
			$posts = MinecraftForumPost::all();
			$postId = 1;
			foreach ($posts as $post)
			{
				$postId ++;
			}
			$newpost->name = request('name');
			$server = MinecraftForumServersController::getServer([['name', request('Server')]]);
			$section = MinecraftForumSectionsController::getSection([['name', request('Section')], ['serverId', $server->{'id'}]]);
			$sectionId = $section->{'id'};
		}
		$newpost->sectionId = $sectionId;
		$newpost->postId = $postId;
		$newpost->creatorId = auth()->user()->{'id'};
		$newpost->content = request('content');
		$newpost->save();
		return($postId);
	}

	public function showPost()
	{
		$post = $this->getPost([['id', request('Post')]]);
		$posts = $this->getPosts([['postId', request('Post')]]); 
		return view('post',
		[
			'threadName' => $post->{'name'},
			'posts' => $posts
		]);
	}

	public static function getPosts($selector)
	{
		return (MinecraftForumPost::where($selector)->orderBy('id')->get());
	}

	public static function getAllPostsDesc()
	{
		return (MinecraftForumPost::orderBy('id', 'desc')->get());
	}

	public static function countThreads($selector)
	{
		$posts = MinecraftForumPost::where($selector)->get();
		$threads = 0;
		foreach ($posts as $post)
		{
			if ($post->{"postId"} == $post->{"id"})
			{
				$threads ++;
			}
		}
		return ($threads);
	}

	public static function countPosts($selector)
	{
		return (MinecraftForumPost::where($selector)->count());
	}

	public static function countAllPosts()
	{
		return (MinecraftForumPost::count());
	}

	public static function getLastPost($selector)
	{
		return (MinecraftForumPost::where($selector)->orderBy('id', 'desc')->get()->first());
	}

	public static function getPost($selector)
	{
		return (MinecraftForumPost::where($selector)->get()->first());
	}
}
