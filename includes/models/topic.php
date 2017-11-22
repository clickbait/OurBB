<?php

class Topic extends Illuminate\Database\Eloquent\Model {
	const CREATED_AT = 'dateline';
	const UPDATED_AT = NULL;

	protected $table = 'threads';
	protected $primaryKey = 'tid';
	protected $dateFormat = 'U';

	protected $fillable = array( 'subject' );

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

	public function getUpdatedAtColumn() {
		return null;
	}

	public function save( array $options = array() ) {
		$this->notes = '';

		return parent::save( $options );
	}
}
