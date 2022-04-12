<?php error_reporting(0) ?>
<?php include('../config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login - Resturant website</title>
    <style>
        /* CSS for login page  */
        .login{
            border: 1px solid grey;
            width: 30%;
            margin: 10% auto;
            padding: 2%;
        }

        *{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .text-center{
            text-align: center;
        }

        .btn-primary{
            background-color: #1e90ff;
            padding: 1%;
            color: white;
            text-decoration: none;
            font-weight: bold;

        }
    </style>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>

        <br><br>

        <!-- Login form starts here  -->

        <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter username">
            <br><br>
            Password: <br>
            <input type="text" name="password" placeholder="Enter password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
        </form>
        <br><br>
        <!-- Login form ends here  -->
        <p class="text-center">Created by - Team Gladiator</p>
    </div>
    
</body>
</html>

<?php 

        if(isset($_POST)){
            // Get data from the form 

            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // SQL to check whether the user with username and password exists or not 
            $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

            // Execute the Query 
            $res = mysqli_query($conn, $sql);

            // Count rows to check whether the user exists or not 
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                // User available and login success 
                $_SESSION['login'] = "Login Successfull";
                $_SESSION['user'] = $username; // To check whether the user logged in or not 
                header('location:'.SITEURL.'admin/');
            }
            else{
                // User not available and login fail 
                $_SESSION['login'] = "Username or password did not match";
                // Redirect to same page 
                // header('location:'.SITEURL.'admin/login.php');
            }
        }
?>