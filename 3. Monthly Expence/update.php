<?php           include('../inc/connection.php'); 
                error_reporting(0);
$id= $_GET['id'];
$query  =       "SELECT * FROM monthly_exp WHERE id='$id'";
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
                Update Monthly Expence
            </div>
            <div class="form">
            <div class="input_field">
                <label>Date</label>
                <input type="date" value="<?php echo $result['date'];?>" name="date" required>
            </div>
            <div class="input_field">
                <label>Company Name</label>
                <input type="text" value="<?php echo $result['company_name'];?>" name="company_name" required>
            </div>
            <div class="input_field">
                <label>Item Name</label>
                <input type="text" value="<?php echo $result['item_name'];?>" name="item_name" required>
            </div>
            <div class="input_field">
                <label>Item Quantity</label>
                <input type="text" value="<?php echo $result['item_quantity'];?>" name="item_quantity" required>
            </div>
            <div class="input_field">
                <label>Total Amount</label>
                <input type="number" value="<?php echo $result['total_amount'];?>" name="amount" required>
            </div>
            <div class="input_field">
                <label>Discount</label>
                <input type="number" value="<?php echo $result['discount'];?>" name="discount" required>
            </div>
            <div class="input_field">
                <label>Due Amount</label>
                <input type="number" value="<?php echo $result['due'];?>" name="due" required>
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
           
           $Date            =   $_POST['date'];
           $Company_name    =   $_POST['company_name'];
           $Item_name       =   $_POST['item_name'];
           $Item_quantity   =   $_POST['item_quantity'];
           $Amount          =   $_POST['amount'];
           $Discount        =   $_POST['discount'];
           $Due             =   $_POST['due'];
            

            $query  =  "UPDATE monthly_exp set date='$Date',company_name='$Company_name',item_name='$Item_name',item_quantity='$Item_quantity',total_amount='$Amount', discount='$Discount', due='$Due' WHERE id='$id'";

            $data   =   mysqli_query($connection, $query);

            if($data)
            {
                echo "<script>alert('Data Updated')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   url=http://localhost/qasimlab/3.%20Monthly%20Expence/display.php" />
                <?php
            }
            else{
                echo "<script>alert('Data Updated Failed')</script>";           }
        }
  
    ?>
