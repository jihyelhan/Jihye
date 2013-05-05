<?php	
								// bookinfo.php (상세정보페이지)
// 타이틀화면
include"Header.php";
// 데이터베이스에 접속하고, bookshop_db 폴더로 들어간후에 , 
// 한글인코딩을 euckr 로 맞춰준다.
include"db_connect.php"; 
session_start( );
//-------------------------------------------------------------------------------------------
// 이전페이지(booklist.php) 가 넘겨준 "isbn" 을 이용해서 그 책을 검색해서 가져온다.
$sql = "SELECT * FROM  bookshop_table  WHERE  isbn=$_GET[isbn]";
$Box = mysql_query($sql);
// 가져온 책의 모든 정보를 화면에 보여준다 (category_no 만 빼고...)
$Record = mysql_fetch_array($Box);

// 손님으로 로그인중이면 그냥 보여주고, 관리자로 로그인중이면 박스안에 보여준다.
if(isset($_SESSION['Logged_in_admin'])==true)
{

	// isbn , title , price , quantity , Review 이 5개가 넘어가는것
	?>
	<form method="post" action="Fix_Book.php">
	<img src=images/<?=$Record['isbn']?>.jpg><br>
    <b>책번호:</b><input type=text name="isbn" value=<?=$Record['isbn']?>><br> 
	<b>책제목: </b><input type=text name="title" value=<?=$Record['title']?>><br>
	<b>책가격: </b><input type=text name="price" value=<?=$Record['price']?>><br> 
	<b>책수량: </b><input type=text name="quantity" value=<?=$Record['quantity']?>><br>
	<b>서평: </b><input type=text name="Review" value=<?=$Record['Review']?>><br>
	<input type=submit  value="이책을 수정하기">
	</form>
	<?
}
else 
{
	echo"<img src=images/" . $Record['isbn'] . ".jpg><br>";
	echo "<b>책번호: </b>". $Record['isbn'] ."<br>". 
			"<b>책제목: </b> ".$Record['title']."<br>". 
			"<b>책가격: </b> ".$Record['price']."<br>". 
			"<b>책수량: </b> ".$Record['quantity']."<br>". 
			"<b>서평: </b> ".$Record['Review'];
}

//-------------------------------------------------------------------------------------
// 로그인중인지 아닌지를 판단한다.
	// 로그인중이면 FORM 을 만들어서 입력상자1개와 전송버튼 1개를 만들어준다.
	// 전송버튼은 누르면 bookcart.php 로 넘어가게 되어있다.
	// bookcart.php 페이지에게 책번호를 넘겨주어야 한다.
	$isbn = $Record['isbn'];
	if(isset($_SESSION['Logged_in_user']) ==true  ) // 손님으로 로그인중,......
	{
		?>
		<form action="bookcart.php?isbn=<?echo $isbn?>"  method="post">
		구매갯수	<input type="text" name="quantity" value=1> 
		<input type="submit" value="장바구니에담기">
		</form>
		<?
	}

?>



