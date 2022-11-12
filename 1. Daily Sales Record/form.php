<?php       include('../inc/connection.php'); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
    <header>
        <title>Sales Record</title>
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
                Daily Sales
            </div>
            <div class="input_field">
                <label>Date</label>
                <input type="date" name="date" required>
            </div>
            <div class="input_field">
                <label>Sale Amount</label>
                <input type="number" name="sale_amount" required>
            </div>
            <div class="input_field">
                <label>Due Amount</label>
                <input type="number" name="due" required>
            </div>
            <div class="input_field">
                <label>Shift</label>
                <div class="radio1"></div>Morning<input type="radio" value="Morning" name="shift" chacked>
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
            $Sale_amount     =   $_POST['sale_amount'];
            $Due             =   $_POST['due'];
            $Shift           =   $_POST['shift'];
          

        /*  if($mod != "" && $compid != "" && $pp != "" && $sp != "" && $unit != "" && $warentytime != ""
                && $features != "" && $image != "")
            { */

            $querry     =   "INSERT INTO sale_record (date,sale_amount,due,shift) 
            values('$Date','$Sale_amount','$Due','$Shift')";
            $data       =   mysqli_query($connection, $querry);

            if($data){
                echo "<script>alert('Data insertion')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   url=http://localhost/qasimlab/1.%20Daily%20Sales%20Record/display.php" />
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

