<?php

class TopicController extends Controller {
	public static function view( $args ) {
		global $db;

		$topic = $db->table( 'threads' )->select()
	    ->where( 'slug', $args['slug'] )
	    ->get();

		if ( $topic ) {
			$topic = new Topic( $topic[0] );

			self::response(array(
				'topic' => $topic,
				'replies'	=> $topic->getReplies()
			));
		} else {
			self::not_found();
		}
	}
}
