<?
// show_bookcart.php (장바구니에 있는것을 보여주기만 하는 페이지)

// 화면의 타이틀부분을 끼워넣어준다.
include"Header.php";
include"db_connect.php";
session_start( );
// error check : 장바구니가 비어있는지 검사해서 , 비어있으면 
//					"장바구니가 비어있습니다" 라고 보여주고, 1~2초후에 
//					홈페이지(index.php) 로 이동시킨다.
if(empty($_SESSION['Cart']) ==true)
{
	echo"장바구니가 비어있습니다"; 
    echo"<meta http-equiv='Refresh' content='3; URL=index.php'>";  	
	exit;  // 실행중단
}
//**************************************************************************
//	체크된것을 검사해서 장바구니에서 지우기

// 1. 장바구니에 저장된 물건의 갯수를 알아낸다. (count)
$max = count( $_SESSION['Cart']  );
echo "<h2> 지금 장바구니에는 " . $max . " 개의 물건이 담겨있습니다 <br>";

// 2. 그 갯수만큼 반복문(for) 을 돌린다.
for( $check_id=1;		$check_id<=$max;	 $check_id++)
{
	// 반복문안에서 할일
	// 3. 현재 체크박스가 체크가 되어있는지 검사함 (empty 나 isset 을 사용해서 검사할수있음)
	// * 체크박스의 이름을 화면에 보여주세요~~
	if(isset($_POST[$check_id])==true) // 이거 POST 안에 있냐?
	{ 
		// 4. 체크되어있으면 장바구니에서 삭제한다. (value를 이용해서)
		$isbn = $_POST[$check_id];
		unset( $_SESSION['Cart'][$isbn] ); // 변수나 배열을 지우는명령어 (unset)

		// 장바구니에 더이상 없는지 검사해서 없으면 에러출력하고 그만둔다.
		if(empty($_SESSION['Cart'])==true)
		{ 
			echo"비어있다";  
			echo"<meta http-equiv='Refresh' content='2; URL=index.php'>";
		}
	}
}


//**************************************************************************
echo"<form method=POST  action=show_bookcart.php>";
$id_num=1; // 체크박스의 이름이될 숫자입니다~

foreach( $_SESSION['Cart']   as   $get_isbn => $get_quantity )
{
	// 1. 책번호를 이용해서 그 정보를 다 가지고온다.
	$SQL = "SELECT * FROM  bookshop_table   WHERE isbn = $get_isbn";
	$Box = mysql_query($SQL);

	// 2. 그 책의 모든 정보를 화면에 보여준다.
	$Record = mysql_fetch_array($Box);
	//********************************************************************
	// 조그만 책표지사진을 보여준다.
	echo"<img src=images/". $get_isbn .".jpg width=50  height=50><br>";
	echo "title: " .		$Record['title'] ."<br>";
	//	echo "price: " .		$Record['price'] ."<br>";
	//	echo "quantity: ".  $Record['quantity'] ."<br>";
	//	echo "Review: ".	$Record['Review'] ."<br>";
	// 3. 구매수량도 보여준다.
	//	echo "구매수량: ". $get_quantity ."<br>";
	// 4. 이책의 가격, 구매수량, 구매금액(가격*구매수량) 을 보여준다.	
	echo"가격: ". $Record['price'] 
		. " 구매수량: " .$get_quantity 
		." 구매금액: ". ($Record['price'] *$get_quantity);

	// 삭제할수있는 체크박스를 만들어준다.
	echo"삭제하기 <input type=checkbox  value=". $get_isbn ."  name=". $id_num .">";
	$id_num++; // 체크박스의 이름을 변경해준다. (1씩올려준다)
	
	echo"<hr size=2 color=red>";
	//********************************************************************
}
echo"<input type=submit value=선택한것 삭제하기>";
echo"</form>";
	?>
		<form method="post" action="input_order.php">
		<input type="submit" value="구매">
		</form>
	<?
?>