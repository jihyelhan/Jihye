<?
/* �����ڷα���ó���ϴ� ������(Admin_Login.php)
1. �������� ���̵�� ��ȣ�� �˻��ϴ� �κ�
2. ��ġ�ϸ� �α��θ޽��������ְ�, ��������ҿ� �������� ���̵�������
3. 1~2���Ŀ� Admin_Menu.php �� ���� */
session_start( );
		
		if( empty($_POST['in_id'])  or   empty($_POST['in_pass']) )
		{ echo"<h1><b><font color=red> �Է¹��������׸����ֽ��ϴ�. �ٽ��Է����ּ���<br>";
		  exit;  }

		echo "ID: " . $_POST['in_id'];   		echo "ID: " . $_POST['in_pass'];
		$id  = $_POST['in_id'];			$pass = $_POST['in_pass'];
	
		// ���μ����� ����
		include"db_connect.php";

		// ��й�ȣ�� ��ȣȭ�Ѵ����� ���ؾ��մϴ�~~
		$result = mysql_query("SELECT *  FROM  Admin_info 
						WHERE   admin_id='$id'   and   admin_pass = '$pass'");

		// ����� ����� �˾ƺ���.
		$count =	mysql_num_rows($result);
	

		if( $count != 1 )  // �˻������ ������.....
		{ 
			echo"<h1><b><font color=red> �����ھ��̵� ��ȣ�� Ȯ�����ּ���~^^";    
		    echo"<meta http-equiv='Refresh' content='2; URL=Admin_Login.html'>";  
		}
		else
		{   
			echo"<h1><b><font color=blue> �α��εǾ����ϴ�. �ȳ��ϼ��� �����ڴ�";		
			$_SESSION['Logged_in_admin'] = "superuser"; 
		   echo"<meta http-equiv='Refresh' content='2; URL=Admin_Menu.php'>";
		}
?>