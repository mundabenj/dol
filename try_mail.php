<?php
require_once 'ClassAutoLoad.php';

// prepare user data
$user_data = [
    'firstname' => 'Abel',
    'lastname' => 'Ment',
    'email' => 'abel.ment@example.com'
];

// Insert user data into the database
$add_user = $SQL->insert('users', $user_data);
if ($add_user) {
    echo "User added successfully.<br>";
} else {
    echo "Error adding user.<br>" . $add_user;
}