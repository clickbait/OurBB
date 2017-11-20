<?php

class Reply extends Illuminate\Database\Eloquent\Model {
	protected $table = 'posts';
	protected $primaryKey = 'pid';

	public function topic() {
		return $this->belongsTo( 'Topic', 'tid' );
	}

	public function author() {
		return $this->belongsTo( 'User', 'uid' );
	}
}
