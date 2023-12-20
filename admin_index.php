<?php
session_start();
require_once "dbase.php";
$userprofile = isset($_SESSION["email"]) ? $_SESSION["email"] : null;
if(!$userprofile){
  header("location:admin_login.php");
}
?>
<?php
require_once "dbase.php";

// Initialize status variable
$status = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the input
    $complaint_id = mysqli_real_escape_string($con, $_POST["complaint-id"]);

    // Query to fetch the status from the database
    $query = "SELECT Status FROM registration WHERE Reference_ID = '$complaint_id'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        // Get the status
        $row = $result->fetch_assoc();
        $status = $row["Status"];
    } else {
        $status = "Complaint not found";
    }
}
// Close the connection
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

     <!--CUSTOM CSS-->
    <link rel="stylesheet" href="style_dash.css">

    <!--CSS-->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                        <font style="color: #ffd000;"><span class="material-icons-outlined">home</span> Home</font>
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
    
        <!--Main-->
        <section class="main">
          <br><P><br><br><br><h3 style="color: #000000;">Welcome,</h3><h3 style="color: #ffd000;">ADMIN</h3></P>
        </section>
        <section class="main">
          <p>
          Ragging is a disturbing reality in the higher education system of our country. Despite the fact that over the years ragging has claimed hundreds of innocent lives and has ruined careers of thousands of bright students, the practice is still perceived by many as a way of 'familiarization' and an 'initiation into the real world' for young college-going students.
          </p><br>
          <p>
          RAG-FREE-ZONE is a dedicated platform designed to create a safe and respectful learning environment in educational institutions. Our mission is to eradicate ragging and promote a culture of mutual respect among students.
          </p>
          <br>
          <p>
          This Portal works on the basis of anti-ragging awareness and to secure the students through its user friendly interface.
          <br>This Portal will be dealing with the commonly found behavioural patterns with ragging in the light of some recent cases and their consequences. The purpose of this Portal is to understand the problem and perspective of Ragging in Universities/Colleges, legal approaches for prevention.
          </p><p> </p>
        </section>
        <center><img src="images/Raggimg1.jpg" height="500" width="1520"></center>
        <!--End Main-->

        <section id="check-complaint">
          <div class="content">
            <div class="check-complaint-content">
              <div class="check-complaint-form">
                <h2>Check Complaint Status</h2>
                <form id="check-status-form" action="admin_index.php" method="post">
                  <label for="complaint-id">Complaint ID:</label>
                  <input
                      type="text"
                      id="complaint-id"
                      name="complaint-id"
                      placeholder="Enter your complaint ID"
                      required
                  />
                  <button type="submit" class="button">Check Status</button>
                </form>                      
              </div>
              <div class="check-complaint-image">
                <img
                  src="https://www.antiragging.in/assets/img/index/complaint-status.png"
                  alt="Complaint Status Image"
                />
              </div>
            </div>
          </div>
        </section>
          
        <!--Footer-->
        <div class="footer">
                 
            <div class="footer-bottom">Copyright &copy; Rag Free Zone 2023.</div>
        </div>        
                
            
        <!--End Footer-->

        <!--ApexCharts-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.41.0/apexcharts.min.js"></script>
        
        <!--CHARTS.JS-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.3/dist/chart.umd.min.js"></script>

        <!--CUSTOM JS-->    
        <script src="js/charts.js"></script>
        <script src="js/index.js"></script>
        <script>
          // JavaScript code to display the status in an alert
          document.addEventListener("DOMContentLoaded", function () {
            // Retrieve the status from PHP variable
            var status = "<?php echo $status; ?>";
        
            // Display the status in an alert
            if (status !== "") {
              swal({
                title: "Complaint Status",
                text: status,
                icon: "info",
              });
            }
          });
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