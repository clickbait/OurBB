<?php

class TopicController extends Controller {
	public static function view( $args ) {
		global $db;

		$topic = new Topic( $db->table( 'threads' )->select()
	    ->where( 'slug', $args['slug'] )
	    ->get()[0] );

		self::response(array(
			'topic' => $topic,
			'replies'	=> $topic->getReplies()
		));
	}
}
