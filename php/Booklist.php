<? // BookList.php (Show a list of books by category)

	// Title
	include"Header.php";

	// Connect the db
	include"DB_Connect.php"; 
	//-----------------------------------------------------
	// Show the category number 
	echo "Selected Category number is " . $_GET['catid'] . "<hr>";
	// Import from the bookshop_table 
	// SELECT * FROM  bookshop_table  
	//		WHERE  category_no = category number
	$Box = mysql_query("SELECT * FROM bookshop_table 
										WHERE  category_no=$_GET[catid]");
	
	// Show the quantity 
	$max = mysql_num_rows($Box);
	echo"<font size=5><b>";
	for($loop=1;		$loop<=$max;		$loop++)
	{
		// 1 -- Save
		$Record = mysql_fetch_array($Box);

		// Show only the book title and the price. If you click the title, enter the "bookinfo.php" 
		// Send isbn
		echo"<a href=Bookinfo.php?isbn=". $Record['isbn'] .">"
							. $Record['title'] . "</a> ";	
							
		echo $Record['price'] ."<br>";

	}









?>