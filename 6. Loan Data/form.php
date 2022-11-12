<?php       include('../inc/connection.php'); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
    <header>
        <title>Loan Data</title>
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
                Loan Data
            </div>
            <div class="input_field">
                <label>Name</label>
                <input type="text" list="browsers" name="Name" required>           
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
            </div>
            <div class="input_field">
                <label>date</label>
                <input type="date" name="date" required>
            </div>
            <div class="input_field">
                <label>Loan Amount</label>
                <input type="number" name="loan_amount" required>
            </div>
            <div class="input_field">
                <label>previous loan</label>
                <input type="number" name="previous_loan" required>
            </div>



<!-- 
            <div class="input_field">
                <label>previous loan data</label>
                <input type="date" list="browsers" date="date" required>           
                    <datalist id="browsers">
                        <?php
                             $sql = "SELECT date FROM loan_data";
                            $aaa = mysqli_query($connection,$sql);
                            if (mysqli_num_rows($aaa) > 0) {
                            while($row = mysqli_fetch_assoc($aaa)) {?>
                            <option><?php echo  $row['date']. "<br>";?> </option>
                            <?php
                             }
                            }
    
                        ?>
                    </datalist>
            </div> -->










            <div class="input_field">
                <label>Deduction Rate</label>
                <input type="number" name="deduc_rate" required>
            </div>
            <div class="input_field">
                <label>Remaining Amount</label>
                <input type="number" name="remain_amount" required>
            </div>
            <div class="input_field">
                <label>Loan Status</label>
                <div class="radio1"></div>Clear<input type="radio" value="Clear" name="status">
                <div class="radio2"></div>Pending<input type="radio" value="Pending" name="status" checked>
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
            
            $Name                =   $_POST['name'];
            $Date                =   $_POST['date'];
            $Loan_amount         =   $_POST['loan_amount'];
            $pre_loan            =   $_POST['previous_loan'];
            $Deduc_rate          =   $_POST['deduc_rate'];
            $Remain_amount       =   $_POST['remain_amount'];
            $Status              =   $_POST['status'];
           
          

            $querry     =   "INSERT INTO loan_data (name,date,loan_amount,previous_loan,deduction_rate,
            remaining_amount,loan_status)
            values('$Name','$Date','$Loan_amount','$pre_loan','$Deduc_rate','$Remain_amount','$Status')";
            $data       =   mysqli_query($connection, $querry);

            if($data){
                echo "<script>alert('Data insertion')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   
                url=http://localhost/qasimlab/6.%20Loan%20Data/display.php" />
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

