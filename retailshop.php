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
h4{
	color:silver;
}
</style>
<title>Login</title>
</head>

<body bgcolor="white">
<!-- <body bgcolor="invisible"> -->

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

<?php

					$id = [];
					$i=0;$j=0;$quan="";
					$count=0;
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



					$query = "SELECT * FROM product WHERE p_category = 'beverages'";
					$result = mysqli_query($connect,$query) or die(mysqli_error());
					
					echo"<h4 align='center'>BEVERAGES</h4>
					<table border='1' bgcolor='grey' align='center' width='60%'>
					<tr>
					<td width='20%'><strong>Product Name</strong></td>
					<td width='10%'><strong>Cost</strong></td>
					<td width='50%'><strong>Description</strong></td>
					<td width='10%'><strong>Wanna Buy??</strong></td>
					<td width='10%'><strong>Quantity</strong></td>
				</tr>
				
						";
					while($rows = mysqli_fetch_assoc($result))
						{
							$i++;
							$j++;
							extract($rows);
							$count++;
							$id [$i] = $p_id;
							

							echo "
								<tr bgcolor='#e2e8f0'>
								<td width='20%'><strong>$p_name</strong></td>
								<td width='10%'><strong>$p_cost/-</strong></td>
								<td width='50%'><strong>$p_description</strong></td>
								<td width='10%'><form method='post'><input type='checkbox' name='$i' value='i'></td>
								<td width='10%'><input type='number' name='$j' value='j'></form</td>
								</tr>
								";

						}

						echo"</table>";


						$query = "SELECT * FROM product WHERE p_category = 'snacks'";
					$result = mysqli_query($connect,$query) or die(mysqli_error());
					
					echo"<h4 align='center'>SNACKS</h4>
					<table border='1' bgcolor='grey' align='center' width='60%'>
					<tr>
					<td width='20%'><strong>Product Name</strong></td>
					<td width='10%'><strong>Cost</strong></td>
					<td width='50%'><strong>Description</strong></td>
					<td width='10%'><strong>Wanna Buy??</strong></td>
					<td width='10%'><strong>Quantity</strong></td>
				</tr>
						
					";
					while($rows = mysqli_fetch_assoc($result))
						{
							
							$i++;$j++;
							extract($rows);
							$count++;
							$id [$i] = $p_id;
							echo "

								<tr bgcolor='#e2e8f0'>
								<td width='20%'><strong>$p_name</strong></td>
								<td width='10%'><strong>$p_cost/-</strong></td>
								<td width='50%'><strong>$p_description</strong></td>
								<td width='10%'><form method='post'><input type='checkbox' name='$i' value='i'></td>
								<td width='10%'><input type='number' name='$j' value='j'></form</td>
								</tr>
							

							";
						}

						echo"</table>";


					$query = "SELECT * FROM product WHERE p_category = 'Fruits&Vegetables'";
					$result = mysqli_query($connect,$query) or die(mysqli_error());
					
					echo "<tr bgcolor='#e2e8f0'><h4 align='center'>FRUITS AND VEGETABLES</h4></tr>
					
					<table border='1' bgcolor='grey' align='center' width='60%'>
					<tr>
					<td width='20%'><strong>Product Name</strong></td>
					<td width='10%'><strong>Cost</strong></td>
					<td width='50%'><strong>Description</strong></td>
					<td width='10%'><strong>Wanna Buy??</strong></td>
					<td width='10%'><strong>Quantity</strong></td>
				</tr>";
				while($rows = mysqli_fetch_assoc($result))
						{
							//print_r($pid);
							$i++;$j++;
							extract($rows);
							$count++;
							$id [$i] = $p_id;
							//print_r($p_id);
							//print_r($id [$i]);
							echo "
								<tr bgcolor='#e2e8f0'>
								<td width='20%'><strong>$p_name</strong></td>
								<td width='10%'><strong>$p_cost/-</strong></td>
								<td width='50%'><strong>$p_description</strong></td>
								<td width='10%'><form method='post'><input type='checkbox' name='$i' value='i'></td>
								<td width='10%'><input type='number' name='$j' value='j'></form</td>
								</tr>
								";
						}

						echo"</table>";



					$query = "SELECT * FROM product WHERE p_category = 'grocery'";
					$result = mysqli_query($connect,$query) or die(mysqli_error());
					
					echo"<tr bgcolor='#e2e8f0'><h4 align='center'>GROCERY</h4></tr>
					<table border='1' bgcolor='grey' align='center' width='60%'>
					<tr>
					<td width='20%'><strong>Product Name</strong></td>
					<td width='10%'><strong>Cost</strong></td>
					<td width='50%'><strong>Description</strong></td>
					<td width='10%'><strong>Wanna Buy??</strong></td>
					<td width='10%'><strong>Quantity</strong></td>
				</tr>";
					
					while($rows = mysqli_fetch_assoc($result))
						{
							$i++;$j++;
							extract($rows);
							$count++;
					$id [$i] = $p_id;
							echo "
								<tr bgcolor='#e2e8f0'>
								<td width='20%'><strong>$p_name</strong></td>
								<td width='10%'><strong>$p_cost/-</strong></td>
								<td width='50%'><strong>$p_description</strong></td>
								<td width='10%'><form method='post'><input type='checkbox' name='$i' value='i'></td>
								<td width='10%'><input type='number' name='$j' value='j'></form</td>
								</tr>
								";
						}

					echo"</table>";





