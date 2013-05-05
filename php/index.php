<?    //			index.php (main page - show the categoreis of the products)

// Title
include"Header.php";

// Connect. Select db
include"DB_Connect.php"; 

// (3) Import all from the Bookshop_Category (SELECT * FROM bookshop_category)
	$BOX = mysql_query("SELECT * FROM bookshop_category");

// (4) How many? $max = mysql_num_rows( )
	$max = mysql_num_rows($BOX);
	
//------------------------------------------------------------------------------------------------
// (5) How many?  for($loop=1;   $loop<=$max;   $loop++)
echo"<center>";	 
	 for($loop=1;   $loop<=$max;   $loop++)
	 {
			//	(1)  (mysql_fetch_array)	
			$Record = mysql_fetch_array($BOX);
			//	(2)  echo (Category_name) 		

			// show the category number 
			echo"<font size=7><b>";
		//	echo"This category number is " . $Record['category_no'] . "<br>";
			echo"<a href=Booklist.php?catid=". $Record['category_no'] .">"
									. $Record['category_name'] ."</a>";
			echo"<br>";
	 }
echo"</center>";

// info.
include"Footer.php";
?>








