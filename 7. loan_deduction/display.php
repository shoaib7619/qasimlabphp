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
$query 	="SELECT * FROM loan_deduction";
$data= mysqli_query($connection,$query);
$total=mysqli_num_rows($data);

    ?>
     <body>
    <div class="header">
        <h1>QASIM CLINICAL LAB</h1>
        </div>
    <h2 align="center">Loan Deduction<h2>

    <div class="search_form">

<form action="" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="input-field" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Employ name/Date">
        <button type="submit" class="add">Search</button>
    </div>
</form>

</div>

    <table align ="center" border="1" cellspacing="7px" width="75%">
    <tr>
        <th width= "15%">Date</th>
        <th width= "10%">Emp Name</th>
		<th width= "10%">Deducted Amount</th>
        <th width="10%">Operations</th>
        
    </tr>
<?php
if($total !=0 && (isset($_GET['search'])) != 'GET' ){
    while($result=mysqli_fetch_assoc($data))
    {
        echo "<tr>
        <td>".$result['date']."</td>
        <td>".$result['emp_name']."</td>
		<td>".$result['deducted_amount']."</td>
        <td><a href= 'update.php?id=$result[id]'><input type='submit' value='UPDATE' class='update'></a>
    </tr>";

    }
}
 elseif(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM loan_deduction WHERE CONCAT(emp_name,date) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($connection, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                <td width= "15%"><?= $items['date']; ?></td>
													<td width= "10%"><?= $items['emp_name']; ?></td>	
													<td width= "10%"><?= $items['deducted_amount']; ?></td>
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
<a href="http://localhost/qasimlab/7.%20loan_deduction/form.php">
    <input type="submit" value="ADD" class='add'></input></a>
    <script>
	function checkdelete() {

		return confirm('Are You Sure You Want To Delete This Record?');
	}
</script>







  <!-- modal for show edit
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <form method="POST">
        <table cellpadding="10px" width="100%" id="edit-form">
          <tr>
            <td width='90px'>First Name</td>
            <td><input type='text' id='edit-fname' autocomplete="off">
                <input type='text' id='edit-id' hidden>
            </td>
          </tr>
          <tr>
            <td width='90px'>Last Name</td>
            <td><input type='text' id='edit-lname' autocomplete="off"></td>
          </tr>
          <tr>
            <td width='90px'>Class</td>
            <td>
              <select id='edit-class'></select>
            </td>
          </tr>
          <tr>
            <td width='90px'>City</td>
            <td><input type='text' id='edit-city' autocomplete="off"></td>
          </tr>
          <tr>
            <td></td>
            <td><button type="button" onclick='modify_data()' id='edit-submit'>Save</button></td>
          </tr>
        </table>
      </form>
      <div id="close-btn" onclick="hide_modal()">X</div>
    </div>
  </div>
   -->