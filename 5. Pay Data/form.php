<?php       include('../inc/connection.php'); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
    <header>
        <title>Pay Data</title>
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
                Pay Data
            </div>
            <div class="input_field">
                <label>Name</label>
                <input type="text" list="browsers" name="name" required>           
                    <datalist id="browsers">
                        <?php
                             $sql = "SELECT name FROM employ_data";
                            $aaa = mysqli_query($connection,$sql);
                            if (mysqli_num_rows($aaa) > 0) {
                            while($row = mysqli_fetch_assoc($aaa)) {?>
                            <option><?php echo  $row['name']. "<br>";?> </option>
                            <?php
                             }
                            }
    
                        ?>
                    </datalist>
            </div>
            <div class="input_field">
                <label>Morning_Pay</label>
                <input type="number" name="mor" required>
            </div>
            <div class="input_field">
                <label>Evening_Pay</label>
                <input type="number" name="eve" required>
            </div>
            <div class="input_field">
                <label>Date</label>
                <input type="date" name="date" required>
            </div>
            <div class="input_field">
                <label>Check Validity</label>
                <div class="radio1"></div>Valid<input type="radio" value="Valid" name="check" checked>
                <div class="radio2"></div>Invalid<input type="radio" value="Invalid" name="check">
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
            $Name             =   $_POST['name'];
            $Mor              =   $_POST['mor'];
            $Eve              =   $_POST['eve'];
            $Date             =   $_POST['date'];
            $check            =   $_POST['check'];
          

        /*  if($mod != "" && $compid != "" && $pp != "" && $sp != "" && $unit != "" && $warentytime != ""
                && $features != "" && $image != "")
            { */

            $querry     =   "INSERT INTO pay_data (name,morning_pay,evening_pay,date,check_validity) 
            values('$Name','$Mor','$Eve','$Date','$check')";
            $data       =   mysqli_query($connection, $querry);

            if($data){
                echo "<script>alert('Data insertion')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   
                url=http://localhost/qasimlab/5.%20Pay%20Data/display.php" />
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

