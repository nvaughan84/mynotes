<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title><?php env('SITE_TITLE', '') ?></title>

	<link href="{{ asset('/stylesheets/app.css') }}" rel="stylesheet">
	<script src="{{ asset('/bower_components/Foundation/js/vendor/modernizr.js') }}"></script>
	<script src="{{ asset('/bower_components/Foundation/js/vendor/jquery.js') }}"></script>
	<script src="{{ asset('/bower_components/Foundation/js/foundation.js') }}"></script>
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<header>
	
	<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#">Site Title</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
     <!--  <li class="active"><a href="#">Right Button Active</a></li> -->
      <li class="has-dropdown">
        <a href="#"><?=Auth::user()->name; ?></a>
        <ul class="dropdown">
          <li><a href="#">Account Settings</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </li>
    </ul>

    <!-- Left Nav Section -->
<!--     <ul class="left">
      <li><a href="#">Left Nav Button</a></li>
    </ul> -->
  </section>
</nav>

</header>

