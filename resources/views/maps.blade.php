@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("content")
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/minecraft/">Minecraft</a> » <a href="/minecraft/cartes/">Cartes</a></div>
				<section class="MapSelectServer">
					<h2>Cartes</h2>
					<p class="h2Desc textcenter brand--color--light-violet">Choisissez votre carte</p>
					<ul class="ServerSelection">
						<li class="brand--background-color--light-violet">
							<img src="/img/command_block.png" class="ServerIcon" alt="ServerIcon">
							<h3 class="ServerName">
								Hub
							</h3>
							<ul class="SectionSelection">
								@foreach ($servers["hub"] as $map)
								<li class="">
									<a href="/minecraft/cartes/hub/{{ $map }}" class="sectionlink">
										<span class="SectionName">{{ $map }}</span>
									</a>
								</li>
								@endforeach
								<a href="" class="margincenter linkbutton">
									<div class="brand--button--border--tier3 textcenter brand--color--yellow">
										Retour
									</div>
								</a>
							</ul>
						</li>
						<li class="brand--background-color--light-violet">
							<img src="/img/bedrock.png" class="ServerIcon" alt="ServerIcon">
							<h3 class="ServerName">
								Créatif
							</h3>
							<ul class="SectionSelection">
								@foreach ($servers["creatif"] as $map)
								<li class="">
									<a href="/minecraft/cartes/creatif/{{ $map }}" class="sectionlink">
										<span class="SectionName">{{ $map }}</span>
									</a>
								</li>
								@endforeach
								<a href="" class="margincenter linkbutton">
									<div class="brand--button--border--tier3 textcenter brand--color--yellow">
										Retour
									</div>
								</a>
							</ul>
						</li>
						<li class="brand--background-color--light-violet">
							<img src="/img/brick_block.png" class="ServerIcon" alt="ServerIcon">
							<h3 class="ServerName">
								Freebuild
							</h3>
							<ul class="SectionSelection">
								@foreach ($servers["freebuild"] as $map)
								<li class="">
									<a href="/minecraft/cartes/freebuild/{{ $map }}" class="sectionlink">
										<span class="SectionName">{{ $map }}</span>
									</a>
								</li>
								@endforeach
								<a href="" class="margincenter linkbutton">
									<div class="brand--button--border--tier3 textcenter brand--color--yellow">
										Retour
									</div>
								</a>
							</ul>
						</li>
					</ul>
				</section>
@endsection
@section("script")
	<script type="text/javascript">
		var pos;
		$('section#container .MainBlock ul.ServerSelection>li').click(function()
		{
			if($('.greyFilter').css('display') == 'none')
			{
				pos = $(this).position();
				$(this).clone().addClass('toDelete').insertAfter($(this));
				$('section#container .MainBlock ul.ServerSelection>li.toDelete').css({'z-index': '4'});
				$(this).css({'visibility': 'hidden', 'position': 'absolute', 'top': pos.top, 'left': pos.left, 'z-index': '12', 'visibility': 'visible'});
				var center = ($('section#container .MainBlock ul.ServerSelection').width() / 2) - (500 / 2);
				$('.greyFilter').css({'display': 'block', 'z-index': '11'});
				$('section#container .MainBlock ul.ServerSelection>li').css({'cursor': 'auto'});
				$(this).animate({
					left: center,
					top: '0px',
					height: '750px',
					width: '500px'
				}, 150, "linear", function()
				{
					$(this).height('auto');
				});
				var elem = $(this);
				jQuery(this).children("ul").css({'display': 'block'});
			}
		});
		$('section#container .MainBlock ul.ServerSelection li ul.SectionSelection a.linkbutton').click(function(e)
		{
			if($('.greyFilter').css('display') == 'block')
			{
				e.preventDefault();
				$('section#container .MainBlock ul.ServerSelection>li').animate({
					left: pos.left,
					top: pos.top,
					marginTop: '0px',
					height: '200px',
					width: '200px'
				}, 150, "linear");
				setTimeout(function()
				{
					$('section#container .MainBlock ul.ServerSelection>li').css({'position': 'static', 'cursor': 'pointer', 'z-index': '4'});
					$('section#container .MainBlock ul.ServerSelection>li.toDelete').remove();
					$('section#container .MainBlock ul.ServerSelection>li').children("ul").css({'display': 'none'});
					$('.greyFilter').css({'display': 'none', 'z-index': '-99'});
				}, 150);
			}
		});
		$('.greyFilter').click(function(e)
		{
			if($('.greyFilter').css('display') == 'block')
			{
				$('section#container .MainBlock ul.ServerSelection>li').animate({
					left: pos.left,
					top: pos.top,
					marginTop: '0px',
					height: '200px',
					width: '200px'
				}, 150, "linear");
				setTimeout(function()
				{
					$('section#container .MainBlock ul.ServerSelection>li').css({'position': 'static', 'cursor': 'pointer', 'z-index': '4'});
					$('section#container .MainBlock ul.ServerSelection>li.toDelete').remove();
					$('section#container .MainBlock ul.ServerSelection>li').children("ul").css({'display': 'none'});
					$('.greyFilter').css({'display': 'none', 'z-index': '-99'});
				}, 150);
			}
		});
		$('header').click(function(e)
		{
			$('section#container .MainBlock ul.ServerSelection>li').animate({
				left: pos.left,
				top: pos.top,
				marginTop: '0px',
				height: '200px',
				width: '200px'
			}, 150, "linear");
			setTimeout(function()
			{
				$('section#container .MainBlock ul.ServerSelection>li').css({'position': 'static', 'cursor': 'pointer', 'z-index': '4'});
				$('section#container .MainBlock ul.ServerSelection>li.toDelete').remove();
				$('section#container .MainBlock ul.ServerSelection>li').children("ul").css({'display': 'none'});
				$('.greyFilter').css({'display': 'none', 'z-index': '-99'});
			}, 150);
		});
	</script>
@endsection