@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("content")
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/minecraft/">Minecraft</a> » <a href="/minecraft/votes/">Votes</a></div>
				<section class="VotesSelectSite">
					<h2>Votes</h2>
					<p class="h2Desc textcenter brand--color--light-violet">Veuillez sélectionner ci-dessous la plateforme de vote</p>
					<ul class="SiteSelection">
						<li class="brand--background-color--light-violet" data-site="top-serv.org">
							<a href="https://top-serv.org/classement-serveurs/annonce?g=minecraft&id=563" target="_blank">
								<img src="/img/TopServLogo.png" class="SiteLogo" alt="PlayerHead">
								<h3 class="SiteName">
									TopServ
								</h3>
							</a>
						</li>
						<li class="brand--background-color--light-violet" data-site="serveurs-minecraft.org">
							<a href="https://www.serveurs-minecraft.org/vote.php?id=56071" target="_blank">
								<img src="/img/ServeursMinecraftLogo.png" class="SiteLogo" alt="PlayerHead">
								<h3 class="SiteName">
									ServeursMinecraft
								</h3>
							</a>
						</li>
					</ul>
				</section>
@endsection
@section("script")
	<script>
		function getVotes()
		{
			$('section#container .MainBlock section.VotesSelectSite ul.SiteSelection>li').each(function()
			{
				$.ajax(
				{
					type: 'GET',
					context: this,
					url: "{{ env('APP_URL') }}/ajax/Minecraft/Vote/getStatus/{{ request('pseudo') }}/" + $(this).attr('data-site'),
					success:function(data, textStatus, xhr)
					{
						if (xhr.status == 201)
						{
							$(this).removeClass("disabled");
							$(this).addClass("processing");
						}
					},
					complete: function(xhr, textStatus)
					{
						if (xhr.status == 429)
						{
							$(this).addClass("disabled");
							$(this).removeClass("processing");
						}
						else if (xhr.status == 404)
						{
							$(this).removeClass("disabled");
							$(this).removeClass("processing");
						}
					}
				});
			});
			setTimeout(getVotes, 5000);
		}
		$(document).ready(function()
		{
			getVotes()
			$('section#container .MainBlock section.VotesSelectSite ul.SiteSelection>li a').click(function()
			{
				$.ajax(
				{
					type: 'PUT',
					context: this,
					headers:
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{ env('APP_URL') }}/ajax/Minecraft/Vote/create/{{ request('pseudo') }}/" + $(this).parent().attr('data-site'),
					success:function()
					{
						$(this).parent().addClass("processing");
					}
				});
			})
		});
	</script>
@endsection