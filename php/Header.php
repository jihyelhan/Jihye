<? // Header.php 
session_start( );

// Common part
echo"<br><br>";
echo"<center><h1><b> Amazon </b></h1></center>";
echo"<br>";
//-----------------------------------------------------
// Log in - user.......
if( isset($_SESSION['Logged_in_user'])==true )
{
	// Show the user name
	echo $_SESSION['Logged_in_user'] . " User, Log in�� &nbsp&nbsp";
	// Make a link - Go to the homepage
	echo"<a href=index.php> to mainpage </a> &nbsp&nbsp";
	// Make a link "Show bookcart"
	// Click it, then enter the show_bookcart.php 
	echo"<a href=Show_Bookcart.php> View Shopping Cart </a> &nbsp&nbsp";
	// Link - Log out
	echo"<a href=Member_Logout.php> Log out </a>";
}
//-------------------------------------------------------------------------------------------
else if(isset($_SESSION['Logged_in_admin'])==true )  // Log in - Admin.......
{
	// Show a message - Admin. Log in 
	echo "Admin. Log in�� &nbsp&nbsp";
	// Link to enter the Admin Menu
	echo"<a href=Admin_Menu.php> Admin. Menu </a> &nbsp&nbsp";
	// Link - Log out
	echo"<a href=Admin_Logout.php> Log out </a>";
}
//-------------------------------------------------------------------------------------------
else // Not loged in yet.........
{
	// Show the log in section
	include"Member_Login.html";
	echo"<br>";
	echo"<a href=Admin_Login.html> Admin. Log in </a>";
}
//----------------------------------------------------
echo"<hr size=3 color=black><br>";
?>