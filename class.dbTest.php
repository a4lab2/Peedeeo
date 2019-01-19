<?php
require_once "class.pdo.php";
class USER
{
    private $connection;
    public function __construct()
    {
        $db=new PDOBROKER("localhost","","root","");
        $this->connection=$db->shake(3,3);
    }
    public function addTeam($role, $firstName, $lastName,$imgPath)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO team(role,firstName,lastName,imgPath) 
			                                             VALUES(:r,:f,:l,:i)");
            $stmt->bindparam(":r", $role);
            $stmt->bindparam(":f", $firstName);
            $stmt->bindparam(":l", $lastName);
            $stmt->bindparam(":i", $imgPath);            
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