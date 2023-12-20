<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORTS</title>
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
                        <font style="color: #ffd000;"><span class="material-icons-outlined">assessment</span> Reports</font>
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
            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">COMPLAINTS INFORMED vs PENDING TO INFORM</p>
                    <div id="area2-chart"></div>
                </div>
                <div class="charts-card">
                    <p class="chart-title">MONTHLY COMPLAINTS DATA</p>
                    <div id="bar-chart"></div>
                </div>
                <div class="charts-card">
                    <p class="chart-title">MONTHLY INFORMED COMPLAINTS & PENDING TO INFORM</p>
                    <div id="area-chart"></div>
                </div>
                <div class="charts-card">
                    <p class="chart-title">YEARLY COMPLAINTS DATA</p>
                    <div id="bar2-chart"></div>
                </div>
            </div>
        </main>
          
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