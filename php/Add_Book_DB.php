<?php
/* 
	����ǰ�� ������ �����ͺ��̽��� �����ϴ� ������ (add_book_db.php)
  
  1. ���۹����͵��� ȭ�鿡 �����ش� (�˻�)
  2. �����ͺ��̽� ����. bookshop_db �� ����.
  3. ���۹����͵��� bookshop_table �� �������ش�. 
	*ī�װ���ȣ (����)
	*����
	*å��ȣ (����)
	*���� (����)
	*������ (����)
	*���� 

  4. �� ����Ǿ����� �˻��ؼ� , �����޽����� �����ְų� �����޽����� �����ش�.
  5. ������������ 1~2���Ŀ� �����ڸ޴��������� �̵���Ų��.
*/

$category =$_POST['category'];		$title =$_POST['title'];
$isbn =$_POST['isbn'];					$price =$_POST['price'];
$quantity =$_POST['quantity'];			$Review =$_POST['description'];

echo $category."<br>".$title."<br>".$isbn."<br>".$price."<br>".
		$quantity."<br>".$Review."<hr color=red>";

include"db_connect.php";

// ����ǥ�� �ľߵǴµ� ���ƴ� �׷��� ������ "Unknown Column...."
$err_chk =mysql_query("insert into bookshop_table 
								(category_no, isbn, title, price, quantity, Review)
								values 
								($category, $isbn, '$title', $price, $quantity, '$Review')");
	if($err_chk==false)
	{echo"<h1><center>��������ʾҴ�!"; echo mysql_error();	exit;}
	else
	{echo"��å�� ����Ǿ���!";  
		echo"<meta http-equiv='Refresh' content='2; URL=Admin_Menu.php'>";	}

?>