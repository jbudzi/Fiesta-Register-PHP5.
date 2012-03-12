<?php
/**
 * @author Bakey
 *
 */
class SQL
{
	private $server;
	private $user;
	private $pw;
	private $db;
	private $connInfo;
	public static $conn;
	
	public function __construct( )
	{
		//Set all veriables
		$this->server = Host;
		$this->user = User;
		$this->pw = Pw;
		$this->db = Db;
		
		//Set connection array used by sqlsrv_connect
		$this->connInfo = array( "UID" => $this->user , "PWD" => $this->pw , "Database" => $this->db );
		
		//Try and connect
		$this::$conn = sqlsrv_connect( $this->server , $this->connInfo );
		
		//Originally planned to use or die but it was messy so I just used and if statement

		//If there was an error connecting, print it out
		if( ! ( $this::$conn ) )
		{
			echo "<pre>";
			print_r( sqlsrv_errors() );
			echo "</pre>";
			exit;
		}
	}
	
	public function Escape( $str )
	{
		//Escape single quotes
		return $str = str_replace( "'", "''" , $str );
	}
	
	public function __destruct()
	{
		//Close connection to server
		@sqlsrv_close( $this->conn );
	}
}
?>