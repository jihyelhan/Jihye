<?php	
								// bookinfo.php (������������)
// Ÿ��Ʋȭ��
include"Header.php";
// �����ͺ��̽��� �����ϰ�, bookshop_db ������ ���Ŀ� , 
// �ѱ����ڵ��� euckr �� �����ش�.
include"db_connect.php"; 
session_start( );
//-------------------------------------------------------------------------------------------
// ����������(booklist.php) �� �Ѱ��� "isbn" �� �̿��ؼ� �� å�� �˻��ؼ� �����´�.
$sql = "SELECT * FROM  bookshop_table  WHERE  isbn=$_GET[isbn]";
$Box = mysql_query($sql);
// ������ å�� ��� ������ ȭ�鿡 �����ش� (category_no �� ����...)
$Record = mysql_fetch_array($Box);

// �մ����� �α������̸� �׳� �����ְ�, �����ڷ� �α������̸� �ڽ��ȿ� �����ش�.
if(isset($_SESSION['Logged_in_admin'])==true)
{

	// isbn , title , price , quantity , Review �� 5���� �Ѿ�°�
	?>
	<form method="post" action="Fix_Book.php">
	<img src=images/<?=$Record['isbn']?>.jpg><br>
    <b>å��ȣ:</b><input type=text name="isbn" value=<?=$Record['isbn']?>><br> 
	<b>å����: </b><input type=text name="title" value=<?=$Record['title']?>><br>
	<b>å����: </b><input type=text name="price" value=<?=$Record['price']?>><br> 
	<b>å����: </b><input type=text name="quantity" value=<?=$Record['quantity']?>><br>
	<b>����: </b><input type=text name="Review" value=<?=$Record['Review']?>><br>
	<input type=submit  value="��å�� �����ϱ�">
	</form>
	<?
}
else 
{
	echo"<img src=images/" . $Record['isbn'] . ".jpg><br>";
	echo "<b>å��ȣ: </b>". $Record['isbn'] ."<br>". 
			"<b>å����: </b> ".$Record['title']."<br>". 
			"<b>å����: </b> ".$Record['price']."<br>". 
			"<b>å����: </b> ".$Record['quantity']."<br>". 
			"<b>����: </b> ".$Record['Review'];
}

//-------------------------------------------------------------------------------------
// �α��������� �ƴ����� �Ǵ��Ѵ�.
	// �α������̸� FORM �� ���� �Է»���1���� ���۹�ư 1���� ������ش�.
	// ���۹�ư�� ������ bookcart.php �� �Ѿ�� �Ǿ��ִ�.
	// bookcart.php ���������� å��ȣ�� �Ѱ��־�� �Ѵ�.
	$isbn = $Record['isbn'];
	if(isset($_SESSION['Logged_in_user']) ==true  ) // �մ����� �α�����,......
	{
		?>
		<form action="bookcart.php?isbn=<?echo $isbn?>"  method="post">
		���Ű���	<input type="text" name="quantity" value=1> 
		<input type="submit" value="��ٱ��Ͽ����">
		</form>
		<?
	}

?>



