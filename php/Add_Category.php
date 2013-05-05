<?
/* Add_Category.php
  1. 전송받은 새카테고리의 이름을 화면에 출력해본다. (검사)
  2. 데이터베이스에 연결하고, bookshop_db 로 들어간다.  
  3. bookshop_category 테이블에 새카테고리의 이름을 저장해준다. (INSERT)
  4. 잘 저장되었는지 검사해서 , 에러이면 에러메시지를 보여주고 , 아니면 잘저장되었다는 메시지를 보여준다.
  5. 1~2초후에 관리자메뉴페이지(Admin_Menu.php) 로 돌아가도록 한다. */
	echo $_POST['new_category'];
	$new_category = $_POST['new_category'];

	include "db_connect.php";<B></B>

	$SQL ="INSERT  INTO  bookshop_category (category_name)
				VALUES ('$new_category')";

	$err_chk = mysql_query($SQL);

	if( $err_chk==false) 
	{ echo"에러났음";  echo mysql_error();  exit; }
	else
	{ 
	   echo"성공했음";   
	   echo"<meta http-equiv='Refresh' content='3; URL=Admin_Menu.php'>"; 
	}




?>