<template>
	<div id="home">
		<div class="landing page">
			<div class="landing background photo author">
				Photo by <a href="https://unsplash.com/@grohsfabian" target="_blank">Fabian Grohs</a>
			</div>
		</div>

		<div class="ui container" id="about">
			<h1 class="ui header">
				<img src="../../../static/logo.png" alt="Państwowa Wyższa Szkoła Zawodowa im. Witelona w Legnicy" class="university logo">
				<div class="content">
					mgr inż. Krzysztof Rewak
					<div class="sub header">
						Zakład Informatyki, Wydział Nauk Technicznych i Ekonomicznych,
					</div>
					<div class="sub header">
						Państwowa Wyższa Szkoła Zawodowa im. Witelona w Legnicy
					</div>
				</div>
			</h1>

			<div class="ui divider"></div>

			<h2>Kilka słów o mnie</h2>

			<div class="ui three column stackable grid">
				<div class="column">
					<div class="ui basic segment">
						<h3 class="ui header">Naukowo</h3>
						<p>Ukończyłem studia inżynierskie i magisterskie na kierunku Automatyka i Robotyka na Wydziale Elektroniki Politechniki Wrocławskiej. Specjalizowałem się, kolejno na studiach pierwszego i drugiego stopnia, w systemach informatycznych w automatyce oraz technologiach informacyjnych w systemach automatyki.</p>
						<p>Od pierwszej połowy 2016 roku prowadzę zawodowe praktyki dla studentów i uczę praktycznie programowania w ramach projektu Legnica.IT. W 2017 można było usłyszeć mój wykład w ramach Otwartych Seminariów Naukowych. Od 2017 pracuję jako nauczyciel akademicki na Wydziale Nauk Technicznych i Ekonomicznych Państwowej Wyższej Szkoły Zawodowej im. Witelona w Legnicy.</p>
					</div>
				</div>
				<div class="column">
					<div class="ui basic segment">
						<h3 class="ui header">Zawodowo</h3>
						<p>Od 2014 roku pracuję jako programista. Zaczynałem jako młodszy programista PHP w małym wrocławskim software housie, gdzie pod bacznym okiem specjalistów nauczyłem się realistycznego i praktycznego podejścia do zawodu. Od 2015 roku pracuję w grupie ITMation - najpierw jako programista Pythona, następnie jako lider zespołu programistycznego.</p>
						<p>Zawsze gdy moge wybrać, programuję w PHP - najchętniej w najnowszej wersji oraz przede wszystkim w Laravelu i Phalconie. Mam zawodowe doświadczenie w pracy z przeróżnymi frameworkami JavaScriptu, Pythonem oraz C#.</p>
					</div>
				</div>
				<div class="column">
					<div class="ui basic segment">
						<h3 class="ui header">Prywatnie</h3>
						<p>Urodziłem się i mieszkam od urodzenia w Legnicy (choć miałem w tym pięcioletnią przerwę na mieszkanie i studiowanie we Wrocławiu). W wolnym czasie lubię siedzieć nad książkami wszelkiego gatunku, śledzić przeróżne seriale oraz jeździć po legnickich i okolicznych drogach (rowerowych).</p>
						<p>Ponadto jestem piwowarem domowym, więc warzę w domu własnoręcznie piwo, jestem zapalonym fanem <em>Gwiezdnych wojen</em>, a także - a jakżeby inaczej! - programuję najróżniejsze rzeczy w najróżniejszych technologiach w najróżniejszym celu.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style lang="scss">
	.landing {
		#header {
			background: none !important;
		}

		.landing.page {
			background: url("../../../static/landing.jpg");
			background-size: cover;
			height: 100vh;
			margin-top: -8em;
			position: relative;
		}

		.landing.background.photo.author {
			bottom: 0;
			left: 0;
			position: absolute;
			padding: .5em;
			background: rgba(White, .25);
			color: White;
			opacity: .5;
		}

		@media only screen and (max-width: 720px) {
			#content {
				margin-top: 0;
			}

			.landing.page {
				margin-top: -3em;
				background-position-x: 50%;
			}
		}
	}

	#home {
		#about {
			margin-top: 3em;
			margin-bottom: 2em;

			.university.logo {
				width: 120px;
			}

			@media only screen and (max-width: 720px) {
				h1, h2, h3, .header {
					text-align: center;
				}
			}

			h1, h2, h3 {
				margin: .25em auto;
			}

			.header {
				h2, h3 {
					opacity: .75;
				}
			}

			.ui.divider {
				margin: 3em auto;
			}

			p {
				text-align: justify;
				text-indent: 10%;
			}
		}
	}
</style>