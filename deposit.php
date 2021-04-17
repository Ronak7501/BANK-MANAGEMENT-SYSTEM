<html>
<head>
<title>Deposit</title>
<link rel="stylesheet" href="style1.css">
</head>
<header>
<body>
    
<style>



form{
                position: absolute;
                top:225px;
                left:450px;
                }
                legend{font-size: 30px; color:black ; font-weight: bold;font-family: 'Carter One',cursive; }
                label{ font-size:25px; text-align:center;font-family: 'Carter One',cursive; font-weight: bold; }
                input[type=text]{width : 80%; height:60%; padding: 12px 20px; border-radius:10px;}
                h2{
                    color:white;
                    left: 440px;
                    top: 170px;
                    float: center;
                    position: absolute;
                }
                h1 {
                color: gold;
                font-family: 'Signika', sans-serif;
                left: 450px;
                top: 120px;
                float: center;
                position: absolute;
}

  .button {
  background-color:mediumspringgreen;
  border: none;
  border-radius:30%;
  color: black;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  font-weight:bold;
  position:absolute;
  left :90px;
  top:325px;
}
.button1 {
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
  position:absolute;
  left :175px;
  top:325px;
  
}
.button:hover{
    background-color:limegreen;
    color:black;
}
.button1:hover{
    background-color:salmon;
    color:black;
}


fieldset {
    display: block;
    margin-inline-start: -100px;
    margin-inline-end: 2px;
    padding-block-start: 0.35em;
    padding-inline-start: 0.75em;
    padding-inline-end: 0.75em;
    padding-block-end: 3.5em;
    min-inline-size: min-content;
    border-width: 2px;
    border-style: groove;
    border-color: threedface;
    border-image: initial;
}
</style>

<div class="main">
    
    <div class="topnav">   
       <a href="trans.php">Transfer Amount</a>
       <a href="with.php">Withdraw Amount</a>
       <div class="liv">
       <a href="deposit.php">Deposit Money</a>
       </div>
       <a href="customers1.php">Customers</a>
       <a href="home1.php">Home</a>
       <center><h1>Deposit Your Money !!</h1></center>
    <center><h2><i>Save your money before its too late</i></h2></center>
        <form action="sav.php" method="post">
            <fieldset>
                <legend><u>Fill up these details</u></legend>
                <label>Enter your Name :</label><input type="text" name="name"placeholder="Name"  required  /> </br></br>
            <label>Enter your Account Number :</label><input type="text" name="accno"placeholder="Account Number" required /> </br></br>
            <label>Enter the Amount to Deposit:</label><input type="text" name="amt" placeholder=" Amount to Deposit"required /> </br></br>
       <center><input class="button" type="submit" value="Deposit"/></center>
            </fieldset>
        </form>
		<form action="home1.php" method="post"/>
<center><input class="button1" type="submit" value="Home" /></center>   
</form>
</header>
</body>
</html>
