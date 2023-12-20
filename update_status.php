<?php
require_once "dbase.php";

// Update the status to "Informed"
$referenceID = $_GET['Reference_ID'];
$updateStatusSQL = "UPDATE registration SET Status='Informed' WHERE Reference_ID='$referenceID'";
$con->query($updateStatusSQL);

// Close the database connection
$con->close();

// Redirect to authorities_informed.php
header("Location: inform authorities.php");
exit();
?>


