<?
/* Administrator Login page(Admin_Login.php)
1. Check the admin.`s user name and password
2. Match OK - show the login message, store the admin.`s user name 
3. Send it to the Admin_Menu.php in 1~2 sec.*/
session_start( );
		
		if( empty($_POST['in_id'])  or   empty($_POST['in_pass']) )
		{ echo"<h1><b><font color=red> An item is not submitted. Please re-type the id and the password. <br>";
		  exit;  }

		echo "ID: " . $_POST['in_id'];   		echo "ID: " . $_POST['in_pass'];
		$id  = $_POST['in_id'];			$pass = $_POST['in_pass'];
	
		// New Modifications
		include"DB_Connect.php";

		// The password must be encrypted
		$result = mysql_query("SELECT *  FROM  admin_info 
						WHERE   admin_id='$id'   and   admin_pass = '$pass'");

		// Find out how many results
		$count =	mysql_num_rows($result);
	

		if( $count != 1 )  // If there is no result.....
		{ 
			echo"<h1><b><font color=red> Please recheck the id or the password.";    
		    echo"<meta http-equiv='Refresh' content='2; URL=Admin_Login.html'>";  
		}
		else
		{   
			echo"<h1><b><font color=blue> Logged in. Hello!";		
			$_SESSION['Logged_in_admin'] = "coco"; 
		   echo"<meta http-equiv='Refresh' content='2; URL=Admin_Menu.php'>";
		}
?>