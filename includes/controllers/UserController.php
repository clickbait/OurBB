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
}
