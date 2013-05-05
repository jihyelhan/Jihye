<?    //			index.php (첫페이지 - 상품의 카테고리들을 보여주는 역할을 한다)

// 화면의 타이틀부분을 끼워넣어준다.
include"Header.php";

// 접속. 들어가기. 한글인코딩
include"db_connect.php"; 

// (3) Bookshop_Category 표에서 전부다 가져오기 (SELECT * FROM bookshop_category)
	$BOX = mysql_query("SELECT * FROM bookshop_category");

// (4) 가져온거 몇개인지 알아내기 $max = mysql_num_rows( )
	$max = mysql_num_rows($BOX);
	
//------------------------------------------------------------------------------------------------
// (5) 가져온 갯수만큼 for 문 만들어주기  for($loop=1;   $loop<=$max;   $loop++)
echo"<center>";	 
	 for($loop=1;   $loop<=$max;   $loop++)
	 {
			//	(1) 가져온거에서 한줄 뽑아내기 (mysql_fetch_array)	
			$Record = mysql_fetch_array($BOX);
			//	(2) 뽑아낸줄에서 카테고리이름(Category_name) 을 화면에 echo 로 찍어주기			

			// 지금 화면에 보여줄 카테고리의 번호를 화면에 출력한다.
			echo"<font size=7><b>";
		//	echo"이 카테고리의 번호는 " . $Record['category_no'] . "<br>";
			echo"<a href=booklist.php?catid=". $Record['category_no'] .">"
									. $Record['category_name'] ."</a>";
			echo"<br>";
	 }
echo"</center>";

// 화면의 가장밑에 회사정보를 넣어준다.
include"Footer.php";
?>








