<?    //			index.php (ù������ - ��ǰ�� ī�װ����� �����ִ� ������ �Ѵ�)

// ȭ���� Ÿ��Ʋ�κ��� �����־��ش�.
include"Header.php";

// ����. ����. �ѱ����ڵ�
include"db_connect.php"; 

// (3) Bookshop_Category ǥ���� ���δ� �������� (SELECT * FROM bookshop_category)
	$BOX = mysql_query("SELECT * FROM bookshop_category");

// (4) �����°� ����� �˾Ƴ��� $max = mysql_num_rows( )
	$max = mysql_num_rows($BOX);
	
//------------------------------------------------------------------------------------------------
// (5) ������ ������ŭ for �� ������ֱ�  for($loop=1;   $loop<=$max;   $loop++)
echo"<center>";	 
	 for($loop=1;   $loop<=$max;   $loop++)
	 {
			//	(1) �����°ſ��� ���� �̾Ƴ��� (mysql_fetch_array)	
			$Record = mysql_fetch_array($BOX);
			//	(2) �̾Ƴ��ٿ��� ī�װ��̸�(Category_name) �� ȭ�鿡 echo �� ����ֱ�			

			// ���� ȭ�鿡 ������ ī�װ��� ��ȣ�� ȭ�鿡 ����Ѵ�.
			echo"<font size=7><b>";
		//	echo"�� ī�װ��� ��ȣ�� " . $Record['category_no'] . "<br>";
			echo"<a href=booklist.php?catid=". $Record['category_no'] .">"
									. $Record['category_name'] ."</a>";
			echo"<br>";
	 }
echo"</center>";

// ȭ���� ����ؿ� ȸ�������� �־��ش�.
include"Footer.php";
?>








