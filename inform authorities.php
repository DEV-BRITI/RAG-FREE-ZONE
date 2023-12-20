<?php
session_start();
require_once "dbase.php";
$userprofile = isset($_SESSION["email"]) ? $_SESSION["email"] : null;
if(!$userprofile){
  header("location:admin_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFORM AUTHORITIES</title>
    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

     <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/style_dash.css">
    <link rel="stylesheet" href="complaints.css">
    

    <!--CSS-->
    <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    
    <style>
        .footer {
            background-color: #f8f9fa; /* Set your desired background color */
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>

</head>
<body>
    <nav class="navbar">
        <div class="content">
            <!--Header-->
            <div class="logo">
                <!-- <img src="/images/logo.png" alt=""> -->
                <button class="button" data-text="Awesome">
                    <span class="actual-text">&nbsp;rag&nbsp;free&nbsp;zone&nbsp;</span>
                    <span aria-hidden="true" class="hover-text"
                    >&nbsp;rag&nbsp;free&nbsp;zone&nbsp;</span>
                </button>
            </div>
            <ul class="menu-list">
              <li>
                  <a href="admin_index.php">
                      <span class="material-icons-outlined">home</span> Home
                  </a>
              </li>
              <li>
                  <a href="admin dashboard.php">
                      <span class="material-icons-outlined">dashboard</span> Dashboard
                  </a>
              </li>
              <li class="services">
                  <a href="#">
                      <span class="material-icons-outlined">admin_panel_settings</span> Complaints
                      <i class="fas fa-chevron-down"></i>
                  </a>
                  <div class="dropdown-content">
                      <a href="registered complaints.php">
                          <span class="material-icons-outlined">back_hand</span> Registered Complaints
                      </a>
                      <a href="authorities informed.php">
                          <span class="material-icons-outlined">assignment_turned_in</span> Authorities Informed
                      </a>
                      <a href="rejected complaints.php">
                        <span class="material-icons-outlined">thumb_down_alt</span> Rejected Complaints
                        </a>
                  </div>
              </li>
              <li>
                  <a href="inform authorities.php">
                    <font style="color: #ffd000;"><span class="material-icons-outlined">contact_emergency</span> Inform Authorities</font>
                  </a>
              </li>
              <li>
                  <a href="admin reports.php">
                      <span class="material-icons-outlined">assessment</span> Reports
                  </a>
              </li>
              <li>
                  <a href="logout.php">
                      <span class="material-icons-outlined">logout</span> Logout
                  </a>
              </li>
          </ul>
            <div class="icon menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
    <h2>Inform Authorities</h2>
        <?php
    require_once "dbase.php";

    // Fetch data from the database
    $sql = "SELECT * FROM registration where Status='Uninformed'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Output data in a table
        echo "<table border='1'>
                <tr>
                    <th>Reference ID</th>
                    <th>Student's Name</th>
                    <th>Student's Mobile No.</th>
                    <th>Student's Email</th>
                    <th>Other Details</th>
                    <th>Status</th>
                    <th>Report</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Reference_ID']}</td>
                    <td>{$row['Student_Name']}</td> 
                    <td>{$row['Student_Mobile_No']}</td>
                    <td>{$row['Student_Email']}</td>
                    <td><center><button class='btn btn-success' onclick='toggleDetails(this)'>View</button></center></td>
                    <td>{$row['Status']}</td>";

            // Additional hidden row for details
            echo '<td>
                        <a href="pdf_maker.php?Reference_ID=' . $row['Reference_ID'] . '&ACTION=VIEW" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> View PDF</a> &nbsp;&nbsp; 
                        <a href="pdf_maker.php?Reference_ID=' . $row['Reference_ID'] . '&ACTION=DOWNLOAD" class="btn btn-warning"><i class="fa fa-download"></i> Download PDF</a> &nbsp;&nbsp; 
                        <a href="update_status.php?Reference_ID=' . $row['Reference_ID'] . '" class="btn btn-info"><i class="fa fa-envelope"></i> Email PDF</a> &nbsp;&nbsp;
                        <a href="rejected_status.php?Reference_ID=' . $row['Reference_ID'] . '" class="btn btn-danger"><i class="fa fa-times"></i> Reject</a>

                    </td>';


            echo "</tr>";

            echo "<tr class='hidden-details'>
                    <td colspan='6'>
                        <strong><h3>Other Details:</h3></strong><br>
                        Reporter's Name: {$row['Your_Name']}<br>
                        Reporter's Mobile No.: {$row['Your_Mobile_No']}<br>
                        Reporter's Email: {$row['Your_Email']}<br>
                        Relation: {$row['Relation']}<br>
                        Guardian's Name:: {$row['Guardian_Name']}<br>
                        Guardian's Mobile No: {$row['Guardian_Mobile_No']}<br>
                        Gender: {$row['Gender']}<br>
                        College Name: {$row['College_Name']}<br>
                        College Code: {$row['College_Code']}<br>
                        Branch: {$row['Branch']}<br>
                        Semester: {$row['Semester']}<br>
                        Student's Address: {$row['Student_Address']}<br>
                        Identity Proof: {$row['Identity_Proof']}<br>
                        Complaint Category: {$row['Complaint_Category']}<br>
                        Any Evidence: {$row['Any_Evidence']}<br>
                        Date of Incident: {$row['Date_of_Incident']}<br>
                        Time of Incident: {$row['Time_of_Incident']}<br>
                        Incident Details: {$row['Incident_Details']}<br>
                        Reference ID: {$row['Reference_ID']}<br>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<h3 style='text-align: center; margin-top: 150px;'>No complaints found</h3>";
    }

    // Close the database connection
    $con->close();
?>
        <!--Footer-->
        <div class="footer">
            <div class="footer-bottom">Copyright &copy; Rag Free Zone 2023.</div>
        </div>        
                  
        <!--End Footer-->

  <script>
    function sendMail(referenceID) {
        // Send AJAX request to update the "Status" column
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page or update the UI as needed
                alert(xhr.responseText);
                location.reload(); // You can replace this with your own logic
            }
        };

        // Send the request with the referenceID as data
        xhr.send("referenceID=" + referenceID);

        // Redirect to authorities_informed.php with the necessary parameters
        window.location.href = "authorities_informed.php?referenceID=" + referenceID;
    }
        
        function toggleDetails(button) {
            // Find the closest row to the button
            var row = button.closest('tr');

            // Find the next row which contains hidden details
            var hiddenDetailsRow = row.nextElementSibling;

            // Toggle the display of the hidden details row
            hiddenDetailsRow.classList.toggle('hidden-details');
        }
        function rejectComplaint(referenceID) {
        // Send AJAX request to update the "Status" column to "rejected"
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "rejected_status.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page or update the UI as needed
                alert(xhr.responseText);
                location.reload(); // You can replace this with your own logic
            }
        };

        // Send the request with the referenceID and status as data
        xhr.send("referenceID=" + referenceID + "&status=rejected");

        // Redirect to rejected_complaints.php with the necessary parameters
        window.location.href = "rejected_complaints.php?referenceID=" + referenceID;
    }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            var disclaimer = document.querySelector("img[alt='www.000webhost.com']"); 
            if(disclaimer){ 
                disclaimer.remove(); 
            }
        });
    </script>
    </body>
</html>

