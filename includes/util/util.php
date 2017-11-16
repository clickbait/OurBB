<?php

class Util {
	static function return_array_of_objects ( $array, $object ) {
		return array_map( function( $row ) use ( $object ) {
			return new $object( $row );
		}, $array );
	}
}
