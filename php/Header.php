<? // Header.php (ȭ���� �������� ������ Ÿ��Ʋ�κ�)
session_start( );

// ���������� ���;ߵǴ� �κ�
echo"<br><br>";
echo"<center><h1><b> Amazon </b></h1></center>";
echo"<br>";
//-----------------------------------------------------
// �Ϲ������� �α���������.......
if( isset($_SESSION['Logged_in_user'])==true )
{
	// ȸ���� �̸��� ȭ�鿡 ���δ�.
	echo $_SESSION['Logged_in_user'] . " �� �α�����... &nbsp&nbsp";
	// Ȩ�������� �̵��Ҽ��ִ� ��ũ�� ������ش�.
	echo"<a href=index.php> Ȩ�������� </a> &nbsp&nbsp";
	// "��ٱ��Ϻ���" ��� ��ũ�� ������ش�. 
	// ������ show_bookcart.php �������� �Ѿ��.
	echo"<a href=show_bookcart.php> ��ٱ��Ϻ��� </a> &nbsp&nbsp";
	// �α׾ƿ��Ҽ��ִ� ��ũ�� ���δ�.
	echo"<a href=Member_Logout.php> �α׾ƿ� </a>";
}
//-------------------------------------------------------------------------------------------
else if(isset($_SESSION['Logged_in_admin'])==true )  // �����ڷ� �α���������.......
{
	// �����ڷα������̶�� �޽����� ������ 
	echo "�����ڴ� �α�����... &nbsp&nbsp";
	// �����ڸ޴��� �̵��Ҽ��ִ� ��ũ
	echo"<a href=Admin_Menu.php> �����ڸ޴� </a> &nbsp&nbsp";
	// �α׾ƿ��Ҽ��ִ� ��ũ
	echo"<a href=Admin_Logout.php> �α׾ƿ� </a>";
}
//-------------------------------------------------------------------------------------------
else // �α��ξ�������.........
{
	// �α���â�� ���δ�.
	include"Member_Login.html";
	echo"<br>";
	echo"<a href=Admin_Login.html> �����ڷα��� </a>";
}
//----------------------------------------------------
echo"<hr size=3 color=black><br>";
?>