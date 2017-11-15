<?php

$router = new Router( function( FastRoute\RouteCollector $r ) {
	$r->addRoute( 'GET', '/topics/{slug}', 'TopicController::view' );
});
