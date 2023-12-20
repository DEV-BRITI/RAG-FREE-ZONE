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
    <title>REGISTERED COMPLAINTS</title>
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
            position: flex;
            bottom: 0;
            width: 100%;
            margin-top: 65px;
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
                  <font style="color: #ffd000;"><span class="material-icons-outlined">admin_panel_settings</span> Complaints</font>
                  <font style="color: #ffd000;"><i class="fas fa-chevron-down"></i></font>
                  </a>
                  <div class="dropdown-content">
                      <a href="registered complaints.php">
                      <font style="color: #ffd000;"><span class="material-icons-outlined">back_hand</span> Registered Complaints</font>
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
                    <span class="material-icons-outlined">contact_emergency</span> Inform Authorities
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
    <h2>Registered Complaints</h2>

    <?php
    require_once "dbase.php";

    // Fetch data from the database
    $sql = "SELECT * FROM registration";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Output data in a table
        echo "<table border='1'>
                <tr>
                    <th>Reporter's Name</th>
                    <th>Reporter's Mobile No.</th>
                    <th>Reporter's Email</th>
                    <th>Relation</th>
                    <th>Student's Name</th>
                    <th>Student's Mobile No.</th>
                    <th>Guardian's Name</th>
                    <th>Guardian's Mobile No</th>
                    <th>Student's Email</th>
                    <th>Other Details</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Your_Name']}</td>
                    <td>{$row['Your_Mobile_No']}</td>
                    <td>{$row['Your_Email']}</td>
                    <td>{$row['Relation']}</td>
                    <td>{$row['Student_Name']}</td>
                    <td>{$row['Student_Mobile_No']}</td>
                    <td>{$row['Guardian_Name']}</td>
                    <td>{$row['Guardian_Mobile_No']}</td>
                    <td>{$row['Student_Email']}</td>
                    <td><button style='cursor: pointer'><span class='view-button' onclick='toggleDetails(this)'>View</span></button></td>                    
                </tr>";

                  // Additional hidden row for details
            echo "<tr class='hidden-details'>
            <td colspan='5'>
                <strong><h3>Other Details:</h3></strong><br>
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
      echo "No complaints registered.";
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
        function toggleDetails(button) {
            // Find the closest row to the button
            var row = button.closest('tr');

            // Find the next row which contains hidden details
            var hiddenDetailsRow = row.nextElementSibling;

            // Toggle the display of the hidden details row
            hiddenDetailsRow.classList.toggle('hidden-details');
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
