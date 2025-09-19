<?php
class auth{
    public function signup($conf, $ObjSendMail) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
            $fullname = ucwords(strtolower($_POST['fullname']));
            $email = strtolower($_POST['email']);
            $password = $_POST['password'];

            // Basic validation
            
            // Only allow letters, whitespaces, apostrophes and hyphens in fullname
            if (!preg_match("/^[a-zA-Z\s'-]+$/", $fullname)) {
                die("Invalid fullname format.");
            }

            // Verify that no fields are empty
            if (empty($fullname) || empty($email) || empty($password)) {
                die("All fields are required.");
            }
            
            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   
                die("Invalid email format.");
            }

            // Validate email domain
            $email_domain = substr(strrchr($email, "@"), 1);
            if (!in_array($email_domain, $conf['valid_email_domains'])) {
                die("Email domain is not allowed. Please use a valid email domain.");
            }

            // validate password length
            if (strlen($password) < $conf['min_password_length']) {
                die("Password must be at least " . $conf['min_password_length'] . " characters long.");
            }

            // If all validations pass, proceed with signup (e.g., save to database, send confirmation email, etc.)

            die($fullname . ' ' . $email . ' ' . $password);
    }
}
}