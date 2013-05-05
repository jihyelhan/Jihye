<?		// bookcart.php (장바구니에 담는것을 처리하는 페이지)
session_start( );
include"db_connect.php";
//---------------------------------------------------------------------------
echo"<h3>";
//echo "책번호는 " . $_GET['isbn'] . " 책수량은 " . $_POST['quantity'];	

$isbn = $_GET['isbn'];		
$quantity = $_POST['quantity'];

//***********************************************************************
// 장바구니의 구조
//	$_SESSION['Cart'][ 책번호 ] = 구매수량;
// * 페이지가 끝나도 계속 유지되는 배열을 글로벌배열이라고 한다.
// session_start( ) 를 사용해야 $_SESSION 을 글로벌배열로 사용할수있다.
// 다른페이지에서도 글로벌배열을 사용할수있다는점이 중요하다 !!

// 이전에 저장했었던 책인지 알아낸다.
if( isset($_SESSION['Cart'][ $isbn ])==true) // 이 방(책) 이 이미 있는가?
{
	// 이전의 구매수량에 누적시킨다.
	$_SESSION['Cart'][ $isbn ] += $quantity; 
}
else
{
	// 현재 구매수량을 그냥 저장한다.
	$_SESSION['Cart'][ $isbn ] = $quantity; 
}
//***********************************************************************
// 잘 저장되었다고 보여주고, 이전페이지로 돌아가게끔 해준다.
echo"<script language=javascript> history.back(); </script>";
?>







