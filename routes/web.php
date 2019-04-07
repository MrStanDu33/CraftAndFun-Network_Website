<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
	return view('index');
});

/*
**
**
**
**
*/

Route::get('/minecraft/', function ()
{
	return view('index');
});

/*
**
**
**
**
*/

/*Route::get('/minecraft/boutique/printocraft/', function ()
{
	return view('printocraft');
});*/

/*
**
**
**
**
*/

Route::get('/minecraft/cartes/', 'MapsController@showServers');

Route::get('/minecraft/cartes/{server}', 'MapsController@showServers');

Route::get('/minecraft/cartes/{server}/{map}/', function ()
{
	return view('map');
});

/*
**
**
**
**
*/

Route::get('/minecraft/votes/', function ()
{
	return view('votes');
});

Route::get('/minecraft/votes/{pseudo}/', 'VotesController@show');

Route::post('/minecraft/votes/{pseudo}/', function ()
{
	if (request('pseudo') == "invite")
	{
		return view('selectPlayer');
	}
	else
	{
		return view('vote');
	}
});

/*
**
**
**
**
*/

Route::get('/minecraft/forum/', 'MinecraftForumServersController@showServers');
Route::get('/minecraft/forum/{Server}/', 'MinecraftForumServersController@showServers');
Route::get('/minecraft/forum/{Server}/{Section}/', 'MinecraftForumSectionsController@showPosts');

Route::get('/minecraft/forum/{Server}/{Section}/nouveau/', function ()
{
	return view('newpost');
});

Route::get('/minecraft/forum/{Server}/{Section}/{Post}', 'MinecraftForumPostsController@showPost');

/*
**
**
**
**
*/

Route::get('/profil/logout', 'UsersController@logout');
Route::get('/profil/{pseudo?}', 'UsersController@showUser');
Route::post('/profil/create', 'UsersController@createUser');
Route::post('/profil/connect', 'UsersController@login');

/*
**
**
**
**
*/

Route::get('/ajax/getIP', function ()
{
	return view('ajax/getIP');
});

Route::get('/ajax/Minecraft/query/{port}', function ()
{
	return view('ajax/Minecraft/query',
	[
		"port" => request('port')
	]);
});

Route::get('/ajax/Minecraft/Vote/getStatus/{pseudo}/{site}', 'VotesController@getStatus');

Route::get('/ajax/Minecraft/Vote/create/{pseudo}/{site}', 'VotesController@addVote');
Route::put('/ajax/Minecraft/Vote/create/{pseudo}/{site}', 'VotesController@addVote');

Route::post('/ajax/Minecraft/Forum/createPost/{Post?}/{new?}', 'MinecraftForumPostsController@createPost');