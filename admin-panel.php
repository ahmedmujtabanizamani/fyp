<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	</head>
	
	<style>
		[type=checkbox].checkboxHidden{
			position:absolute;
			top:-1000px;
		}
		body{
			max-width:800px;
			margin:0 auto;
		}
	</style>
<body>

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
echo '<input type="checkbox" name="select-all" onchange="selectAll()" >';
echo '<input type="submit" name="rejectAll" value="X" />';
echo '<input type="submit" name="acceptAll" value="V" />';
echo '<input type="submit" name="revertAll" value="<--" />';
echo '</form>';
// hidden portion ========================================

//body =============================

while($row = mysqli_fetch_assoc($result)){
	
	echo '<div style="display:flex; align-items:center;justify-content:space-around; border: solid red 2px;flex-wrap: wrap; ">';
	
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
					<input style="display:inline;" type="submit" name="action1" value="V">
				</form>';
				
	echo '<form method="post" style="display:inline">
		<input name="id" type="hidden" value="'.$row["email"].'">
		<input style="display:inline;" type="submit" name="action3" value="X">
	</form>';
	
	echo '<form method="post" style="display:inline">
				<input name="id" type="hidden" value="'.$row["email"].'">
				<input style="display:inline;" type="submit" name="action2" value="<--">
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

