<?php

class Controller {
	static function response ( $response ) {
		header( 'Content-Type: application/json' );

		echo json_encode( $response );
		exit;
	}

	static function not_found() {
		header( 'HTTP/1.0 404 Not Found' );
		self::response( array( 'errors' => array( 404 => 'Page Not Found' ) ) );
	}
}
