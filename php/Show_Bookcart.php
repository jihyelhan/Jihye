<?
// show_bookcart.php 

// Title
include"Header.php";
include"DB_Connect.php";
session_start( );
// error check : Check if the shopping cart is empty,  
//					empty - show "Shopping Cart is empty" 
//					Go to the main page(index.php) in 1~2 sec.
if(empty($_SESSION['Cart']) ==true)
{
	echo"Shopping Cart is empty."; 
    echo"<meta http-equiv='Refresh' content='3; URL=index.php'>";  	
	exit;  
}
//**************************************************************************
//	Check and clear the cart 

// 1. Find out the saved quntity of the item (count)
$max = count( $_SESSION['Cart']  );
echo "<h2> Shopping cart is contained " . $max . " item(s). <br>";

// 2. for function
for( $check_id=1;		$check_id<=$max;	 $check_id++)
{
	// To do in the loop
	// 3. Check box - checked? (use empty or isset)
	// * Show the name of the check box~~
	if(isset($_POST[$check_id])==true) // 이거 POST 안에 있냐?
	{ 
		// 4. checked - delete in the cart (value를 이용해서)
		$isbn = $_POST[$check_id];
		unset( $_SESSION['Cart'][$isbn] ); // 변수나 배열을 지우는명령어 (unset)

		// No longer on the cart - empty ( show an error)
		if(empty($_SESSION['Cart'])==true)
		{ 
			echo"Empty";  
			echo"<meta http-equiv='Refresh' content='2; URL=index.php'>";
		}
	}
}


//**************************************************************************
echo"<form method=POST  action=Show_Bookcart.php>";
$id_num=1; // The number - Check box name~

foreach( $_SESSION['Cart']   as   $get_isbn => $get_quantity )
{
	// 1. Use book isbn number
	$SQL = "SELECT * FROM  bookshop_table   WHERE isbn = $get_isbn";
	$Box = mysql_query($SQL);

	// 2. Show all info. of the book
	$Record = mysql_fetch_array($Box);
	//********************************************************************
	// Show a picture of the book
	echo"<img src=images/". $get_isbn .".jpg width=50  height=50><br>";
	echo "title: " .		$Record['title'] ."<br>";
	//	echo "price: " .		$Record['price'] ."<br>";
	//	echo "quantity: ".  $Record['quantity'] ."<br>";
	//	echo "Review: ".	$Record['Review'] ."<br>";
	// 3. Show the order quantity
	//	echo "Order Quantity: ". $get_quantity ."<br>";
	// 4. show the price, order quantity, amount of purchase(price*order quantity)	
	echo"Price: ". $Record['price'] 
		. " Order Quantity: " .$get_quantity 
		." Purchase Amount: ". ($Record['price'] *$get_quantity);

	// make a delete checkbox
	echo"Delete <input type=checkbox  value=". $get_isbn ."  name=". $id_num .">";
	$id_num++; // Change the checkbox number (+1)
	
	echo"<hr size=2 color=red>";
	//********************************************************************
}
echo"<input type=submit value=Delete Selected Item>";
echo"</form>";
	?>
		<form method="post" action="Input_Order.php">
		<input type="submit" value="Purchase">
		</form>
	<?
?>