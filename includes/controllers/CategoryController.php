<?php

class CategoryController extends Controller {
	public static function view( $args ) {
		global $db;

		$category = Category::where( 'slug', $args['slug'] )->first();

		if ( $category ) {
			self::response(array(
				'category' => $category,
				'topics'	=> $category->topics()->orderBy('dateline')->get()
			));
		} else {
			self::not_found();
		}
	}
}
