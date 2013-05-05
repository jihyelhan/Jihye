<?php /*		
		(Member_Login.php) :  the authentication process

		1. Make sure the username and password are sent. If any one is not sent, show the error message.
		2. Connect the database
		3. Notificate - using the session function
		4. Search the imported id and the password in the Member_table
		5. If there is a result , show the Logged in message, store the id to the session storage
		6. Output an error message if there is no result , go to the Member_Login.html page
*/
		session_start( );
		
		if( empty($_POST['in_id'])  or   empty($_POST['in_pass']) )
		{ echo"<h1><b><font color=red> An item is not submitted. Please re-type the id and the password.<br>";
		  exit;  }

		echo "ID: " . $_POST['in_id'];   		echo "ID: " . $_POST['in_pass'];
		$id  = $_POST['in_id'];			$pass = $_POST['in_pass'];
	
		// New Modifications
		include"DB_Connect.php";

		// Password - encryption
		$result = mysql_query("SELECT *  FROM  member_table 
														WHERE   id='$id'   and   pass = '$pass'");

		// How many result?
		$count =	mysql_num_rows($result);
	

		if( $count != 1 )  // No result?.....
		{ 
			echo"<h1><b><font color=red>Please recheck the id or the password.";    
		   echo"<meta http-equiv='Refresh' content='2; URL=Member_Login.html'>";  
		  }
		else
		{   
			echo"<h1><b><font color=blue> You are logged in. Hello!" .  $id  ." user" ;		
			
			$_SESSION['Logged_in_user'] = $id; 

		  echo"<meta http-equiv='Refresh' content='2; URL=index.php'>";
		}