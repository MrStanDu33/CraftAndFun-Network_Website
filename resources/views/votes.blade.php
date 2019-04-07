@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("content")
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/minecraft/">Minecraft</a> » <a href="/minecraft/votes/">Votes</a></div>
				<section class="VotesSelectPlayer">
					<h2>Votes</h2>
					<p class="h2Desc textcenter brand--color--light-violet">Veuillez vous identifier</p>
					<ul class="PlayerSelection">
						@if (auth()->user())
							@if (auth()->user()->{'minecraftToken'})
							<li class="brand--background-color--light-violet">
								<a href="/minecraft/votes/{{ auth()->user()->{'pseudo'} }}">
									<!--<img src="https://crafatar.com/renders/head/c3499e769f804de6a04d63708d30b2cf?scale=4&default=MHF_Steve&overlay" class="PlayerHead" alt="PlayerHead">-->
									<img src="https://crafatar.com/renders/head/606e2ff0ed7748429d6ce1d3321c7838?scale=4&default=MHF_Steve&overlay" class="PlayerHead" alt="PlayerHead">
									<h3 class="ServerName">
										{{ auth()->user()->{'minecraftToken'} }}
									</h3>
								</a>
							</li>
							@endif
						@else
							<li class="brand--background-color--light-violet">
								<a href="/profil/">
									<!--<img src="https://crafatar.com/renders/head/c3499e769f804de6a04d63708d30b2cf?scale=4&default=MHF_Steve&overlay" class="PlayerHead" alt="PlayerHead">-->
									<img src="https://crafatar.com/renders/head/606e2ff0ed7748429d6ce1d3321c7838?scale=4&default=MHF_Steve&overlay" class="PlayerHead" alt="PlayerHead">
									<h3 class="ServerName">
										DESACTIVÉ
									</h3>
								</a>
							</li>
						@endif
						<li class="brand--background-color--light-violet">
							<a href="/minecraft/votes/invite/">
								<img src="https://crafatar.com/renders/head/8667ba71b85a4004af54457a9734eed7?scale=4&default=MHF_Steve&overlay" class="PlayerHead" alt="PlayerHead">
								<h3 class="ServerName">
									Invité
								</h3>
							</a>
						</li>
					</ul>
				</section>
@endsection
@section("script")
	<script>
/*
		GET PROFILE PICTURE
		$.ajax(
		{
			type: 'GET',
			url: "/createsession.php",
			success:function(data, textStatus, xhr)
			{
				console.log(data);
			}
		});
	*/
	</script>
@endsection