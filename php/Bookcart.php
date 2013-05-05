<?		// bookcart.php (To be placed on the cart)
session_start( );
include"DB_Connect.php";
//---------------------------------------------------------------------------
echo"<h3>";
//echo "The book number is " . $_GET['isbn'] . " The quantity of books are " . $_POST['quantity'];	

$isbn = $_GET['isbn'];		
$quantity = $_POST['quantity'];

//***********************************************************************
// The structure of the cart
//	$_SESSION['Cart'][ Book Number ] = Amount of the purchase;
// * Global array - $_SESSION
// session_start( ) is a must. 
// The global array can be used in other pages as well.

// Is this book stored previously or not?
if( isset($_SESSION['Cart'][ $isbn ])==true) 
{
	// Accrue to the quantity of the previous purchase
	$_SESSION['Cart'][ $isbn ] += $quantity; 
}
else
{
	// Store the current quantity
	$_SESSION['Cart'][ $isbn ] = $quantity; 
}
//***********************************************************************
// Show - It has been stored successfully 
// Return to the previous page
echo"<script language=javascript> history.back(); </script>";
?>







