@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("content")
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/profil/">Profil</a></div>

				<section class="ConnexionPannel">
					<h2>Profil</h2>
					<p class="h2Desc textcenter brand--color--light-violet">Connectez-vous ou inscrivez-vous pour accéder à cette page.</p>
					<div class="formContainer">
						<form class="connexion" action="/profil/connect">
							<h3 class="textcenter brand--color--dark-violet">Connexion</h3>
							<br/>
							<input class="shortinput margincenter" 														type="text"		name="id"			placeholder="Identifiant">
							<input class="shortinput margincenter" 														type="password"	name="password"		placeholder="Mot de passe">
							<a href="" class="forgottenPassword brand--color--yellow">Mot de passe oublié ?</a>
							<input class="brand--button--border--tier2 textcenter brand--color--yellow margincenter"	type="submit"	value="Connexion"	disabled>
						</form>
						<form class="inscription" action="/profil/create">
							<h3 class="textcenter brand--color--dark-violet">Inscription</h3>
							<br/>
							<input class="shortinput" 																	type="text"		name="pseudo"			placeholder="Pseudo"><br/>
							<input class="shortinput inputSplitLeft"													type="text"		name="email1"			placeholder="Adresse email">
							<input class="shortinput"																	type="text"		name="email2"			placeholder="Confirmez l'adresse email"><br/>
							<input class="shortinput inputSplitLeft"													type="password"	name="password1" 		placeholder="Mot de passe">
							<input class="shortinput"																	type="password"	name="password2" 		placeholder="Confirmez le mot de passe"><br/>
							<input class="longinput"																	type="text"		name="securityQuestion"	placeholder="Question de sécurité">
							<input class="longinput"																	type="text"		name="securityAnswer"	placeholder="Réponse" disabled>
							<input class="longinput"																	type="text"		name="traffic"			placeholder="Comment nous avez-vous connu ?">
							<input class="brand--button--border--tier2 textcenter brand--color--yellow margincenter"	type="submit"	value="Inscription" 	disabled>
						</form>
					</div>
				</section>
@endsection
@section("script")
	<script src='https://www.google.com/recaptcha/api.js?render=6LfiUXoUAAAAAOEw5dhRpcKbEC6vNxdmejLCB5Th'></script>
	<script>
		$(document).ready(function()
		{
			$('input[type="submit"]').each(function()
			{
				$(this).parent().find('input:not([type="submit"])').each(function()
				{
					$(this).data('oldVal', $(this).val());
					$(this).bind("propertychange change click keyup input paste", function(event)
					{
						if ($(this).data('oldVal') != $(this).val())
						{
							$(this).data('oldVal', $(this).val());
							var state = checkInputs($(this).parent());
							if (state == false)
							{
								$(this).parent().find('input[type="submit"]').prop('disabled', true);
							}
							else
							{
								$(this).parent().find('input[type="submit"]').prop('disabled', false);
							}
							if ($(this).attr("name") === "securityQuestion")
							{
								if ($(this).val().length === 0)
								{
									$(this).parent().find('input[name="securityAnswer"]').val("");
									$(this).parent().find('input[name="securityAnswer"]').prop("disabled", true);
								}
								else
								{
									$(this).parent().find('input[name="securityAnswer"]').prop("disabled", false);
								}
							}
						}
					});
				});
			});
		});

		function checkInputs(elem)
		{
			var state = true;
			elem.find('input:not([type="submit"])').each(function()
			{
				if ($(this).val().length === 0)
				{
					state = false;
					return (state);
				}
			});
			return (state);
		}

		$('input[type="submit"].brand--button--border--tier2').click(function(e)
		{
			if ($(this).hasClass('disabled'))
			{
				return 0;
			}
			e.preventDefault();
			var link = $(this).parent().attr("action");
			var dataForm = $(this).parent().serialize();
			grecaptcha.execute('6LfiUXoUAAAAAOEw5dhRpcKbEC6vNxdmejLCB5Th', {action: 'homepage'}).then(function(token)
			{
				$.ajax(
				{
					type: 'POST',
					data: dataForm,
					url: link,
					headers:
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					success:function(data, textStatus, xhr)
					{
						window.location.href = "/";
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
							Command: toastr["error"]("Une erreur est survenue. Merci de bien vouloir réessayer et de vérifier les informations entrées.'.", "Oh non, il y a un problème !.");
						}
						else if (xhr.status == 422)
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
							Command: toastr["error"]("Une erreur est survenue. Merci de bien vouloir réessayer et de vérifier les informations entrées. Les adresses E-mail et les mots de passe doivent être identiques !", "Oh non, il y a un problème !");
						}
					}
				});
			});
		});
	</script>
@endsection