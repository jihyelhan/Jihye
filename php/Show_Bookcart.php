<?
// show_bookcart.php (��ٱ��Ͽ� �ִ°��� �����ֱ⸸ �ϴ� ������)

// ȭ���� Ÿ��Ʋ�κ��� �����־��ش�.
include"Header.php";
include"db_connect.php";
session_start( );
// error check : ��ٱ��ϰ� ����ִ��� �˻��ؼ� , ��������� 
//					"��ٱ��ϰ� ����ֽ��ϴ�" ��� �����ְ�, 1~2���Ŀ� 
//					Ȩ������(index.php) �� �̵���Ų��.
if(empty($_SESSION['Cart']) ==true)
{
	echo"��ٱ��ϰ� ����ֽ��ϴ�"; 
    echo"<meta http-equiv='Refresh' content='3; URL=index.php'>";  	
	exit;  // �����ߴ�
}
//**************************************************************************
//	üũ�Ȱ��� �˻��ؼ� ��ٱ��Ͽ��� �����

// 1. ��ٱ��Ͽ� ����� ������ ������ �˾Ƴ���. (count)
$max = count( $_SESSION['Cart']  );
echo "<h2> ���� ��ٱ��Ͽ��� " . $max . " ���� ������ ����ֽ��ϴ� <br>";

// 2. �� ������ŭ �ݺ���(for) �� ������.
for( $check_id=1;		$check_id<=$max;	 $check_id++)
{
	// �ݺ����ȿ��� ����
	// 3. ���� üũ�ڽ��� üũ�� �Ǿ��ִ��� �˻��� (empty �� isset �� ����ؼ� �˻��Ҽ�����)
	// * üũ�ڽ��� �̸��� ȭ�鿡 �����ּ���~~
	if(isset($_POST[$check_id])==true) // �̰� POST �ȿ� �ֳ�?
	{ 
		// 4. üũ�Ǿ������� ��ٱ��Ͽ��� �����Ѵ�. (value�� �̿��ؼ�)
		$isbn = $_POST[$check_id];
		unset( $_SESSION['Cart'][$isbn] ); // ������ �迭�� ����¸�ɾ� (unset)

		// ��ٱ��Ͽ� ���̻� ������ �˻��ؼ� ������ ��������ϰ� �׸��д�.
		if(empty($_SESSION['Cart'])==true)
		{ 
			echo"����ִ�";  
			echo"<meta http-equiv='Refresh' content='2; URL=index.php'>";
		}
	}
}


//**************************************************************************
echo"<form method=POST  action=show_bookcart.php>";
$id_num=1; // üũ�ڽ��� �̸��̵� �����Դϴ�~

foreach( $_SESSION['Cart']   as   $get_isbn => $get_quantity )
{
	// 1. å��ȣ�� �̿��ؼ� �� ������ �� ������´�.
	$SQL = "SELECT * FROM  bookshop_table   WHERE isbn = $get_isbn";
	$Box = mysql_query($SQL);

	// 2. �� å�� ��� ������ ȭ�鿡 �����ش�.
	$Record = mysql_fetch_array($Box);
	//********************************************************************
	// ���׸� åǥ�������� �����ش�.
	echo"<img src=images/". $get_isbn .".jpg width=50  height=50><br>";
	echo "title: " .		$Record['title'] ."<br>";
	//	echo "price: " .		$Record['price'] ."<br>";
	//	echo "quantity: ".  $Record['quantity'] ."<br>";
	//	echo "Review: ".	$Record['Review'] ."<br>";
	// 3. ���ż����� �����ش�.
	//	echo "���ż���: ". $get_quantity ."<br>";
	// 4. ��å�� ����, ���ż���, ���űݾ�(����*���ż���) �� �����ش�.	
	echo"����: ". $Record['price'] 
		. " ���ż���: " .$get_quantity 
		." ���űݾ�: ". ($Record['price'] *$get_quantity);

	// �����Ҽ��ִ� üũ�ڽ��� ������ش�.
	echo"�����ϱ� <input type=checkbox  value=". $get_isbn ."  name=". $id_num .">";
	$id_num++; // üũ�ڽ��� �̸��� �������ش�. (1���÷��ش�)
	
	echo"<hr size=2 color=red>";
	//********************************************************************
}
echo"<input type=submit value=�����Ѱ� �����ϱ�>";
echo"</form>";
	?>
		<form method="post" action="input_order.php">
		<input type="submit" value="����">
		</form>
	<?
?>