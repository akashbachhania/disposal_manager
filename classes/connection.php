<?php
class DatabaseConnection {
    private static $instance=NULL;
    
    public static function getInstance(){ 
        if( self::$instance === NULL ) { 
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection(){
       $dbh = new PDO("mysql:host=localhost;dbname=disposal_manager", "root", "") or die(mysql_error());
       //$dbh = new PDO("mysql:host=localhost;dbname=disposal_manager", "disposal_paul", '5+_$rKRkkOb0') or die(mysql_error());
        return $dbh;
    }    
}
