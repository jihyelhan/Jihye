<?
/* Add_Category.php
  1. ���۹��� ��ī�װ��� �̸��� ȭ�鿡 ����غ���. (�˻�)
  2. �����ͺ��̽��� �����ϰ�, bookshop_db �� ����.  
  3. bookshop_category ���̺� ��ī�װ��� �̸��� �������ش�. (INSERT)
  4. �� ����Ǿ����� �˻��ؼ� , �����̸� �����޽����� �����ְ� , �ƴϸ� ������Ǿ��ٴ� �޽����� �����ش�.
  5. 1~2���Ŀ� �����ڸ޴�������(Admin_Menu.php) �� ���ư����� �Ѵ�. */
	echo $_POST['new_category'];
	$new_category = $_POST['new_category'];

	include "db_connect.php";<B></B>

	$SQL ="INSERT  INTO  bookshop_category (category_name)
				VALUES ('$new_category')";

	$err_chk = mysql_query($SQL);

	if( $err_chk==false) 
	{ echo"��������";  echo mysql_error();  exit; }
	else
	{ 
	   echo"��������";   
	   echo"<meta http-equiv='Refresh' content='3; URL=Admin_Menu.php'>"; 
	}




?>