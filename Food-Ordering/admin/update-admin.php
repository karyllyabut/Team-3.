<?php include('partials/menu.php'); ?>

<div class="main content">
  <div class="wrapper">
    <h1>Update Admin</h1>

    <br><br>

    <?php
      //1. Get the ID of Selected Admin\
      $id=$_GET['id'];

      //2. Create SQL Query to Get the Details
      $sql="SELECT * FROM tbl_admin WHERE id=$id";

      //Excecute the Query
      $res=mysqli_query($conn, $sql);

      //Check whether the query is excecuted or not
      if ($res==true)
      {
        //Check whether the data is available or not
        $count = mysqli_num_rows($res);
        //Check whether we have admin data or not
        if ($count==1)
        {
          //Get the details
          //echo "Admin Available";
          $row=mysqli_fetch_assoc($res);

          $full_name = $row['full_name'];
          $username = $row['username'];
        }
        else
        {
          //Redirect to manage admin page
          header('location:'.SITEURL.'admin/manage-admin.php');
        }
      }

    ?>

    <form action="" method="POST">

      <table class="tbl-30">
        <tr>
          <td>Full Name: </td>
          <td>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
          </td>
        </tr>

        <tr>
          <td>User Name: </td>
          <td>
            <input type="text" name="username" value="<?php echo $username; ?>">
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
          </td>
        </tr>
      </table>

    </form>
  </div>
</div>

<?php

  //Checke whether the submit button is cliked or not
  if (isset($_POST['submit']))
  {
    //echo "Button Clicked";
    //Get all the values from form to update
    $id=$_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
  }

?>


<?php include('partials/footer.php'); ?>
