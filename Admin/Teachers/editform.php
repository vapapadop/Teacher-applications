<?php 


session_start(); 	

if (!isset($_SESSION['authenticatedUser'])){
  header("Location: ../../login.php"); 
  exit; 
}

if (($_SESSION['submited'])==1){
  header("Location: main.php"); 
  exit; 
}


include '../../Includes/Logindb.inc'; 
$connection=LoginToDB(); 
?> 
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ΑΙΤΗΣΕΙΣ ΕΚΠΑΙΔΕΥΤΙΚΩΝ - Επεξεργασία</title>

 
  <link type="text/css" rel="stylesheet" href="../../global/admin_styles.css">
 

</head>

<body>

<?php
       $appUsername1 =$_SESSION["authenticatedUser"];
       $QueryStr="SELECT teacher_id,AMM FROM teacher where AMM=".$appUsername1."";
       $result5=QueryDB($QueryStr,$connection);
       $row5=mysql_fetch_row($result5);
       $tid=$row5[0];

        
        $_SESSION['teacher_id']=$tid;
       


$QueryStr="SELECT teacher_id, photo,expertise_id,perioxi_id,AMM,AFM 
                   FROM teacher WHERE teacher_id=".$tid."" ;   
         
	$result30=QueryDB($QueryStr,$connection);   





	$QueryStr="SELECT  aithseis.teacher_id, schools.onsxoleiou,aithseis.epilogi_id,aithseis.school_id 
                   FROM aithseis,schools WHERE schools.school_id=aithseis.school_id AND teacher_id=".$tid." ORDER BY aithseis.epilogi_id ASC" ;   
         
	$result=QueryDB($QueryStr,$connection);   

$QueryStr="SELECT  aithseis.teacher_id, schools.onsxoleiou,aithseis.epilogi_id,aithseis.school_id 
                   FROM aithseis,schools WHERE schools.school_id=aithseis.school_id AND teacher_id=".$tid." ORDER BY aithseis.epilogi_id ASC" ;   
         
	$result132=QueryDB($QueryStr,$connection); 



          
	

$QueryStr="SELECT  synipiretisi.teacher_id, polis.onpolis,synipiretisi.poli_id 
                   FROM synipiretisi,polis WHERE polis.poli_id=synipiretisi.poli_id AND teacher_id=".$tid."" ;
   
         $result46=QueryDB($QueryStr,$connection);   

?>


<table width='100%' height="100%" border='0' cellpadding='0' cellspacing='0'>
<tr>
  <td width='200' height="60" valign='center' align='center'><img src="../../Images/logo_1.gif" /></td>
  <td class="top_banner" valign='center' align='center' ><b> ΔΙΕΥΘΥΝΣΗ ΔΕΥΤΕΡΟΒΑΘΜΙΑΣ ΕΚΠΑΙΔΕΥΣΗΣ ΑΝΑΤ. ΑΤΤΙΚΗΣ</b></td>
</tr>
<tr>
  <td class="top_row_left"></td>
  <td class="top_row_right"></td>
</tr>
<tr>
  <td class="left_column">

  <div class='nav_link'><a href='../../Admin/Teachers/main.php'>Αρχική Σελίδα</a></div><div class='nav_link'><a href='../../Admin/Teachers/odhgies.php'>Οδηγίες</a></div><div class='nav_link'><a href='../../Admin/Teachers/logout.php'>Έξοδος</a></div>
  </td>
  <td class="main_content">
 
    <table cellpadding="0" cellspacing="0" height="35">
    <tr>
      <td width="45"><img src="../../Images/icon_edit.jpg" /></td>

      <td class="title">Επεξεργασία Αίτησης Τοποθέτησης Εκπαιδευτικού. </td>
    </tr>
    </table>
    
    
    <div id='page_1' style='display: block;'>
                <table class='list_table' width='500' cellpadding='0' cellspacing='1'>
               
                <tr style='height: 20px;'>
                  <th width='25'>ID</th>
                  <th>Ονοματεπώνυμο</th>
                  <th>Κλάδος </td>
                  <th width='80'>Περιοχή Μετάθεσης</th>
		  
                  <th width='85'>Α.Μ.Μ</th>
                  <th width='70'>Α.Φ.Μ</th>
                  
		<th width='60'>IP</th>
                </tr>

