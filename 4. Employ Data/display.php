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
$query 	="SELECT * FROM employ_data";
$data= mysqli_query($connection,$query);
$total=mysqli_num_rows($data);

    ?>
     <body>
    <div class="header">
        <h1>QASIM CLINICAL LAB</h1>
        </div>
    <h2 align="center">Employ record<h2>

    <div class="search_form">

<form action="" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="input-field" name="search"  value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="NAME / CNIC / Shift">
        <button type="submit" class="add">Search</button>
    </div>
</form>

</div>

    <table align ="center" border="1" cellspacing="7px" width="80%">
    <tr>
        <th width= "10%">Name</th>
        <th width= "15%">CNIC</th>
		<th width= "10%">Address</th>
        <th width= "5%">Phone No</th>
        <th width= "5%">Designation</th>
        <th width= "5%">Shift</th>
		<th width= "5%">Detail</th>
        <th width="10%">Operations</th>
        
    </tr>
<?php
if($total !=0 && (isset($_GET['search'])) != 'GET' ){
    while($result=mysqli_fetch_assoc($data))
    {
        echo "<tr>
        <td>".$result['name']."</td>
        <td>".$result['cnic']."</td>
		<td>".$result['address']."</td>
        <td>".$result['phone_no']."</td>
		<td>".$result['designation']."</td>
		<td>".$result['shift']."</td>
        <td>".$result['detail']."</td>
        <td><a href= 'update.php?id=$result[emp_id]'><input type='submit' value='UPDATE' class='update'></a>
        <a href= 'loan_status.php?name=$result[name]'><input type='submit' value='Loan Status' class='update'></a>
        <a href= 'pay_status.php?name=$result[name]'><input type='submit' value='Pay Status' class='update'></a></td>
        </td>
    </tr>";

    }
}
 elseif(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM employ_data WHERE CONCAT(name,cnic,shift) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($connection, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
													<td width= "10%"><?= $items['name']; ?></td>
													<td width= "15%"><?= $items['cnic']; ?></td>
													<td width= "10%"><?= $items['address']; ?></td>
                                                    <td width= "5%"><?= $items['phone_no']; ?></td>
													<td width= "5%"><?= $items['designation']; ?></td>					
													<td width= "5%"><?= $items['shift']; ?></td>
													<td width= "10%"><?= $items['detail']; ?></td>
                                                <td><a href= 'update.php?id=<?= $items['emp_id']; ?>'><input type='submit' value='UPDATE' class='update'></a>
                                                <a href= 'loan_status.php?name=<?= $items['name']; ?>'><input type='submit' value='Loan Status' class='update'></a>
                                                <a href= 'pay_status.php?name=<?= $items['name']; ?>'><input type='submit' value='Pay Status' class='update'></a></td>
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
<a href="http://localhost/qasimlab/4.%20Employ%20Data/form.php">
    <input type="submit" value="ADD" class='add'></input></a>
    <script>
	function checkdelete() {

		return confirm('Are You Sure You Want To Delete This Record?');
	}
    </script>