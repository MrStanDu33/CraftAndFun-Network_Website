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
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/minecraft/">Minecraft</a> » <a href="/minecraft/forum/">Forum</a> » <a href="/minecraft/forum/{{ request('Server') }}">{{ request('Server') }}</a> » <a href="/minecraft/forum/{{ request('Server') }}/{{ request('Section') }}/">{{ request('Section') }}</a> » <a href="/minecraft/forum/{{ request('Server') }}/{{ request('Section') }}/{{ request('Post') }}/nouveau/">Nouveau thread</a></div>
				<section class="Post">
					<h2>Nouveau thread</h2>
					<form>
						<input class="longinput inputSplitLeft"	type="text"	name="name"	placeholder="Nom du thread">
					</form>
					<div class="answer" id="WYSIWYG"></div>
					<div class="brand--button--border--tier3 alignright textcenter" style="right: 225px; color: #d32f2f; margin-top: -62px;">Annuler</div>
					<div class="brand--button--border--tier2 alignright textcenter brand--color--yellow" style="margin-top: -62px;">Publier</div>
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
			var name = $('input').val();
			if (content.length === 0 || name.length === 0)
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
				Command: toastr["error"]("Merci de rentrer un titre et un contenu avant d'enregistrer.", "Une erreur est survenue !");
				return 0;
			}
			$.ajax(
			{
				type: 'POST',
				data:
				{
					"name": name,
					"content": content,
					"Section": "{{ request('Section') }}",
					"Server": "{{ request('Server') }}",
				},
				headers:
				{
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{ env('APP_URL') }}/ajax/Minecraft/Forum/createPost/newThread/new",
				success:function(data, textStatus, xhr)
				{
					if (xhr.status == 200)
					{
						window.location.href = "{{ env('APP_URL') }}/minecraft/forum/{{ request('Server') }}/{{ request('Section') }}/" + data;
					}
				}
			});
		})
	</script>
@endsection