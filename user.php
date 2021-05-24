<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background: #6f42c1;
   
}
.logout input{
	float:right;
	 background-color: #6F42C1;
  color: white;
  padding: 14px;
}
.logout input:hover{
	background-color: #95F985;
}
li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  background: #6f42c1;
}

li a:hover {
  background: #95F985;
}
</style>
</head>
<body>

<ul>
	<div class="logout">
	<form method="post" action="logout-user.php">
		<input type="submit" name="logout" value="logout" />
	</form>
</div>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="form1.php">Admission foam</a></li>
  <li><a href="#contact">You are already applied</a></li>
  <li><a href="#about">About</a></li>
</ul>



</body>
</html>
