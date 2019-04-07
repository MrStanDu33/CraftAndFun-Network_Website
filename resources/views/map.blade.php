@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("content")
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/minecraft/">Minecraft</a> » <a href="/minecraft/cartes/">Cartes</a> » <a href="/minecraft/cartes/{{ request('server') }}/">{{ request('server') }}</a> » <a href="/minecraft/cartes/{{ request('server') }}/{{ request('map') }}">{{ request('map') }}</a></div>
				<section class="MapViewer">
					<h2>{{ request('server') }}</h2>
					<p class="h2Desc textcenter brand--color--light-violet">{{ request('map') }}</p>
					<iframe src="https://map.craftandfun.fr/{{ request('server') }}/dynmap/web/?worldname={{ request('map') }}&mapname=flat&zoom=5&x=0&y=0&z=0"></iframe>
					<iframe src="https://map.craftandfun.fr/{{ request('server') }}/dynmap/web/?worldname={{ request('map') }}&mapname=surface&zoom=5&x=0&y=0&z=0"></iframe>
				</section>
@endsection