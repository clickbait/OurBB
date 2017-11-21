<?php

use Jose\Factory\JWEFactory;

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
		global $session;

		$errors = array();

		if ( empty( $_POST['username'] ) ) {
			$errors[] = "You must enter a username";
		}
		if ( empty( $_POST['password'] ) ) {
			$errors[] = "You must enter a password";
		}

		if ( empty( $errors ) ) {
			$user = User::where( 'username', $_POST['username'] )->first();

		  if ( !$user || !password_verify( $_POST['password'], $user->password ) ) {
		  	$errors[] = 'Invalid username or password';
		  }
		}

	  if ( !empty( $errors ) ) {
	  	self::response( array( 'errors' => $errors ) );
	  } else {
	  	$session->uid = $user->uid;
	  	$session->save();

	  	self::response( $session->sid );
	  }
	}
}
