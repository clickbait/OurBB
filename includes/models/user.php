<?php

class User extends Illuminate\Database\Eloquent\Model {
	protected $primaryKey = 'uid';

	protected $hidden = array( 'email', 'password', 'salt',
		'loginkey', 'avatartype', 'regip', 'lastip', 'usergroup', 'additionalgroups', 'lastvisit', 'lastpost', 'website', 'icq', 'aim', 'yahoo', 'skype', 'google', 'birthday', 'birthdayprivacy', 'allownotices', 'hideemail', 'subscriptionmethod', 'invisible', 'receivefrombuddy', 'pmnotice', 'pmnotify', 'buddyrequestspm', 'buddyrequestsauto', 'threadmode', 'showimages', 'showvideos', 'showsigs', 'showavatars', 'showquickreply', 'showredirect', 'ppp', 'tpp', 'daysprune', 'dateformat', 'timeformat', 'timezone', 'dst', 'dstcorrection', 'buddylist', 'ignorelist', 'style', 'away', 'awaydate', 'returndate', 'awayreason', 'pmfolders', 'notepad', 'referrer', 'referrals', 'reputation', 'language', 'timeonline', 'showcodebuttons', 'totalpms', 'unreadpms', 'warningpoints', 'moderateposts', 'moderationtime', 'suspendposting', 'suspensiontime', 'suspendsignature', 'suspendsigtime', 'coppauser', 'classicpostbit', 'loginattempts', 'usernotes', 'sourceeditor', 'groupposts', 'groupsin', 'numgroupsin' );

	public function replies() {
		return $this->hasMany( 'Reply', 'uid' );
	}

	public function topics() {
		return $this->hasMany( 'Topic', 'uid' );
	}
}
