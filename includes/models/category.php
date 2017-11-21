<?php

class Category extends Illuminate\Database\Eloquent\Model {
	protected $table = 'forums';
	protected $primaryKey = 'fid';

	protected $hidden = array( 'active', 'open', 'lastpost', 'allowhtml', 'allowmycode', 'allowsmilies', 'allowimgcode', 'allowvideocode', 'allowpicons', 'allowtratings', 'usepostcounts', 'usethreadcounts', 'requireprefix', 'password', 'showinjump', 'style', 'overridestyle', 'rulestype', 'rulestitle', 'rules', 'unapprovedthreads', 'unapprovedposts', 'deletedthreads', 'deletedposts', 'defaultdatecut', 'defaultsortby', 'defaultsortorder' );

	public function topics() {
		return $this->hasMany( 'Topic', 'fid' );
	}
}
