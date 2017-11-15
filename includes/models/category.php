<?php

class Category {
	private $fid;

	function __construct( $category ) {
		$this->fid = $category['fid'];
		$this->slug = $category['slug'];
		$this->name = $category['name'];
		$this->description = $category['description'];
	}

	function getTopics() {
		global $db;

		$topics = $db->table( 'threads' )->select()
			->where( 'fid', $this->fid )
		->get();

		return array_map( function( $row ) {
			return new Topic( $row );
		}, $topics );
	}
}
