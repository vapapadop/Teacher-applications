<?php
include '../../../Includes/Logindb.inc';

 session_start();
 function authenticateUser($connection,
                          $username,$appAFM,$appID)
{
  
  if (!isset($username)||!isset($appAFM)||!isset($appID) )
    return false;

  

  // Formulate the SQL query find the user
  $QueryStr = "SELECT a.AMM, a.AFM, a.adt FROM teacher AS a  WHERE a.AMM = '".$username."' AND a.AFM = '".$appAFM."' AND a.adt = '".$appID."'";

  // Execute the query
  $result=QueryDB($QueryStr,$connection);
  $row=mysql_fetch_row($result);
  

  // exactly one row? then we have found the user
  if (mysql_num_rows($result) != 1){
    return false;}
  else{  
  	
    return true;
	
	}
}

function registeredUser($connection,
                          $username)
{
  
  if (!isset($username) )
    return false;

  

  // Formulate the SQL query find the user
  $QueryStr = "SELECT a.AMM, a.eggrafi  FROM teacher AS a  WHERE a.AMM = '".$username."' ";

  // Execute the query
  $result=QueryDB($QueryStr,$connection);
  $row=mysql_fetch_row($result);
  

  // exactly one row? then we have found the user
  if ($row[1] != 1){
    return false;}
  else{  
  	
    return true;
    
	
	}
}


// Main ----------



  $authenticated = false;
  $registered = false;
 $_SESSION["loginMessage"]="";
 $_SESSION["passwd"]=""; 
 $_SESSION["passmessage"]=""; 
  

$appUsername =$_POST['AMM'];
$appAFM=$_POST['afm'];
$appID=$_POST['idNumber'];

 
  

  // Connect to the MySQL server
  $connection=LoginToDB();     

  $authenticated = authenticateUser($connection,
                                    $appUsername,$appAFM,$appID);


$registered=registeredUser($connection,$appUsername);

  if ($registered == true)
  {
        $loginMessage ="Επιτυχής Ανάκτηση Κωδικού!";
        
         if ($authenticated == true)
          {
             
          
            //epistrefoume to password
            $QueryStr = "SELECT a.AMM, a.psw  FROM teacher AS a  WHERE a.AMM = '".$appUsername."' ";

           // Execute the query
               $result2=QueryDB($QueryStr,$connection);
               $row2=mysql_fetch_row($result2);
               $_SESSION["passmessage"]="Ο Κωδικός σας (Password) είναι: ";
               $_SESSION["passwd"]=$row2[1];
               //header("Location: ../../../Admin/Teachers/anaktisi.php");  
            //exit;
            
          }else
             {  
             	$loginMessage ="Η Ταυτοποίηση Απέτυχε! Ελέγξτε τα στοιχεία καταχώρησης και δοκιμάστε ξανά. "; 
           //header("Location: ../../../Admin/Teachers/anaktisi.php");   	
       //exit; 
      }
        //echo  $loginMessage; 
      $_SESSION["loginMessage"]=$loginMessage;  
   

  header("Location: ../../../Admin/Teachers/anaktisi.php"); 

    exit;
  }
  else
  {
    // The authentication failed
     
    $loginMessage ="Δεν Έχει γίνει Εγγραφή στο σύστημα με αυτό το ΑΜΜ! Επιλέξτε το σύνδεσμο Εγγραφή-Απόκτηση Κωδικού!";
    echo  $loginMessage;
    $_SESSION["loginMessage"]=$loginMessage;    
    header("Location: ../../../Admin/Teachers/anaktisi.php"); 
   

    exit; 
  }

?>
