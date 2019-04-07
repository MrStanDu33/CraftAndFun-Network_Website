@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("content")
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/minecraft/">Minecraft</a> » <a href="/minecraft/votes/">Votes</a></div>
				<section class="SelectPlayerPannel">
					<h2>Invité</h2>
					<p class="h2Desc textcenter brand--color--light-violet">Veuillez rentrer votre pseudo Minecraft afin de reçevoir les récompenses</p>
					<div class="formContainer">
						<div class="preview">
							<h3 class="textcenter brand--color--dark-violet">Apperçu</h3>
							<img src="https://crafatar.com/renders/body/606e2ff0ed7748429d6ce1d3321c7838" class="block margincenter">
						</div>
						<form class="player" action="/minecraft/votes/" method="POST">
							<h3 class="textcenter brand--color--dark-violet">Inscription</h3>
							<input class="shortinput block margincenter toTrigger"	type="text" name="pseudo" placeholder="Pseudo"><br/>
							<div data-link="createUser.php" class="brand--button--border--tier2 textcenter brand--color--yellow margincenter">Valider</div>
						</form>
					</div>
				</section>
@endsection
@section("script")
	<script src='https://www.google.com/recaptcha/api.js?render=6LfiUXoUAAAAAOEw5dhRpcKbEC6vNxdmejLCB5Th'></script>
	<script>
		function createCORSRequest(method, url)
		{
			var xhr = new XMLHttpRequest();
			if ("withCredentials" in xhr)
			{
				// XHR for Chrome/Firefox/Opera/Safari.
				xhr.open(method, url, true);
			}
			else if (typeof XDomainRequest != "undefined")
			{
				xhr = new XDomainRequest();
				xhr.open(method, url);
			}
			else
			{
				xhr = null;
			}
			return xhr;
		}

		$(document).ready(function()
		{
			var elem = $('.toTrigger');
			elem.data('oldVal', elem.val());
			elem.bind("propertychange change click keyup input paste", function(event)
			{
				if (elem.data('oldVal') != elem.val())
				{
					elem.data('oldVal', elem.val());
					var url = "https://cors.io/?https://api.mojang.com/users/profiles/minecraft/"+elem.val()+"?at="+Math.round((new Date()).getTime() / 1000);
					var xhr = createCORSRequest('GET', url);
					xhr.onload = function()
					{
						var text = xhr.responseText;
						if (text.length != 0)
						{
							text = JSON.parse(text);
							if (typeof text.id != "undefined")
							{
								$('section#container .MainBlock .formContainer div.preview img').attr("src", "https://crafatar.com/renders/body/"+text.id+"?overlay");
							}
							else
							{
								$('section#container .MainBlock .formContainer div.preview img').attr("src", "https://crafatar.com/renders/body/606e2ff0ed7748429d6ce1d3321c7838?overlay");
							}
						}
					};
					xhr.send();
				}
			});
		});

		$('.brand--button--border--tier2').click(function()
		{
			window.location = "/minecraft/votes/"+$('.toTrigger').val();
		});
	</script>
@endsection