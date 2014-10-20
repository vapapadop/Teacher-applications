
<?php

 session_start();
  if (!isset($_SESSION["loginMessage"])) 
		$_SESSION["loginMessage"]="";
		
	if (!isset($_SESSION["passmessage"])) 
		$_SESSION["passmessage"]="";	
		
	if (!isset($_SESSION["passwd"])) 
		$_SESSION["passwd"]="";	
		
			
		
		
		
?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ΑΙΤΗΣΕΙΣ ΕΚΠΑΙΔΕΥΤΙΚΩΝ - ΑΠΟΚΤΗΣΗ ΚΩΔΙΚΟΥ ΠΡΟΣΒΑΣΗΣ</title>

<link type="text/css" rel="stylesheet" href="../../global/admin_styles.css">

<LINK href="scriptakia/WebEsepStyles.css" type=text/css rel=stylesheet>
<LINK href="scriptakia/GridStyles.css" type=text/css rel=stylesheet>
<SCRIPT src="scriptakia/main.js" type=text/javascript></SCRIPT>
<SCRIPT src="scriptakia/dataGrid.js" type=text/javascript></SCRIPT>
</head>
<body >

<table width='100%' height="100%" border='0' cellpadding='0' cellspacing='0'>
<tr>
  <td width='200' height="60" valign='center' align='center'><img src="../../Images/logo_1.gif" /></td>
  <td class="top_banner" valign='center' align='center' ><b> ΔΙΕΥΘΥΝΣΗ ΔΕΥΤΕΡΟΒΑΘΜΙΑΣ ΕΚΠΑΙΔΕΥΣΗΣ ΑΝΑΤ. ΑΤΤΙΚΗΣ</b></td>

</tr>
<tr>
  <td class="top_row_left" height='18'>&nbsp;</td>
  <td class="top_row_right">&nbsp;</td>
</tr>
<tr>
  <td class="left_column">
  	<div class='nav_link'><a href='../../login.php' >Είσοδος στο Σύστημα</a></div><div class='nav_link_selected'>Εγγραφή-Απόκτηση <br>Κωδικού Πρόσβασης</div><div class='nav_link'><a href='../../Admin/Teachers/anaktisi.php'>Ανάκτηση Κωδικού Πρόσβασης</a></div>
  	&nbsp;</td>
  <td bgcolor="white" valign="top" style="padding: 20px;">

  <table>
  <tr>

    <td>

    <p class="title">ΑΙΤΗΣΕΙΣ ΕΚΠΑΙΔΕΥΤΙΚΩΝ -  ΑΠΟΚΤΗΣΗ ΚΩΔΙΚΟΥ ΠΡΟΣΒΑΣΗΣ</p>

    <p class="common_width">
      <b>Παρακαλούμε εισάγετε τα στοιχεία που ζητούνται στον παρακάτω πίνακα για να αποκτήσετε Κωδικό πρόσβασης (password).</b>
     
    </p>


<FORM name=frmUserRegistration action=../../Scripts/WebPages/Admin/registration.php 
            method=post>
            <TABLE class=Table width="80%" align=center>
              <TBODY>
              <TR>
                <TD class=tableHeaderHigh align=middle colSpan=2>
                  Εισαγωγή Στοιχείων Εκπαιδευτικού Για Απόκτηση Κωδικού Πρόσβασης 
