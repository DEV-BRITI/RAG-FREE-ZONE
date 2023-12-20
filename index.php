<?php
$servername = "localhost";
$username = "id21464682_ragfree_dat";
$password = "Ragfree@2023";
$dbname = "id21464682_rag_free_zone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize status variable
$status = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the input
    $complaint_id = mysqli_real_escape_string($conn, $_POST["complaint-id"]);

    // Query to fetch the status from the database
    $query = "SELECT Status FROM registration WHERE Reference_ID = '$complaint_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Get the status
        $row = $result->fetch_assoc();
        $status = $row["Status"];
    } else {
        $status = "Complaint not found";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RAG-FREE-ZONE | Anti-Ragging Portal</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <nav class="navbar">
      <div class="content">
        <div class="logo">
          <button class="button" data-text="Awesome">
            <span class="actual-text">&nbsp;rag&nbsp;free&nbsp;zone&nbsp;</span>
            <span aria-hidden="true" class="hover-text"
              >&nbsp;rag&nbsp;free&nbsp;zone&nbsp;</span
            >
          </button>
        </div>
        <ul class="menu-list">
          <div class="icon cancel-btn">
            <i class="fas fa-times"></i>
          </div>
          <li>
            <a
              href="https://www.ugc.gov.in/page/Ragging-Related-Circulars.aspx"
              target="_blank"
              >Ragging Related Circulars</a
            >
          </li>
          <li><a href="#about">About</a></li>
          <li class="services">
            <a href="#">Services<i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-content">
              <a href="register.php">Raise Complaint</a>
              <a href="#check-complaint">Check Complaint Status</a>
            </div>
          </li>
          <li><a href="video.html">Videos</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="register.php">Raise Complaint</a></li>
        </ul>
        <div class="icon menu-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>

    <div class="preloader">
      <div class="preloader-text">Rag Free Zone</div>
      <div class="loading-squares">
        <div class="loading-square"></div>
        <div class="loading-square"></div>
        <div class="loading-square"></div>
      </div>
    </div>

    <div class="banner">
      <div class="banner-content">
        <h1>Welcome to <br />RAG-FREE-ZONE</h1>
        <p>Your Anti-Ragging Solution</p>
        <p>Empowering Students, Creating Safe Spaces</p>
        <p>Report Incidents Anonymously</p>
        <p>Together, We Stand Against Ragging</p>
        <a href="#about" class="button">Learn More</a>
      </div>
    </div>

    <section class="about" id="about">
      <div class="content">
        <div class="title">ABOUT US</div>
        <p>
          RAG-FREE-ZONE is a dedicated platform designed to create a safe and
          respectful learning environment in educational institutions. Our
          mission is to eradicate ragging and promote a culture of mutual
          respect among students.
        </p>
        <p>
          We empower students to report incidents of ragging without fear of
          retaliation. Our platform provides educational institutions and
          administrators with the necessary tools to take prompt action against
          ragging.
        </p>
        <p>
          At RAG-FREE-ZONE, we believe in the power of collective action. Every
          report, every complaint, and every voice raised against ragging is a
          step towards a brighter, safer future. We stand united with students,
          faculty, and administrators who share our vision of a ragging-free
          world.
        </p>
        <p>
          RAG-FREE-ZONE utilizes a combination of technologies to build a robust
          reporting and prevention system. We are committed to ensuring that
          educational institutions remain spaces for personal growth and
          learning.
        </p>
        <p>
          Future enhancements may include features like SMS notifications, a mobile app version, and improved data visualization
          for trend analysis.
        </p>
      </div>
    </section>

    <section id="check-complaint">
      <div class="content">
        <div class="check-complaint-content">
          <div class="check-complaint-form">
            <h2>Check Complaint Status</h2>
            <form id="check-status-form" action="index.php" method="post">
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
              src="https://antiragging.in/assets/img/index/complaint-status.png"
              alt="Complaint Status Image"
            />
          </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="content">
        <h2>Contact Us</h2>
        <form id="contact-form">
          <div class="form-group">
            <label for="name">Name:</label>
            <input
              type="text"
              id="name"
              name="name"
              placeholder="Your Name"
              autocomplete="off"
              required
            />
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Your Email"
              autocomplete="off"
              required
            />
          </div>
          <div class="form-group">
            <label for="subject">Subject:</label>
            <input
              type="text"
              id="subject"
              name="subject"
              placeholder="Your Subject"
              required
            />
          </div>
          <div class="form-group">
            <label for="message">Message:</label>
            <textarea
              id="message"
              name="message"
              placeholder="Your Message"
              rows="4"
              required
            ></textarea>
          </div>
          <button type="button" class="button" id="submit-button">
            Send Message
          </button>
        </form>
      </div>
    </section>

    <div class="footer">
      <div class="inner-footer">
        <div class="footer-items">
          <h1>Rag Free Zone</h1>
          <p>Your Anti-Ragging Solution</p>
        </div>

        <div class="footer-items">
          <h3>Quick Links</h3>
          <div class="border1"></div>
          <ul>
            <a href="index.php"><li>Home</li></a>
            <a href="index.php#contact"><li>Contact</li></a>
            <a href="index.php#about"><li>About</li></a>
            <a href="admin_login.php"><li>Admin Login</li></a>
          </ul>
        </div>

        <div class="footer-items">
          <h3>Sitemap</h3>
          <div class="border1"></div>
          <ul>
            <a href="https://www.ugc.gov.in/page/Ragging-Related-Circulars.aspx"
              ><li>Ragging Related Circulars</li></a
            >
            <a href="register.php"><li>Register Complaint</li></a>
            <a href="feedback.html"><li>Give Your Feedback</li></a>
            <a href="FAQ.html"><li>Frequently Asked Questions</li></a>
            <a href="video.html"><li>Videos On Ragging</li></a>
          </ul>
        </div>

        <div class="footer-items">
          <h3>Contact us</h3>
          <div class="border1"></div>
          <ul>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i>XYZ, abc</li>
            <li><i class="fa fa-phone" aria-hidden="true"></i>1800-111-1111</li>
            <li>
              <i class="fa fa-envelope" aria-hidden="true"></i
              >helpline@ragfreezone.in
            </li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">Copyright &copy; Rag Free Zone 2023.</div>
    </div>

    <script
      id="pixel-chaty"
      async="true"
      src="https://cdn.chaty.app/pixel.js?id=SEKzOMPE"
    ></script>
    <script src="/js/index.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      // preloader.js
      document.addEventListener("DOMContentLoaded", function () {
        // Hide the preloader when the DOM content is fully loaded
        var preloader = document.querySelector(".preloader");
        preloader.style.display = "none";
      });
    </script>
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
