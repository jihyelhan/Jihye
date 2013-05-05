<?php
	session_start( );
	session_unset( $_SESSION  );  
	session_destroy( );
	echo"<h1><b> <font color=black> See you ~~ </font>";
	echo"<meta http-equiv='Refresh' content='3; URL=index.php'>";

?>