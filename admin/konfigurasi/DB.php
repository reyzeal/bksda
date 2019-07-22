<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module DB untuk akses database lebih mudah dengan akses variabel $DATABASE
 *      $DATABASE->query('sql') untuk proses query tanpa pengambilan data record
 *      $DATABASE->select('sql') untuk proses query dengan data record
 */
class DB{
    public $error = null;
    public $connection = null;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "bksdayogyakarta2";
        $con = new mysqli($servername, $username, $password, $database);

        if ($con->connect_error){
            die("connection failed: " . $con->connect_error);
        }
        $this->connection = $con;
    }

    public function query($sql){
        $result = $this->connection->query($sql);
        if($this->connection->error){
            $this->error = $this->connection->error;
            return false;
        }
        return true;
    }
    public function select($sql){
        $result = $this->connection->query($sql);
        $data = [];
        while ($row = $result->fetch_object()){
            $data[] = $row;
        }
        return $data;
    }
}
$DATABASE = new DB();