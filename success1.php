<html>
<head><title>Transfer</title>
<link rel="stylesheet" href="style.css">

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
				table{width : 90%;}

 table,td{
         color:white;
         font-size: 20px;
}
th{
            color:white ;
            background-color:rgb(12,128,128) ;
            font-size: 20px;
            font-family: 'Carter One', cursive;
        }
h1 {         
           text-align: center;
            margin-top: 8vh;
            font-size: 30px;
            margin-right:40px;
            color:gold;
            font-family: 'Carter One', cursive; 
        }

 h2{
    text-align: center;          
            color:white;
            font-family: 'Carter One', cursive;
 }       
 h3{
    color:white;
            
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
  margin-top:-55px;
				}
</style>
</head>
<body>
<?php
$errors=array();
$con=mysqli_connect("localhost","root","","bank");
if($con->connect_error)
die("Connection failed :".$con->connect_error);

$sender=mysqli_real_escape_string($con,$_POST['sender']);
$reciever=mysqli_real_escape_string($con,$_POST['reciever']);
$transfer_amt=mysqli_real_escape_string($con,$_POST['transfer']);
$remark=mysqli_real_escape_string($con,$_POST['remark']);


  

if(count($errors)==0){
	echo "<h1>TRANSFER DETAILS</h1>";
	echo "<center><h2>Before Transfer</h2></center>";
	echo "<center><h3><i>Sender Details</i></h3></center>";
	$sql=mysqli_query($con,"select * from customers where account_number='$sender'");
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
<th>Remark</th>
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
echo "<td>" . $remark . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br>";
}

echo "<center><h3><i>Reciever Details</i></h3></center>";
$sqlr=mysqli_query($con,"select * from customers where account_number='$reciever'");
	if(mysqli_num_rows($sqlr)>0){
echo "<center><table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
<th>Remark</th>
</tr>";

while($r = mysqli_fetch_array($sqlr))
{
echo "<tr>";
echo "<td>" . $r['Account_Number'] . "</td>";
echo "<td>" . $r['Firstname'] . "</td>";
echo "<td>" . $r['Lastname'] . "</td>";
echo "<td>" . $r['Email'] . "</td>";
echo "<td>" . $r['Address'] . "</td>";
echo "<td>" . $r['Phone_Number'] . "</td>";
echo "<td>" . $r['Current_Balance'] . "</td>";
echo "<td>" . $remark . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br></br><hr/>";
}

echo "<center><h2>After Transfer</h2></center>";

$send_cur=mysqli_query($con,"select current_balance from customers where account_number='$sender'");
$rec_cur=mysqli_query($con,"select current_balance from customers where account_number='$reciever'");
$row_send = mysqli_fetch_array($send_cur);
$row_rec=mysqli_fetch_array($rec_cur);
	if($row_send['current_balance']>$transfer_amt){
		$diff=$row_send['current_balance']-$transfer_amt;
		$add=$row_rec['current_balance']+$transfer_amt;
		mysqli_query($con,"update customers set current_balance='$diff' where account_number='$sender'");
		mysqli_query($con,"update customers set current_balance='$add' where account_number='$reciever'");
	
		$date=date('Y-m-d H:i:s');
		
		//"insert into users (email,username,password) values('$email','$username','$password')";
		// date_time ; remark ; transfer_amt ; sender_account_number; 
		$done=mysqli_query($con,"insert into transfer (date_time,remark,transfer_amount,account_number) values('$date','$remark','$transfer_amt','$sender')");
	}
	
	//insert into transfer table : work pending
	echo "<center><h3><i>Sender Details</i></h3></center>";
	$sql=mysqli_query($con,"select * from customers where account_number='$sender'");
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
<th>Remark</th>
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
echo "<td>" . $remark . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br>";
}

echo "<center><h3><i>Reciever Details</i></h3></center>";
$sqlr=mysqli_query($con,"select * from customers where account_number='$reciever'");
	if(mysqli_num_rows($sqlr)>0){
echo "<center><table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
<th>Remark</th>
</tr>";

while($r = mysqli_fetch_array($sqlr))
{
echo "<tr>";
echo "<td>" . $r['Account_Number'] . "</td>";
echo "<td>" . $r['Firstname'] . "</td>";
echo "<td>" . $r['Lastname'] . "</td>";
echo "<td>" . $r['Email'] . "</td>";
echo "<td>" . $r['Address'] . "</td>";
echo "<td>" . $r['Phone_Number'] . "</td>";
echo "<td>" . $r['Current_Balance'] . "</td>";
echo "<td>" . $remark . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br></br>";
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