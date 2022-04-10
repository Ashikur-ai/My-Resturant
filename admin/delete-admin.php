<?php 

    // 1. get the id of admin to deleted 
    include('../config/constants.php');
    $id = $_GET['id'];
    
    // 2. Create SQL Query to Delete admin 
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // Execute the Query 
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not

    if($res == true)
    {
        // echo "Admin Deleted";
        $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
        // redirect to manage admin page 
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        // echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');//redirect to admin page
    }

    // 3. Redirect to Manage admin page with message(error/success) 

?>