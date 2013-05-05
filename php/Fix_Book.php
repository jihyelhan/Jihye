<?
										// Fix_Book.php (수정하기)
// 1. bookinfo.php 에서 수정하기버튼을 눌러서 보내준 것들을 화면에 출력해본다
echo"<h1>";
echo $_POST['isbn']."<BR>";	echo $_POST['title']."<BR>";
echo $_POST['price']."<BR>";	echo $_POST['quantity']."<BR>";
echo $_POST['Review']."<BR>";

$isbn =$_POST['isbn'];	$title =$_POST['title'];
$price =$_POST['price'];	$quantity =$_POST['quantity'];
$Review =$_POST['Review'];

// 데이터베이스접속안되면 봐야할것 (데이터베이스이름, 테이블이름, 변수이름(대.소문자))
// 2. 데이터베이스에 접속하고, bookshop_db 로 진입
include"db_connect.php";
// 3. update 쿼리문을 사용해서 보내준것들을 수정한다.
$sql_query ="UPDATE  bookshop_table  
					SET   title ='$title' , price =$price ,	quantity =$quantity,
							Review ='$Review'		WHERE	isbn =$isbn";

// 4. 수정이 잘되었는지 에러체크를 한다.
// 5. 수정이 잘되었으면 bookinfo.php 페이지로 다시 돌려보낸다. (책번호를 넘겨줘야한다)
$err_chk= mysql_query($sql_query);
if($err_chk==false)
{ 
	echo"수정시 에러발생!!"; echo mysql_error(); 
	echo"<meta http-equiv='Refresh' content='2; URL=bookinfo.php?isbn=$isbn'>";
	exit;
}
else
{ 
	echo"잘저장되었습니다!";	
	echo"<meta http-equiv='Refresh' content='2; URL=bookinfo.php?isbn=$isbn'>";
}
?>