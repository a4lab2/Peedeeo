<?php
class PDOBROKER
{
     
    public $host ;
    public $database;
    public $username;
    public $password;
    public $errorMode;
    public $fetchMode;

    public function __construct($h,$d,$u,$p)
     {
         $this->host=$h;
         $this->database=$d;
         $this->username=$u;
         $this->password=$p;
     }

     public function setErrorMode($errorMode){
        switch($errorMode){
            case 1:
            return $this->errorMode=PDO::ERRMODE_SILENT;
            case 2;
            return $this->errorMode=PDO::ERRMODE_WARNING;
            case 3:
            return $this->errorMode=PDO::ERRMODE_EXCEPTION;
            default:
            return $this->errorMode=PDO::ERRMODE_EXCEPTION;
        } 
     }

     public function setFetchMode($fetchMode){
         
        switch($fetchMode){
            case 1:
            return $this->fetchMode=PDO::FETCH_BOTH;
            case 2;
            return $this->fetchMode=PDO::FETCH_NUM;
            case 3:
            return $this->fetchMode=PDO::FETCH_ASSOC;
            case 4:
            return $this->fetchMode=PDO::FETCH_OBJ;
            default:
            return $this->fetchMode=PDO::FETCH_ASSOC;
        } 
     }
    public function shake()
	{
        try
		{
            $this->initCon = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->initCon->setAttribute(PDO::ATTR_ERRMODE,$this->errorMode);	
            //set fetch mode
            $this->initCon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->fetchMode);
        }
		catch(PDOException $exception)
		{
            echo "CONNECTION ERROR: " . $exception->getMessage();
        }
        return $this->initCon;
    }
}
?>
