@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("content")
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/minecraft/">Minecraft</a> » <a href="/minecraft/forum/">Forum</a> » <a href="/minecraft/forum/{{ request('Server') }}">{{ request('Server') }}</a> » <a href="/minecraft/forum/{{ request('Server') }}/{{ request('Section') }}/">{{ request('Section') }}</a></div>
				@if (auth()->user())
					<a href="/minecraft/forum/{{ request('Server') }}/{{ request('Section') }}/nouveau/">
						<div class="brand--button--border--tier1 alignright textcenter brand--color--yellow">
							Nouveau thread
						</div>
					</a>
				@endif
				<section class="PostsList">
					@foreach ($posts as $post)
						@continue($post->{'postId'} != $post->{'id'})
						@php
							$user = UsersController::getUser([['id', $post->{'creatorId'}]]);
							$lastAnswer = MinecraftForumPostsController::getLastPost([['postId', $post->{'postId'}]]);
						@endphp
						<div class="postForum brand--background-color--dark-violet">
							<a href="/profil/{{ $user->{'pseudo'} }}"><div class="avatar" style="background-image: url('{{ $user->{'profilePicture'} }}');"></div></a>
							<a href="/minecraft/forum/{{ request('Server') }}/{{ request('Section') }}/{{ $post->{'id'} }}"><h3 class="brand--color--white">{{ $post->{'name'} }}</h3></a>
							<span class="smallinformation"> - <a href="/profil/{{ $user->{'pseudo'} }}">{{ $user->{'pseudo'} }}</a></span>
							<div class="answers">
								<span class="smallinformation lastMessage">{{ date("d/m/Y", strtotime(substr(str_replace('-', '/', $lastAnswer['created_at']), 0, 10))) }}</span>
								<span class="brand--color--yellow">{{ MinecraftForumPostsController::countPosts([['postId', $post->{'id'}]]) }}</span>
								<img src="/img/answer.png" srcset="/svg/answer.svg" alt="Nombre de réponses" id="answer" class="answer">
								<span class="smallinformation firstMessage">{{ date("d/m/Y", strtotime(substr(str_replace('-', '/', $post->{'created_at'}), 0, 10))) }}</span>
							</div>
						</div>
					@endforeach
				</section>
@endsection