<?php /*		
		�α���ó�� (Member_Login.php) :  ���۹��� ������ ����ó��

		1. ���̵�� ��й�ȣ�� ���۵Ǿ����� Ȯ����. �Ѱ��� ������ �����޽�������ϰ� ��������
		2. �����ͺ��̽� ����
		3. ���Ǳ���� ����ϰڴٰ� �˸�
		4. ���۹��� ���̵�, ��й�ȣ��  Member_table ���� �˻���
		5. �˻������ ������ , �α��εǾ��ٴ� �޽����� �����ְ� , ������������� �ش� ���̵� ������
		6. �˻������ ������ �����޽�������ϰ� ,Member_Login.html �������� �̵���Ŵ
*/
		session_start( );
		
		if( empty($_POST['in_id'])  or   empty($_POST['in_pass']) )
		{ echo"<h1><b><font color=red> �Է¹��������׸����ֽ��ϴ�. �ٽ��Է����ּ���<br>";
		  exit;  }

		echo "ID: " . $_POST['in_id'];   		echo "ID: " . $_POST['in_pass'];
		$id  = $_POST['in_id'];			$pass = $_POST['in_pass'];
	
		// ���μ����� ����
		include"db_connect.php";

		// ��й�ȣ�� ��ȣȭ�Ѵ����� ���ؾ��մϴ�~~
		$result = mysql_query("SELECT *  FROM  Member_table 
														WHERE   id='$id'   and   pass = '$pass'");

		// ����� ����� �˾ƺ���.
		$count =	mysql_num_rows($result);
	

		if( $count != 1 )  // �˻������ ������.....
		{ 
			echo"<h1><b><font color=red> ���̵� ��ȣ�� Ȯ�����ּ���~^^";    
		   echo"<meta http-equiv='Refresh' content='2; URL=Member_Login.html'>";  
		  }
		else
		{   
			echo"<h1><b><font color=blue> �α��εǾ����ϴ�. �ȳ��ϼ���~" .  $id  . " ��";		
			
			$_SESSION['Logged_in_user'] = $id; 

		  echo"<meta http-equiv='Refresh' content='2; URL=index.php'>";
		}