<?php

class UserController extends Controller {
	public static function view( $args ) {
		global $db;

		$user = $db->table( 'users' )->select()
	    ->where( 'slug', $args['slug'] )
	    ->get();

		if ( $user ) {
			self::response( new User( $user[0] ) );
		} else {
			self::not_found();
		}
	}

	public static function login() {
		global $db;

		$errors = array();

		if ( empty( $_POST['username'] ) ) {
			$errors[] = "You must enter a username";
		}
		if ( empty( $_POST['password'] ) ) {
			$errors[] = "You must enter a password";
		}

		if ( empty( $errors ) ) {
			$user = $db->table( 'users' )->select()
		    ->where( 'username', $_POST['username'] )
		    ->get();

		  if ( !$user || !password_verify( $_POST['password'], $user[0]['password'] ) ) {
		  	$errors[] = 'Invalid username or password';
		  }
		}

	  if ( !empty( $errors ) ) {
	  	self::response( array( 'errors' => $errors ) );
	  } else {
	  	self::response( new User( $user[0] ) );
	  }
	}
}