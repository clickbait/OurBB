<?php

class TopicController extends Controller {
	public static function view( $args ) {
		global $db;

		$topic = Topic::where( 'slug', $args['slug'] )->first();

		if ( $topic ) {
			self::response(array(
				'topic' => $topic,
				'replies'	=> $topic->replies()->orderBy('dateline')->get()
			));
		} else {
			self::not_found();
		}
	}
}
