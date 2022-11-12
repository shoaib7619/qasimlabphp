<?php       include('../inc/connection.php'); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
    <header>
        <title>Employ Data</title>
        <meta name="viewport" content="width=device-width, intial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/style.css">   
    </header>
    <body>
    <div class="header">
        <h1>QASIM CLINICAL LAB</h1>
        </div>
        <div class="container">
        <form action="#" method="POST">
            <div class="form">
            <div class="title">
                Employ Data
            </div>
            <div class="input_field">
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="input_field">
                <label>CNIC</label>
                <input type="text" name="cnic" required>
            </div>
            <div class="input_field">
                <label>Address</label>
                <textarea class="textarea" name="address" required></textarea>
            </div>
            <div class="input_field">
                <label>Phone Number</label>
                <input type="text" name="phone" required>
            </div>
            <div class="input_field">
                <label>Designation</label>
                <textarea class="textarea" name="designation" required></textarea>
            </div>
            <div class="input_field">
                <label>Shift</label>
                <div class="radio1"></div>Morning<input type="radio" value="Morning" name="shift" checked>
                <div class="radio2"></div>Evening<input type="radio" value="Evening" name="shift">
                <div class="radio3"></div>Both<input type="radio" value="Morning & Evening" name="shift">
              </div>
              <div class="input_field">
                <label>Joining Detail</label>
                <textarea class="textarea" name="joining" required></textarea>
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
                    <input type="submit" value="SUBMIT" class="btn" name="submit">
                </div>
        </div>
        </form>
        </div>
    </body>
</html>

<?php
        if($_POST['submit'])
        {
            
            $Name            =   $_POST['name'];
            $CNIC            =   $_POST['cnic'];
            $Address         =   $_POST['address'];
            $Phone           =   $_POST['phone'];
            $Designation     =   $_POST['designation'];
            $Shift           =   $_POST['shift'];
            $Joining         =   $_POST['joining'];
          

        /*  if($mod != "" && $compid != "" && $pp != "" && $sp != "" && $unit != "" && $warentytime != ""
                && $features != "" && $image != "")
            { */

            $querry     =   "INSERT INTO employ_data (name,cnic,address,phone_no,designation,shift,detail) 
            values('$Name','$CNIC','$Address','$Phone','$Designation','$Shift','$Joining')";
            $data       =   mysqli_query($connection, $querry);

            if($data){
                echo "<script>alert('Data insertion')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   
                url=http://localhost/qasimlab/4.%20Employ%20Data/display.php" />
                <?php
            }
            else{
                echo "<script>alertS('Data insertion Failed')</script>";
                
            }
        }
    /*  else{
            echo "<script>alert('Missing something: please fill them');</script>";
        }
    }*/
    ?>

