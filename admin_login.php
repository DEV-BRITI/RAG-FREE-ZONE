<?php
session_start();

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    require_once "dbase.php";
    $sql = "SELECT * FROM rfzusers WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            $_SESSION["email"] = $email;
            header('location:admin_index.php');
            exit();
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>RAG-FREE-ZONE | Admin Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap")
    * {
        margin: 0;
        font-family: "Poppins", sans-serif;
        }


        .body-container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff001;
            height: 100vh;

        }

        .page-container {
            margin-top: 40px;
            width: 95vw;
            height: 85vh;
            background-color: #f19a00;
            display: flex;
            gap: 30px;
            box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.5);
            border-radius: 0.5rem;
        }

        .log-in-container {
            overflow: hidden;
            height: 75vh;
            width: 25%;
            margin-top: 5vh;
            margin-left: 5vw;
            border-radius: 0.5rem;
            background-color: #dadbdd;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            box-sizing: border-box;
            padding: 20px 30px;
        }

        .image-container {
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-image: url(images/Yellow-Illustration-Saint-Patricks-Day-Sale-Banner-Landscape.png);
            border-image: fill;
            height: 85vh;
            width: 60vw;
            
        }

        .title {
            text-align: left;
            margin: 10px 0 30px 0;
            font-size: 28px;
            font-weight: 650;
        }

        .sub-title {
            margin: 0;
            margin-bottom: 5px;
            font-size: 9px;
        }

        .form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 15px;
        }

        .input {
            border-radius: 20px;
            border: 1px solid #c0c0c0;
            outline: 0 !important;
            box-sizing: border-box;
            padding: 12px 15px;
        }

        .form-btn {
            padding: 10px 15px;
            border-radius: 20px;
            border: 0 !important;
            outline: 0 !important;
            background: #f19a00;
            color: white;
            font-size: large;
            font-weight: 600;
            cursor: pointer;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .form-btn:active {
            box-shadow: none;
        }

        .sign-up-label {
            margin: 0;
            padding-bottom: 10px;
            font-size: 14px;
            color: #747474;
        }

        .sign-up-link {
            margin-left: 1px;
            font-size: 14px;
            text-decoration: underline;
            text-decoration-color: teal;
            color: teal;
            cursor: pointer;
            font-weight: 800;
        }

        .buttons-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            margin-top: 20px;
            gap: 15px;
        }
        .line {
            align-items: center;
            margin: 1em -1em;

            &:before,
            &:after {
                height: 1px;
                margin: 0 1em;
            }
        }


        .one-line {
            &:before,
            &:after {
                background: black;
            }
        }
          .additional-columns {
        display: none;
    }

    .view-button {
        background-color: violet;
        color: white;
        border: none;
        padding: 30px;
        cursor: pointer;
    }
    .form-btn{
        margin-top: 30px;
    }
    </style>
</head>
<body>
<div class="body-container">
            <div class="page-container">
                <div class="log-in-container">
                    <div class="form-container">
                        <p class="title">Welcome to <br> RAG-FREE-ZONE</p>
                        
                        <form class="form" method="POST" action="admin_login.php">

                            <label><b>Email:</b></label>
                            <input type="email" class="input" name="email" placeholder="yourname@example.com" autocomplete="off">
                            <label><b>Password:</b></label>
                            <input type="password" class="input" name="password" placeholder="Enter 6 character or more" autocomplete="off">
                            <input type="submit" class="form-btn" name="login" value="Login" >
                            <h5>Return to <a href="index.php">Home</a></h5>
                        </form>
                    </div>

                </div>
                <div class="image-container">
                </div>
            </div>
        </div>
        <script id="pixel-chaty" async="true" src="https://cdn.chaty.app/pixel.js?id=SEKzOMPE"></script>
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
