<?php

$db = new DB( new PDO( "mysql:host={$conf['db']['host']};dbname={$conf['db']['database']}", $conf['db']['username'], $conf['db']['password'] ) );
