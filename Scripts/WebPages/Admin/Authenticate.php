<?php
include '../../../Includes/Logindb.inc';

 session_start();
 function authenticateUser($connection,
                          $username,
                          $password)
{
  // Test that the username and password
  // are both set and return false if not
  if (!isset($username) || !isset($password))
    return false;



  // Formulate the SQL query find the user
  $QueryStr = "SELECT a.AMM, a.psw  FROM teacher AS a  WHERE a.AMM = '".$username."' AND a.psw = '".$password."' ";

  // Execute the query
  $result=QueryDB($QueryStr,$connection);
  $row=mysql_fetch_row($result);
  

  // exactly one row? then we have found the user
  if (mysql_num_rows($result) == 0){
    return false;}
  else{  
  	
    return true;
	
	}
}


// Main ----------



  $authenticated = false;

  // Clean the data collected from the user

$appUsername =$_POST['formUsername'];
  
$appPassword =$_POST['formPassword'];
 
 // $appUsername = mysql_real_escape_string($appUsername); 
//$appPassword= mysql_real_escape_string($appPassword);  

  // Connect to the MySQL server
  $connection=LoginToDB();     


  $authenticated = authenticateUser($connection,
                                    $appUsername,
                                    $appPassword);

  if ($authenticated == true)
  {
   
    $_SESSION["authenticatedUser"]=$appUsername;
	
    
  header("Location: ../../../Admin/Teachers/main.php"); 

    exit;
  }
  else
  {
    // The authentication failed
    $logMessage ="Η Είσοδος Απέτυχε! Ελέγξτε τα στοιχεία σύνδεσης σας και δοκιμάστε ξανά.";  
    $_SESSION["logMessage"]=$logMessage;    
    header("Location: ../../../login.php"); 
  

    exit; 
  }

  
?>
