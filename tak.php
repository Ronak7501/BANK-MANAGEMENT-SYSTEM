<html>
<head><title>Success</title>
<style>
body{
    background-image:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.4)),url(bank1.jpg);
    background-repeat: no-repeat;
    background-size:100%;
}
table,th,td{
                    color:black;
                    font-size: 20px;
                }
				table{width :80%;}
                
th{
            color:white ;
            background-color:rgb(12,128,128) ;
            font-size: 20px;
            font-family: 'Carter One', cursive;
        }

table,td{
         color:white;
         font-size: 20px;
}
h1{
                    color: gold;
					font-size:27px;
                    padding-left: 100px;
					text-align:center;
					padding-top:30px;
                    font-family: 'Carter One', cursive;
                }
                .button {
  background-color:lightsalmon; /* Green */
  border: none;
  color: black;
  padding: 9px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:30%;
  font-weight:bold;
  margin-top:20px;
				}
        
</style>
</head>
<body>
<?php
session_start();
$errors=array();
$con=mysqli_connect("localhost","root","","bank");
if($con->connect_error)
die("Connection failed :".$con->connect_error);

$accname=mysqli_real_escape_string($con,$_POST['accno']);
$amount=mysqli_real_escape_string($con,$_POST['amt']);
if(count($errors)==0){
	echo "<center><h1>RECORD BEFORE WITHDRAWAL</h1></center>";
	$before=mysqli_query($con,"select * from customers where account_number='$accname'");
	if(mysqli_num_rows($before)>0){
echo "<center><table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
</tr>";

while($r = mysqli_fetch_array($before))
{
echo "<tr>";
        echo "<td>" . $r['Account_Number'] . "</td>";
        echo "<td>" . $r['Firstname'] . "</td>";
        echo "<td>" . $r['Lastname'] . "</td>";
        echo "<td>" . $r['Email'] . "</td>";
        echo "<td>" . $r['Address'] . "</td>";
        echo "<td>" . $r['Phone_Number'] . "</td>";
        echo "<td>" . $r['Current_Balance'] . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br></br>";
}


	$result = mysqli_query($con,"select current_balance from customers where account_number='$accname'");
	$row = mysqli_fetch_array($result);
	if($row['current_balance']>$amount){
	$left_amt=$row['current_balance']-$amount;
	mysqli_query($con,"update customers set current_balance='$left_amt' where account_number='$accname'");
	}
	else{
		echo "<center><h2><i>REQUESTED AMOUNT IS HIGHER THAN CURRENT BALANCE, HENCE CANNOT BE PROCESSED</i></h2></center>";
	}
	echo "<h1><u>RECORD AFTER WITHDRAWAL</h1></center>";
	$sql=mysqli_query($con,"select * from customers where account_number='$accname'");
	if(mysqli_num_rows($sql)>0){
echo "<center><table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
</tr>";

while($r = mysqli_fetch_array($sql))
{
echo "<tr>";
echo "<td>" . $r['Account_Number'] . "</td>";
echo "<td>" . $r['Firstname'] . "</td>";
echo "<td>" . $r['Lastname'] . "</td>";
echo "<td>" . $r['Email'] . "</td>";
echo "<td>" . $r['Address'] . "</td>";
echo "<td>" . $r['Phone_Number'] . "</td>";
echo "<td>" . $r['Current_Balance'] . "</td>";
echo "</tr>";
}
echo "</table></center>";
}
}
else{
	array_push($errors,"No data found");
}

?>

<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
<form action="home1.php" method="post">
<center><input class="button" type="submit" value="Home"/></center>
</form>
</body>
</html>