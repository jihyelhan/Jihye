<?
/*�����ڷα׾ƿ��ϴ� ������(Admin_Logout.php)
1. ��������ҿ��� ���������� ������
2. �α׾ƿ��Ǿ��ٴ� �޽����� ������  */

	session_start( );
	session_unset( $_SESSION  );   // ���ǹ迭�� ��°�� ������ 
	session_destroy( );

	echo"<h1><b><font color=black> �������ƿ�~ �����ڴ�</font>";
	echo"<meta http-equiv='Refresh' content='3; URL=index.php'>";
?>