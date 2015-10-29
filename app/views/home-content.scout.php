<h1>Actualité</h1>
@loop
	<div class="demo-card-wide mdl-card mdl-shadow--2dp">
		<div class="mdl-card__title">
			<h2 class="mdl-card__title-text">{{Loop::title()}}</h2>
		</div>
		
		<div class="mdl-card__supporting-text">
			{{Loop::content()}}
		</div>
		<div class="mdl-card__actions mdl-card--border">
			<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			{{ Loop::excerpt() }}
			</a>
		</div>
		<div class="mdl-card__menu">
			<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
				<i class="material-icons">share</i>
			</button>
		</div>
	</div>
@endloop