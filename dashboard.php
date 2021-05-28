<!DOCTYPE html>


<?php require_once "controllerUserData.php"; ?>
<?php 
$page = "dashboard";
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
                exit();
            }
        }else{
            header('Location: user-otp.php');
            exit();
        }
    }      
    
    //=============================
    $sql = "SELECT * FROM submitted WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($run_Sql);
    if( $result > 0){
		$submitted = true;
		$status = $result["status"];
		
		$sql = "SELECT * FROM basic_info WHERE email = '$email'";
		$result = mysqli_fetch_assoc(mysqli_query($con, $sql));
		$pic = 'images/'.$email.'/'.$result["photo"];
		$name=$result["name"];
		
		
		
		//================== after submittion action here
		
		
		include "deleteApplication.php";
		
		//= === = = = =  = = = = =  = = =  = 
	}else{
		$submitted = false;
	}
    //=============================
}else{
    header('Location: login-user.php');
}
?>
<html>
	<head>
		 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="form.css">	
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<title>Admission Application</title>
	</head>
	
	
	<body id="mybody" style="display:none;">
		<?php include "navbar1.php"; ?>
		<div class="heading">
			Welcome!
		</div>
		
		<!-- info card -->
		<?php
		if($submitted){
			echo '<div class="cardd">';
			echo '	<div class="card"><img class="" src="'.$pic.'" width="100px;"><div class="text-center">Photo</div></div>';
			echo '	
			<div class=" ">
				<div class="panel-heading">Name</div>
				<h3 class="panel-body">'.$name.'</h3>
			</div>';
			
			echo '	
			<div class=" ">
				<div class="panel-heading">status</div>
				<h3 class="panel-body">'.$status.'</h3>
			</div>';
			echo '</div>';
		}
		?>
		
		<?php if(!$submitted){echo '<button class="btn-general" onclick="window.location.href = '."'form1.php'".';">Apply Application</button>';} ?>
		<br>
		<?php if($submitted == true){echo '<form method="post" action="app-view.php"> <input type="submit" name="" value="View Application" class="btn-general" /> </form>';} ?>
		<br>
		<?php if($submitted == true && $status == "submitted"){echo '<button type="button" class="btn-general" data-toggle="modal" data-target="#myModal">Delete Application</button>';} ?>
		<br>
		<?php if($submitted == true && $status == "accepted"){echo '<form method="post" action="challan.php"> <input type="submit" value="Download Chalan" class="btn-general" /> </form>';} ?>
		
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-danger">Are you sure Delete All</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete whole application, you might lost all of your entered data so please thing before click.</p>
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          <form method="post" action=""> <input type="submit" name="deleteApplication" value="Delete" class="btn btn-danger" /> </form>
        </div>
      </div>
    </div>
  </div>
  
</div>
<script>
			var abody = document.getElementById("mybody");
			window.onload = function() 
			{ 
				setTimeout(function(){ abody.style.display = "block";  }, 500);
			}
		</script>
	</body>
</html>
