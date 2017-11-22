<?php

class ReplyController extends Controller {
	public static function create( $args ) {
		self::requires_login();
	}
}
