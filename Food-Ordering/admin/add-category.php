<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <!-- Add category form starts -->
        <form action="" method="POST"> 

            <table class="tbl-30">
                <tr>
                     <td>Title:</td>
                     <td>
                         <input type="text" namer="title" placeholder="Category Title">
                     </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add category form ends -->
        
        <?php

            //check whether the submit button can be clicked or not
            if(isset($_POST['submit'])) 
            {
                //echo "Clicked";

                //Get value from Category Form
                $title = $_POST['title'];

                //Radio input, we need to check whether the button is selected or not
                if(isset($_POST['featured'])) 
                {
                    //Get value from Form 
                    $featured = $_POST['featured'];
                }
                else
                {
                    //set the default value
                    $featured = "No";
                }

                if(isset($_POST['active'])) 
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                //create SQL Query to insert category into database
                $sql = "INSERT INTO tbl_category SET
                    title='$title', 
                    featured='$featured',
                    active ='$active'                
                ";

                // Execute the Query and save in Database
                $res = mysqli_query($conn, $sql);

                /// check whether the  query  executedc or not and dat5a added or not
                if(4res==true)
            }


        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>

