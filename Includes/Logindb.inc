<?php
//global $connection;
//=======================
//Connecting to db
//=======================
function LoginToDB()
{
$hostname='userdb';
$username='didantte';
$password='u3tqto3q';
$databaseName='didantte-db1';

$connection = @mysql_connect($hostname,$username,$password)
or die("Αδυναμία Σύνδεσης Στη Βάση Δεδομένων του Σχολικού Δικτύου.H Ιστοσελίδα είναι προσωρινά μη Διαθέσιμη. Δοκιμάστε πάλι Αργότερα..");
@mysql_select_db($databaseName, $connection)
or die ("couldn't find database '$databaseName'.");
@mysql_query("SET NAMES 'utf8'", $connection);
return $connection;
}

//=======================
//Closing connection
//=======================
function LogoutFromDB()
{
mysql_close();
}

//=======================
//Query the DataBase
//=======================
function QueryDB($Query,$connection)
{
$result = @mysql_query($Query,$connection);
return $result;
}

//==================================
//Free buffer from query results
//==================================
function FreeBuffer($result)
{
mysql_free_result($result);
return result;
}


?>
