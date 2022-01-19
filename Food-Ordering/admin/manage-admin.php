<?php include('partials/menu.php'); ?>

    <!-- Main Content Section Starts -->
    <div class="main-content">
      <div class="wrapper">
        <h1>Manage Admin</h1>

        <br /> <br />

        <?php
          if(isset($_SESSION['add']))
          {
            echo $_SESSION['add']; // dispplaying session message
            unset($_SESSION['add']); //removing session message
          }
         ?>
         <br><br><br>
        <!-- Buttom to admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br /> <br /> <br />

        <table class="tbl-full">
          <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
          </tr>

          <?php
              //Wuery to get all admin
              $sql = "SELECT * FROM tbl_admin";
              //Execute the Query
              $res = mysqli_query($conn, $sql);

              //Check whether the Query is Excuted of not
              if($res==TRUE)
              {
                //Count Rows to Check whether we have data in Data
                $count = mysqli_num_rows($res); //function to get all

                $sn=1; //Create a variable and assign the value

                //Check the num of rows
                if($count>0)
                {
                  // We have data in database
                  while($rows=mysqli_fetch_assoc($res))
                  {
                    //Using while loop to get all the data from database.
                    // And while loop will run as long as we have data in database

                    //Get individual Data
                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];

                    //Display the values in our table
                    ?>
                    <tr>
                      <td><?php echo $sn++; ?></td>
                      <td><?php echo $full_name; ?></td>
                      <td><?php echo $username; ?></td>
                      <td>
                        <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger">Delete Admin</a>
                      </td>
                    </tr>

                    <?php
                  }
                }
                else
                {
                  // We do not have data in database
                }
              }


           ?>

        </table>

      </div>
    </div>
    <!-- Main Content Section Ends -->

<?php include('partials/footer.php'); ?>