<? // BookList.php (�з����� å���� ����� �����ִ� ������)

	// Ÿ��Ʋȭ��
	include"Header.php";

	// ����. ����. �ѱ����ڵ�
	include"db_connect.php"; 
	//-----------------------------------------------------
	// � ī�װ��� �������Դ����� ȭ�鿡 �����ش� (ī�װ���ȣ)
	echo "������ ī�װ���ȣ�� " . $_GET['catid'] . "<hr>";
	// bookshop_table ���� �� ī�װ���ȣ�� �˻��Ѱ͵��� ������´�.
	// SELECT * FROM  bookshop_table  
	//		WHERE  category_no = ī�װ���ȣ
	$Box = mysql_query("SELECT * FROM bookshop_table 
										WHERE  category_no=$_GET[catid]");
	
	// ������ŭ for���� ����ؼ� ȭ�鿡 �����ش�.
	$max = mysql_num_rows($Box);
	echo"<font size=5><b>";
	for($loop=1;		$loop<=$max;		$loop++)
	{
		// 1���� �̾Ƴ��� ��򰡿� �����صд�.
		$Record = mysql_fetch_array($Box);

		// å����� ���ݸ� ȭ�鿡 �����ְ�, ������ ������ "bookinfo.php" �� �Ѿ�� �Ѵ�.
		// �������� ��å�� "isbn" �� �Ѱ�����Ѵ�. �׷��� �å�� ������� �˼��ִ�.
		echo"<a href=bookinfo.php?isbn=". $Record['isbn'] .">"
							. $Record['title'] . "</a> ";	
							
		echo $Record['price'] ."<br>";

	}









?>