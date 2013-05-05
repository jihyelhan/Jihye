<?
/* 관리자로그인처리하는 페이지(Admin_Login.php)
1. 관리자의 아이디와 암호를 검사하는 부분
2. 일치하면 로그인메시지보여주고, 세션저장소에 관리자의 아이디를저장함
3. 1~2초후에 Admin_Menu.php 로 보냄 */
session_start( );
		
		if( empty($_POST['in_id'])  or   empty($_POST['in_pass']) )
		{ echo"<h1><b><font color=red> 입력받지않은항목이있습니다. 다시입력해주세요<br>";
		  exit;  }

		echo "ID: " . $_POST['in_id'];   		echo "ID: " . $_POST['in_pass'];
		$id  = $_POST['in_id'];			$pass = $_POST['in_pass'];
	
		// 새로수정한 내용
		include"db_connect.php";

		// 비밀번호는 암호화한다음에 비교해야합니다~~
		$result = mysql_query("SELECT *  FROM  Admin_info 
						WHERE   admin_id='$id'   and   admin_pass = '$pass'");

		// 결과가 몇개인지 알아본다.
		$count =	mysql_num_rows($result);
	

		if( $count != 1 )  // 검색결과가 없으면.....
		{ 
			echo"<h1><b><font color=red> 관리자아이디나 암호를 확인해주세요~^^";    
		    echo"<meta http-equiv='Refresh' content='2; URL=Admin_Login.html'>";  
		}
		else
		{   
			echo"<h1><b><font color=blue> 로그인되었습니다. 안녕하세요 관리자님";		
			$_SESSION['Logged_in_admin'] = "superuser"; 
		   echo"<meta http-equiv='Refresh' content='2; URL=Admin_Menu.php'>";
		}
?>