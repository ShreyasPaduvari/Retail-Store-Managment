<?php
session_start();
?>

<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
<style>
	body{
  margin: 10;
  padding: 0;
  background-image: url('ozan-oztaskiran-f3u87ifZZPk-unsplash.jpg');
	background-size: cover;
  /* background: linear-gradient(120deg,#2980b9, #8e44ad); */
  height: 100vh;
  /* overflow: hidden; */
}
h1{
	color:#406f5a;
	font-family: 'Poiret One', cursive;
}
h3{
	color:silver;
}
</style>
<title>Login</title>
</head>

<body bgcolor="white">

<h1 align="center"> RETAIL STORE MANAGEMENT SYSTEM </h1>

<form method='post'>
<?php

	$username=$email="";
	if(isset($_SESSION["username"]) && isset($_SESSION["email"]))
	{
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
	}
if(isset($_POST['logout']))
{
	session_destroy();
	header("location: http://localhost/dbmscode/retailindex.php");
	exit();
}
echo "<input type='submit' name='logout' value='Logout'>"
	."<div align='right'>Welcome ".$username." <br>". $email."</div>";



?>
</form>


<div id="print_setion">
     
<?php
$i=0;$j=0;$myid=0;$total = 0;$gt=0;

					$host="localhost";
					$user="root";
					$password="shrep123";
					$database="mydb";
		
					$connect=mysqli_connect($host,$user,$password,$database);
					if($connect)
					{
					}
					else
					die(mysqli_error());
					
					if (mysqli_connect_errno())
  					{
  						echo "Failed to connect to server: " . mysqli_connect_error();
  					}
		
					$select = mysqli_select_db($connect,$database);
					if($select)
					{
					}
					else
					die(mysqli_error($connect));
				echo"<h3 align='center'>INVOICE</h3>
					<table border='1' bgcolor='grey' align='center' width='40%'>
					<tr>
					<td width='20%'><strong><h4 align='center'>Product Name</h4></strong></td>
					<td width='10%'><strong><h4 align='center'>Cost</h4></strong></td>
					<td width='10%'><strong><h4 align='center'>Quantity</h4></strong></td>
					<td width='10%'><strong><h4 align='center'>Total</h4></strong></td>
					</tr>";


while($i<=$_SESSION['count'])
{		//echo"hello";	
	//echo "$_SESSION['id'][$i]";
	// $myid= $_SESSION['id'][$i];
	// print_r($myid);
	if(!empty($_SESSION['id'][$i]))
	{
		//echo"hello"; check here***
					$myid= $_SESSION['id'][$i];
					//print_r($myid);
					$myquantity = $_SESSION['quantity'][$i];
					
					$query = "SELECT*
						FROM product
						WHERE p_id='$myid'";
					
					$result = mysqli_query($connect,$query) or die(mysqli_error());
					
					while($rows = mysqli_fetch_assoc($result))
						{
							
							extract($rows);
							$total = $p_cost * $myquantity;
							$gt = $gt + $total;
							echo "
								<tr bgcolor='#d0d3d4'>
								<td width='10%'><strong>$p_name</strong></td>
								<td width='10%'><strong>$p_cost/-</strong></td>
								<td width='10%'><strong>".$myquantity."</strong></td>
								<td width='10%'><strong>".$total."</strong></td>
								</tr>
								";


						}
						

						


// print_r($_SESSION['id'][$i]);echo "<br>";
// print_r($_SESSION['quantity'][$i]);echo "<br>";

	}
$i++;
}
echo"</table>";
echo"<table border='1' bgcolor='#e2e8f0' align='center' width='40%'>
						<tr>
							
						<td width='41%' align='right'><strong>Grand Total:</strong></td>
						<td width='10%'><strong>".$gt."/-</strong></td>
					</tr></table>";
?> 
</div>

<?php
	echo"<form method='post'>
	<p align = 'center'><input type='submit' name='back' value='Go back to shop'>
	
	</p></form>";


	if(isset($_POST['back']))
{
	
	header("location: http://localhost/dbmscode/retailshop.php");
	exit();
}














if(isset($_POST['proceed']))
{
	$username=$email="";
	if(isset($_SESSION["username"]) && isset($_SESSION["email"]))
	{
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
	}
	else{echo"some problem";}
	
		// $create = "CREATE TABLE invoice(
						
		// 				order_date DATE NOT NULL,
		// 				customer_email VARCHAR(50) NOT NULL,
		// 				product_name VARCHAR(30) NOT NULL,
		// 				product_category VARCHAR(40) NOT NULL,
		// 				product_cost INT(10) NOT NULL,
		// 				product_quantity INT(10) NOT NULL,
		// 				total_cost int(10) NOT NULL
						
		// 				)";
						
					// $result = mysqli_query($connect,$create);
					// if($result)
					// echo"table created";
					// else
					// die(mysqli_error($connect));

$i=0;$myid=0;$total = 0;

while($i<=$_SESSION['count'])
{			
				if(!empty($_SESSION['id'][$i]))
				{
					$myid = $_SESSION['id'][$i];
					//print_r($myid);
					
					$myquantity = $_SESSION['quantity'][$i];
					
					$query = "SELECT*
						FROM product
						WHERE p_id='$myid'";
					$result = mysqli_query($connect,$query) or die(mysqli_error());

					while($rows = mysqli_fetch_assoc($result))
						{
							extract($rows);
							$total = $p_cost * $myquantity;

							$query = "INSERT INTO invoice (order_date,customer_email,product_name,product_category,product_cost,product_quantity,total_cost) VALUES 
							(now(),'$email','$p_name','$p_category',$p_cost,$myquantity,$total)";
							// $result = mysqli_query($connect,$query);
							// if($result)
							// echo"RECORD ENTERED!!!";
							// else
							// die(mysqli_error($connect));
								
						 }
				}
				$i++;
}

					header("location: http://localhost/dbms%20code/retailtransaction.php");
					exit();

}



?>
 <script>
function printDivSection(setion_id) {
    var Contents_Section = document.getElementById(setion_id).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = Contents_Section;

    window.print();

    document.body.innerHTML = originalContents;
}
</script> 
	

<input type="button" onclick="printDivSection('print_setion')" value="Print" style="margin-left: 828;/*! margin-bottom: -17px; *//*! margin-inline: revert; *//*! margin-block: ; */position: relative;bottom: 37;">
<!-- <input type="button" onclick="printDivSection('print_setion')" value="Print" /> -->

</body>
</html>