<?php
	while ($row30=mysql_fetch_row($result30)){


$perioxi=$row30[3];



$QueryStr="SELECT perioxi_id, onoma
                   FROM perioxi WHERE perioxi_id=".$perioxi."" ;   
         
	$result80=QueryDB($QueryStr,$connection);   
        $row80=mysql_fetch_row($result80);
        $periox=$row80[1];

$ap=date('d/ m/ y');
$ip=$_SERVER['REMOTE_ADDR'];
?>


		
	<tr style='height: 20px;'>
              <td align='center'><?php echo $row30[0] ?></td>
              <td align='center'><?php echo $row30[1] ?></td>
              <td align='center'><?php echo $row30[2] ?></td>
              <td align='center'><?php echo $periox ?></td>
              
              <td align='center'><?php echo $row30[4] ?></td>              
	      <td align='center'><?php echo $row30[5] ?></td>
              
	      <td align='center'>  <?php echo $ip ?>   </td>
            </tr>

<?php } ?></table></div>
		
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<p class="common_width"><span style='color: blue'><b>ΟΔΗΓΙΕΣ:</b></span></br>
      <b>Μόλις ολοκληρώσετε τις επιλογές για την αίτηση σας, θα Πρέπει να Επιλέξετε το κουμπί Οριστική Υποβολή (στο κάτω μέρος της σελίδας) για να οριστικοποιήσετε την Αίτηση σας, και να σας δοθεί Αριθμός Καταχώρησης.<br><span style='color: blue'><b>Προσοχή : </b></span> Η Αίτηση λαμβάνεται υπόψη <u>μόνο εφόσον υποβληθεί οριστικά</u>. 
</b>
      </p>
        <p class="common_width">
      <u><b>Δηλώσεις Εντοπιότητας - Συνυπηρέτησης  (Εάν Υπάρχουν).</b></u><br>
       </p>
  
	<form action="" method="">

    <div id='page_1' style='display: block;'>
                <table class='list_table' width='500' cellpadding='0' cellspacing='1'>
                <tr style='height: 20px;'>
                  <th width='5%'></th>
                  <th width='40%'> Περιοχή Εντοπιότητας</th>
                  <th width='5%'></th>                
                  <th width='40%'>Περιοχή Συνυπηρέτησης</th>    
		  
                </tr>

	
	<tr style='height: 20px;'>
<td> </td>
              <input type="hidden"   value="<?php echo $tid ?>" name="teacher_id" />
	      <td align='center'><span style='color: red'><b>
<?php
       

	$QueryStr="SELECT entopiot,synipiret FROM teacher where teacher_id=".$tid."";
       $result2=QueryDB($QueryStr,$connection);
       $row2=mysql_fetch_row($result2);
       $entop=$row2[0];
       $synip=$row2[1];  

  echo $entop;
?>					
			 
			  	
			    			  
			  	   
    </b></span></td>
              <td align='center'> </td>
              <td align='center'><span style='color: red'><b><?php echo $row2[1] ?></b></span></td>
	      
                            
        </tr>

		</table></div>
    </form>


 


 
    <p class="common_width">
     <u> <b>Δηλώσεις Προτίμησης Σχολείων (Μέχρι 20 επιλογές).</b></u>
     
      <ul>
      	<span style='color: blue'><b>ΟΔΗΓΙΕΣ:</b></span>
      <li>Επιλέγετε Σχολείο απο τη <b>Λίστα με Όλα τα Σχολεία της περιοχής σας </b> και πατάτε το πλήκτρο εισαγωγή.</li>
      <li>Οι επιλογές σας θα εμφανίζονται δίπλα με σειρά προτίμησης και κόκκινα γράμματα.</li>
      <li>Επιλέγετε το πλήκτρο Ακύρωση αν θέλετε να ακυρώσετε ή να αλλάξετε κάποιες επιλογές σας.</li>
      <br><span style='color: blue'><b>Προσοχή : </b></span><b> Ενημερωθείτε απο την ιστοσελίδα της ΔΔΕ ΑΝ. Αττικής για τα <u>Οργανικά και Πιθανά Οργανικά Κενά<u> της ειδικότητας σας πρίν υποβάλετε την αίτηση σας. </u>. <br> <b> Επιλογές σχολείων που δεν αντιστοιχούν σε υπαρκτά κενά δεν θα ληφθούν υπόψη.</b>
