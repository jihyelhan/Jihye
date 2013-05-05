<?
										// Fix_Book.php (Fix)
// 1. bookinfo.php 
echo"<h1>";
echo $_POST['isbn']."<BR>";	echo $_POST['title']."<BR>";
echo $_POST['price']."<BR>";	echo $_POST['quantity']."<BR>";
echo $_POST['Review']."<BR>";

$isbn =$_POST['isbn'];	$title =$_POST['title'];
$price =$_POST['price'];	$quantity =$_POST['quantity'];
$Review =$_POST['Review'];

// If you can not connect the database - Check list (Name of the db, Name of the table, Variable Name(Uppercase.Lowercase))
// 2. Connect the db, select the bookshop_db
include"DB_Connect.php";
// 3. Use the update Query statement - fix
$sql_query ="UPDATE  bookshop_table  
					SET   title ='$title' , price =$price ,	quantity =$quantity,
							Review ='$Review'		WHERE	isbn =$isbn";

// 4. Error check. fixed it well?
// 5. If yes, send it back to the bookinfo.php (send the book number)
$err_chk= mysql_query($sql_query);
if($err_chk==false)
{ 
	echo"Occur an error to modify!!"; echo mysql_error(); 
	echo"<meta http-equiv='Refresh' content='2; URL=Bookinfo.php?isbn=$isbn'>";
	exit;
}
else
{ 
	echo"Storage Success!";	
	echo"<meta http-equiv='Refresh' content='2; URL=Bookinfo.php?isbn=$isbn'>";
}
?>