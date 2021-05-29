<!DOCTYPE html>

<?php include "user.php"; ?>
<?php require_once "controllerUserData.php"; ?>
<?php 
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
		if(mysqli_fetch_assoc($run_Sql) > 0){
			header('Location: form2.php');
			exit();
		}
        //=========================   
}else{
    header('Location: login-user.php');
}
?>
<?php include 'form1DB.php'; ?>
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
		<form class="table" action="" method="post" enctype="multipart/form-data">
			<div class="heading">
				<div>
					Personal Info
				</div>
							
			</div>
			<!-- ================================================================================================================= -->
		
				<!-- picture upload row  start -->
				
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							Personal Photo
							<br><br>
							passport size photo (*.jpg, *.jpeg) :
						</div>
						<div class="defin">
							<img id="output" height="100px" src="images/gm.png">
						</div>
					</div>
					
					<div class="flex-item">
						<div class="headin">
							<input type="file" name="pics" onchange="loadFile(event);">
						</div>
						<div class="defin">
						</div>
					</div>
				</div>

				<!-- picture upload row  end -->
				
				<!-- basic info start -->
				<!-- Row 1 -->
				<div class="flex-container">
					<div class="flex-item">
						
						<div class="headin required">	
							Name &nbsp;
						</div>
						<div class="defin">
							<input class="form-control" type="text" name="name" required="required">
						</div>
					</div>		
					<div class="flex-item">
						<div class="headin required">	
							Surname &nbsp;
						</div>
						<div class="defin">
							<input class="form-control" type="text" name="surname" required="required">
						</div>
					</div>
				</div>	
				
				<!-- Row 2 -->
				<div class="flex-container">
					<div class="flex-item">
						<div class="required headin">	
							Father's Name &nbsp;
						</div>
						<div class="defin">
							<input class="input-text form-control" type="text" name="fathername" required="required" >
						</div>
					</div>
					<div class="flex-item">
						<div class="required headin">	
							Gender
						</div>
						&nbsp;&nbsp;
						<div class="defin">
							<input type="radio" name="gender" value="m" required > Male
							<input type="radio" name="gender" value="f"> Female
						</div>
					</div>
				</div>
				<!-- ========================================== -->
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							Martial Status
						</div>
						<div class="defin">
							<input type="radio" name="married" value="s" required > Unmarried
							<input type="radio" name="married" value="m" > Married
						</div>
					</div>
					<div class="flex-item">
						<div class="headin required">
							Nationality
						</div>
						<div class="defin">
							<select name="nationality" class="form-select">
								<option value="pakistani">Pakistani</option>
								<option value="afghanistani">Afghanistani</option>
								<option value="american">American</option>
							</select>
						</div>
					</div>
				</div>
			
			
				<!-- Row 3 ==========================================================================================-->
			
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							Birth Date &nbsp;
						</div>
						<div class="defin">
							<input class="form-control" type="date" name="birthdate" required="required">
						</div>
					</div>
					<div class="flex-item">
						<div class="headin required">
							Country or region of birth &nbsp;
						</div>
						<div class="defin">
							<select name="birthcountry" class="form-select">
								<option value="Pakistan">Pakistan</option>
								<option value="afghanistan">Afghanistan</option>
								<option value="america">America</option>
							</select>
						</div>
					</div>
				</div>
				<!-- Row 4 -->
				
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							Place of Birth<br><sub>(City, Province)</sub> &nbsp;
						</div>
						<div class="defin">
							<input class="form-control" type="text" name="birthplace" required="required">
						</div>
					</div>
					<div class="flex-item">
						<div class="headin required">
							Native Language
						</div>
						<div class="defin">
							<select name="language" class="form-select">
							<option value="urdu">Urdu</option>
							<option value="sindhi">Sindhi</option>
							<option value="english">English</option>
						</select>
						</div>
					</div>
				</div>
				
				<!-- Row 5 -->
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							Religion
						</div>
						<div class="defin">
							<select name="religion" class="form-select">
								<option value="islam">Islam</option>
								<option value="hindu">Hinduism</option>
								<option value="budha">Budhapist</option>
							</select>
						</div>
					</div>
					<div class="flex-item">
						<div class="headin required">
							Blood Group
						</div>
						<div class="defin">
							<select name="blood" class="form-select">
								<option value="o+">O+</option>
								<option value="o-">O-</option>
								<option value="a+">A+</option>
								<option value="a-">A-</option>
								<option value="b+">B+</option>
								<option value="b-">B-</option>
								<option value="ab+">AB+</option>
								<option value="ab-">AB-</option>
							</select>
						</div>
					</div>
				</div>
				<!-- Row 6 -->
				<div class="heading">
					<div>National Identification</div>
				</div>
			
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							CNIC # &nbsp;
						</div>
						<div class="defin">
							<input class="input-text form-control" type="number" name="cnic" min="1000000000000" max="9999999999999" required >
						</div>
					</div>
					<div class="flex-item">
						<div class="headin required">
							ISSUE Date &nbsp;
						</div>
						<div class="defin">
							<input class="form-control" type="date" name="cnicissuedate" required="required">
						</div>
					</div>
				</div>
				
				<!-- row 7 -->
			
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							ISSUE Place &nbsp;
						</div>
						<div class="defin">
							<input class="form-control" type="text" name="cnicissueplace" required="required">
						</div>
					</div>
					
					<div class="flex-item">
						<div class="defin">
							
						</div>
					</div>
				</div>
			<input class="btn btn-lg" id="saveSubmit" type="submit" name="saveNext" value="save next">
		</form>
		<script>
			var abody = document.getElementById("mybody");
			window.onload = function() 
			{ 
				setTimeout(function(){ abody.style.display = "block";  }, 500);
			}
		</script>
	</body>
</html>
