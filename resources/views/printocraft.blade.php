@php
	use \App\Http\Controllers\MinecraftForumServersController;
	use \App\Http\Controllers\MinecraftForumSectionsController;
	use \App\Http\Controllers\MinecraftForumPostsController;
	use \App\Http\Controllers\UsersController;
@endphp
@extends("layout")

@section("content")
				<div class="PagePath"><a href="/"><i class="material-icons">home</i></a> » <a href="/minecraft/">Minecraft</a> » <a href="/minecraft/printocraft/">Print o' Craft</a></div>
				<section class="PrintOCraft">
					<h2>Print o' Craft</h2>
					<p class="h2Desc textcenter brand--color--light-violet">Vous avez construit un magnifique chateau ou une statuette à votre effligie ?<br/>Commandez une impression 3D de cette construction et posez-la gracieusement sur votre bureau !</p>
					<div class="formContainer">
						<form class="margincenter">
							<h3 class="textcenter brand--color--dark-violet">Source</h3>
							<select	class="longinput"	name="server"	required>
								<option style="display:none">Sélectionnes un serveur</option>
								<option>C&FN -- play.craftandfun.fr Freebuild</option>
								<option>C&FN -- play.craftandfun.fr Créatif</option>
								<option>C&FN -- play.craftandfun.fr Vanilla</option>
								<option>C&FN -- play.craftandfun.fr Atharion</option>
							</select>
							<select	class="longinput"	name="map"	required>
								<option style="display:none">Sélectionnes une carte</option>
								<option>MapServAndagor</option>
							</select>
							<br/>
							<br/>
							<h3 class="textcenter brand--color--dark-violet">Coordonnées</h3>
							<div class="threecollumn">
								<input class="shortinput inputSplitLeft toTrigger"	type="number"	name="X1"	placeholder="X1"	required>
								<input class="shortinput inputSplitLeft toTrigger"	type="number"	name="Y1"	placeholder="Y1"	required>
								<input class="shortinput toTrigger"					type="number"	name="Z1"	placeholder="Z1"	required><br/><br/>
								<input class="shortinput inputSplitLeft toTrigger"	type="number"	name="X2"	placeholder="X2"	required>
								<input class="shortinput inputSplitLeft toTrigger"	type="number"	name="Y2"	placeholder="Y2"	required>
								<input class="shortinput toTrigger"					type="number"	name="Z2"	placeholder="Z2"	required>
							</div>
							<br/>
							<br/>
							<h3 class="textcenter brand--color--dark-violet">Impression 3D</h3><br/>
							<div class="budget">
								<span class="pull-right">Taille des blocs</span>
								<div class="content">
									<input class="toTrigger" type="range" min="3" max="15" value="3" data-rangeslider name="scale">
								</div>
							</div>
							<div class="threecollumn">
								<input class="shortinput inputSplitLeft"	type="text"	name="sizeX"	value="0mm"	disabled>
								<input class="shortinput inputSplitLeft"	type="text"	name="sizeY"	value="0mm"	disabled>
								<input class="shortinput"					type="text"	name="sizeZ"	value="0mm"	disabled>
							</div>
							<div class="redalertInfo">Dimensions estimées de l'objet. Exact au millimètre près.</div>
							<input class="shortinput"	type="text"	name="poids"	value="0kg"	disabled>
							<div class="redalertInfo">Poids estimé de l'objet, ce dernier peut varier.</div>
							<select	class="longinput"	name="map"	required>
								<option style="display:none">Sélectionnes une couleur</option>
								<option>Blanc</option>
								<option>Noir</option>
								<option>Rouge</option>
								<option>Vert</option>
								<option>Bleu</option>
								<option>Cyan</option>
								<option>Magenta</option>
								<option>Jaune</option>
							</select>
							<div class="redalertInfo">Les objets sont imprimés en monochrome. Veuillez sélectionner la couleur. Pour peindre par dessus, le blanc est recommandé</div>
							<table>
								<tr>
									<th scope="col"></th>
									<th scope="col">Prix HT</th>
									<th scope="col">Prix TTC</th>
								</tr>
								<tr class="printprice">
									<th scope="row">Impression</th>
									<td>0€</td>
									<td>0€</td>
								</tr>
								<tr class="portprice">
									<th scope="row">Frais de port</th>
									<td>0€</td>
									<td>0€</td>
								</tr>
								<tr class="reductionprice">
									<th scope="row">Réductions</th>
									<td>0€</td>
									<td>0€</td>
								</tr>
								<tr>
									<td class="spikes">
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
										<div class="spike"></div>
									</td>
								</tr>
								<tr class="totalprice">
									<th scope="row">Total</th>
									<td>0€</td>
									<td>0€</td>
								</tr>
							</table>
							<div data-link="createUser.php" class="brand--button--border--tier2 textcenter brand--color--yellow margincenter">Inscription</div>
							<div id="paypal-button"></div>
							<script src="https://www.paypalobjects.com/api/checkout.js"></script>
							<script>
								paypal.Button.render(
								{
									env: 'sandbox',
									client:
									{
										sandbox: 'AU01vXLILQcPc7l9XTzQHoBCbNZSL-Y_xAnuYgmIFR3Lbd9-PQMCaH9UD38I4yNWdjy3VHbfIyCgQ-3T',
										production: 'demo_production_client_id'
									},
									locale: 'fr_FR',
									style:
									{
										size: 'small',
										color: 'gold',
										shape: 'pill',
									},
									commit: true,
									payment: function(data, actions)
									{
										var plasticprice = ((Number($('input[name="sizeX"]').val().slice(0, -2))*Number($('input[name="sizeY"]').val().slice(0, -2))*Number($('input[name="sizeZ"]').val().slice(0, -2)))/1000)*0.05;
										var weight = (((Number($('input[name="sizeX"]').val().slice(0, -2))*Number($('input[name="sizeY"]').val().slice(0, -2))*Number($('input[name="sizeZ"]').val().slice(0, -2)))/1000)*0.16)*1.25;
										return actions.payment.create(
										{
											transactions:
											[{
												amount:
												{
													total: $('section#container .MainBlock .formContainer form table tr.totalprice').children().eq(2).text((printPriceTTC+portPriceTTC-reductionPriceTTC)+'€'),
													currency: 'EUR'
												}
											}]
										});
									},
									onAuthorize: function(data, actions)
									{
										return actions.payment.execute().then(function()
										{
											window.alert('Merci de votre confiance');
										});
									}
								}, '#paypal-button');
							</script>
						</form>
					</div>
				</section>
