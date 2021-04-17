<html>
<head>
<title>Customers</title>
<link rel="stylesheet" href="style1.css">
</head>
<body>
<header>
    <style>
        h1{
            text-align: center;
            margin-top: 15vh;
            font-size: 35px;
            margin-right: 250px;
            color:white;
            font-family: 'Carter One', cursive; 
        }

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

        table,th,td{
            margin-top: 20px;
            margin-left:19vh;

        }

        .logo img {
         width: 180px;
         height: auto;
         float: left;
         margin-left:-29vh;
         margin-top:-29vh;
         }

         .button{
          border:none;
          background-color:lightsalmon;
          color:black ;
          padding: 9px;          
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          /*margin: 4px 2px;*/
          cursor: pointer;
          border-radius:30%;
          font-weight:bold;
         }
    </style>
    
    <div class="main">
    
<div class="topnav">   
   <a href="trans.php">Transfer Amount</a>
   <a href="with.php">Withdraw Amount</a>
   <a href="deposit.php">Deposit Money</a>
   <div class="liv">
   <a href="customers1.php">Customers</a>
   </div>
   <a href="home1.php">Home</a>
   <h1>Customer Details</h1>

   <?php
   session_start();
   $errors=array();
   $con=mysqli_connect("localhost","root","","bank");
   if($con->connect_error)
   die("Connection failed :".$con->connect_error);

   if(count($errors)==0){
    $result = mysqli_query($con,"SELECT * FROM customers");

    if(mysqli_num_rows($result)>0){
        echo "<table border='1'>
        <tr>
        <th>Account Number</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Current Balance</th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['Account_Number'] . "</td>";
        echo "<td>" . $row['Firstname'] . "</td>";
        echo "<td>" . $row['Lastname'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['Phone_Number'] . "</td>";
        echo "<td>" . $row['Current_Balance'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        }
        else{
            array_push($errors,"No data found");
        }
        }
        mysqli_close($con);
        ?>

        <?php  if (count($errors) > 0) : ?>
         <div class="error">
    	<?php foreach ($errors as $error) : ?>
  	    <p><?php echo $error ?></p>
  	    <?php endforeach ?>
         </div>
        <?php  endif ?>
        </br></br>

        <form action="home1.php" method="post"/>
        <center><input class="button" type="submit" value="Home" /></center>
        </form>
   

</div>
</header>
</body>
</html>

