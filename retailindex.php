<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
<style>
	/* @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap'); */
*{
  margin: 5;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  margin: 10;
  padding: 0;
  background-image: url('ozan-oztaskiran-f3u87ifZZPk-unsplash.jpg');
	background-size: cover;
  /* background: linear-gradient(120deg,#2980b9, #8e44ad); */
  height: 100vh;
  overflow: hidden;
}
.head{
		font-family: 'Poiret One', cursive;
		padding: 05;
		font-size: 50;
		color:#406f5a;
		text-shadow: 2px 2px 4px #000
    padding:20px;
	}
.container{
  margin: 0;
  padding: 0;
  height: 8%;
  width: 98%;
}
h4{
  color: red;
}
.center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  background: invisible;
  border-radius: 10px;
  box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
}
.center h1{
  text-align: center;
  padding: 10px 0;
  border-bottom: 1px solid silver;
  color:  #eeecec ;
}
.center form{
  padding: 0 20px;
  box-sizing: border-box;
  margin: 20px;
}
form .txt_field{
  position: relative;
  border-bottom: 2px solid #adadad;
  margin: 30px 0;
}
.txt_field input{
  width: 100%;
  padding: 0 5px;
  height: 40px;
  font-size: 16px;
  border: none;
  background: none;
  outline: none;
}
.txt_field label{
  position: absolute;
  top: 50%;
  left: 5px;
  color: #adadad;
  transform: translateY(-50%);
  font-size: 16px;
  pointer-events: none;
  transition: .5s;
}
.txt_field span::before{
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0%;
  height: 2px;
  background: #2691d9;
  transition: .5s;
}
.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
  top: -5px;
  color: #2691d9;
}
.txt_field input:focus ~ span::before,
.txt_field input:valid ~ span::before{
  width: 100%;
}
.pass{
  margin: -5px 0 20px 5px;
  color: #a6a6a6;
  cursor: pointer;
}
.pass:hover{
  text-decoration: underline;
}
ul{
  display: inline-grid;
  grid-template-columns: auto auto;
	margin-left: 1200;
}
ul li {
            list-style: none;
            margin: 0 23px;
            padding: 23px 0;
        }
input[type="submit"]{
  width: 100%;
  height: 50px;
  border: 1px solid;
  background: #2691d9;
  border-radius: 25px;
  font-size: 18px;
  color: #e9f4fb;
  font-weight: 700;
  cursor: pointer;
  outline: none;
}
input[type="submit"]:hover{
  border-color: #2691d9;
  transition: .5s;
}
.signup_link{
  margin: 30px 0;
  text-align: center;
  font-size: 16px;
  color: #666666;
}
.signup_link a{
  color: #2691d9;
  text-decoration: none;
}
.signup_link a:hover{
  text-decoration: underline;
}

</style>
  <meta charset="utf-8">
  <title>RETAIL STORE MANAGEMENT SYSTEM</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
  <h1 class="head" align="center">RETAIL STORE MANAGEMENT SYSTEM </h1>
  <div class="container">
    <!-- <h4  style="text-align:right; color: white;"><a href="retaillogin.php" >Login</a>
      <h4 style="text-align:right; color: white;"><a href="retailsignup.php">Sign up</a> -->
  <nav> 
		<ul>
			<li><h4 style=" text-align:right;"><a href="retaillogin.php" style="color:#406f5a">Login</a></li>
			<li><h4 style="text-align:right;"><a href="retailsignup.php" style="color:#406f5a">Sign up</a></li>
			<!-- <input class="button1" type="button" name="login" value="Login" onclick="window.location.href='retaillogin.php';"> -->
			<!-- <input class="button1" type="button" name="signup" value="Signup" onclick="window.location.href='retailsignup.php';"> -->
		</ul>
 </nav>
  </div>
  <!-- <h4  style="text-align:right; color: white;"><a href="retaillogin.php" >Login</a>
    <h4 style="text-align:right; color: white;"><a href="retailsignup.php">Sign up</a> -->
  <div class="center">
    <h1>Admin</h1>
    <form method="post">
      <div class="txt_field">
        <input type="text" id="username" required>
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" id="password" required>
        <span></span>
        <label>Password</label>
      </div>
     
      <input type="submit" value="Login" onclick="auth()">
      
    </form>
  </div>
  <script>
    function auth(){
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      if(username=="admin" && password=="admin123")
      {
        window.location.assign("http://localhost/dbmscode/retailproducts.php");
        alert("Login successful");
      }
      else
      {
        alert("Invalid");
        return;
      }
    }
  </script>
</body>

</html>