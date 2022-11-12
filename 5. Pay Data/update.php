<?php           include('../inc/connection.php'); 
                error_reporting(0);
$id= $_GET['id'];
$query  =       "SELECT * FROM pay_data WHERE pay_id='$id'";
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
                Update Pay Data
            </div>
            <div class="form">
            <div class="input_field">
                <label>Name</label>
                <input type="text" value="<?php echo $result['name'];?>" name="name" required>
            </div>
            <div class="input_field">
                <label>Morning_Pay</label>
                <input type="number" value="<?php echo $result['morning_pay'];?>" name="mor" required>
            </div>
            <div class="input_field">
                <label>Evening_Pay</label>
                <input type="number" value="<?php echo $result['evening_pay'];?>" name="eve" required>
            </div>
            <div class="input_field">
                <label>Date</label>
                <input type="date" value="<?php echo $result['date'];?>" name="date" required>
            </div>
            <div class="input_field">
                <label>Check Validity</label>
                <div class="radio1"></div>Valid<input type="radio" value="Valid" name="check"
                <?php
                    if($result["check_validity"]=='Valid'){
                        echo "checked"; 
                    }
                ?>>
                <div class="radio2"></div>Invalid<input type="radio" value="Invalid" name="check"
                <?php
                    if($result["check_validity"]=='Invalid'){
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
        $Name             =   $_POST['name'];
        $Mor              =   $_POST['mor'];
        $Eve              =   $_POST['eve'];
        $Date             =   $_POST['date'];
        $check            =   $_POST['check'];
      
            

        $query  =  "UPDATE pay_data set name='$Name',morning_pay='$Mor',evening_pay='$Eve',date='$Date', check_validity='$check'WHERE pay_id='$id'";

        $data   =   mysqli_query($connection, $query);
            if($data)
            {
                echo "<script>alert('Data Updated')</script>";
                ?>
                <meta http-equiv="refresh" content="0;   url=http://localhost/qasimlab/5.%20Pay%20Data/display.php" />
                <?php
            }
            else{
                echo "<script>alert('Data Updated Failed')</script>";           }
        }
  
    ?>
