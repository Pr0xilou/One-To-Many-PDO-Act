<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PcBuildWorkshop</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Welcome To Custom Pc Building Workshop!<br> Add your PC builder below</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="fname">First Name</label> 
			<input type="text" name="fname">
		</p>
		<p>
			<label for="lname">Last Name</label> 
			<input type="text" name="lname">
		</p>
		<p>
			<label for="DoB">Date of Birth</label> 
			<input type="date" name="DoB">
		</p>
		<p>
			<label for="Sp">Specialization</label> 
			<input type="text" name="Sp">
			<input type="submit" name="insertPcBuilderBtn">
		</p>
	</form>
	<?php $getAllPcBuilder = getAllPcBuilder($pdo); ?>
	<?php foreach ($getAllPcBuilder as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Specialization: <?php echo $row['specialization']; ?></h3>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewcustombuilds.php?pc_builder_id=<?php echo $row['pc_builder_id']; ?>">View Projects</a>
			<a href="editbuilder.php?pc_builder_id=<?php echo $row['pc_builder_id']; ?>">Edit</a>
			<a href="deletebuilder.php?pc_builder_id=<?php echo $row['pc_builder_id']; ?>">Delete</a>
		</div>

	</div> 
	<?php } ?>
</body>
</html>