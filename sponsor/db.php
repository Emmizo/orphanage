<?php
class Db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "orphanage";

    public function __construct()
    {
        ob_start();

        // session_start();
    }
    public function db()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
        if ($conn->connect_errno) {
            die("Connection failed" . $conn->connect_errno);
        }
        return $conn;
    }
}
