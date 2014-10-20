<?php 
session_start(); 	

if (!isset($_SESSION['authenticatedUser'])){
  header("Location: ../../login.php"); 
  exit; 
}

include '../../Includes/Logindb.inc'; 
$connection=LoginToDB(); 
?> 
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ΑΙΤΗΣΕΙΣ ΕΚΠΑΙΔΕΥΤΙΚΩΝ - Forms</title>

  
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
       

$QueryStr="SELECT teacher_id, photo,expertise_id,perioxi_id,AMM,AFM,submited,organikh,adt 
                   FROM teacher WHERE teacher_id=".$tid."" ;   
         
	$result30=QueryDB($QueryStr,$connection);   



	$QueryStr="SELECT  aithseis.teacher_id, schools.onsxoleiou,aithseis.epilogi_id,aithseis.school_id 
                  FROM aithseis,schools WHERE schools.school_id=aithseis.school_id AND teacher_id=".$tid." ORDER BY aithseis.epilogi_id ASC" ;   
        
	$result=QueryDB($QueryStr,$connection);   
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

  <div class='nav_link_selected'>Αρχική Σελίδα</div><div class='nav_link'><a href='../../Admin/Teachers/odhgies.php' >Οδηγίες</a></div><div class='nav_link'><a href='../../Admin/Teachers/logout.php'>Έξοδος</a></div>
  </td>
  <td class="main_content">
 
    <table cellpadding="0" cellspacing="0" height="35">
    <tr>
      <td width="45"><img src="../../Images/icon_personal.jpg" /></td>

      <td class="title">Προσωπικά Στοιχεία Εκπαιδευτικού.</td>
    </tr>
    </table>

       
    <p class="common_width">
      Προσωπικά Στοιχεία Εκπαιδευτικού.
    </p>
  
    

    <form action="" method="post">

    <div id='page_1' style='display: block;'>
                <table class='list_table' width='650' cellpadding='0' cellspacing='1'>
                <tr style='height: 20px;'>
                  <th width='25'>ID</th>
                  <th>Ονοματεπώνυμο</th>
                  <th>Κλάδος </td>
                  <th width='80'>Περιοχή Μετάθεσης</th>
		  <th>Οργανική</td>
                  <th width='85'>Α.Μ.Μ</th>
                  <th width='70'>Α.Φ.Μ</th>
                  <th width='20'>Α.Δ.Τ</th>
		<th width='60'>IP</th>
                </tr>

<?php
	while ($row30=mysql_fetch_row($result30)){
$subtid=$row30[6];
$_SESSION['submited']=$subtid;


$organiki=$row30[7];
$perioxi=$row30[3];

$QueryStr="SELECT school_id, onsxoleiou
                   FROM schools WHERE school_id=".$organiki."" ;   
         
	$result70=QueryDB($QueryStr,$connection);   
        $row70=mysql_fetch_row($result70);
        $organ=$row70[1];

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
              <td align='center'><?php echo $organ ?></td>
              <td align='center'><?php echo $row30[4] ?></td>              
	      <td align='center'><?php echo $row30[5] ?></td>
              <td align='center'>  <?php echo $row30[8] ?>  </td>
	      <td align='center'>  <?php echo $ip ?>   </td>
            </tr>

<?php } ?>
		</table></div>
    </form>

  
    


<table cellpadding="0" cellspacing="0" height="35">
    <tr>
      <td width="45"><img src="../../Images/icon_application.jpg" /></td>

      <td class="title">Κατάσταση Αίτησης Εκπαιδευτικού.</td>
    </tr>
    </table>

<p class="common_width">
     Κατάσταση Αίτησης Εκπαιδευτικού.
    </p>



  
  <?php 
       if ($subtid==0){
	$status='ΔΕΝ ΥΠΕΒΛΗΘΗ';
      }else  $status='ΥΠΕΒΛΗΘΗ'; 
 ?>

    <form action="" method="post">

    <div id='page_2' style='display: block;'>
                <table class='list_table' width='650' cellpadding='0' cellspacing='1'>
                <tr style='height: 20px;'>
                  <th width='5%'></th>
                  <th width='35%'>Τύπος Αίτησης</th>
                  <th width='35%'>Κατάσταση Αίτησης</th>
                  <th width='25%'>ΕΠΕΞΕΡΓΑΣΙΑ ΑΙΤΗΣΗΣ</th>                  
           	  
                </tr><tr style='height: 20px;'>
              <td align='center' class='form_id'></td>
              <td>Αίτηση Τοποθέτησης</td>
              <td align='center'><span style='color: red'><b><?php echo "$status" ?></b></span></td>
              <?php 
       		if ($subtid==0){
		?>	
		<td align='center'><a href='editform.php' onclick="alert('Προσοχή : Στη λίστα σχολείων που ακολουθεί, εμφανίζονται ΟΛΑ τα σχολεία της περιοχής μετάθεσης σας.. Ενημερωθείτε απο την ιστοσελίδα της ΔΔΕ ΑΝ. Αττικής για τα Οργανικά και Πιθανά Οργανικά Κενά της ειδικότητας σας πρίν υποβάλετε την αίτηση σας. .  ');return true">ΕΠΕΞΕΡΓΑΣΙΑ-ΥΠΟΒΟΛΗ</a> </td>
	<?php }else {?>
               
		<td align='center'>--ΕΠΕΞΕΡΓΑΣΙΑ--</td>
		<?php } ?>
	      
              
            </tr></table></div>
    </form>
  
<?php 
       		if ($subtid==0){
		?>     
<br><span style='color: blue'><b>Προσοχή : </b></span><b> Ενημερωθείτε απο την ιστοσελίδα της ΔΔΕ ΑΝ. Αττικής για τα <u>Οργανικά και Πιθανά Οργανικά Κενά<u> της ειδικότητας σας πρίν υποβάλετε την αίτηση σας. </u>. <br> <b> Επιλογές σχολείων που δεν αντιστοιχούν σε υπαρκτά κενά δεν θα ληφθούν υπόψη.</b>
</b>

<?php } ?>

<?php 
       		if ($subtid==1){
		?>


<table cellpadding="0" cellspacing="0" height="35">
    <tr>
      <td width="45"></td>

      <td class="title">Εκτύπωση Αίτησης Εκπαιδευτικού.</td>
    </tr>
    </table>	
<table cellpadding="0" cellpadding="1">
   <tr>
    <td><img src="../../Images/printer.gif"/></td>
    <td>Προεπισκόπιση-Εκτύπωση</td>
    
    
<td><input type="submit" name="print_view" value="Προεπισκόπιση" style="width: 105px" onclick="javascript: window.open('printpreview2.php')" /></td>
  </tr>
    </table>
<?php } ?>


</td>
</tr>


<tr>
  <td colspan='4' class="footer"><font color='blue'><b>© <?php echo(Date("Y")); ?>  </b>  ΤΜΗΜΑ ΕΚΠ/ΚΩΝ ΘΕΜΑΤΩΝ - ΠΥΣΔΕ - ΚΕΠΛΗΝΕΤ Δ.Δ.Ε ΑΝΑΤ. ΑΤΤΙΚΗΣ<BR>
     </font> </td>
</tr>
</table>

</body>
</html> 
