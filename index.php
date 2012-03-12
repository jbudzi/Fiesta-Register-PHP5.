<?php
	include( 'conf.php' );
?>
<html>
	<head>
		<title><?php echo Name . ' - Register'; ?></title>
		<link rel="stylesheet" type="text\css" href="main.css" />
	</head>
	
	<body>
		<div id="wrap" >
			<?php if( isset( $_POST['register'] ) && isset( $_POST['username'] ) && isset( $_POST['pass'] ) && isset( $_POST['pass1'] ) )
			{
				echo '<div id="message" />';
				try
				{
					$function ->Register();
					echo '<br /><span class="succ">Successfully Registered</span><br />';
					echo '<a href=" ' . $_SERVER["REQUEST_URI"] . '">Go Back</a>';
				}
				catch( Exception $e )
				{
					echo '<br /><span class="error">' . $e->getMessage() . '</span><br />';
					echo '<a href=" ' . $_SERVER["REQUEST_URI"] . '">Go Back</a>';
				}
				echo '</div>';
			}
			else
			{
				?>
				<form id="form" method="post" >
					<label>Username</label>
					<input type="text" name="username"  maxlength="15" AUTOCOMPLETE=OFF />
					<label>Password</label>
					<input type="password" name="pass"  maxlength="20" />
					<label>Cofirm Password</label>
					<input type="password" name="pass1"  maxlength="20" />
					<button name="register" >Submit</button>
				</form>
				<?php
			}
				?>
			<div id="creds" >
				Bakey is cool.
			</div>
		</div>
	</body>
</html>