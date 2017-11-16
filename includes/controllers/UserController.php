<?php

class UserController extends Controller {
	public static function view( $args ) {
		global $db;

		$user = new User( $db->table( 'users' )->select()
	    ->where( 'slug', $args['slug'] )
	    ->get()[0] );

		self::response( $user );
	}
}
