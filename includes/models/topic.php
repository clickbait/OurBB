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

		return array_map( function( $row ) {
			return new Reply( $row );
		}, $replies );
	}
}
