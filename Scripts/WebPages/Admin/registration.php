<?php
include '../../../Includes/Logindb.inc';

 session_start();
 function authenticateUser($connection,
                          $username,$appAFM)
{
  
  if (!isset($username) )
    return false;

  $QueryStr = "SELECT a.AMM, a.AFM FROM teacher AS a  WHERE a.AMM = '".$username."' AND a.AFM = '".$appAFM."' ";

  // Formulate the SQL query find the user
 // $QueryStr = "SELECT a.AMM  FROM teacher AS a  WHERE a.AMM = '".$username."' ";

  // Execute the query
  $result=QueryDB($QueryStr,$connection);
  $row=mysql_fetch_row($result);
  

  // exactly one row? then we have found the user
  if (mysql_num_rows($result) != 1){
    return false;}
  else{  
  	//$_SESSION["user_group"]=1; //$row[1];
    return true;
	
	}
}

function registeredUser($connection,
                          $username)
{
  // Test that the username and password
  // are both set and return false if not
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
 $_SESSION["passmessage"]="";
 $_SESSION["passwd"]="";  
  // Clean the data collected from the user

$appUsername =$_POST['AMM'];
$appAFM=$_POST['afm'];
$appID=$_POST['idNumber'];

$appTHL=$_POST['telnr'];

  
 
  

  // Connect to the MySQL server
  $connection=LoginToDB();     

  $authenticated = authenticateUser($connection,
                                    $appUsername,$appAFM);
//$authenticated = true;

$registered=registeredUser($connection,$appUsername);

  if ($authenticated == true)
  {
        $loginMessage ="Επιτυχής Εγγραφή!";
        
         if ($registered == false)
          {
             //ΚΑΤΑΧΩΡΟΥΜΕ ΤΑ ΣΤΟΙΧΕΙΑ ΤΟΥ
             $eggrafi=1;
            $QueryStr="UPDATE teacher  SET AFM= '".$appAFM."', adt='".$appID."', phone='".$appTHL."', eggrafi='".$eggrafi."'   WHERE teacher.AMM = '".$appUsername."'"; 
  
                $result1=QueryDB($QueryStr,$connection); 
          
            //epistrefoume to password
            $QueryStr = "SELECT a.AMM, a.psw  FROM teacher AS a  WHERE a.AMM = '".$appUsername."' ";

           // Execute the query
               $result2=QueryDB($QueryStr,$connection);
               $row2=mysql_fetch_row($result2);
               $_SESSION["passmessage"]="Ο Κωδικός σας (Password) είναι: ";
               $_SESSION["passwd"]=$row2[1];
               //header("Location: ../../../Admin/Teachers/eggrafi.php");  
            //exit;
            
          }else
             {  $loginMessage ="Έχει γίνει ήδη Εγγραφή στο σύστημα με αυτό το ΑΜΜ!  Επιλέξτε το σύνδεσμο Ανάκτηση Κωδικού!";
           //header("Location: ../../../Admin/Teachers/eggrafi.php");   	
       //exit; 
      }
        //echo  $loginMessage; 
      $_SESSION["loginMessage"]=$loginMessage;  
   

  header("Location: ../../../Admin/Teachers/eggrafi.php"); 

    exit;
  }
  else
  {
    // The authentication failed
    $loginMessage ="Μη αποδεκτή εγγραφή εκπαιδευτικού! Ελέγξτε τα στοιχεία καταχώρησης και δοκιμάστε ξανά!"; 
    echo  $loginMessage;
    $_SESSION["loginMessage"]=$loginMessage;    
    header("Location: ../../../Admin/Teachers/eggrafi.php"); 
   

    exit; 
  }

?>
