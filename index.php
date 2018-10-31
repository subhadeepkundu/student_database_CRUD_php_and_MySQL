<?php include('server.php');
	if (isset($_GET['edit'])) {
		$id= $_GET['edit'];
		$edit_state= false;
		$rec= mysqli_query($db, "SELECT * FROM information WHERE id=$id");
		$record= mysqli_fetch_array($rec);
		$name= $record['name'];
		$regn= $record['regn'];
		$dept= $record['dept'];
		$id= $record['id'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>STUDENT DATABASE PROJECT</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['msg']; 
				unset($_SESSION['msg']);
			?>
		</div>
	<?php endif ?>
	<?php $results = mysqli_query($db, "SELECT * FROM information"); ?>
	<table>
		<thead>
			<tr>
				<th>NAME</th>
				<th>REGN. NO.</th>
				<th>DEPARTMENT</th>
				<th colspan="1">ACTION</th>				
			</tr>
		</thead>
		<tbody>
		<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['regn']; ?></td>
			<td><?php echo $row['dept']; ?></td>
			<td>
				<a class="edit_btn"  href="index.php?edit=<?php echo $row['id']; ?>" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>			
		</tbody>
	</table><br>
	<form method="post" action="server.php" style="background-color: #33FF77">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="data">
			<label>NAME</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter your name", required> <br><br>
		</div>
		<div class="data">
			<label>REGN. NO.</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" name="regn"  value="<?php echo $regn; ?>"placeholder="Enter your registration no.", required><br><br>
		</div>
		<div class="data">
			<label>DEPARTMENT</label>&nbsp;&nbsp;&nbsp;
			<input type="text" name="dept"  value="<?php echo $dept; ?>"placeholder="Enter your department", required><br><br>

		</div>
		<div class="data">
		<?php if ($edit_state==true): ?>
			<h4><button type="submit" name="submit" class="button" style="color: red">SUBMIT</button></h4>
		<?php else: ?>
			<h4><button type="submit" name="update" class="button" style="color: red">UPDATE</button></h4>
		<?php endif ?>	
			
		</div>
	</form>

</body>
</html>
