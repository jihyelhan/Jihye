<?php
/*	
		a page, add new products (add_book.php)
	
		(1) Select a category of new products (using the select tag)
		* Each items are made with the category numbers(catid) as its value.
		(2) Make the input boxes to type the info. of the products.
			* Book title, number, Price, Quantity , description
			* The category number is determined by selected info. of the product.
		(3) click the "Save" botton to send 'add_book_db.php' page.
*/
// * Categories
include"DB_Connect.php";

// Import all the categories
$res = mysql_query("select * from bookshop_category");  
$max_category = mysql_num_rows($res);  

echo"<form action=Add_Book_DB.php method=post>";
echo"<h1><b><center> Add a new book </center></h1>";
echo"<hr color=black width=90%> Category ";	

echo"<select name=category>";  //  $_POST['category']

		for($index=1;		$index<=$max_category;		$index++)
		{
			$rec = mysql_fetch_array($res);
			$cat_id = $rec['category_no'];		
			$cat_name = $rec['category_name'];
			echo"<option value=$cat_id>" .  $cat_name .  "</option>";
		}
echo"</select>";

?>
<hr color=black width=90%>
	Title <input type="text " size=10 name="title">
	Number <input type="text " size=10 name="isbn">
	Price <input type="text " size=10 name="price">
	Quantity <input type="text " size=10 name="quantity">
	<hr color=black width=90%>
	Description <textarea name="description" rows="10" cols="50"></textarea>
	<input type="submit" value="Add a new book">
	</form>
<?

?>