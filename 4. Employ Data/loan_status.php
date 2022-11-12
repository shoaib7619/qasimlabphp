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
$query  =   "SELECT * FROM loan_data WHERE name='$name'";
$data= mysqli_query($connection,$query);
$total=mysqli_num_rows($data);

    ?>
     <body>
    <div class="header">
        <h1>QASIM CLINICAL LAB</h1>
        </div>
    <h2 align="center">Loan Status<h2>

</div>

    <table align ="center" border="1" cellspacing="7px" width="75%">
    <tr>
        <th width= "10%">Name</th>
        <th width= "15%">Date</th>
		<th width= "10%">Loan Amount</th>
        <th width= "5%">Deduction Rate</th>
        <th width= "5%">Remaining Amount</th>
        <th width= "5%">Loan Status</th>
        <th width="10%">Operations</th>
        
    </tr>
<?php
if($total !=0){
    while($result=mysqli_fetch_assoc($data))
    {
        echo "<tr>
        <td>".$result['name']."</td>
        <td>".$result['date']."</td>
		<td>".$result['loan_amount']."</td>
        <td>".$result['deduction_rate']."</td>
		<td>".$result['remaining_amount']."</td>
		<td>".$result['loan_status']."</td>
        <td><a href= '../6. Loan Data/update.php?id=$result[loan_id]'><input type='submit' value='UPDATE' class='update'></a>
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