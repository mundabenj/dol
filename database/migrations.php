<?php
require_once '../ClassAutoLoad.php';

// Drop the users table if it exists
$drop_users = $SQL->dropTable("users");

if ($drop_users === true) {
    echo "Users table dropped successfully. | ";
} else {
    echo "Error dropping users table: " . $drop_users . " | ";
}

// Create the users table
$create_users = $SQL->createTable("users", [
    'userId' => 'BIGINT(10) AUTO_INCREMENT PRIMARY KEY',
    'fullname' => 'VARCHAR(50) NOT NULL',
    'email' => 'VARCHAR(50) NOT NULL UNIQUE',
    'password' => 'VARCHAR(60) NOT NULL',
    'verify_code' => 'VARCHAR(10) DEFAULT NULL',
    'code_expiry_time' => 'DATETIME DEFAULT NULL',
    'mustchange' => 'tinyint(1) DEFAULT 0',
    'status' => "ENUM('active', 'inactive', 'suspended', 'deleted', 'Pending') DEFAULT 'Pending'",
    'created' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
    'updated' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    'roleId' => 'tinyint(1) DEFAULT 1', // 0 = user, 1 = admin
    'genderId' => 'tinyint(1) DEFAULT 1', // 1 = female, 2 = male
]);

if ($create_users === true) {
    echo "Users table created successfully. | ";
} else {
    echo "Error creating users table: " . $create_users . " | ";
}

// Drop the roles table if it exists
$drop_roles = $SQL->dropTable("roles");

// Create the roles table
$create_roles = $SQL->createTable("roles", [
    'roleId' => 'tinyint(1) AUTO_INCREMENT PRIMARY KEY',
    'roleName' => 'VARCHAR(20) NOT NULL UNIQUE',
    'created' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
    'updated' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
]);

if ($create_roles === true) {
    echo "Roles table created successfully. | ";
} else {
    echo "Error creating roles table: " . $create_roles . " | ";
}