$query = "SELECT * FROM product WHERE p_category = 'others'";
					$result = mysqli_query($connect,$query) or die(mysqli_error());
					
					echo"<tr bgcolor='#e2e8f0'><h4 align='center'>OTHERS</h4></tr>
					<table border='1' bgcolor='grey' align='center' width='60%'>
					<tr>
					<td width='20%'><strong>Product Name</strong></td>
					<td width='10%'><strong>Cost</strong></td>
					<td width='50%'><strong>Description</strong></td>
					<td width='10%'><strong>Wanna Buy??</strong></td>
					<td width='10%'><strong>Quantity</strong></td>
				</tr>";
					
					while($rows = mysqli_fetch_assoc($result))
						{
							$i++;$j++;
							extract($rows);
							$count++; 
					$id [$i] = $p_id;
							echo "
								<tr bgcolor='#e2e8f0'>
								<td width='20%'><strong>$p_name</strong></td>
								<td width='10%'><strong>$p_cost/-</strong></td>
								<td width='50%'><strong>$p_description</strong></td>
								<td width='10%'><form method='post'><input type='checkbox' name='$i' value='i'></td>
								<td width='10%'><input type='number' name='$j' value='j'></form</td>
								</tr>
								";
						}

					echo"</table>";

					


					


						
						$query = "SELECT *
					    FROM product 
						WHERE p_name = (SELECT product_name FROM invoice WHERE customer_email = '$email'
						AND product_quantity = (SELECT max(product_quantity) FROM invoice WHERE customer_email = '$email'))";



						 $query = "SELECT max(product_quantity) FROM invoice WHERE customer_email = '$email'";
					$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
					
					echo"<tr bgcolor='#e2e8f0'><h4 align='center'>RECOMMENDATIONS</h4></tr>
					<table border='1' bgcolor='grey' align='center' width='60%'>
					<tr>
					<td width='20%'><strong>Product Name</strong></td>
					<td width='10%'><strong>Cost</strong></td>
					<td width='50%'><strong>Description</strong></td>
					<td width='10%'><strong>Wanna Buy??</strong></td>
					<td width='10%'><strong>Quantity</strong></td>
				</tr>";
					
					while($rows = mysqli_fetch_assoc($result))
						{
							$i++;$j++;
							extract($rows);
							$count++;
					$id [$i] = $p_id;
					//print_r($id [$i]);
							echo "
								<tr bgcolor='#e2e8f0'>
								<td width='20%'><strong>$p_name</strong></td>
								<td width='10%'><strong>$p_cost/-</strong></td>
								<td width='50%'><strong>$p_description</strong></td>
								<td width='10%'><form method='post'><input type='checkbox' name='$i' value='i'></td>
								<td width='10%'><input type='number' name='$j' value='j'></form</td>
								</tr>
								";
						}









						echo"</table>";


?>
</body>
</html>

<?php
$empty = 0;
//print_r($id [$i]);
if(isset($_POST['order']))
{
	
	//print_r($id [$i]);	
	//echo $i."hiii";
	unset($_SESSION['id']);
	unset($_SESSION['quantity']);
	$i=1;$j=1;$k=0;
		while($i<=$count)
		{


				if(!empty($_POST[$i]) && !empty($_POST[$j]) )
				{
					 $_SESSION['id'][$k] = $id[$i];
					//print_r($id [$i]);
					 $_SESSION['quantity'][$k] = $_POST[$j];
					 $k++;
				}
				if(empty($_POST[$i]) && empty($_POST[$j]) )
				{
					 $empty = $empty+1;
				}
				$i++;$j++;
		}
		$_SESSION['count'] = $count;
		if($empty==$count)
		{
			echo"<p align='center'><strong>Please select something!!</strong></p>";
			
		}
		else
		{
		 echo "<meta http-equiv='refresh' content='0;url=retailinvoice.php'>";
			exit();
		}
		


	
}


	echo"<h3 align='center'><input type='submit' name='order' value='order' ></h3>";
	


?>



