<?php

class Topic extends Illuminate\Database\Eloquent\Model {
	protected $table = 'threads';
	protected $primaryKey = 'tid';

	protected $hidden = array( 'icon', 'poll', 'views', 'numratings', 'totalratings', 'notes', 'unapprovedposts', 'deletedposts', 'attachmentcount', 'deletetime' );

	public function replies() {
		return $this->hasMany( 'Reply', 'tid' );
	}

	public function category() {
		return $this->belongsTo( 'Category', 'tid' );
	}

	public function author() {
		return $this->belongsTo( 'User', 'uid' );
	}
}
