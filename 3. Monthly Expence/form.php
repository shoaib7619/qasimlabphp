<?php       include('../inc/connection.php'); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
    <header>
        <title>Monthly Expence</title>
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
                Monthly Expence
            </div>
            <div class="input_field">
                <label>Date</label>
                <input type="date" name="date" required>
            </div>
            <div class="input_field">
                <label>Company Name</label>
                <input type="text" name="company_name" required>
            </div>
            <div class="input_field">
                <label>Item Name</label>
                <input type="text" name="item_name" required>
            </div>
            <div class="input_field">
                <label>Item Quantity</label>
                <input type="text" name="item_quantity" required>
            </div>
            <div class="input_field">
                <label>Total Amount</label>
                <input type="number" name="amount" required>
            </div>
            <div class="input_field">
                <label>Discount</label>
                <input type="number" name="discount" required>
            </div>
            <div class="input_field">
                <label>Due Amount</label>
                <input type="number" name="due" required>
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
            $Company_name       =   $_POST['company_name'];
            $Item_name       =   $_POST['item_name'];
            $Item_quantity   =   $_POST['item_quantity'];
            $Amount          =   $_POST['amount'];
            $Discount          =   $_POST['discount'];
            $Due          =   $_POST['due'];
          


            $querry     =   "INSERT INTO monthly_exp (date,company_name,item_name,item_quantity,
            total_amount,discount,due) 
            values('$Date','$Company_name','$Item_name','$Item_quantity',
            '$Amount','$Discount','$Due')";
            $data       =   mysqli_query($connection, $querry);

            if($data){
                echo "<script>alert('Data insertion')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   
                url=http://localhost/qasimlab/3.%20Monthly%20Expence/display.php" />
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

