<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session',

	/**
	 * Consumers
	 */
	'consumers' => [

		'Facebook' => [
			'client_id'     => '1448807235427012',
			'client_secret' => '389d27c729983b8e6c5f451bfdd388d5',
			'scope'         => ['email'],
		],

		'Google' => [
		    'client_id'     => '136648207206-3db4l0ci04pont4qdo26effk0pe8d4eu.apps.googleusercontent.com',
		    'client_secret' => '2-0_lT9vinXuLSzyE7muO0eA',
		    'scope'         => ['userinfo_email', 'userinfo_profile'],
		],  

	]

];