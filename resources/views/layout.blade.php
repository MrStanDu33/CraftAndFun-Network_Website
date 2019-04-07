@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
<!--
	   ______     ___        ________     ____  _____ 
	 .' ___  |  .' _ '.     |_   __  |   |_   \|_   _|
	/ .'   \_|  | (_) '___    | |_ \_|     |   \ | |  
	| |         .`___'/ _/    |  _|        | |\ \| |  
	\ `.___.'\ | (___)  \_   _| |_        _| |_\   |_ 
	 `.____ .' `._____.\__| |_____|      |_____|\____|
-->
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>C&F Network - Minecraft</title>
		<meta charset="utf-8">

		<meta property="og:locale" content="fr_FR">
		<meta property="og:title" content="C&F Network - Minecraft">
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://craftandfun.fr/">
		<meta property="og:site_name" content="C&F Network - Minecraft">
		<meta property="og:description" content="Réseau de serveurs Multi-Gaming">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<meta property="og:image" content="img/logosquare.jpg">-->

		<!--<meta name="google-site-verification" content="eTXXoXlsJbXEFvD3UvZQOP2R-2bI7J2P2xRErfw0mqw" />-->
		<meta name="robots" content="index,follow">
		<meta name="geo.region" content="FR">
		<meta name="geo.placename" content="Bordeaux">
		<meta name="geo.position" content="44.8378;0.5792">
		<!--<meta name="twitter:image" content="img/logosquare.jpg">-->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="C&F Network - Minecraft">
		<meta name="twitter:creator" content="Daniels-Roth Stan">
		<meta name="twitter:title" content="C&F Network - Minecraft">
		<meta name="twitter:description" content="Réseau de serveurs Multi-Gaming">
		<meta name="description" content="Serveur Minecraft Freebuild/Vanilla/Créatif par Craft&Fun Network">
		<!--<meta name="keywords" content="developper,developpeur,html,css,php,mysql,Freelance,Website,Internet,webapps,creation,systeme,administration,creation site internet, creation site internet bordeauw, creation site internet 33, creation sites internet, creation site web, creation sites web, développeur, développeur web, webdesigner, graphiste, référenceur, SEO, freelance">-->
		<meta name="ICBM" content="44.8378, 0.5792">

		<link rel="alternate" hreflang="fr" href="https://www.craftandfun.fr/" />
		<link rel="shortcut icon" href="/img/logo3x.png"/>
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112496408-3"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag()
			{
				dataLayer.push(arguments);
			}
			gtag('js', new Date());
			gtag('config', 'UA-112496408-3');
		</script>
		<!-- Hotjar Tracking Code for www.daniels-roth-stan.fr -->
		<!--<script>
			(function(h,o,t,j,a,r)
			{
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:922854,hjsv:6};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script>-->
	</head>
	<body>
		<header>
			<a href="/"><img src="/img/logo3x.png" srcset="/svg/logo.svg" alt="C&F Logo" id="logo" class="logo"></a>
			<nav>
				<ul>
					<li class="accueil"><a href="/minecraft/">Accueil</a></li>
					<li class="boutique"><a href="/minecraft/boutique/printocraft/">Boutique</a></li>
					<li class="cartes"><a href="/minecraft/cartes/">Cartes</a></li>
					<li class="vote"><a href="/minecraft/votes/">Votes</a></li>
					<li class="forum"><a href="/minecraft/forum/">Forum</a></li>
					<li class="joueurs"><a href="">Joueurs</a></li>
					@if (auth()->user())
						<li class="profil"><a href="/profil/">Profil</a></li>
						<li class="profil"><a href="/profil/logout">Déconnexion</a></li>
					@else
						<li class="profil"><a href="/profil/">Connexion</a></li>
						<li class="profil"><a href="/profil/">Inscription</a></li>
					@endif
				</ul>
			</nav>
		</header>
		<div class="headerspacer"></div>
		@yield("header")
		<section id="container">
			<section class="MainBlock">
				@yield("content")
			</section>
			<section id="SideBar">
				<div class="Brick brand--background-color--dark-violet servers">
					<a href=""><h3 class="brand--color--white textcenter">Serveurs</h3></a>
					<div class="collumn">
						<a href=""><span class="skillsTop">Hub<span class="numberplayer"></span></span></a>
						<div class="skillsBottom">
							<div class="progress">
								<div class="hub server progress-bar progress-bar-info" role="progressbar">
									<div class="Oval"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="collumn">
						<a href=""><span class="skillsTop">Freebuild<span class="numberplayer"></span></span></a>
						<div class="skillsBottom">
							<div class="progress">
								<div class="freebuild server progress-bar progress-bar-info" role="progressbar">
									<div class="Oval"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="collumn">
						<a href=""><span class="skillsTop">Créatif<span class="numberplayer"></span></span></a>
						<div class="skillsBottom">
							<div class="progress">
								<div class="creatif server progress-bar progress-bar-info" role="progressbar">
									<div class="Oval"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="collumn">
						<a href=""><span class="skillsTop">Vanilla<span class="numberplayer"></span></span></a>
						<div class="skillsBottom">
							<div class="progress">
								<div class="vanilla server progress-bar progress-bar-info" role="progressbar">
									<div class="Oval"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="collumn">
						<a href=""><span class="skillsTop">Atharion<span class="numberplayer"></span></span></a>
						<div class="skillsBottom">
							<div class="progress">
								<div class="atharion server progress-bar progress-bar-info" role="progressbar">
									<div class="Oval"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="Brick brand--background-color--dark-violet discord">
					<h3 class="brand--color--white textcenter">Discord</h3>
					<div class="textcenter connected"><span class="brand--color--yellow"></span> Connectés</div>
					<div class="textcenter members"><span class="brand--color--yellow"></span> Membres</div>
					<a href="https://discord.gg/vQAsGJN" target="_blank" class="margincenter linkbutton">
						<div class="brand--button--border--tier1 textcenter brand--color--yellow">
							Nous rejoindre
						</div>
					</a>
				</div>
				<div class="Brick brand--background-color--dark-violet partners">
					<h3 class="brand--color--white textcenter">Partenaires</h3>
					<ul>
					</ul>
				</div>
				<div class="Brick brand--background-color--dark-violet cookie">
					<h3 class="brand--color--white textcenter">Cookies</h3>
					<div class="textcenter countCookies"><span class="brand--color--yellow">69</span> Cookies</div>
					<img src="/img/cookie.png" class="margincenter">
				</div>
			</section>
		</section>
		<footer>
			<div class="section">
				<p class="brand--color--ultra-light-violet">Craft&Fun Network® est une propriété de <a href="https://daniels-roth-stan.fr" target="_blank">Daniels-Roth Stan</a> et<br>n’est aucunement affilié à <a href="https://mojang.com" target="_blank">Mojang</a></p>
				<p class="brand--color--ultra-light-violet"><a href="">CGU</a> - <a href="">CGV</a></p>
				<p class="brand--color--ultra-light-violet"><a href="">NOUS CONTACTER</a></p>
				<p class="brand--color--ultra-light-violet"><a href="https://top-serv.org/classement-serveurs/annonce?g=minecraft&id=563">TopServ.org</a></p>
				<p class="brand--color--ultra-light-violet"><a href="https://www.serveurs-minecraft.org/vote.php?id=56071">Serveurs-Minecraft.org</a></p>
				<p class="brand--color--ultra-light-violet">Designé et développé avec <span class="triggerhover">♥</span> par <a href="https://daniels-roth-stan.fr" target="_blank"><span class="triggerhover">Daniels-Roth Stan</span></a></p>
			</div>
			<div class="section">
				<i class="brand--color--white material-icons">link</i><h5 class="brand--color--white">LIENS UTILES</h5><br>
				<div>
					<i class="brand--color--white material-icons">videogame_asset</i><h6 class="brand--color--white">En Jeu</h5>
					<ul>
						<li class="brand--color--ultra-light-violet"><a href="">Règlement</a></li>
						<li class="brand--color--ultra-light-violet"><a href="">Claim</a></li>
						<li class="brand--color--ultra-light-violet"><a href="/minecraft/cartes/">Cartes</a></li>
						<li class="brand--color--ultra-light-violet"><a href="">Argent</a></li>
						<li class="brand--color--ultra-light-violet"><a href="">Grades</a></li>
						<li class="brand--color--ultra-light-violet"><a href="">Compétences</a></li>
					</ul>
				</div>
				<div>
					<i class="brand--color--white material-icons">desktop_mac</i><h6 class="brand--color--white">Site</h5>
					<ul>
						<li class="brand--color--ultra-light-violet"><a href="">Règlement</a></li>
						<li class="brand--color--ultra-light-violet"><a href="/minecraft/boutique/">Boutique</a></li>
						<li class="brand--color--ultra-light-violet"><a href="/minecraft/forum/">Forums</a></li>
						<li class="brand--color--ultra-light-violet"><a href="">Joueurs en ligne</a></li>
						<li class="brand--color--ultra-light-violet"><a href="">CGU</a></li>
						<li class="brand--color--ultra-light-violet"><a href="">CGV</a></li>
					</ul>
				</div>
			</div>
			<div class="section">
				<i class="brand--color--white material-icons">bar_chart</i><h5 class="brand--color--white">STATISTIQUES</h5><br>
				<div>
					<i class="brand--color--white material-icons">videogame_asset</i><h6 class="brand--color--white">En Jeu</h5>
					<ul>
						<li class="brand--color--ultra-light-violet"><span class="brand--color--yellow">0</span> Joueurs en ligne</li>
						<li class="brand--color--ultra-light-violet"><span class="brand--color--yellow">0</span> Joueurs au total</li>
					</ul>
				</div>
				<div>
					<i class="brand--color--white material-icons">desktop_mac</i><h6 class="brand--color--white">Site</h5>
					<ul>
						<li class="brand--color--ultra-light-violet"><span class="brand--color--yellow">{{ /*UsersController::countUsers([['status', 1]])*/'0' }}</span> Membres en ligne</li>
						<li class="brand--color--ultra-light-violet"><span class="brand--color--yellow">{{ UsersController::countAllUsers() }}</span> Membres au total</li>
						<li class="brand--color--ultra-light-violet"><span class="brand--color--yellow">0</span> Posts ce mois-ci</li>
						<li class="brand--color--ultra-light-violet"><span class="brand--color--yellow">{{ MinecraftForumPostsController::countAllPosts() }}</span> Posts au total</li>
					</ul>
				</div>
			</div>
		</footer>
		<div class="greyFilter"></div>
	</body>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
	<link href="https://codeseven.github.io/toastr/build/toastr.min.css" rel="stylesheet">
	<script src="/js/trumbowyg/dist/trumbowyg.min.js"></script>
	<script type="text/javascript" src="/js/trumbowyg/dist/langs/fr.min.js"></script>
	<link rel="stylesheet" href="/js/trumbowyg/dist/ui/trumbowyg.min.css">
	@yield("script")
	<script>
		function MenuCurrentPage()
		{
			var path = location.pathname.split("/");
			path.shift();
			path.shift();
			if ($('header ul li.' + path[0]).length == 0)
			{
				$('header ul li.accueil').addClass('active');
			}
			else
			{
				$('header ul li.' + path[0]).addClass('active');
			}
		}
		var totalplayer = 0;
		function MinecraftStats()
		{
			var port = 25581;
			var totalplayer = 0;
			while (port != 25586)
			{
				var HostName = 0;
				var Players = 0;
				$.ajax(
				{
					type: 'GET',
					url: "/ajax/Minecraft/query/"+port,
					dataType : 'JSON',
					async: false,
					success:function(data)
					{
						if (data)
						{
							totalplayer = totalplayer + data['Players'];
							var MaxPlayers = 8;
							while(MaxPlayers - 1 < data['Players'])
							{
								MaxPlayers = MaxPlayers * 2;
							}
							$('footer div:nth-child(3) div:nth-child(4) ul li:nth-child(1) span').text(totalplayer);
							if (typeof data['Players'] != "undefined")
							{
								$('section#SideBar div.Brick.brand--background-color--dark-violet.servers div:nth-child('+(port - 25579)+') a span span').text(data['Players'] + '/' + MaxPlayers);
							}
							else
							{
								$('section#SideBar div.Brick.brand--background-color--dark-violet.servers div:nth-child('+(port - 25579)+') a span span').text('0/' + MaxPlayers);
							}
							$('section#SideBar div.Brick.brand--background-color--dark-violet.servers div:nth-child('+(port - 25579)+') div.skillsBottom div.progress div.progress-bar').css('width',(data['Players'] * 100 / MaxPlayers)+'%');
						}
					}
				});
				port ++;
			}
			setTimeout(MinecraftStats, 5000);
		}

		function DiscordStats()
		{
			$.ajax(
			{
				type: 'GET',
				url: 'https://discordapp.com/api/guilds/247347670128001024/members?limit=1000',
				headers: {'Authorization': 'Bot ' + 'NTA0MzUyODI4OTk5OTkxMzE3.DrjOzQ.rnA05N3Mf6hJageSbGs5fVO6kwM'},
				success:function(data)
				{
					if (data)
					{
						result = data;
						$('#SideBar div.discord div.members span').text(result.length);
					}
				}
			});
			$.ajax(
			{
				type: 'GET',
				url: 'https://discordapp.com/api/guilds/247347670128001024/widget.json',
				success:function(data)
				{
					if (data)
					{
						result = data;
						$('#SideBar div.discord div.connected span').text(result['members'].length);
					}
				}
			});
			setTimeout(DiscordStats, 5000);
		}

		function InitStreams()
		{
			var partners = ['andagor', 'EvilRagnarock', 'jojo98712', 'MrStanDu33', 'Zelkyys'];
			var request = "https://api.twitch.tv/helix/users?"
			partners.forEach(function(element)
			{
				request = request + 'login=' + element + '&';
			});
			$.ajax(
			{
				type: 'GET',
				url: request,
				dataType : 'JSON',
				headers :
				{
					"client-id": "r1k8hk9k4whxfsw89bngczyjtcr2c0"
				},
				success:function(data)
				{
					if (data)
					{
						$.each(data, function(index, value)
						{
							$.each(value, function(index, value)
							{
								$('#SideBar div.Brick.brand--background-color--dark-violet.partners ul').append("<li class=\"" + value.id + "\"><a href=\"https://twitch.tv/" + value.login + "\" target=\"_blank\"><img class=\"logo\" src=\"" + value.profile_image_url + "\"><span class=\"ChannelLive\">" + value.display_name + "</span><span class=\"brand--color--yellow viewersLive textcenter\">Hors ligne</span></a></li>");
							});
						});
						GetStreams();
					}
				}
			});
		}
		function GetStreams()
		{
			var request = "https://api.twitch.tv/helix/streams?"
			$('#SideBar div.Brick.brand--background-color--dark-violet.partners ul li').each(function(index)
			{
				request = request + 'user_id=' + $(this).attr("class") + '&';
			});
			$.ajax(
			{
				type: 'GET',
				url: request,
				dataType : 'JSON',
				headers :
				{
					"client-id": "r1k8hk9k4whxfsw89bngczyjtcr2c0"
				},
				success:function(data)
				{
					$.each(data, function(index, value)
					{
						$.each(value, function(index, value)
						{
							if (typeof value.id !== 'undefined')
							{
								$('#SideBar div.Brick.brand--background-color--dark-violet.partners ul li.' + value.user_id + ' a img.logo').addClass('Live');
								$('#SideBar div.Brick.brand--background-color--dark-violet.partners ul li.' + value.user_id + ' a span.viewersLive').text(value.viewer_count);
							}
						});
					});
				}
			});
			setTimeout(GetStreams, 60000);
		}
		function copy(that)
		{
			var inp =document.createElement('input');
			document.body.appendChild(inp)
			inp.value =that.textContent
			inp.select();
			document.execCommand('copy',false);
			inp.remove();
			toastr.options =
			{
				"closeButton": true,
				"progressBar": true,
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
			Command: toastr["success"]("L'adresse du serveur a bien été copiée dans votre presse papier.", "Adresse copiée.");
		}
		$(document).ready(function()
		{
			MenuCurrentPage();
			MinecraftStats();
			DiscordStats();
			InitStreams();
			/*	
			toastr.options =
			{
				"closeButton": true,
				"debug": false,
				"progressBar": true,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-bottom-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "1000",
				"hideDuration": "1000",
				"timeOut": "50000",
				"extendedTimeOut": "10000",
				"showEasing": "linear",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};
			Command: toastr["warning"]("Cette page est une page de présentation. Elle est susceptible de changer à tout moment et les liens ont été pour la plupart désactivés. Le site intégral arrivera sous peu !", "Attention !");
			setTimeout(function()
			{
				toastr.options =
				{
					"closeButton": true,
					"progressBar": true,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-bottom-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "1000",
					"hideDuration": "1000",
					"timeOut": "7000",
					"extendedTimeOut": "10000",
					"showEasing": "linear",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
				Command: toastr["info"]("Bien que le site annonce l'ouverture du serveur en 1.13.2, ce dernier n'est toujours pas accessible pour des raisons de correction de bug.", "1.13.2");
				setTimeout(function()
				{
					toastr.options =
					{
						"closeButton": true,
						"progressBar": true,
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
					Command: toastr["info"]("La version mobile du site est en cours de développement. Nous vous prions de ne pas en faire part à notre équipe de développeurs.", "Mobile First !");
				}, 2500);
			}, 500);
			*/
		});
		if ($('#WYSIWYG').length != 0)
		{
			$('#WYSIWYG').trumbowyg({
				lang: 'fr',
				autogrow: true,
				imageWidthModalEdit: true,
				urlProtocol: true,
				minimalLinks: true
			});
		}
	</script>