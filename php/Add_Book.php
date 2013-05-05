<?php
/*	
		새상품 추가하는 페이지 (add_book.php)
	
		(1) 새로운상품의 카테고리를 선택해줌 (select 태그를 사용함)
		*각각의 항목은 value 가 카테고리번호(catid) 로 되어있음
	
		(2) 상품의 정보를 입력할수있도록 입력상자들을 만들어줌 
			* 책제목, 번호, 가격, 재고수량 , 설명
			* 카테고리번호는 위에서 선택한것에 의해서 결정됨

		(3) "저장하기" 버튼을 눌러서 add_book_db.php 페이지로 전송하기.
*/
// * 카테고리테이블에 있는 카테고리가 몇개인지 알아내기
include"db_connect.php";

// 카테고리전부다 가져오기
$res = mysql_query("select * from bookshop_category");  
$max_category = mysql_num_rows($res);  // 갯수알아내기

echo"<form action=add_book_db.php method=post>";
echo"<h1><b><center> 새책추가 </center></h1>";
echo"<hr color=black width=90%> 카테고리 ";	

echo"<select name=category>";  //  $_POST['category']

		for($index=1;		$index<=$max_category;		$index++) //갯수만큼~
		{
			$rec = mysql_fetch_array($res);
			$cat_id = $rec['category_no'];		
			$cat_name = $rec['category_name'];
			echo"<option value=$cat_id>" .  $cat_name .  "</option>";
		}
echo"</select>";

?>
<hr color=black width=90%>
	제목 <input type="text " size=10 name="title">
	번호 <input type="text " size=10 name="isbn">
	가격 <input type="text " size=10 name="price">
	재고수량 <input type="text " size=10 name="quantity">
	<hr color=black width=90%>
	설명 <textarea name="description" rows="10" cols="50"></textarea>
	<input type="submit" value="새책추가하기">
	</form>
<?

?>