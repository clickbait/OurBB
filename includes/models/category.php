<?php

class Category extends Illuminate\Database\Eloquent\Model {
	protected $table = 'forums';
	protected $primaryKey = 'fid';

	public function topics() {
		return $this->hasMany( 'Topic', 'fid' );
	}
}
