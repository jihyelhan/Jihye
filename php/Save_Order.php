<?
//	*������������ ���Ÿ��(Order_List_Table) �� �����ϴ°� (save_order.php)

	session_start( );

	// 1. �������̸�, ������ּҰ� �� �Ѿ�Դ��� Ȯ���Ѵ�
	echo $_POST['order_name'];		$order_name = $_POST['order_name'];
	echo $_POST['order_address'];		$order_address = $_POST['order_address'];

	// 2. �������� ���̵�� ���� �α��ε� ������� ���̵�(���ǿ� �������) �� �����Ѵ�.
	$order_id = $_SESSION['Logged_in_user'];

	// 2.1 �����ͺ��̽������ؼ� Bookshop_DB �� ����.
	include"DB_Connect.php";

	// 3. ���ų�¥�� �ڵ����� �Էµǵ��� �Ѵ�.
	// 4. ���Ź�ȣ(��ٱ��Ϲ�ȣ) �� �ڵ����� �Էµǵ��� �Ѵ�.
	// 4.1  Order_List_Table ��  �������̸� . ������ּ� . �����ھ��̵� . ���ų�¥. ���Ź�ȣ��
	//       �������ش�. (INSERT)
	$sql_query ="INSERT  INTO  order_list_table  (order_name,  order_addr,  order_id)
						VALUES	('$order_name',  '$order_address',  '$order_id')";

	$err_chk = mysql_query($sql_query);
	//-------------------------------------------------------------------------
	// �������� ���ų����� ���Ź�ȣ�� ������� �˾Ƴ�����
	$box = mysql_query("SELECT  max(order_no)  FROM  order_list_table");
	$record = mysql_fetch_array($box);
	echo "�������� ���Ź�ȣ�� " . $record[ 0 ];
	$order_no = $record[0];
	//-------------------------------------------------------------------------
	// 4.2  ������Ǿ����� Ȯ���ؼ� �����޽����� �����޽����� �����ش�.
	if($err_chk==false)
	{echo"���ų����� ������� �ʾҽ��ϴ�"; echo mysql_error(); exit;}
	else
	{
		// 4.3 �� ����Ǿ��ٸ� ���� ����Ȱ��� �����ش�. 
		//    order_list_table �� �ִ°��߿� order_no �� ����ū���� ��������� �ȴ�.
		$sql_query ="SELECT  max(order_no)  FROM  order_list_table";
		$Box = mysql_query($sql_query);
		$Record =mysql_fetch_array($Box);
//echo"<h2>";		echo"�������̸�: " . $Record['order_name'];
//echo"<br>";		echo"������ּ�: " . $Record['order_addr'];
	}
	//#######################################
	foreach( $_SESSION['Cart']  as  $isbn=>  $quantity )
	{
		// å��ȣ�� �̿��ؼ� ������ �˾Ƴ����� �װ� �Ʒ��� SQL���� �־��ּ���~~
		$SQL = "SELECT  price  FROM  bookshop_table WHERE  isbn=$isbn";
		$BOX =mysql_query($SQL);
		if($BOX==false){ echo"�˻�����!!"; echo mysql_error(); exit;}
		$Record =mysql_fetch_array($BOX);
		echo "��å�� ������ ".$Record['price']."<br>";

		// ���Ź�ȣ, ������å��ȣ, ��å�Ǳ��ż���,  ��å�Ǵܰ�
		$SQL = "INSERT  INTO  order_item_table
						(order_no , order_isbn, order_quantity, order_price ) 
						VALUES ($order_no , $isbn  , $quantity, $Record[price] )";

		$error_chk = mysql_query($SQL);
		if($error_chk==false){ echo"���忡��!!"; echo mysql_error(); exit;}
	}
	// �� �����ݾ��� .... �� �Դϴ� ��� ������ش�

?>










