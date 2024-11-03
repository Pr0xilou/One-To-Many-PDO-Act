<?php
require_once "dbConfig.php";

function insertPcBuilder ($pdo, $first_name, $last_name, $date_of_birth, $specialization) {
    $sql = "INSERT INTO pc_builder (first_name, last_name, date_of_birth, specialization) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $specialization]);
    if ($executeQuery) {
        return true;
    }
}
function getAllPcBuilder ($pdo) { 
    $sql = "SELECT * FROM pc_builder"; 
    $stmt = $pdo->prepare($sql); 
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}
function getPcBuilderByID($pdo, $pc_builder_id) {
    $sql = "SELECT * FROM pc_builder WHERE pc_builder_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$pc_builder_id]);
    if ($executeQuery) {
        return $stmt->fetch();
    }
}
function updatePcBuilder($pdo, $first_name, $last_name, $date_of_birth, $specialization, $pc_builder_id) {
    $sql = "UPDATE pc_builder
                SET first_name = ?,
                    last_name = ?,
                    date_of_birth = ?,
                    specialization = ?
                WHERE pc_builder_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $specialization, $pc_builder_id]);

    if ($executeQuery) {
        return true;
    }   
}
function deletePcBuilder($pdo, $pc_builder_id) {
	$deletePcBuild = "DELETE FROM custom_pc WHERE pc_builder_id = ?";
	$deleteStmt = $pdo->prepare($deletePcBuild);
	$executeDeleteQuery = $deleteStmt->execute([$pc_builder_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM pc_builder WHERE pc_builder_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$pc_builder_id]);

		if ($executeQuery) {
			return true;
		}
	}
}
function getPcBuildsByPcBuilder($pdo, $pc_builder_id) {
	$sql = "SELECT 
				custom_pc.custom_pc_id AS custom_pc_id,
				custom_pc.custom_pc_name AS custom_pc_name, custom_pc.motherboard_name AS motherboard_model,
                custom_pc.cpu_fan_name AS cpu_fan_model, custom_pc.processor_name AS processor_model,
                custom_pc.ram_info AS ram_info, custom_pc.gpu_name AS gpu_model,
                custom_pc.power_supply_name AS power_supply_model, custom_pc.pc_case_name AS pc_case_name,
                custom_pc.price AS price, custom_pc.date_created AS date_created,
				CONCAT(pc_builder.first_name,' ',pc_builder.last_name) AS Pc_Builder
			FROM custom_pc
			JOIN pc_builder ON custom_pc.pc_builder_id = pc_builder.pc_builder_id
			WHERE custom_pc.pc_builder_id = ? 
			GROUP BY custom_pc.custom_pc_name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$pc_builder_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}
function insertCustomPc($pdo, $custom_pc_name, $motherboard_name, $cpu_fan_name, $processor_name, $ram_info,
$gpu_name, $power_supply_name, $pc_case_name, $price, $pc_builder_id ) {
	$sql = "INSERT INTO custom_pc (custom_pc_name, motherboard_name, cpu_fan_name, processor_name, ram_info,
    gpu_name, power_supply_name, pc_case_name, price, pc_builder_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$custom_pc_name, $motherboard_name, $cpu_fan_name, $processor_name, $ram_info,
    $gpu_name, $power_supply_name, $pc_case_name, $price, $pc_builder_id]);
	if ($executeQuery) {
		return true;
	}

}
function getCustomPcBuildByID($pdo, $custom_pc_id) {
	$sql = "SELECT 
				custom_pc.custom_pc_id AS custom_pc_id,custom_pc.custom_pc_name AS custom_pc_name,
				custom_pc.motherboard_name AS motherboard_model, custom_pc.cpu_fan_name AS cpu_fan_model,
                custom_pc.processor_name AS processor_model,custom_pc.ram_info AS ram_info,
                custom_pc.gpu_name AS gpu_model, custom_pc.power_supply_name AS power_supply_model,
                custom_pc.pc_case_name AS pc_case_name, custom_pc.price AS price, custom_pc.date_created AS date_created,
				CONCAT(pc_builder.first_name,' ',pc_builder.last_name) AS Pc_Builder
			FROM custom_pc
			JOIN pc_builder ON custom_pc.pc_builder_id = pc_builder.pc_builder_id
			WHERE custom_pc.custom_pc_id = ? 
			GROUP BY custom_pc.custom_pc_name;
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$custom_pc_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}
function updateCustomPcBuild($pdo, $custom_pc_name, $motherboard_name, $cpu_fan_name, $processor_name, $ram_info,
$gpu_name, $power_supply_name, $pc_case_name, $price, $custom_pc_id) {
	$sql = "UPDATE custom_pc
			SET custom_pc_name = ?,
			    motherboard_name = ?, cpu_fan_name = ?, processor_name = ?, ram_info = ?, 
                gpu_name = ?, power_supply_name = ?, pc_case_name = ?, price = ?
			WHERE custom_pc_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$custom_pc_name, $motherboard_name, $cpu_fan_name, $processor_name, $ram_info,
    $gpu_name, $power_supply_name, $pc_case_name, $price, $custom_pc_id]);

	if ($executeQuery) {
		return true;
	}
	return false;
}
function deleteCustomPcBuild($pdo, $custom_pc_id) {
	$sql = "DELETE FROM custom_pc WHERE custom_pc_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$custom_pc_id]);
	if ($executeQuery) {
		return true;
	}
}
?>