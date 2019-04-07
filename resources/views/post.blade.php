@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("content")
				@if (auth()->user())
					<meta name="csrf-token" content="{{ csrf_token() }}">
				@endif
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/minecraft/">Minecraft</a> » <a href="/minecraft/forum/">Forum</a> » <a href="/minecraft/forum/{{ request('Server') }}">{{ request('Server') }}</a> » <a href="/minecraft/forum/{{ request('Server') }}/{{ request('Section') }}/">{{ request('Section') }}</a> » <a href="/minecraft/forum/{{ request('Server') }}/{{ request('Section') }}/{{ request('Post') }}/">{{ $threadName }}</a></div>
				<section class="Post">
					<h3>{{ $threadName }}</h3>
					@php
						$i = 0;
					@endphp
					@foreach ($posts as $post)
						@php
							$i++;
							$user = UsersController::getUser([['id', $post->{'creatorId'}]]);
						@endphp
						<div class="answer" id="post_{{ $i }}">
							<div class="profile">
								<a href="/profil/{{ $user->{'pseudo'} }}" class="margincenter"><div class="avatar margincenter" style="background-image: url('{{ $user->{'profilePicture'} }}');"></div></a>
								<a href="/profil/{{ $user->{'pseudo'} }}" class="margincenter textcenter"><span class="name textcenter">{{ $user->{'pseudo'} }}</span></a>
								<span class="margincenter textcenter messageCount"><span class="brand--color--yellow">0</span> messages</span>
								<div class="margincenter reputation" style="height: 40px; width: 30px; background-image: url('https://via.placeholder.com/30x40');"></div>
								<span class="textcenter margincenter grade">?</span>
								<span class="textcenter margincenter dateInscriptionDesc">Inscrit le</span>
								<span class="textcenter margincenter dateInscription">{{ $user->{'created_at'} }}</span>
							</div>
							<div class="core">
								<div class="message">
									{!! $post->{'content'} !!}
								</div>
								<div class="footer">
									<i class="material-icons brand--cursor-pointer report">report</i>
									<div class="">
										<i class="thumb material-icons brand--cursor-pointer">thumb_down_alt</i>
										<span>{{ $post->{'downvote'} }}</span>
									</div>
									<div class="">
										<i class="fire material-icons brand--cursor-pointer">whatshot</i>
										<span>{{ $post->{'upvote'} }}</span>
									</div>
									<i class="material-icons brand--cursor-pointer share">share</i>
									<span>{{ str_replace(':', 'h', date("d/m/Y h:m", strtotime(substr(str_replace('-', '/', $post->{'created_at'}), 0, 16)))) }}</span>
									<span>#{{ $i }}</span>
								</div>
							</div>
						</div>
					@endforeach
					@if (auth()->user())
						<div class="answer" id="WYSIWYG"></div>
						<div class="brand--button--border--tier3 alignright textcenter" style="right: 225px; color: #d32f2f; margin-top: -62px;">Annuler</div>
						<div class="brand--button--border--tier2 alignright textcenter brand--color--yellow" style="margin-top: -62px;">Publier</div>
					@endif
				</section>
