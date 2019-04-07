@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("content")
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/profil/">Profil</a></div>
				<section class="profilContainer">
					<h2>Profil</h2>
					<form class="margincenter">
						<p class="sectionName textleft brand--color--light-violet">MON COMPTE</p>
						@if ($editState)
							<label for="pseudo" class="inline">PSEUDO</label><input type="text" name="pseudo" id="pseudo" value="{{ $user->{'pseudo'} }}"><br/>
							<label for="email" class="inline">E-MAIL</label><input type="text" name="email" id="email" value="{{ $user->{'email'} }}"><br/>
							<label for="password1" class="inline">MOT DE PASSE</label><input type="password" name="password1" id="password1" placeholder="●●●●●●●●●●"><input type="password" name="password2" id="password2" placeholder="●●●●●●●●●●"><br/>
							<label for="biography" class="inline">BIOGRAPHIE</label><textarea type="text" name="biography" id="biography" value="{{ $user->{'biography'} }}"></textarea><br/>
						@else
						@endif
					</form>
					<form class="margincenter flex">
						<p class="sectionName textleft brand--color--light-violet">COMPTES LIÉS</p>
						@if ($editState)
							<div>
								<label for="twitter" class="inline">TWITTER</label><input type="text" name="twitter" id="twitter" value="{{ $user->{'twitter'} }}"><br/>
							</div>
							<div>
								<label for="instagram" class="inline">INSTAGRAM</label><a id="instagram-button" class="inline brand--button--border--tier2 brand--color--yellow">SE CONNECTER</a><br/>
							</div>
							<div class="flexbreaker"></div>
							<div>
								<label for="discord" class="inline">DISCORD</label><a id="discord-button" class="inline brand--button--border--tier2 brand--color--yellow">CONNECTER</a><br/>
							</div>
							<div>
								<label for="twitch" class="inline">TWITCH</label><a id="twitch-button" class="inline brand--button--border--tier2 brand--color--yellow">CONNECTER</a><br/>
							</div>
							<div class="flexbreaker"></div>
							<div>
								<label for="spotify" class="inline">SPOTIFY</label><a id="spotify-button" class="inline brand--button--border--tier2 brand--color--yellow">CONNECTER</a><br/>
							</div>
							<div>
								<label for="steam" class="inline">STEAM</label><a id="steam-button" class="inline brand--button--border--tier2 brand--color--yellow">CONNECTER</a><br/>
							</div>
							<div class="flexbreaker"></div>
						@else
						@endif
					</form>
					<form class="margincenter flex">
						<p class="sectionName textleft brand--color--light-violet">JEUX LIÉS</p>
						@if ($editState)
							<div>
								<label for="minecraft" class="inline">MINECRAFT</label><a id="minecraft-button" class="inline brand--button--border--tier2 brand--color--yellow">CONNECTER</a><br/>
							</div>
						@else
						@endif
					</form>
					<form class="margincenter flex">
						<p class="sectionName textleft brand--color--light-violet">STATISTIQUES</p>
						<div>
							<label for="messages" class="inline">MESSAGES</label><input type="text" name="messages" id="messages" value="{{ $messages }}" disabled><br/>
						</div>
						<div>
							<label for="cookies" class="inline">COOKIES</label><input type="text" name="cookies" id="cookies" value="{{ $user->{'cookies'} }}" disabled><br/>
						</div>
						<div class="flexbreaker"></div>
						<div>
							<label for="connexions" class="inline">CONNEXIONS</label><input type="text" name="connexions" id="connexions" value="{{ $user->{'connexions'} }}" disabled><br/>
						</div>
						<div>
							<label for="connecte" class="inline">CONNECTÉ LE</label><input type="text" name="connected" id="connected" value="{{ str_replace(':', 'h', date("d/m/Y h:m", strtotime(substr(str_replace('-', '/', $user->{'modified_at'}), 0, 16)))) }}" disabled><br/>
						</div>
						<div class="flexbreaker"></div>
						<div>
							<label for="inscrit" class="inline">INSCRIT LE</label><input type="text" name="inscrit" id="inscrit" value="{{ str_replace(':', 'h', date("d/m/Y h:m", strtotime(substr(str_replace('-', '/', $user->{'created_at'}), 0, 16)))) }}" disabled><br/>
						</div>
					</form>


					<!-- 
						TWITTER :
							https://publish.twitter.com/?link_color=%23FAB81E&query=%40mrstandu33&theme=light&widget=Timeline
								<a class="twitter-timeline" data-theme="light" data-link-color="#FAB81E" href="https://twitter.com/info_tbm?ref_src=twsrc%5Etfw">Tweets by mrstandu33</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						INSTAGRAM :
							https://coderwall.com/p/difz1q/javascript-instagram-social-login-button-for-oauth
						DISCORD :
							https://discordapp.com/developers/docs/topics/oauth2
						TWITCH :
							https://github.com/twitchdev/authentication-samples
						SPOTIFY :
							https://developer.spotify.com/documentation/web-api/libraries/
						STEAM :
							https://github.com/zyberspace/php-steam-web-api-client
					-->
				</section>
@endsection
@section("script")
	<script>
	</script>
@endsection