<?php           include('../inc/connection.php'); 
                error_reporting(0);
$id= $_GET['id'];
$query  =       "SELECT * FROM loan_data WHERE loan_id='$id'";
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
                Update Loan Data
            </div>
            <div class="form">
            <div class="input_field">
                <label>Name</label>
                <input type="text" value="<?php echo $result['name'];?>" name="name" required>
            </div>
            <div class="input_field">
                <label>date</label>
                <input type="date" value="<?php echo $result['date'];?>" name="date" required>
            </div>
            <div class="input_field">
                <label>Loan Amount</label>
                <input type="number" value="<?php echo $result['loan_amount'];?>" name="loan_amount" required>
            </div>
            <div class="input_field">
                <label>Previous loan Data </label>
                <input type="number" value="<?php echo $result['previous_loan'];?>" name="previous_loan" required>
            </div>
            <div class="input_field">
                <label>Deduction Rate</label>
                <input type="number" value="<?php echo $result['deduction_rate'];?>" name="deduc_rate" required>
            </div>
            <div class="input_field">
                <label>Remaining Amount</label>     
                <input type="number" value="<?php echo $result['remaining_amount'];?>"  name="remain_amount" required>
            </div>
            <div class="input_field">
                <label>Loan Status</label>
                <div class="radio1"></div>Clear<input type="radio" value="Clear" name="status"
                <?php
                    if($result["loan_status"]=='Clear'){
                        echo "checked"; 
                    }
                ?>>
                <div class="radio2"></div>Pending<input type="radio" value="Pending" name="status"
                <?php
                    if($result["loan_status"]=='Pending'){
                        echo "checked"; 
                    }
                ?>>
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
           
            $Name                =   $_POST['name'];
            $Date                =   $_POST['date'];
            $Loan_amount         =   $_POST['loan_amount'];
            $pre_loan            =   $_POST['previous_loan'];
            $Deduc_rate          =   $_POST['deduc_rate'];
            $Remain_amount       =   $_POST['remain_amount'];
            $Status              =   $_POST['status'];
      
            

            $query  =  "UPDATE loan_data set name='$Name',date='$Date',loan_amount='$Loan_amount',previous_loan='$pre_loan',deduction_rate='$Deduc_rate', remaining_amount='$Remain_amount', loan_status='$Status' WHERE loan_id='$id'";

            $data   =   mysqli_query($connection, $query);

            if($data)
            {
                echo "<script>alert('Data Updated')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   url=http://localhost/qasimlab/6.%20Loan%20Data/display.php" />
                <?php
            }
            else{
                echo "<script>alert('Data Updated Failed')</script>";           }
        }
  
    ?>
