<?php

$hostName = "localhost";
$dbUser = "id21464682_ragfree_dat";
$dbPassword = "Ragfree@2023";
$dbName = "id21464682_rag_free_zone";
$con = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$con) {
    die("Something went wrong;");
}

?>