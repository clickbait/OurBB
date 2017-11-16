<?php

class Topic {
	private $tid;

	function __construct( $topic ) {
		$this->tid = $topic['tid'];
		$this->slug = $topic['slug'];
		$this->subject = $topic['subject'];
		$this->fid = $topic['fid'];
	}

	function getReplies() {
		global $db;

		$replies = $db->table( 'posts' )->select()
			->where( 'tid', $this->tid )
		->get();

		return Util::return_array_of_objects( $replies, 'Reply' );
	}
}
