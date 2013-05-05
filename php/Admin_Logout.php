<?
/* Logout page - Admin. (Admin_Logout.php)
1. Delete the relevant information in the session storage 
2. Show a message - Logout  */

	session_start( );
	session_unset( $_SESSION  );   // 세션배열을 통째로 삭제함 
	session_destroy( );

	echo"<h1><b><font color=black> See you later!</font>";
	echo"<meta http-equiv='Refresh' content='3; URL=index.php'>";
?>