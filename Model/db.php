<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
?>
<?php
require_once 'config/config.php';

class Db
{
    
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host='.constant('DB_HOST').';dbname='.constant('DB').';charset=utf8', ''.constant('DB_USER').'', ''.constant('DB_PASS').'');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}