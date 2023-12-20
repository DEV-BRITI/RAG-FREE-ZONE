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
    <title>DASHBOARD</title>
    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

     <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/style_dash.css">

    <!--CSS-->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
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
                        <font style="color: #ffd000;"><span class="material-icons-outlined">dashboard</span> Dashboard</font>
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
        <!--End Header-->
    
        <!--Main-->
        <section class="main">
            <P><br><br><br></P>
        </section>
        <main class="main-container">
            <P><h1></h1></P>
            <div class="main-cards">
                <!-- 1st CARD -->
                <div class="card">
                    <div class="card-inner">
                        <p>TOTAL REGISTERED COMPLAINTS</p>
                        <div class="icon icon-shape background-blue text-primary">
                            <span class="material-icons-outlined">badge</span>
                        </div>
                    </div>
                    <?php
                    require_once "dbase.php";
                    $dash_tregcomplaint_query = "SELECT * from registration";
                    $dash_tregcomplaint_query_run = mysqli_query($con,$dash_tregcomplaint_query);

                    if($tregcomplaint_total = mysqli_num_rows($dash_tregcomplaint_query_run)){
                        echo '<span class="text-blue">'.$tregcomplaint_total.'</span>';
                    }
                    else{
                        echo '<span class="text-blue"> 0 </span>';
                    }
                    ?>
                </div>  
                <!-- 2nd CARD -->
                <div class="card">
                    <div class="card-inner">
                        <p>TODAY'S REGISTERED COMPLAINTS</p>
                        <div class="icon icon-shape background-orange text-primary">
                            <span class="material-icons-outlined">call</span>
                        </div>
                    </div>
                    <?php
                    require_once "dbase.php";
                    $dash_todayregcomplaint_query = "SELECT * from registration where DATE(Date) = CURDATE()";
                    $dash_todayregcomplaint_query_run = mysqli_query($con,$dash_todayregcomplaint_query);

                    if($todayregcomplaint_total = mysqli_num_rows($dash_todayregcomplaint_query_run)){
                        echo '<span class="text-blue">'.$todayregcomplaint_total.'</span>';
                    }
                    else{
                        echo '<span class="text-blue"> 0 </span>';
                    }
                    ?>
                </div>  
                <!-- 3rd CARD -->
                <div class="card">
                    <div class="card-inner">
                        <p>COMPLAINTS INFORMED</p>
                        <div class="icon icon-shape background-green text-primary">
                            <span class="material-icons-outlined">checklist</span>
                        </div>
                    </div>
                    <?php
                    require_once "dbase.php";
                    $dash_todayregcomplaint_query = "SELECT * from registration where Status='Informed'";
                    $dash_todayregcomplaint_query_run = mysqli_query($con,$dash_todayregcomplaint_query);

                    if($todayregcomplaint_total = mysqli_num_rows($dash_todayregcomplaint_query_run)){
                        echo '<span class="text-blue">'.$todayregcomplaint_total.'</span>';
                    }
                    else{
                        echo '<span class="text-blue"> 0 </span>';
                    }
                    ?>
                </div>
                <!-- 4th CARD -->
                <div class="card">
                    <div class="card-inner">
                        <p>PENDING TO INFORM</p>
                        <div class="icon icon-shape background-red text-primary">
                            <a href="">
                                <span class="material-icons-outlined">pending_actions</span>
                            </a>
                        </div>
                    </div>
                    <?php
                    require_once "dbase.php";
                    $dash_pendinginform_query = "SELECT * from registration where Status='Uninformed'";
                    $dash_pendinginform_query_run = mysqli_query($con,$dash_pendinginform_query);

                    if($pendinginform_total = mysqli_num_rows($dash_pendinginform_query_run)){
                        echo '<span class="text-blue">'.$pendinginform_total.'</span>';
                    }
                    else{
                        echo '<span class="text-blue"> 0 </span>';
                    }
                    ?>
                </div>
                <!-- 5th CARD -->
                <div class="card">
                    <div class="card-inner">
                        <p>SELF REGISTERED COMPLAINTS</p>
                        <div class="icon icon-shape background-purple text-primary">
                            <a href="">
                                <span class="material-icons-outlined">person_pin</span>
                            </a>
                        </div>
                    </div>
                    <?php
                    require_once "dbase.php";
                    $dash_selfregcomplaint_query = "SELECT * from registration where Your_Name='' and Your_Mobile_No='' and Your_Email='' and Relation=''";
                    $dash_selfregcomplaint_query_run = mysqli_query($con,$dash_selfregcomplaint_query);

                    if($selfregcomplaint_total = mysqli_num_rows($dash_selfregcomplaint_query_run)){
                        echo '<span class="text-blue">'.$selfregcomplaint_total.'</span>';
                    }
                    else{
                        echo '<span class="text-blue"> 0 </span>';
                    }
                    ?>
                </div>
                <!-- 6th CARD -->
                <div class="card">
                    <div class="card-inner">
                        <p>COMPLAINTS REGISTERED BY OTHERS</p>
                        <div class="icon icon-shape background-green2 text-primary">
                            <a href="">
                            <span class="material-icons-outlined">groups_3</span>
                            </a>
                        </div>
                    </div>
                    <?php
                    require_once "dbase.php";
                    $dash_otherregcomplaint_query = "SELECT * from registration where COALESCE(Your_Name, '') <> '' or COALESCE(Your_Mobile_No, '') <> '' or COALESCE(Your_Email, '') <> '' or COALESCE(Relation, '') <> '' ";
                    $dash_otherregcomplaint_query_run = mysqli_query($con,$dash_otherregcomplaint_query);

                    if($otherregcomplaint_total = mysqli_num_rows($dash_otherregcomplaint_query_run)){
                        echo '<span class="text-blue">'.$otherregcomplaint_total.'</span>';
                    }
                    else{
                        echo '<span class="text-blue"> 0 </span>';
                    }
                    ?>
                </div>
                <!-- 7th CARD -->
                <div class="card">
                    <div class="card-inner">
                        <p>AUTHORIZED COMPLAINTS</p>
                        <div class="icon icon-shape background-yellow text-primary">
                            <a href="">
                                <span class="material-icons-outlined">library_books</span>
                            </a>
                        </div>
                    </div>
                    <?php
                    require_once "dbase.php";
                    $dash_tregcomplaint_query = "SELECT * from registration where Status IN('Informed','Uninformed')";
                    $dash_tregcomplaint_query_run = mysqli_query($con,$dash_tregcomplaint_query);

                    if($tregcomplaint_total = mysqli_num_rows($dash_tregcomplaint_query_run)){
                        echo '<span class="text-blue">'.$tregcomplaint_total.'</span>';
                    }
                    else{
                        echo '<span class="text-blue"> 0 </span>';
                    }
                    ?>
                </div>
                <!-- 8th CARD -->
                <div class="card">
                    <div class="card-inner">
                        <p>REJECTED COMPLAINTS</p>
                        <div class="icon icon-shape background-ash text-primary">
                            <a href="">
                                <span class="material-icons-outlined">thumb_down_alt</span>
                            </a>
                        </div>
                    </div>
                    <?php
                    require_once "dbase.php";
                    $dash_rejectcomplaint_query = "SELECT * from registration where Status IN('Rejected')";
                    $dash_rejectcomplaint_query_run = mysqli_query($con,$dash_rejectcomplaint_query);

                    if($rejectcomplaint_total = mysqli_num_rows($dash_rejectcomplaint_query_run)){
                        echo '<span class="text-blue">'.$rejectcomplaint_total.'</span>';
                    }
                    else{
                        echo '<span class="text-blue"> 0 </span>';
                    }
                    ?>
                </div>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">MONTHLY COMPLAINTS DATA</p>
                    <div id="bar-chart"></div>
                </div>
                <div class="charts-card">
                    <p class="chart-title">INFORMED COMPLAINTS & PENDING TO INFORM</p>
                    <div id="area-chart"></div>
                </div>
        </main>
        </main>
        <!--End Main-->
          
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
        <script src="js/charts1.js"></script>
        <script src="js/index.js"></script>
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