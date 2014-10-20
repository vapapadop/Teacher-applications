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
  <title>ΑΙΤΗΣΕΙΣ ΕΚΠΑΙΔΕΥΤΙΚΩΝ - ΟΔΗΓΙΕΣ</title>

  
  <link type="text/css" rel="stylesheet" href="../../global/admin_styles.css">
  

</head>

<body>




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

  <div class='nav_link'><a href='../../Admin/Teachers/main.php' >Αρχική Σελίδα</a></div><div class='nav_link_selected'>Οδηγίες</div><div class='nav_link'><a href='../../Admin/Teachers/logout.php'>Έξοδος</a></div>
  </td>
  <td class="main_content"> 

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="100%">
    	<div style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1">
      <p class="MsoNormal" align="center"><span lang="EN-US">&nbsp;</span><span lang="el"><font size="6" color="#0000FF">ΟΔΗΓΙΕΣ 
      ΧΡΗΣΗΣ ΕΦΑΡΜΟΓΗΣ</font></span></div>
      
    <p align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%">
      <p align="center"><u><span lang="el"><font size="6">ΑΡΧΙΚΗ ΣΕΛΙΔΑ</font></span></u><p align="center">&nbsp;
    <p align="center">
    <img border="0" src="p2.JPG" width="650" height="553"></td>
  </tr>
  <tr>
    <td width="100%">
    <p align="center">&nbsp;</p>
    <p align="center"><u><span lang="el"><font size="6">ΕΠΕΞΕΡΓΑΣΙΑ ΚΑΙ ΥΠΟΒΟΛΗ 
    ΤΗΣ ΑΙΤΗΣΗΣ</font></span></u></p>
    <p align="center">
    <img border="0" src="p3.JPG" width="806" height="688"></td>
  </tr>
  <tr>
    <td width="100%">
    <p align="center">&nbsp;</p>
    <p align="center"><u><span lang="el"><font size="6">ΕΚΤΥΠΩΣΗ ΤΗΣ ΑΙΤΗΣΗΣ</font></span></u></p>
    <p align="center">
    <img border="0" src="p4.JPG" width="553" height="635"></td>
  </tr>
  <tr>
    <td width="100%">
    <p align="center">&nbsp;</p>
    <p align="center"><u><span lang="el"><font size="6">ΕΠΙΣΤΡΟΦΗ ΣΤΗΝ ΚΕΝΤΡΙΚΗ 
    ΣΕΛΙΔΑ-ΕΞΟΔΟΣ</font></span></u></p>
    <p align="center">
    <img border="0" src="p5.JPG" width="675" height="690"></td>
  </tr>
</table>


     



</td>
</tr>


<tr>
  <td colspan='4' class="footer"><font color='blue'><b>© <?php echo(Date("Y")); ?>  </b>  ΤΜΗΜΑ ΕΚΠ/ΚΩΝ ΘΕΜΑΤΩΝ - ΠΥΣΔΕ - ΚΕΠΛΗΝΕΤ Δ.Δ.Ε ΑΝΑΤ. ΑΤΤΙΚΗΣ<BR>
      </font> </td>
</tr>
</table>

</body>
</html> 
