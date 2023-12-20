<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RAG-FREE-ZONE | Anti-Ragging Portal</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="../css/style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <style>
        .footer{
            margin-top: 80px;
        }
        .menu-list li:nth-child(7) a:hover {
            background: #111;
            color: #ffd000;
        }
        .container{
            margin-top: 100px;
        }
        .navbar{
            background: white;
            top: 0;
            -webkit-box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.1);
        }       
        /* this is the text, when you hover on button */
        .hover-text {
            background: white;
            position: absolute;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            content: attr(data-text);
            color: var(--animation-color);
            width: 0%;
            inset: 0;
            border-right: var(--border-right) solid var(--animation-color);
            overflow: hidden;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
            -webkit-text-stroke: 0.5px var(--animation-color);
        }
        /* hover */
        .button:hover .hover-text {
            width: 100%;
            -webkit-filter: drop-shadow(0 0 23px var(--animation-color));
            filter: drop-shadow(0 0 23px var(--animation-color));
        }
    </style>
  </head>
  <body>
  <nav class="navbar">
    <div class="content">
      <div class="logo">
        <button class="button" data-text="Awesome">
          <span class="actual-text">&nbsp;rag&nbsp;free&nbsp;zone&nbsp;</span>
          <span aria-hidden="true" class="hover-text">&nbsp;rag&nbsp;free&nbsp;zone&nbsp;</span>
      </button>
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php#about">About</a></li>
        <li class="services">
          <a href="#">Services<i class="fas fa-chevron-down"></i></a>
          <div class="dropdown-content">
              <a href="#">Raise Complaint</a>
              <a href="index.php#check-complaint">Check Complaint Status</a>
          </div>
        </li>
        <li><a href="video.html">Videos</a></li>
        <li><a href="index.php#contact">Contact</a></li>
        <li><a href="#">Raise Complaint</a></li>
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>
    <div class="container">
        <header>
            <h3>Register Your Complaint</h3>
        </header>
        <div class="complaint">
            <h5 class="text-center text-danger">Choose an Option</h5>
            <div id="options">
                <select id="complaint-option">
                    <option value="selected">Choose Your Category</option>
                    <option value="yourself">For Yourself</option>
                    <option value="another">For Another Person</option>
                </select>
            </div><br>
            
            <form action="register.php" method="POST" id="complaint-form" style="display: none;">             
                <div id="yourDetails" style="display: none;"> 
                    <h5 class="text-center text-danger">Your Details</h5>
                    <div class="row">
                        <div class="form-group">
                            <label for="yourname">Your Name</label>
                            <input type="text" name="yourname" class="form-control" id="yourname" autocomplete="off" placeholder="Your Name">
                        </div>

                        <div class="form-group">
                            <label for="yourmobile">Your Mobile No.</label>
                            <input type="tel" name="yourmobile" class="form-control" id="yourmobile" autocomplete="off" placeholder="Your Mobile Number" pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="youremail">Your Email</label>
                            <input type="email" class="form-control" autocomplete="off" placeholder="Your Valid Email ID" name="youremail" id="youremail">
                        </div>

                        <div class="form-group">
                            <label for="relation">Relation</label>
                            <input type="text" name="relation" class="form-control" id="relation" autocomplete="off" placeholder="Relation with Victim">
                        </div>
                    </div>
                    <hr><br>
                </div>

                <!-- row 1 -->             
                <h5 class="text-center text-danger">Student's Personal Details</h5>
                <div class="row">
                    <div class="form-group">
                        <label for="student">Student Name</label>
                        <input type="text" name="student" class="form-control" id="student" autocomplete="off" placeholder="Student Name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Student's Mobile No.</label>
                        <input type="text" name="phone" class="form-control" id="phone" autocomplete="off" placeholder="Student's Mobile Number" pattern="[0-9]{10}" maxlength="10" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="guardian">Guardian Name</label>
                        <input type="text" name="guardian" class="form-control" id="guardian" autocomplete="off" placeholder="Guardian Name" required>
                    </div>
                    <div class="form-group">
                        <label for="guardian">Guardian's Mobile No.</label>
                        <input type="tel" name="contact" class="form-control" id="" autocomplete="off" placeholder="Guardian's Mobile Number" pattern="[0-9]{10}" maxlength="10">
                    </div>
                    <!-- <div class="form-group">
                        <label for="contact">Guardian's Mobile No.</label>
                        <input type="text" name="contact" class="form-control" id="contact" autocomplete="off" placeholder="Guardian's Mobile Number" pattern="[0-9]{10}" maxlength="10" required>
                    </div> -->
                </div>
      
                <!-- row 2 -->
                <div class="row">
                    <div class="form-group">
                        <label for="email">Student's Email</label>
                        <input type="email" class="form-control" autocomplete="off" placeholder="Student's Valid Email ID" name="email" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                    </div>
                    <div class="form-group">
                        <label for="student-gender">Gender</label>
                        <select name="gender" class="form-control" id="student-gender" required>
                            <option value="selected">Choose Your Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
      
                <!-- row 4 -->
                <div class="row">
                    <div class="form-group">
                        <label for="college">College Name</label>
                        <input type="text" class="form-control" name="college" placeholder="College Name" autocomplete="off" id="college" required>
                    </div>
                    <div class="form-group">
                        <label for="pin">College Code</label>
                        <input type="text" class="form-control" name="pin" id="pin" placeholder="College Pin Code" autocomplete="off" maxlength="6" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="branch">Branch</label>
                        <input type="text" class="form-control" name="branch" placeholder="Your Branch" autocomplete="off" id="branch" required>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" class="form-control" name="semester" id="semester" placeholder="Currently Studying" autocomplete="off" maxlength="6" required>
                    </div>
                </div>
        
                <!-- row 5  -->
                <div class="row">
                    <div class="form-group">
                        <label for="address">Student's Address</label>
                        <textarea name="address" class="form-control" id="address" autocomplete="off" placeholder="Address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Identity Proof</label>
                        <input type="file" name="image" class="form-control" id="image" accept="image/*" required>
                    </div>
                </div>
                <hr>

                <br><h5 class="text-center text-danger">Complaint Details</h5>
        
                <!--row 6 -->
                <div class="row">
                    <div class="form-group">
                        <label for="complaint-name">Complaint Category</label>
                        <input type="text" name="complaint-name" placeholder="Ragging, Sexual Harassment, Torture ..." autocomplete="off" class="form-control" id="complaint-name" required>
                    </div>

                    <div class="form-group">
                        <label for="media">Any Evidence (Images and Videos, optional)</label>
                        <input type="file" name="media" class="form-control" id="media" accept="image/,video/" multiple>
                    </div>                
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="date">Date of Incident</label>
                        <input type="date" class="form-control" name="date" id="date" autocomplete="off" required>
                    </div>
                
                    <div class="form-group">
                        <label for="time">Time of Incident</label>
                        <input type="time" class="form-control" name="time" id="time" autocomplete="off" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="details">Incident Details</label>
                        <textarea class="form-control" rows="6" name="details" rows="3" autocomplete="off" placeholder="Ragging Details (Drag from right bottom corner to make it large)" id="details" required></textarea>
                    </div>
                </div>

                <!--row 7-->
                <div class="text-center">
                    <center><button type="submit">Submit</button></center>
                    <p id="referenceId" style="display: none;">Reference ID: <span></span></p>
                </div>
            </form>
        </div>        
    </div>
    <div class="footer">
    <div class="inner-footer">
  
      <div class="footer-items">
        <h1>Rag Free Zone </h1>
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
            <a href="https://www.ugc.gov.in/page/Ragging-Related-Circulars.aspx"><li>Ragging Related Circulars</li></a>
            <a href="#"><li>Register Complaint</li></a>
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
            <li><i class="fa fa-envelope" aria-hidden="true"></i>helpline@ragfreezone.in</li>
          </ul> 
      </div>
    </div>
    
    <div class="footer-bottom">
      Copyright &copy; Rag Free Zone 2023.
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Get a reference to the form, options, and Your Details div
        const form = document.getElementById('complaint-form');
        const complaintOption = document.getElementById('complaint-option');
        const yourDetails = document.getElementById('yourDetails');

        // Add an event listener for changes in the dropdown
        complaintOption.addEventListener('change', function () {
            const selectedOption = complaintOption.value;
            if (selectedOption === 'yourself') {
                form.style.display = 'block'; // Show the form
                yourDetails.style.display = 'none'; // Hide Your Details
            } else if (selectedOption === 'another') {
                form.style.display = 'block'; // Show the form
                yourDetails.style.display = 'block'; // Show Your Details
            }
        });

        // Function to copy text to clipboard
        function copyToClipboard(text) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
        }

        // Display success message and reference ID
        function displaySuccessMessage(refId) {
            const successMessage = `Reference ID: ${refId}.\n\nPlease note the reference ID for future reference.`;

            Swal.fire({
                icon: 'success',
                title: 'Complaint registered successfully',
                text: successMessage,
                showConfirmButton: true,
                confirmButtonText: 'Copy Reference ID',
            }).then((result) => {
                if (result.isConfirmed) {
                    copyToClipboard(refId);
                    Swal.fire({
                        icon: 'success',
                        title: 'Reference ID copied to clipboard',
                        text: 'You can now paste the reference ID where needed.',
                    });
                }
            });
        }

        // Function to display error message
        function displayErrorMessage(message) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: message,
            });
        }
        
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once "dbase.php";

            // Extract data from the form
            $yourName = $_POST['yourname'] ;
            $yourMobile = $_POST['yourmobile'] ;
            $yourEmail = $_POST['youremail'] ;
            $relation = $_POST['relation'] ;
            $studentName = $_POST['student'];
            $studentMobile = $_POST['phone'];
            $guardianName = $_POST['guardian'];
            $guardianMobile = $_POST['contact'];
            $studentEmail = $_POST['email'];
            $gender = $_POST['gender'];
            $collegeName = $_POST['college'];
            $collegeCode = $_POST['pin'];
            $branch = $_POST['branch'];
            $semester = $_POST['semester'];
            $studentAddress = $_POST['address'];
            $identityProof = $_POST['image'];
            $complaintCategory = $_POST['complaint-name'];
            $anyEvidence = $_POST['media'];
            $dateofIncident = $_POST['date'];
            $timeofIncident = $_POST['time'];
            $incidentDetails = $_POST['details'];
            $refId = generateReferenceId();

            // Insert data into the database
            $sql = "INSERT INTO registration (Your_Name, Your_Mobile_No, Your_Email, Relation, Student_Name, Student_Mobile_No, Guardian_Name, Guardian_Mobile_No, Student_Email, Gender, College_Name, College_Code, Branch, Semester, Student_Address, Identity_Proof, Complaint_Category, Any_Evidence, Date_of_Incident, Time_of_Incident, Incident_Details, Reference_ID) VALUES ('$yourName', '$yourMobile', '$yourEmail', '$relation', '$studentName', '$studentMobile', '$guardianName', '$guardianMobile', '$studentEmail', '$gender', '$collegeName', '$collegeCode', '$branch', '$semester', '$studentAddress', '$identityProof', '$complaintCategory', '$anyEvidence', '$dateofIncident', '$timeofIncident', '$incidentDetails', '$refId')";
            
            if ($con->query($sql) === TRUE) {
                // Display the success message using SweetAlert
                echo "displaySuccessMessage('$refId');";
            } else {
                // Display an error message
                $errorMessage = "Error: " . $sql . "<br>" . $con->error;
                echo "displayErrorMessage('$errorMessage');";
            }
            

            // Close the database connection
            $con->close();
        }
        // Function to generate a unique reference ID
        function generateReferenceId() {
            return 'REF' . date('YmdHis') . rand(1000, 9999);
        }
        ?>
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