
<!-- /*
file name: abstractDA.php
Student name: Sreelakshmi Odatt Venu
Description:  The abstract DAO  php  file 
*/ -->

<?php

class AbstractDAO {
    protected $mysqli;
    
    /* Host address for the database */
    $servername = "localhost";  // 
    $username = "root";     // 
    $password = "rss123";     // 
    $dbname = "taskmanagerproject";
    
    /*
     * Constructor. Instantiates a new MySQLi object.
     * Throws an exception if there is an issue connecting
     * to the database.
     */
    function __construct() {
        try {
            $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, 
                self::$DB_PASSWORD, self::$DB_DATABASE, 3306);
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }
    
    public function getMysqli() {
        return $this->mysqli;
    }
}

?>
