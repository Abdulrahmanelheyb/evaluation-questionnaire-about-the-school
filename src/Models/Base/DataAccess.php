<?php
/*
 * Index Page Script Functions
 * Created By Abdulrahman Elheyb.
 * Date :   "10/22/2020"
 * Time :   "10:44 PM"
 */
class DataAccess
{
    private ?PDO $con = null;
    function __construct(){
        $servername = "localhost";
        $username = "schooladmin";
        $password = "school+admin";
        $dbname = "school";

        try {
            $this->con = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", "$username", "$password");
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function Statement($statement){
        try
        {
            $stmt = $this->con->prepare($statement);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $th) {
            throw $th;
        }           
    }
}