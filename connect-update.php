<?php   
ob_start();
if (version_compare(phpversion(), '5.4.0', '<')) {
     if(session_id() == '') {
        session_start();
     }
}
else
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}
class DbConnect {

    public $conn;

    function __construct() {
        $this->connect();
    }

    /**
     * Establishing database connection
     * @return database connection handler
     */
    function connect() {
       
		
		include_once dirname(__FILE__) . '/db_config.php';

        try {
			$this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_EMULATE_PREPARES => false, 
                                                                                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        //print_r($test); die('mmmm');
																								
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }        
		
		return $this->conn;
    }
    
    function execute($stmt) {
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();exit;
            header('Location: error.php');
            exit;   
        }
    }

}
$dbObj = new DbConnect();
$conn = $dbObj->conn;
//print_r($conn); die('hhhhhh');



?>