</b>
    </ul>

     
   
    </p> 

    <form action="Process.php" method="post">

    <div id='page_2' style='display: block;'>
                <table class='list_table' width='500' cellpadding='0' cellspacing='1'>
                <tr style='height: 20px;'>
                  <th width='25'></th>
                  <th align='center' width='150'>Επιλέξτε σχολείο απο τη λίστα</th>
                  <th ></th>

                  <th width='100'>Εισαγωγή Επιλογής</th>
                  <th width='80'>A/A Επιλογής  </th>
                  <th width='160'>Όνομα Σχολείου</th>                                    
                  <th align='center' width='100'>Ακύρωση επιλογών</th>
		
                </tr>
                
                
                <tr style='height: 20px;'>
              <td align='center' class='form_id'></td>
<input type="hidden"   value="<?php echo $tid ?>" name="teacher_id" />
              <td align='center'><select name="class_desc_new" >
<?php
       
$QueryStr="SELECT aithseis.epilogi_id  FROM aithseis where teacher_id=".$tid." ORDER BY epilogi_id DESC";
       $result10=QueryDB($QueryStr,$connection);
       $row10=mysql_fetch_row($result10);
       $epil=$row10[0];	

	$QueryStr="SELECT expertise_id,perioxi_id,organikh FROM teacher where teacher_id=".$tid."";
       $result2=QueryDB($QueryStr,$connection);
       $row2=mysql_fetch_row($result2);
       $per=$row2[1];
      $klados=$row2[0];
$organ=$row2[2];
                $QueryStr="SELECT schools.school_id,schools.onsxoleiou,schools.perioxi_id 
                   FROM schools 
                   WHERE  schools.perioxi_id=".$per." AND schools.school_id!=".$organ." order by schools.onsxoleiou"; 

	$result1=QueryDB($QueryStr,$connection);   
?>	

<?php if (mysql_num_rows($result1) ==0){
    echo "<option >Δεν υπάρχουν διαθέσιμα κενά</option>";}
  else{  
  	//$_SESSION["user_group"]=1; //$row[1];
    
				
			  while ($row1=mysql_fetch_row($result1)){
			  	//if ($row1[3]==0){
			  		echo "<option style='color: black' value=\"$row1[0]\"><b>$row1[1]</b></option>";
			  	//}else{	  	
			  		
			    	//echo "<option style='color: blue' value=\"$row1[0]\"><b>$row1[1]</b></option>";}			  
			  	} ?>    
    </select></td>
              <td> <input type="hidden"   value="<?php echo $epil ?>" name="epilogi_id" /></td>
              <td align='center'> <input type="submit" value="Εισαγωγή -->" name="cmdInsert" /></td>
              
                    <td>    
     <?php
	while ($row=mysql_fetch_row($result)){
?>		           
        
     	  <table width='80'>              
              	 
	         <tr style='height: 20px;'>
		
              <!--td align='center'><input type="hidden"   value="<?php echo $tid ?>" name="teacher_id" /></td-->
              <td align='center' width='80'><span style='color: red'><b><?php echo $row[2] ?></b></span></td>
            
           </tr>
         </table>
   <?php } ?>     
     </td>
   
    <td>    
     <?php
	while ($row=mysql_fetch_row($result132)){
?>		           
        
     	  <table width='200'>              
              	 
	         <tr style='height: 20px;'>
		
              <!--td align='center'><input type="hidden"   value="<?php echo $tid ?>" name="teacher_id" /></td-->
              
            <td align='center' width='160'><span style='color: red'><b><?php echo $row[1] ?></b></span></td>
           </tr>
         </table>
   <?php } ?>     
     </td>
              
              
              <td align='center'> <input type="submit" value="<--Ακύρωση" name="cmdDelete" /></td>
           <?php } ?></tr></table></div>
    </form>

 
<p class="common_width">
     
    </p> 
<table cellpadding="0" cellspacing="0" height="35">
    <tr>
      <td width="45"><img src="../../Images/icon_application.jpg" /></td>

      <td class="title">Οριστική Υποβολή της Αίτησης.</td>
    </tr>
    </table>
