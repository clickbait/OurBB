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

		return Util::return_array_of_objects( $topics, 'Topic' );
	}
}
