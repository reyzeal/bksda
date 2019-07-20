<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module DB untuk proses query lebih mudah dengan variabel $DATABASE
 */
class DB{
    private $connection = null;
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