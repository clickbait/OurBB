<?php

class CategoryController extends Controller {
	public static function view( $args ) {
		global $db;

		$category = new Category( $db->table( 'forums' )->select()
	    ->where( 'slug', $args['slug'] )
	    ->get()[0] );

		self::response(array(
			'category' => $category,
			'topics'	=> $category->getTopics()
		));
	}
}
