<?
	// db_connect.php (접속. 들어가기. 한글인코딩)

// 데이터베이스에 접속하고, bookshop_db 폴더로 들어간후에 , 한글인코딩을 euckr 로 맞춰준다.
	mysql_connect("localhost", "root", "apmsetup");
	mysql_select_db("bookshop_db");
	mysql_query("set names euckr");

?>