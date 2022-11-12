<?php           include('../inc/connection.php'); 
                error_reporting(0);
$id= $_GET['id'];
$query  =       "SELECT * FROM employ_data WHERE emp_id='$id'";
$data   =       mysqli_query($connection, $query);

$total  =       mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
?>
 

    <!DOCTYPE html>
    <html>
    <head>
        <title>Update</title>
        <meta name="viewport" content="width=device-width, intial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/style.css">    
    </head>

    <body>
        <div class="container">
            <form action="#" method="POST">
            <div class="title">
                Update Employ Data
            </div>
            <div class="form">
            <div class="input_field">
                <label>Name</label>
                <input type="text" value="<?php echo $result['name'];?>"  name="name" required>
            </div>
            <div class="input_field">
                <label>CNIC</label>
                <input type="text" value="<?php echo $result['cnic'];?>"  name="cnic" required>
            </div>
            <div class="input_field">
                <label>Address</label>
                <textarea class="textarea" name="address" required><?php echo $result['address'];?></textarea>
            </div>
            <div class="input_field">
                <label>Phone Number</label>
                <input type="text" value="<?php echo $result['phone_no'];?>"  name="phone" required>
            </div>
            <div class="input_field">
                <label>Designation</label>
                <textarea class="textarea" name="designation" required><?php echo $result['designation'];?></textarea>
            </div>
            <div class="input_field">
                <label>Shift</label>
                <div class="radio1"></div>Morning<input type="radio" value="Morning" name="shift"
                <?php
                    if($result["shift"]=='Morning'){
                        echo "checked"; 
                    }
                ?>>
                <div class="radio2"></div>Evening<input type="radio" value="Evening" name="shift"
                <?php
                    if($result["shift"]=='Evening'){
                        echo "checked"; 
                    }
                ?>>
                <div class="radio3"></div>Both<input type="radio" value="Morning & Evening" name="shift"
                <?php
                    if($result["shift"]=='Morning & Evening'){
                        echo "checked"; 
                    }
                ?>>
              </div>
              <div class="input_field">
                <label>Joining Detail</label>
                <textarea class="textarea" name="joining" required><?php echo $result['detail'];?></textarea>
            </div>

              <div class="term">
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" name="" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>Agree Term And Condition</p>
                </div>
                </div>

                <div class="input_field">
                    <input type="submit" value="Updata Data" class="btn" name="update">
                </div>
            </div>
        </form>
        </div>
    </body>
    </html>

    <?php
       if($_POST['update'])
       {
           
        $Name            =   $_POST['name'];
        $CNIC            =   $_POST['cnic'];
        $Address         =   $_POST['address'];
        $Phone           =   $_POST['phone'];
        $Designation     =   $_POST['designation'];
        $Shift           =   $_POST['shift'];
        $Joining         =   $_POST['joining'];
      
            

            $query  =  "UPDATE employ_data set name='$Name',cnic='$CNIC',address='$Address',phone_no='$Phone', designation='$Designation', shift='$Shift', detail='$Joining' WHERE emp_id='$id'";

            $data   =   mysqli_query($connection, $query);

            if($data)
            {
                echo "<script>alert('Data Updated')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   url=http://localhost/qasimlab/4.%20Employ%20Data/display.php" />
                <?php
            }
            else{
                echo "<script>alert('Data Updated Failed')</script>";           }
        }
  
    ?>
