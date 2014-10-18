<?php
//Define base path of project
//for local
define( "BASE_PATH", "".$_SERVER['DOCUMENT_ROOT']."/Disposal_manager/" );

//for server
//define( "BASE_PATH", "".$_SERVER['DOCUMENT_ROOT']."/geetu/" );

//Define base url of project
//for local
 define('BASE_URL', 'http://localhost/Disposal_manager');

//for server
//define('BASE_URL', 'http://www.disposalmanager.com/geetu/');

//connection file
include_once("classes/connection.php");
//main class
include_once("classes/admin.php");
//main class
include_once("classes/mail.php");

//vendor class
include_once("classes/vendor.php");
//generator class
include_once("classes/generator.php");

//redirect class
include_once("classes/redirect.php");
//session class
include_once("classes/session.php");
//common class for all user
include_once("classes/user.php");
class Init {
    
    protected $redirect;
    protected $session;
    protected $dbh;
    private static $instance=NULL;
    
    function __construct() {
        $dbObject = DatabaseConnection::getInstance();
        $this->_dbh = $dbObject->getConnection();
        $this->_redirect = URLRedirect::getInstance();
        $this->_session = Session::getInstance();
        $this->_session->startSession();
    }
    
    //get object of current class...
    public static function getInstance() { 
        if( self::$instance === NULL ) { 
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    //get session object
    public function getSession(){
        return $this->_session;
    }
    
    //get redirect object
    public function getRedirect(){
        return $this->_redirect;
    }
}
$init = Init::getInstance();