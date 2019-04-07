@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("header")
		<section id="accueil" class="content">
			<div id="slider" class="slider">
				<div class="VideoContainer">
				</div>
				<div class="container">
					<svg width="77px" height="80px" viewBox="0 0 77 80" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
						<title>Craft&Fun Network Logo</title>
						<defs>
							<path d="M6.15521357,7.06112202 C6.94116547,6.5068191 7.48305049,6.05593767 7.78088489,5.7084642 C8.26900239,5.1458881 8.51305747,4.52127254 8.51305747,3.83459878 C8.51305747,3.29684221 8.33518682,2.8335512 7.97944017,2.44471184 C7.62369352,2.05587248 7.1438564,1.86145572 6.53991442,1.86145572 C5.62159167,1.86145572 4.98456653,2.16755871 4.62881988,2.77977387 C4.44680997,3.09415463 4.35580638,3.43748636 4.35580638,3.80977937 C4.35580638,4.31444322 4.49438003,4.79841686 4.77153149,5.26171482 C5.04868294,5.72501279 5.50990569,6.32480918 6.15521357,7.06112202 Z M5.58436715,16.6662335 C6.50268989,16.6662335 7.29276653,16.4552706 7.95462076,16.0333386 C8.61647499,15.6114065 9.1252678,15.1398424 9.48101445,14.6186322 L5.36099246,9.59270179 C4.19447438,10.3703805 3.43335343,10.9660404 3.07760678,11.3796993 C2.53157704,12.0001876 2.25856627,12.757172 2.25856627,13.6506753 C2.25856627,14.6186371 2.61223932,15.3632119 3.31959603,15.8844221 C4.02695274,16.4056323 4.78186889,16.6662335 5.58436715,16.6662335 Z M12.0711883,14.3121819 L15.2763466,18.2050369 L12.3972951,18.2050369 L10.6847558,16.1202065 C10.0063552,16.8565193 9.38587619,17.3942678 8.82330009,17.7334681 C7.83879193,18.3291369 6.70538356,18.6269669 5.42304099,18.6269669 C3.52848325,18.6269669 2.1510198,18.1161058 1.2906093,17.0943683 C0.430198797,16.0726309 0,14.9206081 0,13.6382655 C0,12.2566448 0.417789216,11.1025538 1.25338018,10.1759579 C1.76631721,9.61338182 2.72185492,8.91017225 4.12002198,8.0663081 C3.35061644,7.18107807 2.83561884,6.43650323 2.57501374,5.83256124 C2.31440864,5.22861926 2.18410804,4.64536897 2.18410804,4.08279287 C2.18410804,2.90800161 2.58121462,1.93384953 3.3754397,1.1603074 C4.16966478,0.386765264 5.23275219,-2.85645321e-15 6.56473383,0 C7.83053004,-2.85645321e-15 8.81915997,0.35987784 9.53065327,1.07964432 C10.2421466,1.79941079 10.5978879,2.65980838 10.5978879,3.66086291 C10.5978879,4.82738099 10.229737,5.84910313 9.49342415,6.72605999 C9.0632189,7.23899702 8.34346322,7.83052036 7.33413552,8.50064777 L10.6599364,12.4717533 C10.8833122,11.8098991 11.038432,11.3155841 11.1253003,10.9887936 C11.2121687,10.6620031 11.301104,10.2049168 11.392109,9.6175212 L13.5141685,9.6175212 C13.3735245,10.7840393 13.0922406,11.9029698 12.6703086,12.9743463 C12.3458472,13.7982237 12.1461414,14.2441669 12.0711883,14.3121819 Z" id="path-1"></path>
						</defs>
						<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<g id="Accueil" transform="translate(-20.000000, -5.000000)">
								<g id="Header">
									<g id="LogoC&amp;F" transform="translate(20.000000, 5.000000)">
										<g id="F" transform="translate(39.396985, 20.502513)" fill="#4B4763" fill-rule="nonzero">
											<polygon id="Shape" points="11.8512563 0.040201005 11.8512563 46.838191 7.15577889 59.2201005 0.100502513 59.2201005 1.50753769 49.2623116 1.50753769 0.040201005"></polygon>
											<polygon id="Combined-Shape" points="21.9256281 20.3015075 18.158794 30.2311558 11.4492462 30.2311558 11.4492462 20.3015075"></polygon>
											<polygon id="Combined-Shape-2" points="29.6120603 0.048241206 25.8452261 9.97788945 11.4492462 9.97788945 11.4492462 0.048241206"></polygon>
										</g>
										<g id="_" transform="translate(19.296482, 30.552764)">
											<g id="&amp;">
												<use fill="#000000" xlink:href="#path-1"></use>
												<use fill="#FFC73F" xlink:href="#path-1"></use>
											</g>
										</g>
										<g id="C" fill-rule="nonzero">
											<path d="M39.4974874,79.7226131 C39.3527638,79.7226131 41.0492462,79.7226131 40.9045226,79.7025126 L40.9045226,69.7648241 L39.4974874,79.7226131 Z" id="Shape" fill="#2A242C"></path>
											<path d="M10.3437186,40.1174302 C10.3437186,56.430998 24.0120603,69.6651689 40.9768844,69.8661739 L40.9768844,79.7234603 C18.2954774,79.5224553 0,61.9063749 0,40.1174302 C0,18.3284854 18.2954774,0.627982922 40.9768844,0.422957796 C41.1102709,0.407077511 41.2445892,0.400361594 41.3788945,0.402350057 L41.3788945,10.3405457 C24.2532663,10.3405457 10.3437186,23.6631588 10.3437186,40.1174302 Z" id="Shape" fill="#FFC73F"></path>
											<polygon id="Combined-Shape-3" fill="#FFC73F" points="76.6914573 0.297487437 72.9246231 10.2271357 40.9085427 10.2271357 40.9085427 0.297487437"></polygon>
										</g>
									</g>
								</g>
							</g>
						</g>
					</svg>
					<div class="ServerSelection">
						<input type="text" value="play.craftandfun.fr" id="myInput" style="display: none;">
						<div onclick="copy(this)" class="toGrow brand--button--border--tier1 margincenter textcenter brand--color--yellow">
							play.craftandfun.fr
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection
@section("content")
				<section class="BlogLastPost">
					<h2>INFO</h2>
					<div class="billetBlog brand--background-color--dark-violet">
						<img src="https://hampsteadsda.files.wordpress.com/2018/07/ytlogo_old_new_animation.gif?w=356&h=200">
						<div class="blogcontent">
							<h3 class="brand--color--white">Point sur la mise à jour en 1.13.2 !</h3>
							<span class="brand--color--white">
								Le serveur Minecraft 1.13.2 du Craft&Fun Network a ouvert ses portes aux joueurs il y a maintenant quelques jours seulement ! Nous avons décidé de faire le point sur cette mise à jour sur une vidéo. Pour la découvrir, cliquez sur le bouton ci-dessous !
							</span>
							<a href="https://youtu.be/kFupC0YMgd4" class="margincenter linkbutton">
								<div class="brand--button--border--tier1 textcenter brand--color--yellow">
									Voir plus
								</div>
							</a>
						</div>
					</div>
					<div class="billetBlog brand--background-color--dark-violet">
						<img src="https://via.placeholder.com/356x200">
						<div class="blogcontent">
							<h3 class="brand--color--white">Nouvelle section Minecraft du site Craft&Fun Network !</h3>
							<span class="brand--color--white">
								Nous avons le plaisir de vous présenter la nouvelle section Minecraft du site Craft&Fun Network. Vous y retrouverez le forum, les cartes, une boutique et bien plus encore ! Le site étant encore en développement, vous constaterez sûrement quelques bugs, et/ou modifications. Merci de nous en faire part via Discord en contactant un développeur.
							</span>
							<a href="" class="margincenter linkbutton">
								<div class="brand--button--border--tier1 textcenter brand--color--yellow">
									Voir plus
								</div>
							</a>
						</div>
					</div>
				</section>
				<section class="ForumLastPost">
					<h2>DERNIERS SUJETS</h2>
					@php
						$posts = MinecraftForumPostsController::getAllPostsDesc();
					@endphp
					@foreach ($posts as $post)
						@continue($post->{'postId'} != $post->{'id'})
						@php
							$user = UsersController::getUser([['id', $post->{'creatorId'}]]);
							$lastAnswer = MinecraftForumPostsController::getLastPost([['postId', $post->{'postId'}]]);
							$section = MinecraftForumSectionsController::getSection([['id', $post->{'sectionId'}]]);
							$server = MinecraftForumServersController::getServer([['id', $section->{'serverId'}]]);
						@endphp
						<div class="postForum brand--background-color--dark-violet">
							<a href="/profil/{{ $user->{'pseudo'} }}"><div class="avatar" style="background-image: url('{{ $user->{'profilePicture'} }}');"></div></a>
							<a href="/minecraft/forum/{{ $server->{'name'} }}/{{ $section->{'name'} }}/{{ $post->{'id'} }}"><h3 class="brand--color--white">{{ $post->{'name'} }}</h3></a>
							<a href="/minecraft/forum/{{ $server->{'name'} }}/"><div class="tagtype">{{ $server->{'name'} }}</div></a>
							<a href="/minecraft/forum/{{ $server->{'name'} }}/{{ $section->{'name'} }}/"><div class="tagtype">{{ $section->{'name'} }}</div></a>
							<div class="answers">
								<span class="brand--color--yellow">{{ MinecraftForumPostsController::countPosts([['postId', $post->{'id'}]]) }}</span>
								<img src="/img/answer.png" srcset="/svg/answer.svg" alt="Nombre de réponses" id="answer" class="answer">
							</div>
						</div>
					@endforeach
				</section>
@endsection
@section("script")
	<script>
		function disableHeaderVideo()
		{
			if (typeof navigator.connection === "undefined")
			{
				$('.VideoContainer').html("<video id=\"video\" muted autoplay loop><source src=\"{{ env('APP_URL') }}/vid/header.mp4\" type=\"video/mp4\"><p>Oh geez ! ton navigateur n'aime pas les vidéos de chatons trop mignons :(</p></video>");
			}
			if (navigator.connection.downlink > 2.3)
			{
				$('.VideoContainer').html("<video id=\"video\" muted autoplay loop><source src=\"{{ env('APP_URL') }}/vid/header.mp4\" type=\"video/mp4\"><p>Oh geez ! ton navigateur n'aime pas les vidéos de chatons trop mignons :(</p></video>");
			}
		}
		disableHeaderVideo();
	</script>
@endsection
