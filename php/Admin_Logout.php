<?
/*관리자로그아웃하는 페이지(Admin_Logout.php)
1. 세션저장소에서 관련정보를 삭제함
2. 로그아웃되었다는 메시지를 보여줌  */

	session_start( );
	session_unset( $_SESSION  );   // 세션배열을 통째로 삭제함 
	session_destroy( );

	echo"<h1><b><font color=black> 다음에뵈요~ 관리자님</font>";
	echo"<meta http-equiv='Refresh' content='3; URL=index.php'>";
?>