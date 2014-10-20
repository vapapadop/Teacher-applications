<?php 

session_start(); 	

if (!isset($_SESSION['authenticatedUser'])){
  header("Location: ../../login.php"); 
  exit; 
}




	$teacher_id=$_POST['teacher_id'];	

	$teach_name=$_POST['photo'];

	$expertise_id=$_POST['expertise_id'];

	$perioxi_id=$_POST['perioxi_id'];
	$AMM=$_POST['AMM'];
	$AFM=$_POST['AFM'];
        

if ($perioxi_id==1){
    $per_id="A";
}elseif($perioxi_id==2)
   {$per_id="B";
}else 
   {$per_id="Γ";	
}



include '../../Includes/Logindb2.inc'; 

$connection=LoginToDB2(); 




 //if (isset($_POST['cmdInsert'])){
	
$sub=1;

$QueryStr="UPDATE teacher SET submited='".$sub."' WHERE teacher_id=".$teacher_id.""; 
  
$result=QueryDB2($QueryStr,$connection); 

	

 $QueryStr="SELECT  aithseis.teacher_id, schools.onsxoleiou,aithseis.epilogi_id,aithseis.school_id,schools.psde 
                   FROM aithseis,schools WHERE schools.school_id=aithseis.school_id AND aithseis.teacher_id=".$teacher_id." ORDER BY aithseis.epilogi_id ASC" ;   
          
	$result=QueryDB2($QueryStr,$connection); 

for ($i=1;$i<=20;$i++){
	$epilogi[$i]="";	
	//gia pinaka andrea
	$epilog[$i]="";
         }
	
	
	
	
	
$i=1;
     while ($row=mysql_fetch_row($result)){
	$epilogi[$i]=$row[1];	
	//gia pinaka andrea
	$epilog[$i]=$row[4];
        $i=$i+1;
          }








$QueryStr="SELECT  teacher.teacher_id, teacher.organikh, teacher.entopiot, teacher.synipiret, teacher.adt, teacher.phone 
                   FROM teacher WHERE teacher_id=".$teacher_id."" ;
$result4=QueryDB2($QueryStr,$connection); 
$row=mysql_fetch_row($result4);
$organ=$row[1];
$entopiot=$row[2];
$synipiret=$row[3];
$adt=$row[4];
$phone=$row[5];


$QueryStr="SELECT  school_id, onsxoleiou 
                   FROM schools WHERE school_id=".$organ."" ;
$result4=QueryDB2($QueryStr,$connection); 
$row=mysql_fetch_row($result4);
$organik=$row[1];


$ip=$_SERVER['REMOTE_ADDR'];
	//$ep=$epilogi_id+1;
$day=date('d/ m/ y');

 $QueryStr="INSERT INTO gt_form_2 (submission_id,teacher_id,name,AMM,AFM,ADT,phone,subdate,klados,perioxi,organik,entopiot,synipiret,epilogi1,epilogi2,epilogi3,epilogi4,epilogi5,epilogi6,epilogi7,epilogi8,epilogi9,epilogi10,epilogi11,epilogi12,epilogi13,epilogi14,epilogi15,epilogi16,epilogi17,epilogi18,epilogi19,epilogi20,ip_address) VALUES (' ','".$teacher_id."','".$teach_name."',".$AMM.",'".$AFM."','".$adt."','".$phone."','".$day."','".$expertise_id."','".$per_id."','".$organik."','".$entopiot."','".$synipiret."','".$epilogi[1]."','".$epilogi[2]."','".$epilogi[3]."','".$epilogi[4]."','".$epilogi[5]."','".$epilogi[6]."','".$epilogi[7]."','".$epilogi[8]."','".$epilogi[9]."','".$epilogi[10]."','".$epilogi[11]."','".$epilogi[12]."','".$epilogi[13]."','".$epilogi[14]."','".$epilogi[15]."','".$epilogi[16]."','".$epilogi[17]."','".$epilogi[18]."','".$epilogi[19]."','".$epilogi[20]."','".$ip."')"; 

	$result=QueryDB2($QueryStr,$connection); 
//session_destroy();

// gia dhmiourgia pinaka gia andrea
$QueryStr="INSERT INTO gt_pysde (submission_id,name,AMM,epilogi1,epilogi2,epilogi3,epilogi4,epilogi5,epilogi6,epilogi7,epilogi8,epilogi9,epilogi10,epilogi11,epilogi12,epilogi13,epilogi14,epilogi15,epilogi16,epilogi17,epilogi18,epilogi19,epilogi20) VALUES (' ','".$teach_name."',".$AMM.",'".$epilog[1]."','".$epilog[2]."','".$epilog[3]."','".$epilog[4]."','".$epilog[5]."','".$epilog[6]."','".$epilog[7]."','".$epilog[8]."','".$epilog[9]."','".$epilog[10]."','".$epilog[11]."','".$epilog[12]."','".$epilog[13]."','".$epilog[14]."','".$epilog[15]."','".$epilog[16]."','".$epilog[17]."','".$epilog[18]."','".$epilog[19]."','".$epilog[20]."')"; 

	$result112=QueryDB2($QueryStr,$connection); 

  
	
  
	//$result82=QueryDB2($QueryStr,$connection);
 $QueryStr="DELETE FROM aithseis WHERE teacher_id='".$teacher_id."' "; 
  
	$result83=QueryDB2($QueryStr,$connection);
	
	 
header("Location: printpreview.php");

//session_destroy();
  exit;  
  
//}

LogoutFromDB2();

?> 
  

