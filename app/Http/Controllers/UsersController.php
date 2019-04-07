<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UsersController extends Controller
{
	public function createUser(Request $request)
	{
		request()->validate(
		[
			'pseudo' => ['required'],
			'email1' => ['required', 'email', 'same:email2'],
			'password1' => ['required', 'same:password2'],
			'securityQuestion' => ['required'],
			'securityAnswer' => ['required'],
			'traffic' => ['required'],
		]);
		if ($this->checkExistingUser([["pseudo", request('pseudo')]]))
		{
			return Response("Too Many Requests", 429);
		}
		$user = new User;
		$user->uuid = $this->uniqidReal();						//UUID
		$user->pseudo = request('pseudo');						//Pseudo
		$user->email = request('email1');						//E-mail
		$user->password = bcrypt(request('password1'));		//Password
		$user->securityQuestion = request('securityQuestion');	//Question sécurité
		$user->securityAnswer = request('securityAnswer');		//Réponse question sécurité
		$user->trafficSource = request('traffic');				//Source du traffic
		$user->lastConnection = now();							//Date
		$user->trend = 0;										//0->999 (flame)
		$user->profilePicture = "";								// url profile picture
		$user->permission = 0;									//0->999 (grade)
		$user->status = 1;										//Online = 1 || Offline = 0
		$user->country = "";									//Toggleable display
		$user->birthDate = now();								//Toggleable display
		$user->achievements = "";								//Steamlike achievements
		$user->state = 0;										//Mute etc...
		
		$user->save();

		$state = $this->authenticate(['email' => request('email1'), 'password' => request('password1')]);
		if ($state == false)
		{
			return Response("Bad Request", 400);
		}
		$request->session()->regenerate();
		return Response("Created", 201);
	}

	public function showUser()
	{
		if (request('pseudo'))
		{
			$user = $this->getUser([["pseudo", request('pseudo')]]);
			$editState = false;
		}
		else
		{
			if (auth()->user())
			{
				$user = $this->getUser([["pseudo", auth()->user()->pseudo]]);
				$editState = true;
			}
			else
			{
				return view('inscription');
			}
		}
		return view('profil',
		[
			'user' => $user,
			'messages' => MinecraftForumPostsController::countPosts([['creatorId', $user->{'id'}]]),
			'editState' => $editState,
		]);
	}

	public function login(Request $request)
	{
		$state = $this->authenticate(['email' => request('id'), 'password' => request('password')]);
		if ($state == false)
		{
			$state = $this->authenticate(['pseudo' => request('id'), 'password' => request('password')]);
			if ($state == false)
			{
				return Response("Bad Request", 400);
			}
		}
		$request->session()->regenerate();
		return Response("Accepted", 202);
	}

	public function logout()
	{
		auth()->logout();
		return redirect('/');
	}

	public function authenticate($rules)
	{
		$state = auth()->attempt($rules);
		var_dump($state);
		var_dump($rules);
		return $state;
	}

	public function getUsers($selector)
	{
		return (User::where($selector)->get());
	}

	public static function countAllUsers()
	{
		return (User::count());
	}

	public static function countUsers($selector)
	{
		return (User::where($selector)->count());
	}

	public static function getUser($selector)
	{
		return (User::where($selector)->get()->first());
	}

	public function checkExistingUser($selector)
	{
		return (User::where($selector)->exists());
	}

	public function uniqidReal($lenght = 16)
	{
		$bytes = random_bytes(ceil($lenght / 2));
	    return substr(bin2hex($bytes), 0, $lenght);
	}
}