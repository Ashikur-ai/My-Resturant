<?php include('partials/menu.php');?>

    <!-- Main content starts  -->
    <div class="main-content">
        <div class="wrapper">
        <h1>Manage Admin</h1>

        <br>
        <?php 

            // for add admin 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //Display session message
                unset($_SESSION['add']); // Removing session message
            }

            // For delete admin 
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];//Display session message
                unset($_SESSION['delete']);//Removing session message
            }
            
            // For update admin 
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        
        ?>
        <br><br><br>
        <!-- Button to Add admin -->
        
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br><br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php 
                //Query to get all admin
                $sql = "SELECT * FROM tbl_admin";
                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Check whether the query is executed or not
                if($res == TRUE)
                {
                    //COUNT the no of row
                    $rows = mysqli_num_rows($res);
                     $sn = 1;

                    //check the num of rows
                    if($rows>0)
                    {
                       
                        //We have data in database
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?> </td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                </td>
                            </tr>
                            <?php

                        }
                    }
                    else
                    {

                    }
                }
            ?>

        </table>

        </div>
    </div>
    <!-- Main content ends  -->

<?php include('partials/footer.php'); ?>