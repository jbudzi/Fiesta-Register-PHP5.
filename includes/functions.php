<?php
/**
 * @author Bakey
 *
 */
class Functions extends SQL
{
	public function Register()
	{
		foreach( $_POST as $post => $key )
		{
			$key = trim( $this->Escape( $key ) );
		}
		$user = $_POST['username'];
		$pass = $_POST['pass'];
		$pass1 = $_POST['pass1'];
		
		if( $user == null || $pass == null || $pass1 == null )
		{
			throw new Exception( 'Please fill out all form fields.' );
		}
		else
		{
			if( preg_match( '/[^a-zA-Z0-9]/' , $user ) == 0 )
			{
				if( ! ( strlen( $user ) > 15 || strlen( $user ) < 3 ) )
				{
					if( ! ( strlen( $pass ) > 20 || strlen( $pass ) < 5 ) )
					{
						if( $pass == $pass1 )
						{
							$checknamequery = "Select * from dbo.tUser where sUserID = ?";
							if( $prep = sqlsrv_prepare( parent::$conn , $checknamequery , array( &$user ) ) )
							{
								if( $namerows = sqlsrv_execute( $prep ) )
								{
									if( ! $row = sqlsrv_fetch_array( $prep , SQLSRV_FETCH_NUMERIC ) )
									{
										$registerquery = "Insert into dbo.tUser([sUserID] , [sUserPW] , [sUserName] , [sUserIP] ) values
										( ? , ? , ? , ? )";
										$values = array( &$user , &$pass , '-' , IP );
										if( $do = sqlsrv_prepare( parent::$conn , $registerquery , $values ) )
										{
											if( $finish = sqlsrv_execute( $do ) )
											{
												//Everything Succeded
											}
											else
											{
												throw new Exception( 'Internal Server Error.' );
											}
										}
										else
										{
											throw new Exception( 'Internal Server Error.' );
										}
									}
									else
									{
										throw new Exception( 'Username is already taken.' );
									}
								}
								else
								{
									throw new Exception( 'Internal Server Error.' );
								}
							}
							else
							{
								throw new Exception( 'Internal Server Error.' );
							}
						}
						else
						{
							throw new Exception( 'Passwords to not match.' );
						}
					}
					else
					{
						throw new Exception( 'Password must be 5 to 20 characters long.' );
					}
				}
				else
				{
					throw new Exception( 'Username must be 3 to 15 characters long.' );
				}
			}
			else
			{
				throw new Exception( 'Username may only contain letters and numbers.' );
			}
		}
	}
}
?>