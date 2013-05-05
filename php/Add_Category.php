<?
/* Add_Category.php
  1. Output - The Name of the new category, which is received.(Check)
  2. Connect the database. Enter the bookshop_db.  
  3. Store the name of the new category - the table of bookshop_category. (INSERT)
  4. Check - show the massage - error or success
  5. Return to the Admin_Menu.php in 1~2 sec. */
	echo $_POST['new_category'];
	$new_category = $_POST['new_category'];

	include "DB_Connect.php";<B></B>

	$SQL ="INSERT  INTO  bookshop_category (category_name)
				VALUES ('$new_category')";

	$err_chk = mysql_query($SQL);

	if( $err_chk==false) 
	{ echo"Error";  echo mysql_error();  exit; }
	else
	{ 
	   echo"Success";   
	   echo"<meta http-equiv='Refresh' content='3; URL=Admin_Menu.php'>"; 
	}




?>