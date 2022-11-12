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
$query 	="SELECT * FROM daily_exp";
$data= mysqli_query($connection,$query);
$total=mysqli_num_rows($data);

    ?>
     <body>
    <div class="header">
        <h1>QASIM CLINICAL LAB</h1>
        </div>
    <h2 align="center">Daily Expense record<h2>

    <div class="search_form">

<form action="" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="input-field" name="search"  value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="YY/MM/DD or morning/evening ">
        <button type="submit" class="add">Search</button>
    </div>
</form>

</div>

    <table align ="center" border="1" cellspacing="7px" width="75%">
    <tr>
        <th width= "15%">Date</th>
        <th width= "20%">Item Name</th>
        <th width= "10%">Item_quantity</th>
        <th width= "15%">amount</th>
		<th width= "15%">shift</th>
        <th width="15%">Operations</th>
        
    </tr>
<?php
if($total !=0 && (isset($_GET['search'])) != 'GET' ){
    while($result=mysqli_fetch_assoc($data))
    {
        echo "<tr>
        <td>".$result['date']."</td>
        <td>".$result['item_name']."</td>
        <td>".$result['item_quantity']."</td>
		<td>".$result['amount']."</td>
        <td>".$result['Shift']."</td>
        <td><a href= 'update.php?id=$result[id]'><input type='submit' value='UPDATE' class='update'></a>
    </tr>";

    }
}
 elseif(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM daily_exp WHERE CONCAT(date,Shift) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($connection, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
												<td><?= $items['date']; ?></td>
                                                    <td><?= $items['item_name']; ?></td>
                                                    <td><?= $items['item_quantity']; ?></td>
                                                    <td><?= $items['amount']; ?></td>
													<td><?= $items['Shift']; ?></td>
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
<a href="http://localhost/qasimlab/2.%20Daily%20Expence/form.php">
    <input type="submit" value="ADD" class='add'></input></a>
    <script>
	function checkdelete() {

		return confirm('Are You Sure You Want To Delete This Record?');
	}
</script>