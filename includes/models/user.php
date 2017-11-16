<?php

class User {
	private $uid;

	function __construct( $user ) {
		$this->uid = $user['uid'];
		$this->slug = $user['slug'];
		$this->username = $user['username'];
	}

	function getReplies() {
		global $db;

		$replies = $db->table( 'posts' )->select()
			->where( 'uid', $this->uid )
		->get();

		return Util::return_array_of_objects( $replies, 'Reply' );
	}

	function getTopics() {
		global $db;

		$topics = $db->table( 'threads' )->select()
			->where( 'uid', $this->uid )
		->get();

		return Util::return_array_of_objects( $topics, 'Topic' );
	}
}
