<?php

class Reply {

	function __construct( $topic ) {
		$this->pid = $topic['pid'];
		$this->tid = $topic['tid'];
		$this->dateline = $topic['dateline'];
		$this->message = $topic['message'];
	}

}
