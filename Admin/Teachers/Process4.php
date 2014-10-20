<?php 
session_start(); 	

if (!isset($_SESSION['authenticatedUser'])){
  header("Location: ../../login.php"); 
  exit; 
}

if (isset($_POST['teacher_id']))
	$teacher_id=$_POST['teacher_id'];
	
if (isset($_POST['onsxoleiou']))
	$teach_name=$_POST['onsxoleiou'];
//if (isset($_POST['epilogi_id']))
	$epilogi_id=$_POST['epilogi_id'];
//if (isset($_POST['epilogi_id']))
//	$epil_id=$_POST['epilogi_id'];

	
include '../../Includes/Logindb.inc'; 
$connection=LoginToDB(); 

if (isset($_POST['cmdUpdate'])){
    $QueryStr="UPDATE teacher SET photo='".$teach_name."' WHERE teacher_id='".$teacher_id."'"; 

	$result=QueryDB($QueryStr,$connection);  
  
  header("Location: editform.php");
  exit;
  }
elseif (isset($_POST['cmdDelete'])){
//$epil_id=2;
   $QueryStr="DELETE FROM synipiretisi WHERE teacher_id='".$teacher_id."' "; 
  
	$result=QueryDB($QueryStr,$connection);  
  
  header("Location: editform.php");
  exit;
  
  
}  
else {
 
 if (isset($_POST['class_desc_new']))
	$class_desc_new=$_POST['class_desc_new'];
	
	$ep=$epilogi_id+1;
 	$QueryStr="INSERT INTO synipiretisi (teacher_id,poli_id) VALUES ('".$teacher_id."','".$class_desc_new."')"; 


	$result=QueryDB($QueryStr,$connection);  
  
  header("Location: editform.php");
  exit;  
  
}  
LogoutFromDB();

?> 

