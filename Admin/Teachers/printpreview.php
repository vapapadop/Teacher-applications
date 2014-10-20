<?php 
session_start(); 	

if (!isset($_SESSION['authenticatedUser'])){
  header("Location: ../../login2.php"); 
  exit; 
}
include '../../Includes/Logindb2.inc'; 

$tid=$_SESSION['teacher_id'];
$connection=LoginToDB2();
 $_SESSION['submited']=1;
?>  

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ΑΙΤΗΣΕΙΣ ΕΚΠΑΙΔΕΥΤΙΚΩΝ - ΕΚΤΥΠΩΣΗ</title>

 
  <link type="text/css" rel="stylesheet" href="../../global/admin_styles.css" />



<style type="text/css" media="print">
.no_print { display: none; }
</style>

</head>
<body style="padding: 10px">


<?php
 

$QueryStr="SELECT submission_id,name,AMM,AFM,klados,perioxi,subdate,epilogi1,epilogi2,epilogi3,epilogi4,epilogi5,epilogi6,epilogi7,epilogi8,epilogi9,epilogi10,epilogi11,epilogi12,epilogi13,epilogi14,epilogi15,epilogi16,epilogi17,epilogi18,epilogi19,epilogi20,organik,entopiot,synipiret,ADT,phone
                   FROM gt_form_2 WHERE teacher_id=".$tid."" ;   
         
	$result=QueryDB2($QueryStr,$connection); 
      

?>	

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr><td class='print_title' align="center" width="100"><img src="../../Images/ethno.gif" /> <br>ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>ΥΠ.Ε.Π.Θ<br>Διεύθυνση Δ.Ε. ΑΝ.ΑΤΤΙΚΗΣ <br>Π.Υ.Σ.Δ.Ε.<br>--------------</td><td class='print_title' align="center">Αίτηση <br> Τοποθέτησης</td></tr>
<tr>

  <td class='print_title' align="right"></td>
  <td width="250" align="right">
 
    <table cellpadding="0" cellspacing="0" class="no_print">
    <tr>    

      <!--td><input type="button" onclick="javascript: window.close()" value="Κλείσιμο"/></td-->
      <td><input type="button" onclick="javascript: window.location.replace('main.php')" value="Κλείσιμο"/></td>
      <td><input type="button" onclick="javascript: window.print()" value="Εκτύπωση"/></td>
    </tr>
    </table>
    
  </td>
</tr>
</table>

<br />




<?php
	while ($row=mysql_fetch_row($result)){

?>
<table class='print_table' cellpadding='2' cellspacing='0' width='100%'>
<tr><th class='print_th'>Αριθμός Καταχώρησης</th><td><b>
<?php echo $row[0] ?>--<?php echo $row[6] ?></b></td></tr>
<tr><th class='print_th'>Ονοματεπώνυμο</th><td>
<?php echo $row[1] ?></td></tr>
<tr><th class='print_th'>AMM</th><td>
<?php echo $row[2] ?></td></tr>
<tr><th class='print_th'>Α.Φ.Μ</th><td>
<?php echo $row[3] ?></td></tr>
<tr><th class='print_th'>Α.Δ.Τ</th><td>
<?php echo $row[30] ?></td></tr>
<tr><th class='print_th'>Κλάδος</th><td>
<?php echo $row[4] ?></td></tr>

<tr><th class='print_th'>Περιοχή μετάθεσης</th><td>
<?php echo $row[5] ?> ΑΝΑΤΟΛΙΚΗΣ ΑΤΤΙΚΗΣ</td></tr>
<tr><th class='print_th'>Οργανική Θέση</th><td>
<?php echo $row[27] ?></td></tr>
<tr><th class='print_th'>Τηλέφωνο</th><td>
<?php echo $row[31] ?></td></tr>
</table>

<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr><td class='print_title' align="center" width="60"></td><td class='print_title' align="left">Δήλωση Εντοπιότητας-Συνυπηρέτησης</td></tr>
<tr>
    </tr>
    </table>
<table class='print_table' cellpadding='2' cellspacing='0' width='100%'>

<tr><th class='print_th'>Εντοπιότητα</th><td>
<?php echo $row[28] ?></td></tr>
<tr><th class='print_th'>Συνυπηρέτηση</th><td>
<?php echo $row[29] ?></td></tr>

</table>

<br />


<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr><td class='print_title' align="center" width="60"></td><td class='print_title' align="left">Δήλωση Σχολείων κατα Σειρά Προτίμησης</td></tr>

    </table>
<table class='print_table' cellpadding='2' cellspacing='0' width='100%'>
<tr><th class='print_th' width="15%">Επιλογή 1</th><td width='35%'>
<?php echo $row[7] ?></td>
<th class='print_th' width='15%'>Επιλογή 11</th><td width='35%'>
<?php echo $row[17] ?></td>
</tr>
<tr><th class='print_th'>Επιλογή 2</th><td>
<?php echo $row[8] ?></td>
<th class='print_th'>Επιλογή 12</th><td>
<?php echo $row[18] ?></td>
</tr>
<tr><th class='print_th'>Επιλογή 3</th><td>
<?php echo $row[9] ?></td>
<th class='print_th'>Επιλογή 13</th><td>
<?php echo $row[19] ?></td>
</tr>
<tr><th class='print_th'>Επιλογή 4</th><td>
<?php echo $row[10] ?></td>
<th class='print_th'>Επιλογή 14</th><td>
<?php echo $row[20] ?></td>
</tr>
<tr border='1px'><th class='print_th'>Επιλογή 5</th><td border='1px'>
<?php echo $row[11] ?></td>
<th class='print_th'>Επιλογή 15</th><td>
<?php echo $row[21] ?></td>
</tr>
<tr><th class='print_th'>Επιλογή 6</th><td>
<?php echo $row[12] ?></td>
<th class='print_th'>Επιλογή 16</th><td>
<?php echo $row[22] ?></td>
</tr>
<tr><th class='print_th'>Επιλογή 7</th><td>
<?php echo $row[13] ?></td>
<th class='print_th'>Επιλογή 17</th><td>
<?php echo $row[23] ?></td>
</tr>
<tr><th class='print_th'>Επιλογή 8</th><td>
<?php echo $row[14] ?></td>
<th class='print_th'>Επιλογή 18</th><td>
<?php echo $row[24] ?></td>
</tr>
<tr><th class='print_th'>Επιλογή 9</th><td>
<?php echo $row[15] ?></td>
<th class='print_th'>Επιλογή 19</th><td>
<?php echo $row[25] ?></td>
</tr>
<tr><th class='print_th'>Επιλογή 10</th><td>
<?php echo $row[16] ?></td>
<th class='print_th'>Επιλογή 20</th><td>
<?php echo $row[26] ?></td>
</tr>
</table>



<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr><td class='print_title' align="center" width="60"></td><td class='print_title' align="left"></td><td class='print_title' align="right">ΓΕΡΑΚΑΣ   <?php echo $row[6] ?></td></tr>
</table>
<?php } ?>
</body>
</html> 
