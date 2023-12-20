<!DOCTYPE html>
<html>
<head>
  <title>SignUp Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
    body {
      font-family: "Poppins", sans-serif;
      font-weight: bold;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    h2, h3{
      text-align: center;
      font-weight: bold;
    }

    .container {
      max-width: 500px;
      margin: 20px auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group p {
      margin: 0;
      font-weight: bold;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 8px;
      font-size: 16px;
      border-radius: 4px;
      border: 2px solid #ccc;
      box-sizing: border-box;
    }

    /* Gender Field */
    .gender-field {
      margin-bottom: 20px;
    }

    .gender-field p {
      margin: 0;
      font-weight: bold;
    }

    .gender-field .radio-group {
      margin-top: 10px;
    }

    .gender-field .radio {
      display: inline-block;
      margin-right: 10px;
    }

    .gender-field .radio input[type="radio"] {
      margin-right: 5px;
    }

    .gender-field .radio label {
      font-size: 16px;
    }


    .form-group textarea {
      resize: vertical;
    }

    .form-group input[type="submit"] {
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      font-size: 18px;
      background-color: #FF6347;
      color: #ffffff;
      cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
      background-color: #FF4500;
    }

    .error {
      color: red;
    }

    .login-link {
      text-align: center;
      margin-top: 20px;
    }

    .login-link a {
      color: #555555;
      text-decoration: underline;
    }

    .login-link a:hover {
      color: #000000;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    if (isset($_POST["submit"])) {
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $dob = $_POST["dob"];
        $address = $_POST["address"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];
        // $image = $_FILES["image"]["name"];
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();
        
        if (empty($fname) OR empty($lname) OR empty($dob) OR empty($address) OR empty($mobile) OR empty($email) OR empty($gender) OR empty($city) OR empty($state) OR empty($password) OR empty($passwordRepeat)) {
        array_push($errors,"All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
        }
        if ($password!==$passwordRepeat) {
        array_push($errors,"Password does not match");
        }
        require_once "dbase.php";
        $sql = "SELECT * FROM rfzusers WHERE email = '$email'";
        $result = mysqli_query($con, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0) {
        array_push($errors,"Email already exists!");
        }
        // $usertype = "admin";
        if (count($errors)>0) {
        foreach ($errors as  $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
        }else{
        
          $sql = "INSERT INTO rfzusers (firstname, middlename, lastname, dob, address, mobile, email, gender, city, state, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = mysqli_stmt_init($con);
          $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
          if ($prepareStmt) {
              mysqli_stmt_bind_param($stmt, "sssssssssss", $fname, $mname, $lname, $dob, $address, $mobile, $email, $gender, $city, $state, $passwordHash);
              mysqli_stmt_execute($stmt);
              echo "<div class='alert alert-success'>You are registered successfully.</div>";
          } else {
              die("Something went wrong");
          }
      }
  }
  ?>
    <h2>Welcome to</h2>
    <h3>RAG-FREE-ZONE</h3><br>
    Please register your details here <br>
    <form method="POST" action="admin_reg.php">
      <div class="form-group">
        <p>First Name:</p>
        <input type="text" name="fname" required pattern="[A-Za-z]+" title="Only alphabetic characters are allowed">
      </div>

      <div class="form-group">
        <p>Middle Name:</p>
        <input type="text" name="mname" pattern="[A-Za-z]+" title="Only alphabetic characters are allowed">
      </div>

      <div class="form-group">
        <p>Last Name:</p>
        <input type="text" name="lname" required pattern="[A-Za-z]+" title="Only alphabetic characters are allowed">
      </div>

      <div class="form-group">
        <p>Date of Birth:</p>
        <input type="date" name="dob" required>
      </div>

      <div class="form-group">
        <p>Address:</p>
        <textarea name="address" required></textarea>
      </div>

      <div class="form-group">
        <p>Mobile No.:</p>
        <input type="tel" name="mobile" pattern="[0-9]{10}" required>
      </div>

      <div class="form-group">
        <p>Email ID:</p>
        <input type="email" name="email" required>
      </div>

      <div class="gender-field">
        <p>Gender:</p>
        <div class="radio-group">
          <div class="radio">
            <input type="radio" name="gender" value="male" required>
            <label>Male</label>
          </div>
          <div class="radio">
            <input type="radio" name="gender" value="female" required>
            <label>Female</label>
          </div>
          <div class="radio">
            <input type="radio" name="gender" value="other" required>
            <label>Other</label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <p>City:</p>
        <input type="text" name="city" required>
      </div>

      <div class="form-group">
        <p>State:</p>
        <input type="text" name="state" required>
      </div>

      <div class="form-group">
        <p>Password:</p>
        <input type="password" name="password" required>
      </div>

      <div class="form-group">
        <p>Confirm Password:</p>
        <input type="text" name="repeat_password" required>
      </div>

      <div class="form-group">
        <input type="submit" name="submit" value="Submit" id="submitBtn">
      </div>
    </form>

    <script>
    // JavaScript code for real-time form validation
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input, textarea, select');
    const passwordInput = form.querySelector('input[name="password"]');
    const confirmPasswordInput = form.querySelector('input[name="repeat_password"]');

    // Regular expressions for validation
    const namePattern = /^[A-Za-z]{2,}$/;
    const dobPattern = /^(\d{4})-(\d{2})-(\d{2})$/;
    const mobilePattern = /^[6-9]\d{9}$/;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const passwordPattern = /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;

    // Function to validate the form fields and display error messages
    function validateForm() {
      let isValid = true;
      inputs.forEach(input => {
        const value = input.value.trim();
        const errorDiv = input.nextElementSibling;
        if (input.hasAttribute('required') && value === '') {
          isValid = false;
          showError(input, 'This field is required.');
        } else {
          removeError(input);
        }

        switch (input.name) {
          case 'fname':
          case 'lname':
            if (value !== '' && !value.match(namePattern)) {
              isValid = false;
              showError(input, 'Name must contain at least two letters and only alphabets.');
            }
            break;
          case 'dob':
            if (value !== '' && (!value.match(dobPattern) || !isAdult(value))) {
              isValid = false;
              showError(input, 'Please enter a valid date of birth (minimum age: 18 years).');
            }
            break;
          case 'mobile':
            if (value !== '' && !value.match(mobilePattern)) {
              isValid = false;
              showError(input, 'Please enter a valid 10-digit mobile number.');
            }
            break;
          case 'email':
            if (value !== '' && !value.match(emailPattern)) {
              isValid = false;
              showError(input, 'Please enter a valid email address.');
            }
            break;
          case 'password':
            if (value !== '' && !value.match(passwordPattern)) {
              isValid = false;
              showError(input, 'Password must have minimum 8 characters and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.');
            }
            break;
        }
      });

      return isValid;
    }

    // Function to show error message and apply red border to input
    function showError(input, message) {
      input.classList.add('error');
      const errorDiv = document.createElement('div');
      errorDiv.classList.add('error-message');
      errorDiv.innerText = message;

      // Remove previous error message, if any
      const prevErrorDiv = input.nextElementSibling;
      if (prevErrorDiv && prevErrorDiv.classList.contains('error-message')) {
        prevErrorDiv.remove();
      }

      input.parentNode.insertBefore(errorDiv, input.nextSibling);
    }

    // Function to remove error message and red border from input
    function removeError(input) {
      input.classList.remove('error');
      const errorDiv = input.nextElementSibling;
      if (errorDiv && errorDiv.classList.contains('error-message')) {
        errorDiv.remove();
      }
    }

    // Function to check if the date of birth makes the user an adult (18 years or older)
    function isAdult(dateString) {
      const today = new Date();
      const birthDate = new Date(dateString);
      const age = today.getFullYear() - birthDate.getFullYear();
      const monthDiff = today.getMonth() - birthDate.getMonth();
      if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
      }
      return age >= 18;
    }

    // Event listeners for real-time validation
    inputs.forEach(input => {
      input.addEventListener('blur', function () {
        validateForm();
      });

      input.addEventListener('input', function () {
        removeError(input);
      });
    });

    // Event listener for confirm password change
    confirmPasswordInput.addEventListener('input', function () {
      removeError(confirmPasswordInput);
    });
  </script>
  </div>
</body>
</html>