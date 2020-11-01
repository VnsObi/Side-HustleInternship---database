<?php 
	include 'connect.php';

	// initialize variables
	$name = "";
	$age = "";
	$username = "";
	$address = "";
	$id = 0;
	$update = false;
	//For Insert
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$address = $_POST['address'];
		$passport = $n['passport'];

		//specifying the supported file extension
		$validextensions=["jpeg","jpg","png","PNG","JPG"];
		$ext=explode('.',basename($_FILES['passport']['name']));
		//explode passport name from dot(.)
		$file_extension=end($ext);
		//generate Name for the passport;
		$passport=$name.rand(100000,900000).".".$file_extension;
		$target_path=$passport;
		$filesize= 5000000;

		if(($_FILES['passport']['size'] <= $filesize) and in_array($file_extension,$validextensions)) {
			$passport=$name.rand(100000,900000).".".$file_extension;
			$destination = 'image'."/".$passport;
			$temp_file = $_FILES['passport']['tmp_name'];
			if(move_uploaded_file($temp_file,$destination)){
				mysqli_query($con, "INSERT INTO crudtable (name, age, username, address, passport) VALUES ('$name', '$age', '$username', '$address', '$passport')"); 
				header('location: index.php');
			}
		}else{
			header("Location: index.php?error=Invalid Image format or file too large");
		}
	}   

		//For Update
	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$address = $_POST['address'];
		$passport = $n['passport'];

		//specifying the supported file extension
		$validextensions=["jpeg","jpg","png","PNG","JPG"];
		$ext=explode('.',basename($_FILES['passport']['name']));
		//explode passport name from dot(.)
		$file_extension=end($ext);
		//generate Name for the passport;
		$passport=$name.rand(100000,900000).".".$file_extension;
		$target_path=$passport;
		$filesize= 5000000;

		if(($_FILES['passport']['size'] <= $filesize) and in_array($file_extension,$validextensions)) {
			$passport=$name.rand(100000,900000).".".$file_extension;
			$destination = 'image'."/".$passport;
			$temp_file = $_FILES['passport']['tmp_name'];
			if(move_uploaded_file($temp_file,$destination)){
		mysqli_query($con, "UPDATE crudtable SET name='$name', age='$age', username='$username', address='$address','passport=$passport' WHERE id=$id");
		header('location: index.php');
			}
		}else{
			header("Location: index.php?error=Invalid Image format or file too large");
		}
	}
	//For Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($con, "DELETE FROM crudtable WHERE id=$id");
	header('location: index.php');
}



?>