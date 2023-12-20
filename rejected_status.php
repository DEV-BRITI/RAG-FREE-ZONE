<?php
require_once "dbase.php";

$referenceID = $_GET['Reference_ID'];
$updateStatusSQL = "UPDATE registration SET Status='Rejected' WHERE Reference_ID='$referenceID'";
$con->query($updateStatusSQL);

// Close the database connection
$con->close();

// Redirect to authorities_informed.php
header("Location: inform authorities.php");
exit();
?>


