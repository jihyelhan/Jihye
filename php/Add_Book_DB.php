<?php
/* 
	새상품의 정보를 데이터베이스에 저장하는 페이지 (add_book_db.php)
  
  1. 전송받은것들을 화면에 보여준다 (검사)
  2. 데이터베이스 접속. bookshop_db 로 들어간다.
  3. 전송받은것들을 bookshop_table 에 저장해준다. 
	*카테고리번호 (숫자)
	*제목
	*책번호 (숫자)
	*가격 (숫자)
	*재고수량 (숫자)
	*설명 

  4. 잘 저장되었는지 검사해서 , 에러메시지를 보여주거나 성공메시지를 보여준다.
  5. 성공했을경우는 1~2초후에 관리자메뉴페이지로 이동시킨다.
*/

$category =$_POST['category'];		$title =$_POST['title'];
$isbn =$_POST['isbn'];					$price =$_POST['price'];
$quantity =$_POST['quantity'];			$Review =$_POST['description'];

echo $category."<br>".$title."<br>".$isbn."<br>".$price."<br>".
		$quantity."<br>".$Review."<hr color=red>";

include"db_connect.php";

// 따옴표를 쳐야되는데 안쳤다 그러면 에러가 "Unknown Column...."
$err_chk =mysql_query("insert into bookshop_table 
								(category_no, isbn, title, price, quantity, Review)
								values 
								($category, $isbn, '$title', $price, $quantity, '$Review')");
	if($err_chk==false)
	{echo"<h1><center>저장되지않았다!"; echo mysql_error();	exit;}
	else
	{echo"새책이 저장되었다!";  
		echo"<meta http-equiv='Refresh' content='2; URL=Admin_Menu.php'>";	}

?>