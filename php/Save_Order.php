<?
//	*Save the buyer`s info. to (Order_List_Table) (save_order.php)

	session_start( );

	// 1. Check - buyer name, shipping address
	echo $_POST['order_name'];		$order_name = $_POST['order_name'];
	echo $_POST['order_address'];		$order_address = $_POST['order_address'];

	// 2. Store the buyer id - Logged in user in a session
	$order_id = $_SESSION['Logged_in_user'];

	// 2.1 Connect db and select Bookshop_DB
	include"DB_Connect.php";

	// 3. The date of purchase will be entered automatically
	// 4. Purchase Number(Cart number) as well
	// 4.1  Store the buyer name, shipping address, buyer ID to the Order_List_Table (INSERT)
	$sql_query ="INSERT  INTO  order_list_table  (order_name,  order_addr,  order_id)
						VALUES	('$order_name',  '$order_address',  '$order_id')";

	$err_chk = mysql_query($sql_query);
	//-------------------------------------------------------------------------
	// What is the order number, which is just saved?
	$box = mysql_query("SELECT  max(order_no)  FROM  order_list_table");
	$record = mysql_fetch_array($box);
	echo "The order number you just stored is " . $record[ 0 ];
	$order_no = $record[0];
	//-------------------------------------------------------------------------
	// 4.2  Check - error or success 
	if($err_chk==false)
	{echo"Purchase list has not been saved"; echo mysql_error(); exit;}
	else
	{
		// 4.3 Success - show it 
		//    The biggest order number in the order_list_table 
		$sql_query ="SELECT  max(order_no)  FROM  order_list_table";
		$Box = mysql_query($sql_query);
		$Record =mysql_fetch_array($Box);
//echo"<h2>";		echo"Name of Purchaser: " . $Record['order_name'];
//echo"<br>";		echo"Shipping Address: " . $Record['order_addr'];
	}
	//#######################################
	foreach( $_SESSION['Cart']  as  $isbn=>  $quantity )
	{
		// Use the book number and find out the price - Put it in SQL
		$SQL = "SELECT  price  FROM  bookshop_table WHERE  isbn=$isbn";
		$BOX =mysql_query($SQL);
		if($BOX==false){ echo"Search Error!!"; echo mysql_error(); exit;}
		$Record =mysql_fetch_array($BOX);
		echo "The price of this book is".$Record['price']."<br>";

		// Order number, Order isbn, order_quantity, order_price 
		$SQL = "INSERT  INTO  order_item_table
						(order_no , order_isbn, order_quantity, order_price ) 
						VALUES ($order_no , $isbn  , $quantity, $Record[price] )";

		$error_chk = mysql_query($SQL);
		if($error_chk==false){ echo"Storage Error!!"; echo mysql_error(); exit;}
	}
	// The total price is ______.

?>










