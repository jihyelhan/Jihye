<?
										// Fix_Book.php (�����ϱ�)
// 1. bookinfo.php ���� �����ϱ��ư�� ������ ������ �͵��� ȭ�鿡 ����غ���
echo"<h1>";
echo $_POST['isbn']."<BR>";	echo $_POST['title']."<BR>";
echo $_POST['price']."<BR>";	echo $_POST['quantity']."<BR>";
echo $_POST['Review']."<BR>";

$isbn =$_POST['isbn'];	$title =$_POST['title'];
$price =$_POST['price'];	$quantity =$_POST['quantity'];
$Review =$_POST['Review'];

// �����ͺ��̽����ӾȵǸ� �����Ұ� (�����ͺ��̽��̸�, ���̺��̸�, �����̸�(��.�ҹ���))
// 2. �����ͺ��̽��� �����ϰ�, bookshop_db �� ����
include"db_connect.php";
// 3. update �������� ����ؼ� �����ذ͵��� �����Ѵ�.
$sql_query ="UPDATE  bookshop_table  
					SET   title ='$title' , price =$price ,	quantity =$quantity,
							Review ='$Review'		WHERE	isbn =$isbn";

// 4. ������ �ߵǾ����� ����üũ�� �Ѵ�.
// 5. ������ �ߵǾ����� bookinfo.php �������� �ٽ� ����������. (å��ȣ�� �Ѱ�����Ѵ�)
$err_chk= mysql_query($sql_query);
if($err_chk==false)
{ 
	echo"������ �����߻�!!"; echo mysql_error(); 
	echo"<meta http-equiv='Refresh' content='2; URL=bookinfo.php?isbn=$isbn'>";
	exit;
}
else
{ 
	echo"������Ǿ����ϴ�!";	
	echo"<meta http-equiv='Refresh' content='2; URL=bookinfo.php?isbn=$isbn'>";
}
?>