<p class="common_width">
     <b>Εάν έχετε ολοκληρώσει τις επιλογές σας, Πρέπει να Επιλέξετε το κουμπί Οριστική Υποβολή για να οριστικοποιήσετε την Αίτηση σας. Και να σας δοθεί Αριθμός Καταχώρησης.
<br><span style='color: blue'><b>Προσοχή! : </b></span> Η οριστική υποβολή σημαίνει οτι δεν θα έχετε τη δυνατότητα να επεξεργαστείτε ξανά την αίτηση σας μόνο να την Τυπώσετε! </b>
    </p>

    <form method='post' action='TeachersProcess2.php'>
         
         
<?php
 
$QueryStr="SELECT teacher_id, photo,expertise_id,perioxi_id,AMM,AFM 
                   FROM teacher WHERE teacher_id=".$tid."" ;   
         
	$result40=QueryDB($QueryStr,$connection); 
      
$QueryStr="SELECT aithseis.epilogi_id  FROM aithseis where teacher_id=".$tid." ORDER BY epilogi_id DESC";
       $result50=QueryDB($QueryStr,$connection);
       $row50=mysql_fetch_row($result50);
       //$epil=$row10[0];	

	   
?>	
<?php
	while ($row40=mysql_fetch_row($result40)){	
?>

  
        <input type="hidden" readonly="readonly"  value="<?php echo $row40[0] ?>" name="teacher_id" />
	<input type="hidden" readonly="readonly"  value="<?php echo $row40[1] ?>" name="photo" />
	<input type="hidden"  readonly="readonly" value="<?php echo $row40[2] ?>"  name="expertise_id" />  
	<input type="hidden"  readonly="readonly" value="<?php echo $row40[3] ?>"  name="perioxi_id" />
	<input type="hidden"  readonly="readonly" value="<?php echo $row40[4] ?>"  name="AMM" />
	<input type="hidden"  readonly="readonly" value="<?php echo $row40[5] ?>"  name="AFM" />
       
                
        
  

<?php } ?>
				


<input type="hidden"   value="<?php echo $epil ?>" name="epilogi_id" />	
<table class='list_table' width='490' cellpadding='0' cellspacing='1'>
                <tr style='height: 50px;'>
                  <th width='25' ><img src="../../Images/r_hand.gif" /></th>
                  <th width='90' >
                  	<?php 
       		if (($epil<1)||($epil>20)){
		?>
                  	
                  	<input type="button"  disabled="disable" style="width: 155px"  value="Οριστική Υποβολή Αίτησης" name="cmdInsert" /></th>
                  
        <?php }else { ?> 
       
        <input type="button" name="cmdInsert" style="width: 155px" onclick="if(confirm('Προσοχή! Η οριστική υποβολή σημαίνει οτι δεν θα έχετε τη δυνατότητα να επεξεργαστείτε ξανά την αίτηση σας μόνο να την Τυπώσετε!Nα Γίνει Οριστική υποβολή της αίτησης σας?'))
form.submit();
else alert('Δεν έγινε οριστική υποβολή της αίτησης σας!')" value="Οριστική Υποβολή Αίτησης"  />
        
        
        <!--input type="submit"   style="width: 155px" onclick="javascript: alert('Θα Γίνει Οριστική υποβολή της αίτησης σας. Όταν ολοκληρωθεί θα μεταφερθείτε στην Αρχική σελίδα Για να την Εκτυπώσετε.')" value="Οριστική Υποβολή Αίτησης" name="cmdInsert" /--></th>
         <?php } ?>        
                  
                  <th></td>
</tr>
</table>

       
    </form>
         </td>
</tr>

<tr>
  <td colspan='4' class="footer"><font color='blue'><b>© <?php echo(Date("Y")); ?>  </b>  ΤΜΗΜΑ ΕΚΠ/ΚΩΝ ΘΕΜΑΤΩΝ - ΠΥΣΔΕ - ΚΕΠΛΗΝΕΤ Δ.Δ.Ε ΑΝΑΤ. ΑΤΤΙΚΗΣ<BR>
      </font> </td>
</tr>
</table>

</body>
</html> 
