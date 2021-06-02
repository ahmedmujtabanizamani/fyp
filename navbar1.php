<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="dashboard.php">Isra University</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
		  <?php 
		  if($page == "home")
		  {
			  echo '<a class="nav-link" href="index.php">Home <span class="sr-only text-danger">(current)</span></a>';
		  }
		  else
		  {
			  echo '<a class="nav-link" href="index.php">Home</a>';
		  }
		  ?>
      </li>
      <?php
		if(isset($_SESSION['email']) && isset($_SESSION['password']) )
		{
			echo '<li class="nav-item">';
          
			if($page == "dashboard")
			{
				echo '<a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>';
			}
			else
			{
				echo '<a class="nav-link" href="dashboard.php">Dashboard</a>';
			}
			echo '</li>';
		}
      ?>
    </ul>
    <span>
		<?php 
		if(isset($_SESSION['email']) && isset($_SESSION['password']) )
		{
			echo '<span class="text-white mr-2">'.$sname.'</span>'.'<a class="btn btn-outline-danger text-white" href="logout-user.php">logout</a>';
		}
		else
		{
			echo '<a class="btn btn-outline-success text-white btn-lg btn-block" href="login-user.php">login</a>';
		}
     ?>
    </span>
  </div>
</nav>

</body>
</html>
