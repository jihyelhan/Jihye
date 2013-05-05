<?
//	*구매자정보를 구매목록(Order_List_Table) 에 저장하는곳 (save_order.php)

	session_start( );

	// 1. 구매자이름, 배송지주소가 잘 넘어왔는지 확인한다
	echo $_POST['order_name'];		$order_name = $_POST['order_name'];
	echo $_POST['order_address'];		$order_address = $_POST['order_address'];

	// 2. 구매자의 아이디는 지금 로그인된 사용자의 아이디(세션에 들어있음) 를 저장한다.
	$order_id = $_SESSION['Logged_in_user'];

	// 2.1 데이터베이스접속해서 Bookshop_DB 로 들어간다.
	include"DB_Connect.php";

	// 3. 구매날짜는 자동으로 입력되도록 한다.
	// 4. 구매번호(장바구니번호) 도 자동으로 입력되도록 한다.
	// 4.1  Order_List_Table 에  구매자이름 . 배송지주소 . 구매자아이디 . 구매날짜. 구매번호를
	//       저장해준다. (INSERT)
	$sql_query ="INSERT  INTO  order_list_table  (order_name,  order_addr,  order_id)
						VALUES	('$order_name',  '$order_address',  '$order_id')";

	$err_chk = mysql_query($sql_query);
	//-------------------------------------------------------------------------
	// 방금저장된 구매내역의 구매번호가 몇번인지 알아내보기
	$box = mysql_query("SELECT  max(order_no)  FROM  order_list_table");
	$record = mysql_fetch_array($box);
	echo "방금저장된 구매번호는 " . $record[ 0 ];
	$order_no = $record[0];
	//-------------------------------------------------------------------------
	// 4.2  잘저장되었는지 확인해서 에러메시지나 성공메시지를 보여준다.
	if($err_chk==false)
	{echo"구매내역이 저장되지 않았습니다"; echo mysql_error(); exit;}
	else
	{
		// 4.3 잘 저장되었다면 지금 저장된것을 보여준다. 
		//    order_list_table 에 있는것중에 order_no 가 제일큰것을 가지고오면 된다.
		$sql_query ="SELECT  max(order_no)  FROM  order_list_table";
		$Box = mysql_query($sql_query);
		$Record =mysql_fetch_array($Box);
//echo"<h2>";		echo"구매자이름: " . $Record['order_name'];
//echo"<br>";		echo"배송지주소: " . $Record['order_addr'];
	}
	//#######################################
	foreach( $_SESSION['Cart']  as  $isbn=>  $quantity )
	{
		// 책번호를 이용해서 가격을 알아낸다음 그걸 아래의 SQL문에 넣어주세요~~
		$SQL = "SELECT  price  FROM  bookshop_table WHERE  isbn=$isbn";
		$BOX =mysql_query($SQL);
		if($BOX==false){ echo"검색에러!!"; echo mysql_error(); exit;}
		$Record =mysql_fetch_array($BOX);
		echo "이책의 가격은 ".$Record['price']."<br>";

		// 구매번호, 구매한책번호, 이책의구매수량,  이책의단가
		$SQL = "INSERT  INTO  order_item_table
						(order_no , order_isbn, order_quantity, order_price ) 
						VALUES ($order_no , $isbn  , $quantity, $Record[price] )";

		$error_chk = mysql_query($SQL);
		if($error_chk==false){ echo"저장에러!!"; echo mysql_error(); exit;}
	}
	// 총 결제금액은 .... 원 입니다 라고 출력해준다

?>










