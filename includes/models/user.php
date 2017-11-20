<?php

class User extends Illuminate\Database\Eloquent\Model {
	protected $primaryKey = 'uid';

	public function replies() {
		return $this->hasMany( 'Reply', 'uid' );
	}

	public function topics() {
		return $this->hasMany( 'Topic', 'uid' );
	}
}
