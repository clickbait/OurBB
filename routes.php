<?php

$router = new Router( function( FastRoute\RouteCollector $r ) {
	$r->addRoute( 'GET', '/topics/{slug}', 'TopicController::view' );
	$r->addRoute( 'GET', '/categories/{slug}', 'CategoryController::view' );
});