</TD></TR>
              <TR>
                <TD colSpan=2>&nbsp;</TD></TR>
              <TR>
                <TH class=MessageTitle align=left colSpan=2> 
                   Στοιχεία Ταυτοποίησης    (* Όλα τα πεδία είναι υποχρεωτικά *) </TH></TR>
              
              <TR>
                <TD class=TableCell id=AMM align=right>*Αριθμός Μητρώου Εκπαιδευτικού (AMM) : </TD>
                <TD class=TableCell3 align=left><INPUT class=normalInput 
                  id=null maxLength=6 onchange=validateAM(this) size=10 
                  name=AMM required="1" onkeypress='return onKeyValidate(event,/[0-9]/,"Επιτρέπονται μόνο αριθμοί!",false);'> *(6-ψηφία) </TD></TR>
              <TR>
              
              
              <TR>
                <TD class=TableCell id=afm align=right>*Αριθμός Φορολογικού Μητρώου(ΑΦΜ) : </TD>
                <TD class=TableCell3 align=left><INPUT class=normalInput 
                  id=null maxLength=9 onchange=validateAFM(this) size=10 
                  name=afm required="1" onkeypress='return onKeyValidate(event,/[0-9]/,"Επιτρέπονται μόνο αριθμοί!",false);'> *(9-ψηφία) </TD></TR>
              <TR>
              <TR>
                <TD class=TableCell id=idNumber align=right>*Αριθμός Δελτίου Ταυτότητας: </TD>
                <TD class=TableCell3 align=left><INPUT class=normalInput 
                  id=null maxLength=8 onchange=validateId(this,1) size=10 
                  name=idNumber required="1"> *(π.χ: Π345219) </TD></TR>
              <TR>
              
              
                <TD class=TableCell id=telnr align=right> *Τηλέφωνο(Σταθερό ή Κινητό): </TD>
                <TD class=TableCell3 align=left><INPUT class=normalInput 
                  id=null maxLength=10 onchange=validateTelnr(this) size=10 
                  name=telnr required="1" onkeypress='return onKeyValidate(event,/[0-9]/,"Επιτρέπονται μόνο αριθμοί!",false);'> *(10-ψηφία)</TD></TR>
              
              <TR><TD class=TableCell3 colSpan=2></TD>
              </TR>
              
              <TR>
                <TD class=tableHeaderHigh colSpan=2 align=center> <span style='color: red'><b><?php ECHO $_SESSION["loginMessage"]; ?></b></span> </TD>
              </TR>
              <TR>
                <TD class=tableHeaderHigh colSpan=2 align=center><b> <?php ECHO $_SESSION["passmessage"]; ?></b> <span style='color: red'><b><?php ECHO $_SESSION["passwd"]; ?></b> </span></TD>
              </TR>
              
              
              
              
              
              
              <TR>      
              <TD colSpan=2 height=1></TD></TR></TBODY></TABLE>
            <TABLE width="80%" align=center>
              <TBODY>
              <TR>
                <TD colSpan=2>&nbsp;</TD></TR>
              <TR>
                <TD align=middle colSpan=2><INPUT  class=button onclick="document.location='../../login.php'" type=button value="Επιστροφή στην Είσοδο" name=btnReturn > 
                </TD>
                <TD align=middle colSpan=2><INPUT class=button onclick="if(validateAFM(afm) &amp;&amp; validateId(idNumber,1) &amp;&amp; CheckRequiredFieldsAndCombos( frmUserRegistration,'Πρέπει να συμπληρώσετε όλα τα πεδία')){frmUserRegistration.act.value='proceed';frmUserRegistration.submit()}" type=button value="Απόκτηση κωδικού" name=btnNext> 
                </TD></TR></TBODY></TABLE>
                
                <INPUT class=normalInput id=null type=hidden name=act> 
                <INPUT class=normalInput id=null type=hidden value=1 name=sbt> 
                <INPUT class=normalInput id=null type=hidden value=0 name=sm_type>
                 
            </FORM>

<?php
//session_start();
$_SESSION["loginMessage"]="";
$_SESSION["passmessage"]="";
$_SESSION["passwd"]=""; 

?>


    

  </td></tr>

  </table>

  <noscript>

    <br />
    <div class="error" style="margin:3px;">
      Για να χρησιμοποιήσετε την εφαρμογή, πρέπει να ενεργοποιήσετε τη javascript στο φυλλομετρητή σας. 
      Παρακαλούμε ενεργοποιήστε την τώρα και πατήστε το κουμπί ανανέωση στον φυλλομετρητή.
    </div>

  </noscript>
</td>
</tr>
<tr>
  <td colspan='4' class="footer"><font color='blue'><b>© <?php echo(Date("Y")); ?>  </b>  ΤΜΗΜΑ ΕΚΠ/ΚΩΝ ΘΕΜΑΤΩΝ - ΠΥΣΔΕ - ΚΕΠΛΗΝΕΤ Δ.Δ.Ε ΑΝΑΤ. ΑΤΤΙΚΗΣ<BR>
      </font> </td>
</tr>
</table>

</body>

</html>
 
