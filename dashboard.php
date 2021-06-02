<!DOCTYPE html>


<?php require_once "controllerUserData.php"; ?>
<?php 
$page = "dashboard"; // not used yet
$level = 0;
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
            $sname = $fetch_info['name'];
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
		
		
		// level check
		$sql = "SELECT * FROM basic_info WHERE email = '$email'";
		
		if(count( $result = mysqli_fetch_assoc(mysqli_query($con, $sql))) > 0 ){
			$pic = 'images/'.$email.'/'.$result["photo"];
			$name=$result["name"];
			$level=1;
			
			//level 2 check ====
			$sql = "SELECT * FROM edu_info WHERE email = '$email'";
			if(count( $result = mysqli_fetch_assoc(mysqli_query($con, $sql))) > 0 ){
				$level=2;		
				//level 3 check ====
				$sql = "SELECT * FROM contact_info WHERE email = '$email'";
				if(count( $result = mysqli_fetch_assoc(mysqli_query($con, $sql))) > 0 ){
					$level=3;		
					//level 4 check ====
					$sql = "SELECT * FROM docs_info WHERE email = '$email'";
					if(count( $result = mysqli_fetch_assoc(mysqli_query($con, $sql))) > 0 ){
						$level=4;		
					}
				}
			}
		}
		
		
		
		
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

if( $level == 4 && $status == 'accepted' ){

	$result = mysqli_fetch_assoc( mysqli_query($con, "select * from challan where email='".$email."';") );
	if( $result > 0 ){
	
		$challanStatus = $result['status'];
		$challanId = $result['id'];
		$challanDate = $result['date'];
	}else{
		$challanStatus = 'empty';
	}
}
?>
<html>
	<head>
		 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="flex.css">	
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<title>Admission Application</title>
	</head>
	
	
	<body id="mybody" style="display:none;">
		<?php include "navbar1.php"; ?>
		<div class="heading heading-main">
			<div>
				Welcome!
			</div>
		</div>
		
		<!-- info card -->
		<?php
		if($submitted){
		
			echo '<div class="cardd">';
			if($level>0){
				echo '	<div class="card"><img class="" src="'.$pic.'" width="100px;"><div class="text-center">Photo</div></div>';
				echo '	
				<div class=" ">
					<div class="panel-heading">Name</div>
					<h3 class="panel-body">'.$name.'</h3>
				</div>';
			}
			echo '	
			<div class=" ">
				<div class="panel-heading">status</div>
				<h3 class="panel-body">'.$status.'</h3>
			</div>';
			echo '</div>';
		}
		echo "<div class='footer-id'>filled ".$level." forms</div>";
		?>
		
		<?php if($submitted == true && $status == "not submitted"){echo '<button class="btn-general" onclick="window.location.href = '."'form1.php'".';">'.(($level == 0)?'Apply Now!':'Continue Apply').'</button><br>';} ?>
		
		<?php if($level >0 && $level < 4){echo "<div class='text-danger text-center'>due to some reason your form has not submitted full, please continue with followed '<strong>Continue Apply</strong>' button!</div><br>";} ?>
		<?php if($submitted == true && $status == "submitted"){echo '<form method="post" action="app-view.php"> <input type="submit" name="" value="View Application" class="btn-general btn-primary btn-lg" /> </form><br>';} ?>
		
		<?php if($submitted == true && ($status == "submitted" || $status == "submitted" ) ){echo '<form method="post" action="update-data.php"> <input type="submit" name="" value="Edit" class="btn-general btn-primary btn-lg" /> </form><br>';} ?>
		
		<?php if($submitted == true && $status == "submitted"){echo '<button type="button" class="btn-general btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Delete Application</button><br>';} ?>
		
	
		<?php if($level == 4 && $status == "submitted" ){echo "<div class='text-center'> <span class='text-success'>Congratulations!</span> your Application <span class='text-success'>Successfully</span> submitted for review. <br><strong class='text-warning'>In case!</strong> you want to edit some information! press <strong class='text-primary'>Edit button</strong><br><strong class='text-danger'>Do not</strong> press delete button unless you want to delete whole application at once.</div><br>";} ?>
		<!-- challan management -->
		<?php 
			if($level == 4 && $status == "rejected" ){
				echo '<div class="text-info text-center">Due to some reason your application got <span class="text-danger">Rejected</span> <br>Please fullfill <span class="text-primary">following</span> requirements and apply again.</div>';
				echo '<table class="text-center text-danger"><tr><td>requirement 1</td></tr><tr><td>requirement 2</td></tr></table>';
				echo '<img src="images/reject-sad.png" width="200px" style="margin: 10px auto 0 auto; display:block;opacity:0.7;">';
			}
			if($level == 4 && $status == "accepted" ){
				//$challanStatus='empty'; //this value comming from challan api
				//$challanId = 132412; // this is also comming from challan api
				echo "<div class='text-center text-info'>challan status : ".$challanStatus.'</div>';
				
				if($challanStatus == 'generated'){
					echo "<div class='text-center text-info'>challan ID       : ".$challanId.'</div><br>';
					echo '<button type="button" class="btn-general btn-primary btn-lg" data-toggle="modal" data-target="#challanModal">Download Challan</button></button><br>';
					echo '<form method="get" action="challan.php"><input type="hidden" value="regen" name="q" ><input type="submit" value="Re Generate Challan" class="btn-general btn-primary btn-lg" /> </form><br>';
					echo '<div><p class="text-normal text-center">challan <span class="text-success">successfully Generated!</span> you can pay this from from any bank<br>just <span class="text-warning">Do not</span> forget to put this <strong class="text-primary">Challan ID</strong> in depositer.</p></div>';
				}
				if($challanStatus == 'empty'){
					echo "<br>";
					echo '<form method="get" action="challan.php"> <input type="hidden" value="generate" name="q" ><input type="submit" value="Generate Challan" class="btn-general btn-primary btn-lg" /> </form><br>';
					echo "<div class='text-center'> <span class='text-success'>Congratulations!</span> your Application <span class='text-success'>Accepted</span>. <br><strong class='text-warning'>Please!</strong> proceed with challan formalities.<strong class='text-primary'>Download Challan</strong></div>";} 
				}
		?>
				

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


<!-- modal 2 for challan temp -->
	<div class="modal fade" id="challanModal" role="dialog">
		<div class="modal-dialog">
    
      <!-- Modal content-->
			<div class="modal-content">
		  
				<div class="modal-header ">
					<h4 class="modal-title text-info">Challan</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
			
				</div>
        
				<div class="modal-body">
					<p class='text-info'>email : <?php echo $email; ?></p>
					<table>
						<tr>
							<td>Deposit Account</td>
							<td>1241788123</td>
						</tr>
						<tr>
							<td>Account Name</td>
							<td>Isra Islamic Foundation</td>
						</tr>
						<tr>
							<td>Challan id</td>
							<td><?php echo $challanId; ?></td>
						</tr>
						<tr>
							<td>Generated Against</td>
							<td><?php echo $name; ?></td>
						</tr>
					</table>
					<p class='text-info'>Generated Date : '<?php echo $challanDate; ?>'</p>
				</div>
        
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
					<button type="button" onclick="window.print(document.getElementById('printable'));"  class="btn btn-primary" >print </button>
				</div>
        
			</div>

		</div>
	</div>
<!-- challan modal end -->
		<script>
			var abody = document.getElementById("mybody");
			window.onload = function() 
			{ 
				setTimeout(function(){ abody.style.display = "block";  }, 500);
			}
			
			function printChallan(){
				document.getElementById("challanModal");
			}
		</script>
	</body>
</html>
