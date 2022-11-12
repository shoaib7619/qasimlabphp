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
$query 	="SELECT * FROM pay_data";
$data= mysqli_query($connection,$query);
$total=mysqli_num_rows($data);

    ?>
     <body>
    <div class="header">
        <h1>QASIM CLINICAL LAB</h1>
        </div>
    <h2 align="center">Pay Record<h2>

    <div class="search_form">

<form action="" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="input-field" name="search"  value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="NAME / DATE">
        <button type="submit" class="add">Search</button>
    </div>
</form>

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
if($total !=0 && (isset($_GET['search'])) != 'GET' ){
    while($result=mysqli_fetch_assoc($data))
    {
        echo "<tr>
		<td>".$result['name']."</td>
        <td>".$result['morning_pay']."</td>
		<td>".$result['evening_pay']."</td>
		<td>".$result['date']."</td>
        <td>".$result['check_validity']."</td>
        <td><a href= 'update.php?id=$result[pay_id]'><input type='submit' value='UPDATE' class='update'></a>
    </tr>";

    }
}
 elseif(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM pay_data WHERE CONCAT(name,date) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($connection, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
													<td width= "10%"><?= $items['name']; ?></td>
													<td width= "10%"><?= $items['morning_pay']; ?></td>		
													<td width= "15%"><?= $items['evening_pay']; ?></td>
													<td width= "10%"><?= $items['date']; ?></td>
                                                    <td width= "5%"><?= $items['check_validity']; ?></td>
                                                <td><a href= 'update.php?id=<?= $items['pay_id']; ?>'><input type='submit' value='UPDATE' class='update'></a>
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
<a href="http://localhost/qasimlab/5.%20Pay%20Data/form.php">
    <input type="submit" value="ADD" class='add'></input></a>
    <script>
	function checkdelete() {

		return confirm('Are You Sure You Want To Delete This Record?');
	}
</script>