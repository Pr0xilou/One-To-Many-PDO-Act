<?php

require_once 'dbConfig.php';
require_once 'models.php';

if(isset($_POST['insertPcBuilderBtn'])) {

    $query = insertPcBuilder($pdo, $_POST['fname'], $_POST['lname'],
        $_POST['DoB'], $_POST['Sp']);

    if ($query) {
        header("Location: ../index.php");
    }
    else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editPcBuilderBtn'])) {

	$query = updatePcBuilder($pdo, $_POST['fname'], $_POST['lname'], 
		$_POST['DoB'], $_POST['Sp'], $_GET['pc_builder_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Edit failed";;
	}

}
if (isset($_POST['deletePcBuilderBtn'])) {
	$query = deletePcBuilder($pdo, $_GET['pc_builder_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}
if (isset($_POST['insertNewCustomBuildPc'])) {
	$query = insertCustomPc($pdo, $_POST['CPname'], $_POST['MBmodel'], $_POST['CFmodel'], $_POST['Pmodel'], $_POST['Rinfo'],
    $_POST['GPUname'], $_POST['PSname'],$_POST['PCname'], $_POST['Price'], $_GET['pc_builder_id']);

	if ($query) {
		header("Location: ../viewcustombuilds.php?pc_builder_id=" .$_GET['pc_builder_id']);
	}
	else {
		echo "Insertion failed";
	}
}
if (isset($_POST['editCustomPcBuildBtn'])) {
	$query = updateCustomPcBuild($pdo, $_POST['CPname'], $_POST['MBmodel'], $_POST['CFmodel'], $_POST['Pmodel'], $_POST['Rinfo'],
    $_POST['GPUname'], $_POST['PSname'],$_POST['PCname'], $_POST['Price'], $_GET['custom_pc_id']);
	if ($query) {
		header("Location: ../viewcustombuilds.php?pc_builder_id=" .$_GET['pc_builder_id']);
	}
	else {
		echo "Update failed";
	}
}
if (isset($_POST['deletePcBuildBtn'])) {
	$query = deleteCustomPcBuild($pdo, $_GET['custom_pc_id']);
	if ($query) {
		header("Location: ../viewcustombuilds.php?pc_builder_id=" .$_GET['pc_builder_id']);
	}
	else {
		echo "Deletion failed";
	}
}
?>