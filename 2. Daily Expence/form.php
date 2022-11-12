<?php       include('../inc/connection.php'); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
    <header>
        <title>Daily Expence</title>
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
                Daily Expence
            </div>
            <div class="input_field">
                <label>Date</label>
                <input type="date" name="date" required>
            </div>
            <div class="input_field">
                <label>Item Name</label>
                <input type="text" name="item_name" required>
            </div>
            <div class="input_field">
                <label>Item Quantity</label>
                <input type="number" name="item_quantity" required>
            </div>
            <div class="input_field">
                <label>Amount</label>
                <input type="number" name="amount" required>
            </div>
            <div class="input_field">
                <label>Shift</label>
                <div class="radio1"></div>Morning<input type="radio" value="Morning" name="shift" checked>
                <div class="radio2"></div>Evening<input type="radio" value="Evening" name="shift">
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
            
            $Date            =   $_POST['date'];
            $Item_name       =   $_POST['item_name'];
            $Item_quantity   =   $_POST['item_quantity'];
            $Amount          =   $_POST['amount'];
            $Shift           =   $_POST['shift'];
          

        /*  if($mod != "" && $compid != "" && $pp != "" && $sp != "" && $unit != "" && $warentytime != ""
                && $features != "" && $image != "")
            { */

            $querry     =   "INSERT INTO daily_exp (date,item_name,item_quantity,amount,Shift) 
            values('$Date','$Item_name','$Item_quantity','$Amount','$Shift')";
            $data       =   mysqli_query($connection, $querry);

            if($data){
                echo "<script>alert('Data insertion')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   
                url=http://localhost/qasimlab/2.%20Daily%20Expence/display.php" />
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

