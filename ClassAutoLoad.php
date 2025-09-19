<?php
require_once 'conf.php';

$directories = [
    'Layouts',
    'Forms',
    'Globals',
    'Proc'
];

spl_autoload_register(function ($className) use ($directories) {
    foreach ($directories as $directory) {
        $filePath = __DIR__ . '/' . $directory . '/' . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
});

// Create various instances to test autoloading
$ObjSendMail = new SendMail();
$ObjForm = new forms();
$ObjLayout = new layouts();
$ObjAuth = new auth();

// You can now use $ObjSendMail, $ObjForm, $ObjLayout, and $ObjAuth in your application
$ObjAuth->signup($conf, $ObjSendMail);