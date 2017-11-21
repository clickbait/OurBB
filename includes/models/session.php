<?php

class Session extends Illuminate\Database\Eloquent\Model {
	public $timestamps = false;
	public $incrementing = false;

	protected $primaryKey = 'sid';

	public function save( array $options = array() ) {
		if( empty( $this->sid ) ) {
			$this->sid = md5( random_bytes( 50 ) );
		}

		$this->time = time();

		return parent::save( $options );
	}

	public function user() {
		return $this->belongsTo( 'User', 'uid' );
	}
}
