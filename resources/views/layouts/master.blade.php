<!DOCTYPE html>
<html>
	<head>
		<title>
			@yield('title','My Game Shelf')
		</title>
		
			<meta charset='utf-8'>

		<meta name='viewport' content='width=device-width, initial-scale=1'>

		<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
		<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
		<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>
		<link href='/css/shelf.css' type='text/css' rel='stylesheet'>
	
		@yield('head')
	</head>
	<body>

		@if(Session::get('flash_message') != null)
			<div class='flash_message'>{{ Session::get('flash_message') }}</div>
		@endif
		
		<header>

			<nav>
				<ul>
					@if(Auth::check())
					<li><a href='/games'><i class='fa fa-home' aria-hidden="true"></i> View My Games</a></li>
					<li><a href='/game_histories'><i class='fa fa-search' aria-hidden="true"></i> View Game Sessions</a></li>
					<li><a href='/games/create'><i class='fa fa-plus' aria-hidden="true"></i> Add a Game</a></li>
					<li><a href='/game_histories/create'><i class='fa fa-sticky-note' aria-hidden="true"></i> Track a Game Session</a></li>
					<li><a href='/logout'><i class='fa fa-sign-out' aria-hidden="true"></i> Log Out</a></li>
					
					@else
					<li><a href='/'><i class='fa fa-home' aria-hidden="true"></i> Home</a></li>
					<li><a href='/login'><i class='fa fa-sign-in' aria-hidden="true"></i> Log In</a></li>				
					<li><a href='/register'><i class='fa fa-clipboard' aria-hidden="true"></i> Register</a></li>				
					@endif
					
				</ul>
			</nav>
		
		</header>
		

		<section>
			@yield('content')
		
		</section>

		<footer>
			&copy; {{ date('Y') }}  
			<a class='button' href='http://thehomelabs.com'><i class='fa fa-flask' aria-hidden="true"></i> See My Other Projects</a>
			<a class='button' href='https://github.com/rylad/shelf'><i class='fa fa-github' aria-hidden="true"></i> Find This on Github</a>
		</footer>

		@yield('body')

	</body>
</html>