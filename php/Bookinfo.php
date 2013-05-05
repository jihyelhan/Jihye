<?php	
								// bookinfo.php (detailed info.)
// Title
include"Header.php";
// Connect the data base, enter the bookshop_db, 
include"DB_Connect.php"; 
session_start( );
//-------------------------------------------------------------------------------------------
// Search the book and import it. Using the isbn from the previous page(booklist.php)
$Box = mysql_query($sql);
// Show all the info. of the imported books (except category_no)
$Record = mysql_fetch_array($Box);

if(isset($_SESSION['Logged_in_admin'])==true)
{

	// isbn , title , price , quantity , Review - after 5 
	?>
	<form method="post" action="Fix_Book.php">
	<img src=images/<?=$Record['isbn']?>.jpg><br>
    <b>Number:</b><input type=text name="isbn" value=<?=$Record['isbn']?>><br> 
	<b>Title: </b><input type=text name="title" value=<?=$Record['title']?>><br>
	<b>Price: </b><input type=text name="price" value=<?=$Record['price']?>><br> 
	<b>Quantity: </b><input type=text name="quantity" value=<?=$Record['quantity']?>><br>
	<b>Description: </b><input type=text name="Review" value=<?=$Record['Review']?>><br>
	<input type=submit  value="Modify the book">
	</form>
	<?
}
else 
{
	echo"<img src=images/" . $Record['isbn'] . ".jpg><br>";
	echo "<b>Number: </b>". $Record['isbn'] ."<br>". 
			"<b>Title: </b> ".$Record['title']."<br>". 
			"<b>Price: </b> ".$Record['price']."<br>". 
			"<b>Quantity: </b> ".$Record['quantity']."<br>". 
			"<b>Description: </b> ".$Record['Review'];
}

//-------------------------------------------------------------------------------------
// Logging in or not?
	// Logging - Make a FORM - a input box and a submit botton
	// Click the submit botton - enter the bookcart.php
	// send the book number to the bookcart.php
	$isbn = $Record['isbn'];
	if(isset($_SESSION['Logged_in_user']) ==true  ) // Guest, Log in¡¦¡¦
	{
		?>
		<form action="Bookcart.php?isbn=<?echo $isbn?>"  method="post">
		Order Quantity	<input type="text" name="quantity" value=1> 
		<input type="submit" value="Add to Shopping Cart">
		</form>
		<?
	}

?>



