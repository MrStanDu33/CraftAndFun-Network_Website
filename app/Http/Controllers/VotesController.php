<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Vote;

class VotesController extends Controller
{
	public function testForTopServ($vote)
	{
		echo('['.now().'] check vote for '.$vote->{"pseudo"}.' '.$vote->{"ipv4"}.'@top-serv.org and got ');
		$check = file_get_contents(
			'https://top-serv.org/check/vote',false,
			stream_context_create(array('http' => array(
				'method' => 'POST',
				'header' => 'Content-type: application/x-www-form-urlencoded',
				'content' => http_build_query(array(
					'id' => '563',
					'uidkey' => 'OcMOHsksolUgI7lgmAYxgUEOAu3OXEVb7QbkSi2gHfXA57eelU',
					'ip' => $vote->{"ipv4"}
		))))));
		echo($check);
		if($check == 1)
		{
			$vote->{"valid"} = 1;
			$vote->save();
		}
	}

	public function testForServeursMinecraft($vote)
	{
		echo('['.now().'] check vote for '.$vote->{"pseudo"}.' '.$vote->{"ipv4"}.'@serveurs-minecraft.org and got ');
		$is_valid_vote = file_get_contents('https://www.serveurs-minecraft.org/api/is_valid_vote.php?id=56071&ip='.$vote->{"ipv4"}.'&format=json');
		$is_valid_vote = json_decode($is_valid_vote);
		if (isset($is_valid_vote->votes))
		{
			echo('1');
			$vote->{"valid"} = 1;
			$vote->save();
		}
		else
		{
			echo('0');
		}
	}

	public function checkVote()
	{
		$votes = $this->getVotes([["valid", 0]]);
		foreach ($votes as $vote)
		{
			if (isset($vote->{"site"}))
			{
				switch ($vote->{"site"})
				{
					case 'top-serv.org':
						$this->testForTopServ($vote);
						break;
					case 'serveurs-minecraft.org':
						$this->testForServeursMinecraft($vote);
						break;
				}
			}
		}
	}

	public function format_uuid($uuid)
	{
		if (is_string($uuid))
		{
			return substr($uuid, 0, 8) . '-' . substr($uuid, 8, 4) . '-' . substr($uuid, 12, 4) . '-' . substr($uuid, 16, 4) . '-' . substr($uuid, 20, 12);
		}
		return false;
	}

	public function getUUID($pseudo)
	{
		return(json_decode(file_get_contents('https://api.mojang.com/users/profiles/minecraft/'.$pseudo.'?at='.time())));
	}

	public function getDelay($site)
	{
		switch ($site)
		{
			case "top-serv.org":
				return (3);
			case"serveurs-minecraft.org":
				return (24);
			default:
				return Response("Bad Request", 400);
		}
	}

	public function addVote()
	{
		$delay = $this->getDelay(request('site'));
		$vote = $this->getLastVote([["pseudo", request('pseudo')], ["site", request('site')]]);
		if ($vote)
		{
			if ($vote->{"created_at"} < now()->subHour($delay))
			{
				$profile = $this->getUUID(request('pseudo'));

				$vote = new Vote;
				$vote->uuid = $this->format_uuid($profile->id);
				$vote->pseudo = request("pseudo");
				$vote->ipv4 = $_SERVER['REMOTE_ADDR'];
				$vote->ipv6 = $_SERVER['REMOTE_ADDR'];
				$vote->site = request("site");
				$vote->valid = 0;
				$vote->is_done = 0;
				$vote->save();
			}
		}
		else
		{
			$profile = $this->getUUID(request('pseudo'));

			$vote = new Vote;
			$vote->uuid = $this->format_uuid($profile->id);
			$vote->pseudo = request("pseudo");
			$vote->ipv4 = $_SERVER['REMOTE_ADDR'];
			$vote->ipv6 = $_SERVER['REMOTE_ADDR'];
			$vote->site = request("site");
			$vote->valid = 0;
			$vote->is_done = 0;
			$vote->save();
		}
	}

	public function getStatus()
	{
		$delay = $this->getDelay(request('site'));
		$vote = $this->getLastVote([["pseudo", request('pseudo')], ["site", request('site')]]);
		if ($vote)
		{
			if ($vote->{"created_at"} < now()->subHour($delay))
			{
				return Response("Not Found", 404);
			}
			else
			{
				if ($vote->{"valid"} == 0)
				{
					return Response("Created", 201);
				}
				else
				{
					return Response("Too Many Requests", 429);
				}
			}
		}
		else
		{
			return Response("Not Found", 404);
		}
	}

	public function getVotes($selector)
	{
		return (Vote::where($selector)->orderBy("created_at", "desc")->get());
	}

	public function getLastVote($selector)
	{
		return (Vote::where($selector)->orderBy("created_at", "desc")->get()->first());
	}

	public function show()
	{
		if (request('pseudo') == "invite")
		{
			return view('selectPlayer');
		}
		else
		{
			return view('vote',
			[
				'lastTopServ' => $this->getLastVote([["pseudo", request('pseudo')], ["site", "top-serv.org"]]),
				'lastServeurMinecraft' => $this->getLastVote([["pseudo", request('pseudo')], ["site", "serveurs-minecraft.org"]])
			]);
		}
	}
}