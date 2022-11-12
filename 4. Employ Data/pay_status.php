<?php           include('../inc/connection.php'); 
                error_reporting(0);
?>
 
 <html>
<head>
    <title>Display</title>
    <link rel="stylesheet" href="../css/displaystyle.css" >   
    </head> 
    <body>
        </body>
</html>

<?php

$name= $_GET['name'];
$query  =   "SELECT * FROM pay_data WHERE name='$name'";
$data= mysqli_query($connection,$query);
$total=mysqli_num_rows($data);

    ?>
     <body>
    <div class="header">
        <h1>QASIM CLINICAL LAB</h1>
        </div>
    <h2 align="center">Pay Status<h2>

</div>

    <table align ="center" border="1" cellspacing="7px" width="75%">
    <tr>
        <th width= "10%">Name</th>
        <th width= "10%">Morning Pay</th>
		<th width= "10%">Evening Pay</th>
		<th width= "10%">Date</th>
        <th width= "5%">Check Validity</th>
        <th width="10%">Operations</th>
    </tr>
<?php
if($total !=0){
    while($result=mysqli_fetch_assoc($data))
    {
        echo "<tr>
       
		<td>".$result['name']."</td>
        <td>".$result['morning_pay']."</td>
		<td>".$result['evening_pay']."</td>
		<td>".$result['date']."</td>
        <td>".$result['check_validity']."</td>
        <td><a href= '../5. Pay Data/update.php?id=$result[pay_id]'><input type='submit' value='UPDATE' class='update'></a>
    </tr>";

    }
}

                                         else
                                        {
                                            ?>
                                                <tr>
                                                    <td>No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    
                                

?>
</table>
<a href="http://localhost/qasimlab/6.%20Loan%20Data/form.php">
    <input type="submit" value="ADD" class='add'></input></a>
    <script>
	function checkdelete() {

		return confirm('Are You Sure You Want To Delete This Record?');
	}
</script>