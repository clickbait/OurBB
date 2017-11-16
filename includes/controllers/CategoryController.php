<?php

class CategoryController extends Controller {
	public static function view( $args ) {
		global $db;

		$category = $db->table( 'forums' )->select()
	    ->where( 'slug', $args['slug'] )
	    ->get();

		if ( $category ) {
			$category = new Category( $category[0] );

			self::response(array(
				'category' => $category,
				'topics'	=> $category->getTopics()
			));
		} else {
			self::not_found();
		}
	}
}
