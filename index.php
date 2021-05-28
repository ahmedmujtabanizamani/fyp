<!DOCTYPE html>
<html lang="en">
	<head>
		 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<style>
       <!--Start header1-->
			.nav-link{
				align_item: left;
			}
			
			li a{
				text-align:center;  
			}
	
			@media only screen and (max-width: 600px){		
				li{
					width: 120px;
					background-color: ;
					margin: 0px auto 0px auto;
					border-bottom: 1px solid #ff0;
				}
			}
     <!--end header1-->
			*{
				margin: 0px;
				padding: 0px;   
				font-family: sans-serif;
			}
		</style>

    <!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
		
		<title>Hello, world!</title>
	</head>
	<body>
		<?php require_once "controllerUserData.php"; ?>
		<?php include 'navbar1.php'; ?>     
		<?php include 'quoteBody.html'; ?>
	</body>
</html>
<?php include'footer.php'; ?>
