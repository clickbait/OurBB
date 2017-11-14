<?php

class Topic {
	function __construct( $topic ) {
		$this->tid = $topic['tid'];
		$this->fid = $topic['fid'];
		$this->subject = $topic['subject'];
		$this->slug = $topic['slug'];
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
