<?php           include('../inc/connection.php'); 
                error_reporting(0);
$id= $_GET['id'];
$query  =       "SELECT * FROM loan_deduction WHERE id='$id'";
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
                Update Loan Deduction
            </div>
            <div class="form">
            <div class="input_field">
                <label>date</label>
                <input type="date" value="<?php echo $result['date'];?>" name="date" required>
            </div>
            <div class="input_field">
                <label>Name</label>
                <input type="text" value="<?php echo $result['emp_name'];?>" name="name" required>
            </div>
            
            <div class="input_field">
                <label>Deducted Amount</label>
                <input type="number" value="<?php echo $result['deducted_amount'];?>" name="deducted_amount" required>
            </div>
           
               
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
            $Date                =   $_POST['date'];
            $Name                =   $_POST['name'];
            $deducted_amount     =   $_POST['deducted_amount'];

      
            

            $query  =  "UPDATE loan_deduction set date='$Date', emp_name='$Name', deducted_amount='$deducted_amount' WHERE id='$id'";

            $data   =   mysqli_query($connection, $query);

            if($data)
            {
                echo "<script>alert('Data Updated')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   url=http://localhost/qasimlab/7.%20loan_deduction/display.php" />
                <?php
            }
            else{
                echo "<script>alert('Data Updated Failed')</script>";           }
        }
  
    ?>
