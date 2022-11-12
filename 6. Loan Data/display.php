<html>
<head>
    <title>Display</title>
    <link rel="stylesheet" href="../css/displaystyle.css" >   
    </head> 
    <body>
        </body>
</html>
<?php
include '../inc/connection.php';
$query 	="SELECT * FROM loan_data";
$data= mysqli_query($connection,$query);
$total=mysqli_num_rows($data);

    ?>
     <body>
    <div class="header">
        <h1>QASIM CLINICAL LAB</h1>
        </div>
    <h2 align="center">Loan record<h2>

    <div class="search_form">

<form action="" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="input-field" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="NAME / Loan Status" >
        <button type="submit" class="add">Search</button>
    </div>
</form>

</div>

    <table align ="center" border="1" cellspacing="7px" width="75%">
    <tr>
        <th width= "10%">Name</th>
        <th width= "15%">Date</th>
		<th width= "10%">Loan Amount</th>
        <th width= "10%">Previous loan</th>
        <th width= "5%">Deduction Rate</th>
        <th width= "5%">Remaining Amount</th>
        <th width= "5%">Loan Status</th>
        <th width="10%">Operations</th>
        
    </tr>
<?php
if($total !=0 && (isset($_GET['search'])) != 'GET' ){
    while($result=mysqli_fetch_assoc($data))
    {
        if ($result['loan_status']=='Pending'){
        echo "<tr>
        <td>".$result['name']."</td>
        <td>".$result['date']."</td>
		<td>".$result['loan_amount']."</td>
        <td>".$result['previous_loan']."</td>
        <td>".$result['deduction_rate']."</td>
		<td>".$result['remaining_amount']."</td>
		<td>".$result['loan_status']."</td>        
        <td><a href= 'update.php?id=$result[loan_id]'><input type='submit' value='UPDATE' class='update'></a>
    </tr>"; 
        }        
    }
}
 elseif(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM loan_data WHERE CONCAT(name,loan_status) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($connection, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
													<td width= "10%"><?= $items['name']; ?></td>
													<td width= "15%"><?= $items['date']; ?></td>
													<td width= "10%"><?= $items['loan_amount']; ?></td>
                                                    <td width= "10%"><?= $items['previous_loan']; ?></td>
                                                    <td width= "5%"><?= $items['deduction_rate']; ?></td>
													<td width= "5%"><?= $items['remaining_amount']; ?></td>					
													<td width= "5%"><?= $items['loan_status']; ?></td>
                                                    <td><a href= 'update.php?id=<?=$items['loan_id']; ?>'><input type='submit' value='UPDATE' class='update'></a>
                                                </tr>
                                                <?php
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


