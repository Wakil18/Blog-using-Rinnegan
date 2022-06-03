<?php
    // DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'wakil');
    define('DB_PASS', 'W@kil');
    define('DB_NAME', 'rinnnegan_blog ');

    // App Root
    /*
    *This dirname function trims the last directory / returns the parent directory
    *Primary App Root - D:\xampp\htdocs\rinnegan\app\config\config.php
    *After 1 dirname - D:\xampp\htdocs\rinnegan\app\config\
    *After 2nd dirname - D:\xampp\htdocs\rinnegan\app\
    
    *By using define function the directory is put into a constant
    */
    define('APPROOT', dirname(dirname(__FILE__)));

    // URL Root
    define('URLROOT', 'http://localhost/blog');

    // Site Name
    define('SiteName', 'Rinnegan Blog');

    // App Version
    define('AppVersion','1.0.0');