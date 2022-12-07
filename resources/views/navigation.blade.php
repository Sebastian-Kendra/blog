
<nav class="navigation has-text-grey" role="navigation" aria-label="main navigation">

	{{-- LOGIN/REGISTER LINKS --}}
	@guest
		<a href="{{ route('login') }}">login</a>

		@if (Route::has('register'))
			<a href="{{ route('register') }}">register</a>
		@endif
	@endguest


	@auth
		{{-- LOGGED IN USER --}}
		<a href="/users/{{ auth()->user()->id }}">
			@<strong>{{ auth()->user()->name }}</strong>
		</a>


		{{-- LOGOUT LINK --}}
		<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			logout
		</a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST">
			@csrf
		</form>
	@endauth

</nav>