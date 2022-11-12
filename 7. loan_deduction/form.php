<?php       include('../inc/connection.php'); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
    <header>
        <title>Loan Deduction</title>
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
                Loan Deduction
            </div>
            <div class="input_field">
                <label>date</label>
                <input type="date" name="date" required>
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
            </div>
     
            <div class="input_field">
                <label>Deducted Amount</label>
                <input type="number" name="deducted_amount" required>
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
            $Date                =   $_POST['date'];
            $Name                =   $_POST['name'];
            $deducted_amount     =   $_POST['deducted_amount'];
        
           
          

            $querry     =   "INSERT INTO loan_deduction (date,emp_name,deducted_amount)
            values('$Date','$Name','$deducted_amount')";
            $data       =   mysqli_query($connection, $querry);

            if($data){
                echo "<script>alert('Data insertion')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   
                url=http://localhost/qasimlab/7.%20loan_deduction/display.php" />
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

