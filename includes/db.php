<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection(array(
	'driver'    => 'mysql',
	'host'      => $conf['db']['host'],
	'database'  => $conf['db']['database'],
	'username'  => $conf['db']['username'],
	'password'  => $conf['db']['password'],
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => 'mybb_',
));

$capsule->setAsGlobal();

$capsule->bootEloquent();
