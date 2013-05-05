<? // Header.php (화면의 가장위에 나오는 타이틀부분)
session_start( );

// 공통적으로 나와야되는 부분
echo"<br><br>";
echo"<center><h1><b> Amazon </b></h1></center>";
echo"<br>";
//-----------------------------------------------------
// 일반유저로 로그인했을때.......
if( isset($_SESSION['Logged_in_user'])==true )
{
	// 회원의 이름이 화면에 보인다.
	echo $_SESSION['Logged_in_user'] . " 님 로그인중... &nbsp&nbsp";
	// 홈페이지로 이동할수있는 링크를 만들어준다.
	echo"<a href=index.php> 홈페이지로 </a> &nbsp&nbsp";
	// "장바구니보기" 라는 링크를 만들어준다. 
	// 누르면 show_bookcart.php 페이지로 넘어간다.
	echo"<a href=show_bookcart.php> 장바구니보기 </a> &nbsp&nbsp";
	// 로그아웃할수있는 링크가 보인다.
	echo"<a href=Member_Logout.php> 로그아웃 </a>";
}
//-------------------------------------------------------------------------------------------
else if(isset($_SESSION['Logged_in_admin'])==true )  // 관리자로 로그인했을때.......
{
	// 관리자로그인중이라는 메시지를 보여줌 
	echo "관리자님 로그인중... &nbsp&nbsp";
	// 관리자메뉴로 이동할수있는 링크
	echo"<a href=Admin_Menu.php> 관리자메뉴 </a> &nbsp&nbsp";
	// 로그아웃할수있는 링크
	echo"<a href=Admin_Logout.php> 로그아웃 </a>";
}
//-------------------------------------------------------------------------------------------
else // 로그인안했을때.........
{
	// 로그인창이 보인다.
	include"Member_Login.html";
	echo"<br>";
	echo"<a href=Admin_Login.html> 관리자로그인 </a>";
}
//----------------------------------------------------
echo"<hr size=3 color=black><br>";
?>