<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php 
            // 1. Get the Id of selected admin
            $id = $_GET['id'];

            // 2. Create SQL query to get the details 
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            // 3. Execute the query
            $res = mysqli_query($conn, $sql);

            // 4. Whether the query executed or not
            if($res==true)
            {
                // check whether the data is available or not 
                $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                if($count==1)
                {
                    //Get the details
                    //echo "Admin Available";
                    $row = mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else{
                    // Redirect to Manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>

        <form action="" method="POST">
            <table class="tbl_30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>">
                </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update" class="btn-secondary">

                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit']))
    {
        // echo "Button clicked";
        // Get the data from form 
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // Create a SQL Query to update admin 
        $sql = "UPDATE tbl_admin SET
        full_name='$full_name',
        username='$username'
        WHERE id='$id'
        ";

        // Execute the Query 
        $res = mysqli_query($conn, $sql);

        // check whether the query executed successfully or not 
        if($res==true)
        {
            // Query Executed successfully and update Admin details 
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            // Redirect to manage admin page 
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else{
            // Failed to Update Admin 
            $_SESSION['update'] = "<div class='error'>Failed to update admin</div>";
            // Redirect to manage admin page 
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('partials/footer.php');?>