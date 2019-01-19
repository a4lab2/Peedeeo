<?php
require_once "class.pdo.php";
class USER
{
    private $connection;
    public function __construct()
    {
        $db=new PDOBROKER("localhost","dbtester","root","");
        $db->setErrorMode(1);
        $db->setFetchMode(3);
        $this->connection=$db->shake();

    }
    public function addTeam($role, $firstName, $lastName)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO tb(role,firstName,lastName) 
			                                             VALUES(:r,:f,:l)");
            $stmt->bindparam(":r", $role);
            $stmt->bindparam(":f", $firstName);
            $stmt->bindparam(":l", $lastName);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    public function redirect($url)
    {
        header("Location: $url");
    }
}