@endsection
@section("script")
	<script type="text/javascript">
		$('#container section.MainBlock section div.brand--button--border--tier3.alignright.textcenter').click(function()
		{
			$('#WYSIWYG').empty();
		})
		$('#container section.MainBlock section div.brand--button--border--tier2.alignright.textcenter').click(function()
		{
			var content = $('#WYSIWYG').html();
			if (content.length === 0)
			{
				return 0;
			}
			$.ajax(
			{
				type: 'POST',
				data:
				{
					"content": content,
				},
				headers:
				{
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{ env('APP_URL') }}/ajax/Minecraft/Forum/createPost/{{ request('Post') }}",
				success:function(data, textStatus, xhr)
				{
					if (xhr.status == 200)
					{
						window.location.reload();
					}
				}
			});
		})
		function copyToClipboard(element)
		{
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val(window.location.host + window.location.pathname + '#' + $(element).parents().eq(2).attr("id")).select();
			document.execCommand("copy");
			$temp.remove();
		}

		function autoEmbedLink()
		{
			var startURL = 0
			var endURL = 0
			var url = null;
			$('#container section.MainBlock section div.answer').each(function(element)
			{
				var content = $(this).children('.core').children('.message').html();
				if (typeof content == 'undefined')
				{
					return 0;
				}
				startURL = content.indexOf("http", startURL)
				while (startURL != -1 && startURL < content.length)
				{
					if (typeof content == 'undefined')
					{
						return 0;
					}
					var content = $(this).children('.core').children('.message').html();
					startURL = content.indexOf("http", startURL)
					endURL = content.indexOf("<br>", startURL + 1);
					if (endURL == -1)
					{
						endURL = content.length;
					}
					url = content.slice(startURL, endURL);
					if (url.includes("youtube"))
					{
						if (!url.includes("embed/"))
						{
							var urlembed = url.replace("watch?v=", "embed/");
							var content = content.replace(url, "<div class=\"iframecontainer\"><div class=\"bandeau brand--background-color--yellow\"></div><iframe class=\"container brand--background-color--dark-violet\" id=\"ytplayer\" type=\"text/html\" width=\"640\" height=\"360\"src=\"" + urlembed +"\"frameborder=\"0\"/></div>");
							$(this).children('.core').children('.message').empty();
							$(this).children('.core').children('.message').html(content);
						}
						startURL = startURL + 237;
					}
					else if (url.includes("twitch.tv"))
					{
						if (!url.includes("player.twitch.tv/"))
						{
							var enddomain = url.indexOf(".tv/");
							enddomain = enddomain + 4;
							urlembed = url.slice(enddomain);
							urlembed = "https://player.twitch.tv/?channel=" + urlembed;
							var content = content.replace(url, "<div class=\"iframecontainer\"><div class=\"bandeau brand--background-color--yellow\"></div><iframe class=\"container brand--background-color--dark-violet\" id=\"ytplayer\" type=\"text/html\" width=\"640\" height=\"360\"src=\"" + urlembed +"\"frameborder=\"0\"/></div>");
							$(this).children('.core').children('.message').empty();
							$(this).children('.core').children('.message').html(content);
						}
						startURL = startURL + 289;
					}
					else if (url.length != 0)
					{
						var title = null;
						var domain = url;
						var startdomain = domain.indexOf("://") + 3;
						domain = domain.slice(startdomain);
						var enddomain = domain.indexOf("/");
						var content = content.replace(url, "<div class=\"linkViewer toaddcard" + domain.replace(".", "") + "\"><div class=\"bandeau brand--background-color--yellow\"></div><div class=\"container brand--background-color--dark-violet\"><p class=\"domain\">" + domain + "</p><p class=\"title\"><a href=\"" + url + "\" rel=\"noreferrer\" target=\"_blank\" class=\"toaddtitle" + domain.slice(0, domain.indexOf(".")).replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-') + "\">" + url + "</a></p><p class=\"description toadddesc" + domain.slice(0, domain.indexOf(".")).replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-') + "\"></p><img class=\"toaddimg" + domain.slice(0, domain.indexOf(".")).replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-') + "\"></div></div>///ENDOFBLOCK///");
						$(this).children('.core').children('.message').empty();
						$(this).children('.core').children('.message').html(content);
						$.ajax(
						{
							type: 'GET',
							url: 'https://craftandfun.fr/ajax/getWebsiteData.php?domain=' + domain.slice(0, domain.indexOf(".")).replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-') + '&url=' + url,
							dataType : 'JSON',
						}).done(function(data)
						{
							$('.toaddtitle' + data.domain).html(data.title);
							$('.toaddtitle' + data.domain).removeClass('toaddtitle' + data.domain);
							$('.toadddesc' + data.domain).html(data.description);
							$('.toadddesc' + data.domain).removeClass('toadddesc' + data.domain);
							if (data.image != null)
							{
								$('.toaddimg' + data.domain).attr("src", data.image);
								$('.toaddimg' + data.domain).css("display", "block");
							}
							$('.toaddimg' + data.domain).removeClass('toaddimg' +  data.domain);
						});
						content = $(this).children('.core').children('.message').html();
						startURL = content.indexOf("///ENDOFBLOCK///");
						$(this).children('.core').children('.message').empty();
						$(this).children('.core').children('.message').html(content.replace("///ENDOFBLOCK///", ""));
					}
				}
			});
		}
		//autoEmbedLink();
		$('#container section.MainBlock section div.answer div.core div.footer i.material-icons.brand--cursor-pointer.share').click(function()
		{
			copyToClipboard($(this));
			toastr.options =
			{
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-bottom-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "1000",
				"hideDuration": "1000",
				"timeOut": "7000",
				"extendedTimeOut": "1000",
				"showEasing": "linear",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};
			Command: toastr["success"]("L'adresse du post a bien été copiée dans votre presse papier.'.", "Adresse copiée.");
		});

		$('#container section.MainBlock section div.answer div.core div.footer i.material-icons.brand--cursor-pointer.report').click(function()
		{
			if($('.greyFilter').css('display') == 'none')
			{
				$('.greyFilter').css({'display': 'block', 'z-index': '11'});
			}
			var postid = $(this).parents().eq(2).attr("id");
			$('#container').append("<div class=\"toDelete\" style=\"z-index: 998; position: absolute; top: " + ($(document).scrollTop() + (screen.height / 2) - 180) + "px; left: calc(50% - 194px); height: 180px; width: 388px; border-radius: 5px; box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.76); background-color: #4b4763;\"><h4 style=\"font-size: 18px; font-weight: 500; text-align: center; color: #ffffff; margin: 0; padding: 0; margin-top: 18px;\">Souhaites-tu réellement signaler ce post ?</h4><h5 style=\"font-size: 13px; font-weight: 500; text-align: center; color: #73739e; margin: 0; padding: 0; margin-top: 11px; margin-bottom: 60px;\">Tout abus de cette fonctionnalité sera sanctionné.</h5><div class=\"brand--button--border--tierconfirmtransparent alignleft textcenter\">ANNULER</div><div style=\"margin-right: 15px;\" class=\"brand--button--border--tierconfirmred alignright textcenter\">SIGNALER</div></div>");
			$('.toDelete div.brand--button--border--tierconfirmtransparent').click(function()
			{
				$('.toDelete').remove();
				$('.greyFilter').css({'display': 'none', 'z-index': '-99'});
			});
			$('.toDelete div.brand--button--border--tierconfirmred').click(function()
			{
				$.ajax(
				{
					type: 'PUT',
					url: 'https://craftandfun.fr/reportpost.php?thread=12&post=' + postid,
					success:function(data, textStatus, xhr)
					{
						if (xhr.status == 201)
						{
							$('.toDelete').remove();
							$('.greyFilter').css({'display': 'none', 'z-index': '-99'});
							toastr.options =
							{
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": false,
								"positionClass": "toast-bottom-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "1000",
								"hideDuration": "1000",
								"timeOut": "7000",
								"extendedTimeOut": "1000",
								"showEasing": "linear",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};
							Command: toastr["success"]("Le post a bien été signalé, notre équipe analysera votre demande dans les plus brefs délais. Merci de votre coopération.", "Signalement effectué.");
						}
					},
					complete: function(xhr, textStatus)
					{
						if (xhr.status == 400)
						{
							toastr.options =
							{
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": false,
								"positionClass": "toast-bottom-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "1000",
								"hideDuration": "1000",
								"timeOut": "7000",
								"extendedTimeOut": "1000",
								"showEasing": "linear",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};
							Command: toastr["error"]("Une erreur est survenue lors du signalement de ce post. Veuillez réessayer ultérieurement ou vous assurer que le post existe encore.", "Signalement impossible.");
						}
						else if (xhr.status == 429)
						{
							toastr.options =
							{
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": false,
								"positionClass": "toast-bottom-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "1000",
								"hideDuration": "1000",
								"timeOut": "7000",
								"extendedTimeOut": "1000",
								"showEasing": "linear",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};
							Command: toastr["error"]("Veuillez ne pas signaler à plusieurs reprises le même post, votre requête précédente est en cours d'analyse et sera traitée dans les plus brefs délais.", "Signalement incorrect.");
						}
						else if (xhr.status == 503)
						{
							toastr.options =
							{
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": false,
								"positionClass": "toast-bottom-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "1000",
								"hideDuration": "1000",
								"timeOut": "7000",
								"extendedTimeOut": "1000",
								"showEasing": "linear",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};
							Command: toastr["error"]("La fonctionnalité de signalement a été temporairement ou définitivement suspendue. Veuillez réessayer ultérieurement.", "Fonctionnalité désactivée.");
						}
					} 
				});
			});
		});
		$('.greyFilter').click(function(e)
		{
			if($('.greyFilter').css('display') == 'block')
			{
				$('.toDelete').remove();
				$('.greyFilter').css({'display': 'none', 'z-index': '-99'});
			}
		});
	</script>
@endsection





