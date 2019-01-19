<?php
class PDOBROKER
{
     
    private $host ;
    private $database;
    private $username;
    private $password;
    private $errorMode;
    public $initCon; 
    public function __construct($h,$d,$u,$p)
     {
         $this->$host=$h;
         $this->$database=$d;
         $this->$username=$u;
         $this->$password=$p;
        //  $this->$errorMode=$e;
     }

     public function setErrorMode($errMode){
         
        switch($errorMode){
            case 1:
            return PDO::ERRMODE_SILENT;
            case 2;
            return PDO::ERRMODE_WARNING;
            case 3:
            return PDO::ERRMODE_EXCEPTION;
            default:
            return PDO::ERRMODE_SILENT;
        } 
     }

     public function setFetchMode($fetchMode){
         
        switch($fetchMode){
            case 1:
            return PDO::FETCH_BOTH;
            case 2;
            return PDO::FETCH_NUM;
            case 3:
            return PDO::FETCH_ASSOC;
            default:
            return PDO::FETCH_OBJ;
        } 
     }
    public function shake($eM,$fM)
	{
        try
		{
            $errorMode=setErrorMode($eM);
            $fetchMode=setFetchMode($fM);
            $this->initCon = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);

            //Just the error attribute for now
            //Force column names to a specific case
            $this->initCon->setAttribute(PDO::ATTR_ERRMODE,$errorMode);	
            //set fetch mode
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $fetchMode);
        }
		catch(PDOException $exception)
		{
            echo "CONNECTION ERROR: " . $exception->getMessage();
        }
        return $this->initCon;
    }
}
?>