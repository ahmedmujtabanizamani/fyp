<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="flex.css" />
	</head>
<body class="body">
<div class="heading">
	<div>
		Applied Users
	</div>
</div>
<?php require_once "controllerUserData.php"; ?>
<?php

if( isset($_POST["action1"]) )
{
	$id = $_POST["id"];
	$query = "update submitted set status='accepted' where email ='".$id."';";
	mysqli_query($con, $query);
}

if( isset($_POST["action2"]) )
{
	$id = $_POST["id"];
	$query = "update submitted set status='submitted' where email ='".$id."';";
	mysqli_query($con, $query);
}  

if( isset($_POST["action3"]) )
{
	$id = $_POST["id"];
	$query = "update submitted set status='rejected' where email ='".$id."';";
	mysqli_query($con, $query);
}

//batch actions

if(isset($_POST['rejectAll']) || isset($_POST['acceptAll']) || isset($_POST['revertAll'])){
	isset($_POST['rejectAll'])?$status="rejected": (isset($_POST['acceptAll'])? $status="accepted": (isset($_POST['revertAll'])? $status="submitted": $status=""));
	//echo $status;
	$users = $_POST['users'];
	for($i=0; $i<count($users); $i++){
		$query = "update submitted set status='".$status."' where email ='".$users[$i]."';";
		mysqli_query($con, $query);
	}
}

$query = "select a.photo as photo, a.email as email, a.name as name, b.status as status from basic_info a join submitted b on a.email=b.email;";
$result = mysqli_query($con, $query);
$result1 = mysqli_query($con, $query);

//hidden portion  =================================
echo '<form method="post" action="" name="data-check" >';
echo '<input type="hidden" name="checkCount" value="0" />';
while($row = mysqli_fetch_assoc($result1)){
	echo '<input class="checkboxHidden" type="checkbox" name="users[]" value="'.$row['email'].'" />';
}
echo '<div class="data-head cardd" >';

echo '<input type="checkbox" name="select-all" onchange="selectAll()" >';
echo '<div><label>
					<i class="btn btn-lg btn-danger fa fa-times" aria-hidden="true"></i>
					<input style="display:inline;display:none;" type="submit" name="rejectAll" value="">
				</label>';
echo '	<label>
				<i class="btn btn-lg btn-success fa fa-check" aria-hidden="true"></i>
				<input style="display:inline;display:none;" type="submit" name="acceptAll" value="">
			</label>';
echo '	<label>
				<i class="btn btn-lg btn-warning fa fa-hand-paper-o" aria-hidden="true"></i>
				<input style="display:inline;display:none;" type="submit" name="revertAll" value="">
			</label></div>';
			echo '</div>';

echo '</form>';
// hidden portion ========================================

//body =============================

while($row = mysqli_fetch_assoc($result)){
	
	echo '<div class="cardd">';
	
	//checkbox
	echo "<form method='post' action='' name='data-show'>";
	echo '	<input type="checkbox" class="demo" onchange="selectUser()" value="'.$row['email'].'" />'; 
	echo "</form>";
	
	//image
	echo '<img src="images/'.$row['email'].'/'.$row['photo'].'" width="80px" />';
	echo $row['name'].'<br>';
	//status
	echo '<div><h5><sub>status</sub></h5>'.$row['status'].'<br>&nbsp;</div>';
	//btns
	echo '<form method="post" style="display:inline">
					<input name="id" type="hidden" value="'.$row["email"].'">
					<label>
						<i class="btn btn-lg btn-success fa fa-check" aria-hidden="true"></i>
					<input style="display:inline;display:none;" type="submit" name="action1" value="">
					</label>
				</form>';
				
	echo '<form method="post" style="display:inline">
		<input name="id" type="hidden" value="'.$row["email"].'">
		<label>
			<i class="btn btn-lg btn-danger fa fa-times" aria-hidden="true"></i>
			<input style="display:inline;display:none;" type="submit" name="action3" value="">
		</label>
	</form>';
	
	echo '<form method="post" style="display:inline">
				<input name="id" type="hidden" value="'.$row["email"].'">
				<label>
					<i class="btn btn-lg btn-warning fa fa-hand-paper-o" aria-hidden="true"></i>
					<input style="display:inline;display:none;" type="submit" name="action2" value="">
				</label>
			</form>';
	echo '</div>';
}


?>
<script>
	function selectUser(){
		var check = document.forms['data-check']['users[]'];
		var checkCount = document.forms['data-check']['checkCount'];
		var check_select_all = document.forms['data-check']['select-all'];
		var check_show = document.getElementsByClassName("demo");
		checkCount.value=0;
		for(i=0; i< check.length; i++){
			if(check_show[i].checked == true){
				check[i].checked=true;
				checkCount.value = parseInt(checkCount.value)+1;
			}
			else{
				check[i].checked=false;
			}
		}
		if(checkCount.value >0){
			check_select_all.checked=true;
		}else{
			check_select_all.checked=false;
		}
		//alert(checkCount.value);
	};
	function selectAll(){
		var select_all_check = document.forms['data-check']['select-all'];
		var check = document.forms['data-check']['users[]'];
		var check_show = document.getElementsByClassName("demo");
		
		//select_all_check.checked = true;	
		if(select_all_check.checked){
			for(i=0; i<check_show.length; i++){
				check[i].checked=true;
				check_show[i].checked=true;
			}
		}
		if(!select_all_check.checked){
			for(i=0; i<check_show.length; i++){
				check[i].checked=false;
				check_show[i].checked=false;
			}
		}
		//alert(check_show.length);
	};
</script>
</body>

</html>

