<?php
/*	
		����ǰ �߰��ϴ� ������ (add_book.php)
	
		(1) ���ο��ǰ�� ī�װ��� �������� (select �±׸� �����)
		*������ �׸��� value �� ī�װ���ȣ(catid) �� �Ǿ�����
	
		(2) ��ǰ�� ������ �Է��Ҽ��ֵ��� �Է»��ڵ��� ������� 
			* å����, ��ȣ, ����, ������ , ����
			* ī�װ���ȣ�� ������ �����ѰͿ� ���ؼ� ������

		(3) "�����ϱ�" ��ư�� ������ add_book_db.php �������� �����ϱ�.
*/
// * ī�װ����̺� �ִ� ī�װ��� ����� �˾Ƴ���
include"db_connect.php";

// ī�װ����δ� ��������
$res = mysql_query("select * from bookshop_category");  
$max_category = mysql_num_rows($res);  // �����˾Ƴ���

echo"<form action=add_book_db.php method=post>";
echo"<h1><b><center> ��å�߰� </center></h1>";
echo"<hr color=black width=90%> ī�װ� ";	

echo"<select name=category>";  //  $_POST['category']

		for($index=1;		$index<=$max_category;		$index++) //������ŭ~
		{
			$rec = mysql_fetch_array($res);
			$cat_id = $rec['category_no'];		
			$cat_name = $rec['category_name'];
			echo"<option value=$cat_id>" .  $cat_name .  "</option>";
		}
echo"</select>";

?>
<hr color=black width=90%>
	���� <input type="text " size=10 name="title">
	��ȣ <input type="text " size=10 name="isbn">
	���� <input type="text " size=10 name="price">
	������ <input type="text " size=10 name="quantity">
	<hr color=black width=90%>
	���� <textarea name="description" rows="10" cols="50"></textarea>
	<input type="submit" value="��å�߰��ϱ�">
	</form>
<?

?>