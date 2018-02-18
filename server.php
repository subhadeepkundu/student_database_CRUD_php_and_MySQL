<?php
	session_start();
	$name= "";
	$regn= "";
	$dept= "";
	$id= 0;
	$edit_state=true;
	//connect  to db
	$db= mysqli_connect('localhost','root','','crud');
	//enter into db
	if(isset($_POST['submit']))
	{
		$name= $_POST['name'];
		$regn= $_POST['regn'];
		$dept= $_POST['dept'];

		$query= "INSERT INTO information (name,regn,dept) VALUES ('$name','$regn','$dept')";
		mysqli_query($db,$query);
		$_SESSION['msg']= "DATA SAVED";
		header('location: index.php');
	}
	//update
	if(isset($_POST['update']))
	{
		$name= $_POST['name'];
		$regn= $_POST['regn'];
		$dept= $_POST['dept'];
		$id= $_POST['id'];

		mysqli_query($db, "UPDATE information SET name='$name', regn='$regn',dept='$dept' WHERE id=$id");
		$_SESSION['msg']= "DATA UPDATED";
		header('location: index.php');
	}
	//delete
	if (isset($_GET['del'])) 
	{
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM information WHERE id=$id");
	$_SESSION['msg']= "DATA DELETED"; 
	header('location: index.php');
	}



	//retrive from db
	$results= mysqli_query($db, "SELECT * FROM information");
?> 