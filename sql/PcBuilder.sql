CREATE TABLE pc_builder(
	pc_builder_id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR (50),
	last_name VARCHAR (50),
	date_of_birth VARCHAR (50),
	specialization TEXT
);

CREATE TABLE custom_pc (
	custom_pc_id INT AUTO_INCREMENT PRIMARY KEY,
	custom_pc_name VARCHAR (50),
	motherboard_name VARCHAR (50),
	cpu_fan_name VARCHAR (50),
	processor_name VARCHAR (50),
	ram_info VARCHAR (50),
	gpu_name VARCHAR (50),
	power_supply_name VARCHAR (50),
	pc_case_name VARCHAR (50),
	price INT,
	pc_builder_id INT,
	date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);