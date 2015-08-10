@include('account/header')

	<div class="row fullWidth">

		<div class="columns medium-3 nav__side">
			<ul>
				<li>Item
					<ul>
						<li>Sub Item</li>
						<li>Sub Item</li>
						<li>Sub Item</li>
						<li>Sub Item</li>
					</ul>
				</li>
				<li>Item</li>
				<li>Item</li>
				<li>Item</li>
				<li>Item</li>
			</ul>
		</div>

		<div class="columns medium-9 end">
			@yield('main_content')
		</div>
	</div>

@include('account/footer')