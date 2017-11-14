<?php

class DB {

	function __construct( $connection ) {
		$this->db = new \ClanCats\Hydrahon\Builder( 'mysql', function( $query, $queryString, $queryParameters ) use( $connection ) {
			$statement = $connection->prepare( $queryString );
			$statement->execute( $queryParameters );

			// when the query is fetchable return all results and let hydrahon do the rest
			if ( $query instanceof \ClanCats\Hydrahon\Query\Sql\FetchableInterface ) {
			  return $statement->fetchAll( \PDO::FETCH_ASSOC );
			}
		});
	}

	function table ( $table_name ) {
		global $conf;

		return $this->db->table( $conf['db']['prefix'] . $table_name );
	}

}
