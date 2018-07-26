<?php 
session_start();
class Gateway {
    public $dbh;
    private static $instance;
    
    private function __construct() {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=assessment_db', 'root', '');    
        } catch (PDOException $e) {

            echo 'Error connecting to database';
            echo $e->getMessage();
        }
    } 
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $obj = __CLASS__;

            self::$instance = new $obj;
        }

        return self::$instance;
    }
        
    public function bindParams($sql, $params) {
        $gateway = Gateway::getInstance();
        $stmt = $gateway->dbh->prepare($sql);
        
        foreach ($params as $p => &$v) $stmt->bindParam($p, $v);
        
        try { $stmt->execute(); } 
        catch (PDOException $e) { throw new Exception($e->getMessage()); }
        
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if (count($result) == 1) {
            $result = $stmt->fetchAll();
        } else {
            $result = $stmt->fetchAll();
        }
        
        if (!empty($result)) {
            return $result;
        }
    }
}
?>