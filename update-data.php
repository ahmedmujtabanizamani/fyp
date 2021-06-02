<!DOCTYPE html>

<?php include "user.php"; ?>
<?php require_once "controllerUserData.php"; ?>
<?php 

//session management code =============>
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
    
    //=======================  check if form 1 filled
        $sql = "SELECT * FROM basic_info WHERE email = '$email'";
		$run_Sql = mysqli_query($con, $sql);
		$result = mysqli_fetch_array($run_Sql);
		if( $result > 0 ){
			$basic_info_count=0;
			$basic_info = $result;
			$is_form1 = true;
			//header('Location: form2.php');
			//exit();
		}else{
			$is_form1 = false;
		}
        //=========================   
        //=======================  check if form 2 programs filled
        $sql = "SELECT * FROM programs WHERE email = '$email'";
		$run_Sql = mysqli_query($con, $sql);
		$result = mysqli_fetch_all($run_Sql);
		if( $result > 0 ){
			$program_count=0;
			$program = $result;
			$is_form2 = true;
			//header('Location: form2.php');
			//exit();
		}else{
			$is_form2 = false;
		}
        //=========================   
        //=======================  check if form 2 filled
        $sql = "SELECT * FROM edu_info WHERE email = '$email'";
		$run_Sql = mysqli_query($con, $sql);
		$result = mysqli_fetch_array($run_Sql);
		if( $result > 0 ){
			$edu_info_count=1;
			$edu_info = $result;
			//header('Location: form2.php');
			//exit();
		}else{
			$is_form2 = false;
		}
        //=========================   
}else{
    header('Location: login-user.php');
}
?>

<html>
	<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

		<link rel="stylesheet" href="flex.css">	
		<title>Form 1</title>
	<script>
		var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
		};
</script>
	</head>
	<?php include "navbar1.php"; ?>

	<body style="display:none;" id="mybody">
		<!-- form start -->
		
		<?php if($is_form1){ ?>
			<a class="btn btn-primary btn-lg mt-2 ml-3" data-toggle="collapse" href="#form1" role="button" aria-expanded="false" aria-controls="form1">
				Personal info
			</a>
			<div id="form1" class="collapse">
				<?php include "form1DB.php"; ?>
				<?php include "form2DB.php"; ?>
				<?php include "update/form1-update.php"; ?>
				
			</div>
		
		<?php } ?>
		
		
		
		<?php if($is_form2){ ?>
			<a class="btn btn-success btn-lg mt-2" data-toggle="collapse" href="#form2" role="button" aria-expanded="false" aria-controls="form2">
				Educational Info
			</a>
			<div id="form2" class="collapse">
				
				<?php include "update/form2-update.php"; ?>
			</div>
		<?php } ?>
		
		<script>
			var abody = document.getElementById("mybody");
			window.onload = function() 
			{ 
				setTimeout(function(){ abody.style.display = "block";  }, 500);
			}
		</script>
	</body>
</html>
