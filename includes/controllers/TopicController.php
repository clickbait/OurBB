<?php

class TopicController extends Controller {
	public static function view( $args ) {
		global $db;

		$topic = Topic::where( 'slug', $args['slug'] )->first();

		if ( $topic ) {
			self::response(array(
				'topic' => $topic,
				'replies'	=> $topic->replies()->orderBy( 'dateline', 'desc' )->get()
			));
		} else {
			self::not_found();
		}
	}

	public static function create( $args ) {
		self::requires_login();
	}
}
