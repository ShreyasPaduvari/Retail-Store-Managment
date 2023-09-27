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
	font-family: 'Poiret One', cursive;
}
</style>
<title>RETAIL STORE MANAGEMENT SYSTEM</title>
</head>
<body bgcolor="white">
<table bgcolor="#e2e8f0" align="center" style="width:100%" height="20%" >
<!-- <td><img src="http://localhost:8080/myphp/vitlogo.jpg" alt="VIT UNIVERSITY" style="width:250px;height:130px;"></td> -->
<td  width="100%"><h1 align="center">RETAIL STORE MANAGEMENT SYSTEM</h1></td>
</table>
<br>



<form method='post' id="productform">
<?php

$pid=$pname=$cost=$category=$description=$quantity="";
	if(isset($_POST['pid']))
	{$pid= $_POST['pid'];}
	if(isset($_POST['pname']))
	{$pname= $_POST['pname'];}
	if(isset($_POST['cost']))
	{$cost= $_POST['cost'];}
	if(isset($_POST['category']))
	{$category= $_POST['category'];}
	if(isset($_POST['description']))
	{$description= $_POST['description'];}
	if(isset($_POST['pquantity']))
	{$quantity= $_POST['quantity'];}
	
	
	
	
echo "	
<table align='center' border='1' cellpadding='10' bgcolor='#e2e8f0'>

<tr><td><strong>Product ID: </strong></td><td><input type='text' name='pid' value='$pid' /></td></tr>

<tr><td><strong>Product Name: </strong></td><td><input type='text' name='pname' value='$pname' /></td></tr>

<tr><td><strong>Cost:</strong></td><td><input type='text' name='cost' value='$cost'/></td> </tr>
										 
<tr><td><strong>Categorty:</strong></td><td>
<select name='category'>
  <option value='Fruits&Vegetables'>Fruits&Vegetables</option>
  <option value='grocery'>Grocery</option>
  <option value='beverages'>Beverages</option>
  <option value='snacks'>Snacks</option>
  <option value='others'>Others</option>

</select></td></tr>
<tr><td><strong>Quantity:</strong></td><td><input type='text' name='quantity' value='$quantity'/></td> </tr>

<tr><td><strong>Description:</strong></td><td><textarea rows='5' cols='22' name='description' 
value='$description' form='productform' placeholder='Enter the description here...'></textarea></td> </tr>



<tr><td colspan='2' align='right'><input type='submit' name='submitvalue' value='submit' /></td></tr>

</table>";
echo "<p align='center'><input type='submit' name='Exit' value='Exit'>";
?>
</form>



<?php

if(isset($_POST['Exit']))
{
	$exit = header("location: retailproducts.php");
}

if(isset($_POST['submitvalue']))
{
		if(!empty($_POST['quantity']) && !empty($_POST['pname']) && !empty($_POST['cost']) && !empty($_POST['category']) && !empty($_POST['description']) && !empty($_POST['pid']))
			{
				$pid= $_POST['pid'];
				$pname= $_POST['pname'];
				$cost= $_POST['cost'];
				$category= $_POST['category'];
				$description= $_POST['description'];
				$quantity= $_POST['quantity'];
				
				// if (!preg_match("/^[a-zA-Z ]*$/",$pname))
				// {echo "<p align='center'> Only letters and white space allowed in Name!!</p>";exit();}
				if (!preg_match("/^[0-9]*$/",$quantity))
				{echo "<p align='center'> Only Numbers allowed in Quantity!!</p>";exit();}
				else
				{
					//DATABASE CONNECT AFTER VALIDIATION.....
					$flag=0;
					$host="localhost";
					$user="root";
					$password="shrep123";
					$database="mydb";
		
					$connect=mysqli_connect($host,$user,$password,$database);
					// if($connect)
					// {echo "Connected to the server...!!";}
					// else
					// die(mysqli_error());
					
					if (mysqli_connect_errno())
  					{
  						echo "Failed to connect to MySQL: " . mysqli_connect_error();
  					}
		
					// $select = mysqli_select_db("mydb");
					// if($select)
					// {echo "Selected Database...!!";}
					// else
					// die(mysqli_error());
		
		
		// if($flag==0)
		// {
			// $create = "CREATE TABLE product(
			// 			p_id VARCHAR(30)  PRIMARY KEY,
			// 			p_name VARCHAR(30) NOT NULL,
			// 			p_cost INT(6) NOT NULL,
			// 			p_category VARCHAR(30) NOT NULL,
			// 			p_quantity INT(4) NOT NULL,
			// 			p_description VARCHAR(150) NOT NULL
			// 			)";
						
		// 		$result = mysqli_query($connect,$create);
		// 				if($result)
		// 					// echo " Table created...!!";
		// 				else
		// 					die(mysqli_error($connect));
		// 	$flag++;
		// }
		
		$insert = "INSERT INTO product (p_id, p_name, p_cost, p_category, p_quantity, p_description)
		VALUES ('$pid', '$pname', '$cost', '$category','$quantity', '$description')";
		$result = mysqli_query($connect,$insert);
		if($result)
		echo " Your data is entered into the database...!!";
		else
		{
			// echo "Enter a unique Product ID";
			// exit();
			die(mysqli_error($connect));
		}
		
		}
		$new = header("location: productadd.php");
				
		
} 
else
{	
	echo "<p align='center'>Please enter all fields!!</p>";
}
}
error_reporting(E_ALL ^ E_DEPRECATED);
?>

</body>
</html>