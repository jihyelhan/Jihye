<?php
/* 
	the page, to store the info. of new products in a database (add_book_db.php)
  
  1. show the transmitted datas on the screen (check)
  2. connect to the database, bookshop_db 
  3. save the transmitted datas to bookshop_table

	*Category number(number)
	*Title
	*Book number (number)
	*Price (number)
	*Quantity (number)
	*Description 

  4. Check, show the error message or a success message
  5. If it succeeds, move to the Administrator menu page after 1~2 seconds. 
*/

$category =$_POST['category'];		$title =$_POST['title'];
$isbn =$_POST['isbn'];					$price =$_POST['price'];
$quantity =$_POST['quantity'];			$Review =$_POST['description'];

echo $category."<br>".$title."<br>".$isbn."<br>".$price."<br>".
		$quantity."<br>".$Review."<hr color=red>";

include"DB_Connect.php";

// If there is no quotation marks, then show the error as "Unknown Column...."
$err_chk =mysql_query("insert into bookshop_table 
								(category_no, isbn, title, price, quantity, Review)
								values 
								($category, $isbn, '$title', $price, $quantity, '$Review')");
	if($err_chk==false)
	{echo"<h1><center>It wasn't saved!"; echo mysql_error();	exit;}
	else
	{echo"A new book was saved!";  
		echo"<meta http-equiv='Refresh' content='2; URL=Admin_Menu.php'>";	}

?>