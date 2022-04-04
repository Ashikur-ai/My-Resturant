<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['add'])) //checking the session 
            {
                echo $_SESSION['add'];//Display the session message
                unset($_SESSION['add']);//Removing session message
            }
        ?>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter your Name"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php');?>

<?php 

    if(isset($_POST['submit']))
    {

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password']; //Password encryption using md5
        
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // Check whether the data is inserted or not and display appropriate message
        if($res == TRUE)
        {
            //Data inserted
            //Create a session variable to display message
            $_SESSION['add'] = "Admin added successfully";
            //Redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            //Failed to insert data
            // Create session variable to display
            $_SESSION['add'] = "Failed to Add Admin";
            //Redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
        
    }
    

?>