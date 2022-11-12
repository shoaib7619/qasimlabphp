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
$query 	="SELECT * FROM monthly_exp";
$data= mysqli_query($connection,$query);
$total=mysqli_num_rows($data);

    ?>
     <body>
    <div class="header">
        <h1>QASIM CLINICAL LAB</h1>
        </div>
    <h2 align="center">Monthly Expense record<h2>

    <div class="search_form">

<form action="" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="input-field" name="search"  value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="YY/MM/DD or company name ">
        <button type="submit" class="add">Search</button>
    </div>
</form>

</div>

    <table align ="center" border="1" cellspacing="7px" width="75%">
    <tr>
        <th width= "10%">Date</th>
        <th width= "15%">Company Name</th>
		<th width= "10%">Item Name</th>
        <th width= "5%">Item_quantity</th>
        <th width= "5%">Total amount</th>
        <th width= "5%">Discount</th>
		<th width= "5%">due</th>
        <th width="10%">Operations</th>
        
    </tr>
<?php
if($total !=0 && (isset($_GET['search'])) != 'GET' ){
    while($result=mysqli_fetch_assoc($data))
    {
        echo "<tr>
        <td>".$result['date']."</td>
        <td>".$result['company_name']."</td>
		<td>".$result['item_name']."</td>
        <td>".$result['item_quantity']."</td>
		<td>".$result['total_amount']."</td>
		<td>".$result['discount']."</td>
        <td>".$result['due']."</td>
        <td><a href= 'update.php?id=$result[id]'><input type='submit' value='UPDATE' class='update'></a>
    </tr>";

    }
}
 elseif(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM monthly_exp WHERE CONCAT(date,company_name) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($connection, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
													<td width= "10%"><?= $items['date']; ?></td>
													<td width= "15%"><?= $items['company_name']; ?></td>
													<td width= "10%"><?= $items['item_name']; ?></td>
                                                    <td width= "5%"><?= $items['item_quantity']; ?></td>
													<td width= "5%"><?= $items['total_amount']; ?></td>					
													<td width= "5%"><?= $items['discount']; ?></td>
													<td width= "10%"><?= $items['due']; ?></td>
                                                <td><a href= 'update.php?id=<?= $items['id']; ?>'><input type='submit' value='UPDATE' class='update'></a>
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
<a href="http://localhost/qasimlab/3.%20Monthly%20Expence/form.php">
    <input type="submit" value="ADD" class='add'></input></a>
    <script>
	function checkdelete() {

		return confirm('Are You Sure You Want To Delete This Record?');
	}
</script>