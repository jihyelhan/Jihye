<?
	// db_connect.php (����. ����. �ѱ����ڵ�)

// �����ͺ��̽��� �����ϰ�, bookshop_db ������ ���Ŀ� , �ѱ����ڵ��� euckr �� �����ش�.
	mysql_connect("localhost", "root", "apmsetup");
	mysql_select_db("bookshop_db");
	mysql_query("set names euckr");

?>