@endsection
@section("script")
	<script>
		function blockToMillimeter(nbr, scale)
		{
			return(nbr * scale);
		}

		function sizecalculator(field)
		{
			if ($('input[name="' + field + '1"]').val() != "" && $('input[name="' + field + '2"]').val() != "")
			{
				var diff = 0;
				if (Number($('input[name="' + field + '1"]').val()) > Number($('input[name="' + field + '2"]').val()))
				{
					diff = Number($('input[name="' + field + '1"]').val())-Number($('input[name="' + field + '2"]').val());
				}
				else if (Number($('input[name="' + field + '1"]').val()) < Number($('input[name="' + field + '2"]').val()))
				{
					diff = Number($('input[name="' + field + '2"]').val())-Number($('input[name="' + field + '1"]').val());
				}
				else
				{
					diff = Number($('input[name="' + field + '2"]').val())+Number($('input[name="' + field + '1"]').val());
				}
				$('input[name="size' + field + '"]').val(blockToMillimeter(diff, $('input[name="scale"]').val()) + "mm");
			}
		}

		function setPrice(item, price)
		{
			if (item === "total")
			{
				var printPriceHT =		Number($('section#container .MainBlock .formContainer form table tr.printprice').children().eq(1).text().slice(0, -1));
				var printPriceTTC =		Number($('section#container .MainBlock .formContainer form table tr.printprice').children().eq(2).text().slice(0, -1));
				var portPriceHT =		Number($('section#container .MainBlock .formContainer form table tr.portprice').children().eq(1).text().slice(0, -1));
				var portPriceTTC =		Number($('section#container .MainBlock .formContainer form table tr.portprice').children().eq(2).text().slice(0, -1));
				var reductionPriceHT =	Number($('section#container .MainBlock .formContainer form table tr.reductionprice').children().eq(1).text().slice(0, -1));
				var reductionPriceTTC =	Number($('section#container .MainBlock .formContainer form table tr.reductionprice').children().eq(2).text().slice(0, -1));
				$('section#container .MainBlock .formContainer form table tr.totalprice').children().eq(1).text((printPriceHT+portPriceHT-reductionPriceHT)+'€');
				$('section#container .MainBlock .formContainer form table tr.totalprice').children().eq(2).text((printPriceTTC+portPriceTTC-reductionPriceTTC)+'€');
			}
			else
			{
				$('section#container .MainBlock .formContainer form table tr.'+item+'price').children().eq(1).text(price+'€');
				$('section#container .MainBlock .formContainer form table tr.'+item+'price').children().eq(2).text((price * 1)+'€'); //replace by 1.20 for 20% VAT
			}
		}

		$('.toTrigger').each(function()
		{
			var elem = $(this);
			elem.data('oldVal', elem.val());
			elem.bind("propertychange change click keyup input paste", function(event)
			{
				if (elem.data('oldVal') != elem.val())
				{
					elem.data('oldVal', elem.val());
					sizecalculator("X");
					sizecalculator("Y");
					sizecalculator("Z");
					$('input[name="poids"]').val(((((((Number($('input[name="sizeX"]').val().slice(0, -2))*Number($('input[name="sizeY"]').val().slice(0, -2))*Number($('input[name="sizeZ"]').val().slice(0, -2)))/1000)*0.16)*1.25)/2)/1000) + 'kg');
					setPrice("print", (((Number($('input[name="sizeX"]').val().slice(0, -2))*Number($('input[name="sizeY"]').val().slice(0, -2))*Number($('input[name="sizeZ"]').val().slice(0, -2)))/1000)*0.05));
					setPrice("total");
				}
			});
		});
		$('.brand--button--border--tier2').click(function(e)
		{
			e.preventDefault();
			var link = $(this).attr("data-link");
			grecaptcha.execute('6LfiUXoUAAAAAOEw5dhRpcKbEC6vNxdmejLCB5Th', {action: 'homepage'}).then(function(token)
			{
				$.ajax(
				{
					type: 'GET',
					//url: link + "test",
					url: "/createsession.php",
					success:function(data, textStatus, xhr)
					{
						console.log(data);
						return;
						if (xhr.status == 200)
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
							Command: toastr["success"]("Votre compte a bien été créé, Veuillez à présent vous identifier.", "Compte créé.");
						}
						else if (xhr.status == 201)
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
							Command: toastr["success"]("w.", "Connecté !");
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
					}
				});
			});
		});
		!(function(a) {
			"use strict";
			"function" == typeof define && define.amd
				? define(["jquery"], a)
				: "object" == typeof exports
					? (module.exports = a(require("jquery")))
					: a(jQuery);
		})(function(a) {
			"use strict";
			function b() {
				var a = document.createElement("input");
				return a.setAttribute("type", "range"), "text" !== a.type;
			}
			function c(a, b) {
				var c = Array.prototype.slice.call(arguments, 2);
				return setTimeout(function() {
					return a.apply(null, c);
				}, b);
			}
			function d(a, b) {
				return (
					(b = b || 100),
					function() {
						if (!a.debouncing) {
							var c = Array.prototype.slice.apply(arguments);
							(a.lastReturnVal = a.apply(window, c)), (a.debouncing = !0);
						}
						return (
							clearTimeout(a.debounceTimeout),
							(a.debounceTimeout = setTimeout(function() {
								a.debouncing = !1;
							}, b)),
							a.lastReturnVal
						);
					}
				);
			}
			function e(a) {
				return a && (0 === a.offsetWidth || 0 === a.offsetHeight || a.open === !1);
			}
			function f(a) {
				for (var b = [], c = a.parentNode; e(c); ) b.push(c), (c = c.parentNode);
				return b;
			}
			function g(a, b) {
				function c(a) {
					"undefined" != typeof a.open && (a.open = a.open ? !1 : !0);
				}
				var d = f(a),
					e = d.length,
					g = [],
					h = a[b];
				if (e) {
					for (var i = 0; e > i; i++)
						(g[i] = d[i].style.cssText),
							d[i].style.setProperty
								? d[i].style.setProperty("display", "block", "important")
								: (d[i].style.cssText += ";display: block !important"),
							(d[i].style.height = "0"),
							(d[i].style.overflow = "hidden"),
							(d[i].style.visibility = "hidden"),
							c(d[i]);
					h = a[b];
					for (var j = 0; e > j; j++) (d[j].style.cssText = g[j]), c(d[j]);
				}
				return h;
			}
			function h(a, b) {
				var c = parseFloat(a);
				return Number.isNaN(c) ? b : c;
			}
			function i(a) {
				return a.charAt(0).toUpperCase() + a.substr(1);
			}
			function j(b, e) {
				if (
					((this.$window = a(window)),
					(this.$document = a(document)),
					(this.$element = a(b)),
					(this.options = a.extend({}, n, e)),
					(this.polyfill = this.options.polyfill),
					(this.orientation =
						this.$element[0].getAttribute("data-orientation") ||
						this.options.orientation),
					(this.onInit = this.options.onInit),
					(this.onSlide = this.options.onSlide),
					(this.onSlideEnd = this.options.onSlideEnd),
					(this.DIMENSION = o.orientation[this.orientation].dimension),
					(this.DIRECTION = o.orientation[this.orientation].direction),
					(this.DIRECTION_STYLE = o.orientation[this.orientation].directionStyle),
					(this.COORDINATE = o.orientation[this.orientation].coordinate),
					this.polyfill && m)
				)
					return !1;
				(this.identifier = "js-" + k + "-" + l++),
					(this.startEvent =
						this.options.startEvent.join("." + this.identifier + " ") +
						"." +
						this.identifier),
					(this.moveEvent =
						this.options.moveEvent.join("." + this.identifier + " ") +
						"." +
						this.identifier),
					(this.endEvent =
						this.options.endEvent.join("." + this.identifier + " ") +
						"." +
						this.identifier),
					(this.toFixed = (this.step + "").replace(".", "").length - 1),
					(this.$fill = a('<div class="' + this.options.fillClass + '" />')),
					(this.$handle = a('<div class="' + this.options.handleClass + '" />')),
					(this.$range = a(
						'<div class="' +
							this.options.rangeClass +
							" " +
							this.options[this.orientation + "Class"] +
							'" id="' +
							this.identifier +
							'" />'
					)
						.insertAfter(this.$element)
						.prepend(this.$fill, this.$handle)),
					this.$element.css({
						position: "absolute",
						width: "1px",
						height: "1px",
						overflow: "hidden",
						opacity: "0"
					}),
					(this.handleDown = a.proxy(this.handleDown, this)),
					(this.handleMove = a.proxy(this.handleMove, this)),
					(this.handleEnd = a.proxy(this.handleEnd, this)),
					this.init();
				var f = this;
				this.$window.on(
					"resize." + this.identifier,
					d(function() {
						c(function() {
							f.update(!1, !1);
						}, 300);
					}, 20)
				),
					this.$document.on(
						this.startEvent,
						"#" + this.identifier + ":not(." + this.options.disabledClass + ")",
						this.handleDown
					),
					this.$element.on("change." + this.identifier, function(a, b) {
						if (!b || b.origin !== f.identifier) {
							var c = a.target.value,
								d = f.getPositionFromValue(c);
							f.setPosition(d);
						}
					});
			}
			Number.isNaN =
				Number.isNaN ||
				function(a) {
					return "number" == typeof a && a !== a;
				};
			var k = "rangeslider",
				l = 0,
				m = b(),
				n = {
					polyfill: !0,
					orientation: "horizontal",
					rangeClass: "rangeslider",
					disabledClass: "rangeslider--disabled",
					horizontalClass: "rangeslider--horizontal",
					verticalClass: "rangeslider--vertical",
					fillClass: "rangeslider__fill",
					handleClass: "rangeslider__handle",
					startEvent: ["mousedown", "touchstart", "pointerdown"],
					moveEvent: ["mousemove", "touchmove", "pointermove"],
					endEvent: ["mouseup", "touchend", "pointerup"]
				},
				o = {
					orientation: {
						horizontal: {
							dimension: "width",
							direction: "left",
							directionStyle: "left",
							coordinate: "x"
						},
						vertical: {
							dimension: "height",
							direction: "top",
							directionStyle: "bottom",
							coordinate: "y"
						}
					}
				};
			return (
				(j.prototype.init = function() {
					this.update(!0, !1),
						this.onInit && "function" == typeof this.onInit && this.onInit();
				}),
				(j.prototype.update = function(a, b) {
					(a = a || !1),
						a &&
							((this.min = h(this.$element[0].getAttribute("min"), 0)),
							(this.max = h(this.$element[0].getAttribute("max"), 100)),
							(this.value = h(
								this.$element[0].value,
								Math.round(this.min + (this.max - this.min) / 2)
							)),
							(this.step = h(this.$element[0].getAttribute("step"), 1))),
						(this.handleDimension = g(this.$handle[0], "offset" + i(this.DIMENSION))),
						(this.rangeDimension = g(this.$range[0], "offset" + i(this.DIMENSION))),
						(this.maxHandlePos = this.rangeDimension - this.handleDimension),
						(this.grabPos = this.handleDimension / 2),
						(this.position = this.getPositionFromValue(this.value)),
						this.$element[0].disabled
							? this.$range.addClass(this.options.disabledClass)
							: this.$range.removeClass(this.options.disabledClass),
						this.setPosition(this.position, b);
				}),
				(j.prototype.handleDown = function(a) {
					if (
						(this.$document.on(this.moveEvent, this.handleMove),
						this.$document.on(this.endEvent, this.handleEnd),
						!(
							(" " + a.target.className + " ")
								.replace(/[\n\t]/g, " ")
								.indexOf(this.options.handleClass) > -1
						))
					) {
						var b = this.getRelativePosition(a),
							c = this.$range[0].getBoundingClientRect()[this.DIRECTION],
							d = this.getPositionFromNode(this.$handle[0]) - c,
							e =
								"vertical" === this.orientation
									? this.maxHandlePos - (b - this.grabPos)
									: b - this.grabPos;
						this.setPosition(e),
							b >= d && b < d + this.handleDimension && (this.grabPos = b - d);
					}
				}),
				(j.prototype.handleMove = function(a) {
					a.preventDefault();
					var b = this.getRelativePosition(a),
						c =
							"vertical" === this.orientation
								? this.maxHandlePos - (b - this.grabPos)
								: b - this.grabPos;
					this.setPosition(c);
				}),
				(j.prototype.handleEnd = function(a) {
					a.preventDefault(),
						this.$document.off(this.moveEvent, this.handleMove),
						this.$document.off(this.endEvent, this.handleEnd),
						this.$element.trigger("change", { origin: this.identifier }),
						this.onSlideEnd &&
							"function" == typeof this.onSlideEnd &&
							this.onSlideEnd(this.position, this.value);
				}),
				(j.prototype.cap = function(a, b, c) {
					return b > a ? b : a > c ? c : a;
				}),
				(j.prototype.setPosition = function(a, b) {
					var c, d;
					void 0 === b && (b = !0),
						(c = this.getValueFromPosition(this.cap(a, 0, this.maxHandlePos))),
						(d = this.getPositionFromValue(c)),
						(this.$fill[0].style[this.DIMENSION] = d + this.grabPos + "px"),
						(this.$handle[0].style[this.DIRECTION_STYLE] = d + "px"),
						this.setValue(c),
						(this.position = d),
						(this.value = c),
						b &&
							this.onSlide &&
							"function" == typeof this.onSlide &&
							this.onSlide(d, c);
				}),
				(j.prototype.getPositionFromNode = function(a) {
					for (var b = 0; null !== a; ) (b += a.offsetLeft), (a = a.offsetParent);
					return b;
				}),
				(j.prototype.getRelativePosition = function(a) {
					var b = i(this.COORDINATE),
						c = this.$range[0].getBoundingClientRect()[this.DIRECTION],
						d = 0;
					return (
						"undefined" != typeof a["page" + b]
							? (d = a["client" + b])
							: "undefined" != typeof a.originalEvent["client" + b]
								? (d = a.originalEvent["client" + b])
								: a.originalEvent.touches &&
									a.originalEvent.touches[0] &&
									"undefined" != typeof a.originalEvent.touches[0]["client" + b]
									? (d = a.originalEvent.touches[0]["client" + b])
									: a.currentPoint &&
										"undefined" != typeof a.currentPoint[this.COORDINATE] &&
										(d = a.currentPoint[this.COORDINATE]),
						d - c
					);
				}),
				(j.prototype.getPositionFromValue = function(a) {
					var b, c;
					return (
						(b = (a - this.min) / (this.max - this.min)),
						(c = Number.isNaN(b) ? 0 : b * this.maxHandlePos)
					);
				}),
				(j.prototype.getValueFromPosition = function(a) {
					var b, c;
					return (
						(b = a / (this.maxHandlePos || 1)),
						(c =
							this.step * Math.round(b * (this.max - this.min) / this.step) + this.min),
						Number(c.toFixed(this.toFixed))
					);
				}),
				(j.prototype.setValue = function(a) {
					(a !== this.value || "" === this.$element[0].value) &&
						this.$element.val(a).trigger("input", { origin: this.identifier });
				}),
				(j.prototype.destroy = function() {
					this.$document.off("." + this.identifier),
						this.$window.off("." + this.identifier),
						this.$element
							.off("." + this.identifier)
							.removeAttr("style")
							.removeData("plugin_" + k),
						this.$range &&
							this.$range.length &&
							this.$range[0].parentNode.removeChild(this.$range[0]);
				}),
				(a.fn[k] = function(b) {
					var c = Array.prototype.slice.call(arguments, 1);
					return this.each(function() {
						var d = a(this),
							e = d.data("plugin_" + k);
						e || d.data("plugin_" + k, (e = new j(this, b))),
							"string" == typeof b && e[b].apply(e, c);
					});
				}),
				"rangeslider.js is available in jQuery context e.g $(selector).rangeslider(options);"
			);
		});
		$(function() {
			$('input[type="range"]').rangeslider({
				polyfill: false,
				onInit: function() {
					$(".pull-right").text("Taille des blocs " + $('input[type="range"]').val() + "mm");
				},
				onSlide: function(position, value) {
					$(".pull-right").text("Taille des blocs " + value + "mm");
				},
				onSlideEnd: function(position, value) {
				}
			});
		});
	</script>
@endsection