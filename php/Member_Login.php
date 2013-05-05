<?php /*		
		로그인처리 (Member_Login.php) :  전송받은 정보로 인증처리

		1. 아이디와 비밀번호가 전송되었는지 확인함. 한개라도 없으면 에러메시지출력하고 실행종료
		2. 데이터베이스 접속
		3. 세션기능을 사용하겠다고 알림
		4. 전송받은 아이디, 비밀번호를  Member_table 에서 검색함
		5. 검색결과가 있으면 , 로그인되었다는 메시지를 보여주고 , 세션저장공간에 해당 아이디를 저장함
		6. 검색결과가 없으면 에러메시지출력하고 ,Member_Login.html 페이지로 이동시킴
*/
		session_start( );
		
		if( empty($_POST['in_id'])  or   empty($_POST['in_pass']) )
		{ echo"<h1><b><font color=red> 입력받지않은항목이있습니다. 다시입력해주세요<br>";
		  exit;  }

		echo "ID: " . $_POST['in_id'];   		echo "ID: " . $_POST['in_pass'];
		$id  = $_POST['in_id'];			$pass = $_POST['in_pass'];
	
		// 새로수정한 내용
		include"db_connect.php";

		// 비밀번호는 암호화한다음에 비교해야합니다~~
		$result = mysql_query("SELECT *  FROM  Member_table 
														WHERE   id='$id'   and   pass = '$pass'");

		// 결과가 몇개인지 알아본다.
		$count =	mysql_num_rows($result);
	

		if( $count != 1 )  // 검색결과가 없으면.....
		{ 
			echo"<h1><b><font color=red> 아이디나 암호를 확인해주세요~^^";    
		   echo"<meta http-equiv='Refresh' content='2; URL=Member_Login.html'>";  
		  }
		else
		{   
			echo"<h1><b><font color=blue> 로그인되었습니다. 안녕하세요~" .  $id  . " 님";		
			
			$_SESSION['Logged_in_user'] = $id; 

		  echo"<meta http-equiv='Refresh' content='2; URL=index.php'>";
		}