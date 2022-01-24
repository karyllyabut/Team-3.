<?php

  //Include constants.php file here
  include('../config/constants.php');

  // 1. get the ID of Admin to be deleted
  $id = $_GET['id'];

  // 2. Create SQL Query to Delete Admin
  $sql = "DELETE FROM tbl_admin WHERE id=$id";

  //Excecute the Query
  $res = mysqli_query($conn, $sql);

  //Check whether the query executed successfuly  or not
  if($res==true)
  {
    //Query executed successfully and Admin Deleted
    //echo "Admin Deleted";
    //Create Session Variable to Display Message
    $_SESSION['delete'] = "Admin Deleted Successfully";
    //Redirect to Manage Admin Page
    header('location:'.SITEURL.'admin/manage-admin.php');
  }
  else
  {
    //Failed to Delete Admin
    //echo "Failed to Delete Admin";

    $_SESSION['delete'] = "Failed to Delete Admin. Try Again Later.";
    header('location:'.SITEURL.'admin/manage-admin.php');
  }
  // 3. Redirect to Manage Admin Page with message(success/error)

?>
