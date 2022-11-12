<?php           include('../inc/connection.php'); 
                error_reporting(0);
$id= $_GET['id'];
$query  =       "SELECT * FROM sale_record WHERE id='$id'";
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
                Update Daily Sale
            </div>
            <div class="form">
            <div class="input_field">
                <label>Date</label>
                <input type="date" value="<?php echo $result['date'];?>" name="date" required>
            </div>
            <div class="input_field">
                <label>Sale Amount</label>
                <input type="number" value="<?php echo $result['sale_amount'];?>" name="sale_amount" required>
            </div>
            <div class="input_field">
                <label>Due Amount</label>
                <input type="number" value="<?php echo $result['due'];?>" name="due" required>
            </div>
            <div class="input_field">
                <label>Shift</label>
                <div class="radio1"></div>Morning<input type="radio"  value="Morning" name="shift"
                <?php
                    if($result["shift"]=='Morning'){
                        echo "checked"; 
                    }
                ?>>            
                <div class="radio2"></div>Evening<input type="radio"  value="Evening" name="shift"
                <?php
                    if($result["shift"]=='Evening'){
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
            
            $date            =   $_POST['date'];
            $sale_amount     =   $_POST['sale_amount'];
            $due             =   $_POST['due'];
            $shift           =   $_POST['shift'];
            

            $query  =  "UPDATE sale_record set date='$date',sale_amount='$sale_amount',due='$due',shift='$shift' WHERE id='$id'";

            $data   =   mysqli_query($connection, $query);

            if($data)
            {
                echo "<script>alert('Data Updated')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   url=http://localhost/qasimlab/1.%20Daily%20Sales%20Record/display.php" />
                <?php
            }
            else{
                echo "<script>alert('Data Updated Failed')</script>";           }
        }
  
    ?>
