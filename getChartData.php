<?php
include 'dbase.php';

$sql = "
    SELECT
        COUNT(*) AS totalRegisteredComplaints,
        SUM(CASE WHEN Status = 'Informed' THEN 1 ELSE 0 END) AS informedComplaints,
        SUM(CASE WHEN Status = 'Rejected' THEN 1 ELSE 0 END) AS rejectedComplaints,
        SUM(CASE WHEN Status = 'Uninformed' THEN 1 ELSE 0 END) AS pendingToInform
    FROM
    registration
";

$result = $con->query($sql);

$data = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data[] = $row;
}

echo json_encode($data);

$con->close();
?>

