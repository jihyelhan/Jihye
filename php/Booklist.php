<? // BookList.php (분류별로 책들의 목록을 보여주는 페이지)

	// 타이틀화면
	include"Header.php";

	// 접속. 들어가기. 한글인코딩
	include"db_connect.php"; 
	//-----------------------------------------------------
	// 어떤 카테고리를 눌러서왔는지를 화면에 보여준다 (카테고리번호)
	echo "선택한 카테고리번호는 " . $_GET['catid'] . "<hr>";
	// bookshop_table 에서 그 카테고리번호로 검색한것들을 가지고온다.
	// SELECT * FROM  bookshop_table  
	//		WHERE  category_no = 카테고리번호
	$Box = mysql_query("SELECT * FROM bookshop_table 
										WHERE  category_no=$_GET[catid]");
	
	// 갯수만큼 for문을 사용해서 화면에 보여준다.
	$max = mysql_num_rows($Box);
	echo"<font size=5><b>";
	for($loop=1;		$loop<=$max;		$loop++)
	{
		// 1개를 뽑아내서 어딘가에 저장해둔다.
		$Record = mysql_fetch_array($Box);

		// 책제목과 가격만 화면에 보여주고, 제목을 누르면 "bookinfo.php" 로 넘어가게 한다.
		// 눌렀을때 이책의 "isbn" 을 넘겨줘야한다. 그래야 어떤책을 골랐는지 알수있다.
		echo"<a href=bookinfo.php?isbn=". $Record['isbn'] .">"
							. $Record['title'] . "</a> ";	
							
		echo $Record['price'] ."<br>";

	}









?>