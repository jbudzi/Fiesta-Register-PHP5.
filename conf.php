<?php

	//Set time zone
	date_default_timezone_set( 'America/Los_Angeles' );

	//For debugging, if remote client is localhost, allow errors to show up
	if( $_SERVER["REMOTE_ADDR"] == '127.0.0.1' )
	{
		ini_set('display_errors', true);
	}
	else
	{
		ini_set('display_errors', false);
	}	
	
	//Delcare some variables
	define( 'Host' , '.\SQLEXPRESS' );
	define( 'User' , 'sa' );
	define( 'Pw' , '123456' );
	define( 'Db' , 'Account' );
	define( 'Name' , 'La La Online' );
	define( 'RootPath' , dirname( __FILE__ ) );
	define( 'IP' , $_SERVER["REMOTE_ADDR"] );
	
	//Include the libaries
	include( RootPath . '/includes/sqlsrv.php' );
	include( RootPath . '/includes/functions.php' );

	//Open libraries up
	$function = new Functions();
?>