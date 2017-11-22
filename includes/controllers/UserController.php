<?php

class UserController extends Controller {
	public static function view( $args ) {
		global $db;

		$user = User::where( 'slug', $args['slug'] )->first();

		if ( $user ) {
			self::response( $user );
		} else {
			self::not_found();
		}
	}

	public static function login() {
		global $session, $params;

		$errors = array();

		if ( empty( $params->username ) ) {
			$errors[] = "You must enter a username";
		}
		if ( empty( $params->password ) ) {
			$errors[] = "You must enter a password";
		}

		if ( empty( $errors ) ) {
			$user = User::where( 'username', $params->username )->first();

		  if ( !$user || !password_verify( $params->password, $user->password ) ) {
		  	$errors[] = 'Invalid username or password';
		  }
		}

	  if ( !empty( $errors ) ) {
	  	self::response( array( 'errors' => $errors ) );
	  } else {
	  	$session = new Session;
	  	$session->uid = $user->uid;
	  	$session->save();

	  	$_SESSION['sid'] = $session->sid;

	  	self::response( $session->sid );
	  }
	}
}
